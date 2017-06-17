<?php
class Page extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->model('page_m');
		$this->load->model('page_elements_m');
		$this->load->model('file_m');
		$this->load->library('session');

	}

	public function index ()
	{
		// Fetch all pages
		$this->data['pages'] = $this->page_m->get_with_parent();

		// Load view
		$this->data['subview'] = 'admin/page/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function order ()
	{
		$this->data['sortable'] = TRUE;
		$this->data['subview'] = 'admin/page/order';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function order_ajax ()
	{
		// Save order from ajax call
		if (isset($_POST['sortable'])) {
			$this->page_m->save_order($_POST['sortable']);
		}

		// Fetch all pages
		$this->data['pages'] = $this->page_m->get_nested();

		// Load view
		$this->load->view('admin/page/order_ajax', $this->data);
	}

	public function edit ($id = NULL)
	{
		$elements_exist = array();
		// Fetch a page or set a new one
		if ($id) {
			$this->data['page'] = $this->page_m->get($id);
			
			$this->data['page_elements'] = $this->page_elements_m->get_all($id);
			for($i=0; $i<count($this->data['page_elements']); $i++) {				
				$this->data['page_elements'][$i]['title'] = html_entity_decode($this->data['page_elements'][$i]['title']);
				$this->data['page_elements'][$i]['title'] = strip_tags($this->data['page_elements'][$i]['title']);
				array_push($elements_exist,$this->data['page_elements'][$i]['id']);
			}
			$image_id = $this->data['page']->image_id;
			if ($image_id) {
				$image = $this->file_m->get($image_id);
				$this->data['page']->image_name = $image->filename;
				$this->data['page']->image_src = site_url('uploads') . '/' . $image->filename;
			}


			count($this->data['page']) || $this->data['errors'][] = 'page could not be found';

		}
		else {
			$this->data['page'] = $this->page_m->get_new();
			// $this->data['page_elements'][0] = $this->page_elements_m->get_new();
			$this->data['page_elements'] = NULL;
		}

		// Pages for dropdown
		$this->data['pages_no_parents'] = $this->page_m->get_no_parents();
		$this->data['author'] = $this->session->userdata["user_name"];
		$this->data['files'] = $this->file_m->get_all();

		// Set up the form
		$rules = $this->page_m->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->page_m->array_from_post(array(
				'title',
				'slug',
				'body',
				'template',
				'parent_id',
				'author'
			));
			// $data['body'] = html_entity_decode($data['body']);
			// $data['body'] = strip_tags($data['body']);

			$file = $this->do_upload();

			if ($file) {
				$data['image_id'] = $file;
			}

			$pid = $this->page_m->save($data, $id);
			$elements_remain = $this->save_elements($pid);
			$this->delete_elements($elements_exist, $elements_remain);
			redirect('admin/page');
		}

		// Load the view
		$this->data['subview'] = 'admin/page/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function save_elements($id = NULL)
	{
		$elements_remain = array();
		$element = $this->page_elements_m->array_from_post(array(
			'element_id',
			'element_title',
			'element_body',
			'element_type',
		));
		// $error = array('error' => var_dump($element));
		// $this->load->view('error', $error);
		$i = 0;
		for($i=0; $i < count($element['element_id']); $i++) {
			if ($element['element_id'][$i] != "") {
				$data_element = array(
					'id' => $element['element_id'][$i],
					'page_id' => $id,
					'title' => $element['element_title'][$i],
					'body' => $element['element_body'][$i],
					'type' => $element['element_type'][$i],
					'updated_at' => date('Y-m-d H:i:s'),
				);
				array_push($elements_remain,$element['element_id'][$i]);
			} else {
				$data_element = array(
					'page_id' => $id,
					'title' => $element['element_title'][$i],
					'body' => $element['element_body'][$i],
					'type' => $element['element_type'][$i],
					'created_at' => date('Y-m-d H:i:s'),
				);
			}
			if ($element['element_id'][$i] != "") {

				$this->page_elements_m->save($data_element, $element['element_id'][$i]);
				// $error = array('error' => var_dump($element['element_id']));
				// $this->load->view('error', $error);
			} else {
				// $error = array('error' => var_dump($data_element));
				// $this->load->view('error', $error);
				$this->page_elements_m->save($data_element, NULL);
			}

		}
		return $elements_remain;

	}
	public function delete_elements($elements_exist, $elements_remain)
	{
		$elements_to_delete = array_diff($elements_exist,$elements_remain);
		// $error = array('error' => var_dump(count($elements_to_delete)));
		// $this->load->view('error', $error);

		foreach($elements_to_delete as $element) {
			if ($element != NULL) {
				$this->page_elements_m->delete($element);
			}
			// $error = array('error' => var_dump($elements_to_delete[$i]));
			// $this->load->view('error', $error);
		}


	}
	public function do_upload()
	{
		$image_path = './uploads/';
		$config['upload_path']   = $image_path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
		$config['max_size']      = 10000;
		$config['max_width']     = 10000;
		$config['max_height']    = 10000;
		$this->load->library('upload', $config);
		$accepted_file = "";

	    $this->upload->initialize($config);

	    if ( ! $this->upload->do_upload('upload-image')) {
				 $error = array('error' => $this->upload->display_errors());
				//  $this->load->view('error', $error);

			}

			else {
				 $data = $this->upload->data();
				 $set_data = array('filename' => $data['file_name']);
				 $accepted_file = $this->file_m->save($set_data);

			}

			return $accepted_file;

	  }

	public function delete ($id)
	{
		$this->page_m->delete($id);
		redirect('admin/page');
	}

	public function _unique_slug ($str)
	{
		// Do NOT validate if slug already exists
		// UNLESS it's the slug for the current page


		$id = $this->uri->segment(4);
		$this->db->where('slug', $this->input->post('slug'));
		! $id || $this->db->where('id !=', $id);
		$page = $this->page_m->get();

		if (count($page)) {
			$this->form_validation->set_message('_unique_slug', '%s should be unique');
			return FALSE;
		}

		return TRUE;
	}
}

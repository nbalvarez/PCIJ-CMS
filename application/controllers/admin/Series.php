<?php
class Series extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->library( array('acl','session'));

		$this->load->model('article_m');
		$this->load->model('user_m');
		$this->load->model('tagline_m');
		$this->load->model('tags_m');
		$this->load->model('file_m');
		$this->load->model('subjects_m');
		$this->load->model('series_m');
		$this->load->model('tag_article_m');
		$this->load->model('author_article_m');
		$this->load->model('tagline_author_article_m');
		$this->load->model('file_article_m');
		$this->load->model('series_article_m');



	}

	public function index ()
	{
		// Fetch all permissions
		$user_roles = $this->session->userdata('roles');

		if (!in_array("admin", $user_roles))
		{
			//insert modal
			redirect('admin/dashboard');
		}
		$this->data['permissions'] = $this->permission_m->get();

		// Load view
		$this->data['subview'] = 'admin/series/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit ($id = NULL)
	{
		//checks if user is an admin

		// Fetch a permission or set a new one
		if ($id) { //permission exist
			$this->data['permission'] = $this->permission_m->get($id);
			// $role = $this->data['permission']->role_id;
			// $module = $this->data['permission']->module_id;
			// $action = $this->data['permission']->action_id;
			// $this->data['selected_role'] = $this->role_m->get($role);
			// $this->data['selected_module'] = $this->module_m->get($module);
			// $this->data['selected_action'] = $this->action_m->get($action);

			count($this->data['permission']) || $this->data['errors'][] = 'permission could not be found';

			$this->set_form($id);
		}
		else { //create new
			//initialize array for multiple selections
			// $this->data['role_id'] = '';
			// $this->data['selected_module'] = '';
			// $this->data['selected_action'] = '';

			$this->data['permission'] = $this->permission_m->get_new();
			$this->set_form();

		}



	}

	public function set_form($id = NULL){
		$this->data['roles'] = $this->role_m->get_all(); //for dropdown
		$this->data['modules'] = $this->module_m->get_all();
		$this->data['actions'] = $this->action_m->get_all();

		// Set up the form
		$rules = $this->permission_m->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {

			$data = $this->permission_m->array_from_post(array(
				'role_id',
				'module_id',
				'action_id'
			));
			// $data['role_id'] = $this->permission_m->array_from_post(array('roles'));
			// $data['action_id'] = $this->permission_m->array_from_post(array('actions'));
			// $data['module_id'] = $this->permission_m->array_from_post(array('modules'));

			// $data['body'] = html_entity_decode($data['body']);
			// $data['body'] = strip_tags($data['body']);

			//var_dump($data);
			$data['modified'] = date('Y-m-d');

			$this->permission_m->save($data, $id);

			redirect('admin/series');
		}
		// Load the view
		$this->data['subview'] = 'admin/series/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}



	public function delete ($id)
	{
		$this->permission_m->delete($id);
		redirect('admin/series');
	}

}

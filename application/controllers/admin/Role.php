<?php
class Role extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->library( array('acl','session'));

		$this->load->model('role_m');



	}

	public function index ()
	{
		//checks if user is an admin
		$user_roles = $this->session->userdata('roles');

		if (!in_array("admin", $user_roles))
		{
			//insert modal
			redirect('admin/dashboard');
		}
		$this->data['roles'] = $this->role_m->get();

		// Load view
		$this->data['subview'] = 'admin/role/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit ($id = NULL)
	{


		// Fetch a role or set a new one
		if ($id) { //role exist
			$this->data['role'] = $this->role_m->get($id);
			$this->data['role']->description = html_entity_decode($this->data['role']->description);
			$this->data['role']->description = strip_tags($this->data['role']->description);

			count($this->data['role']) || $this->data['errors'][] = 'Role could not be found';

			$this->set_form($id);
		}
		else { //create new

			$this->data['role'] = $this->role_m->get_new();
			$this->set_form();

		}



	}

	public function set_form($id = NULL){
		$this->data['roles'] = $this->role_m->get_all(); //for dropdown

		$rules = $this->role_m->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {

			$data = $this->role_m->array_from_post(array(
				'title',
				'description'
			));

			$data['modified'] = date('Y-m-d');

			$this->role_m->save($data, $id);

			redirect('admin/role');
		}
		// Load the view
		$this->data['subview'] = 'admin/role/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}



	public function delete ($id)
	{
		$this->role_m->delete($id);
		redirect('admin/role');
	}

}

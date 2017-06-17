<?php

class User extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library( array('acl','session'));

		$this->load->model('role_m');
	}
	public function index()
	{
		//checks if user is an admin
		$user_roles = $this->session->userdata('roles');

		if (!in_array("admin", $user_roles))
		{
			//insert modal
			redirect('admin/dashboard');
		}
		// Fetch all users'
		$this->data['users'] = $this->user_m->get();

		// Load view
		$this->data['subview'] = 'admin/user/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function view ($id = NULL)
	{

		//MODIFY THIS!!!!
		// Fetch a user or set a new one
		if ($id) {
			$this->data['user'] = $this->user_m->get($id);
			count($this->data['user']) || $this->data['errors'][] = 'User could not be found';
		}
		else {
			$this->data['user'] = $this->user_m->get_new();
		}


		// Load the view
		$this->data['subview'] = 'admin/user/view';
		$this->load->view('admin/_layout_main', $this->data);
	}


	public function edit ($id = NULL)
	{
		// Fetch a user or set a new one
		if ($id) {
			$this->data['user'] = $this->user_m->get($id);
			count($this->data['user']) || $this->data['errors'][] = 'User could not be found';
			$this->data['user']->bio = html_entity_decode($this->data['user']->bio);
			$this->data['user']->bio = strip_tags($this->data['user']->bio);

			$this->set_form($id);
		}
		else {
			$this->data['user'] = $this->user_m->get_new();
			$this->set_form();
		}


	}

	public function set_form($id = NULL){
		$this->data['roles'] = $this->role_m->get_all();
		// Set up the form
		$rules = $this->user_m->rules_admin;
		$id || $rules['password']['rules'] .= '|required';
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->user_m->array_from_post(array('first_name', 'middle_name', 'last_name', 'user_name', 'email', 'password', 'image', 'bio', 'active', 'access'	));




			if(!empty($data['password'])) {
			    $data['password'] = $this->user_m->hash($data['password']);
			} else {
			    // We don't save an empty password
			    unset($data['password']);
			}
			$data['access'] = get_role($data['access'],'title');
			$this->user_m->save($data, $id);
			redirect('admin/user');
		}

		// Load the view
		$this->data['subview'] = 'admin/user/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function delete ($id)
	{
		$this->user_m->delete($id);
		redirect('admin/user');
	}


	public function login()
	{
		$dashboard = 'admin/dashboard';
		$this->user_m->loggedin()==FALSE ||redirect($dashboard);

		$rules = $this->user_m->rules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE)
		{
			//login and redirect
			if ($this->user_m->login() == TRUE)
			{
				redirect($dashboard);
			}
			else
			{
				$this->session->set_flashdata('error', 'That email/password combination does not exist');
				redirect('admin/user/login', 'refresh');
			}
		}
		$this->form_validation->set_rules($rules);
		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/_layout_modal', $this->data);
	}

	public function logout()
	{
		$this->user_m->logout();
		redirect('admin/user/login');
	}

	public function _unique_email ($str)
	{
		// Do NOT validate if email already exists
		// UNLESS it's the email for the current user

		$id = $this->uri->segment(4);
		$this->db->where('email', $this->input->post('email'));
		!$id || $this->db->where('id !=', $id);
		$user = $this->user_m->get();

		if (count($user)) {
			$this->form_validation->set_message('_unique_email', '%s should be unique');
			return FALSE;
		}

		return TRUE;
	}

}

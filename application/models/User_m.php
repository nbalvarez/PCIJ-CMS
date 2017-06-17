<?php
class User_m extends MY_Model
{

	protected $_table_name = 'users';
	protected $_order_by = 'user_name';
	public $rules = array(
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required'
		)
	);
	public $rules_admin = array(
		'user_name' => array(
			'field' => 'user_name',
			'label' => 'User Name',
			'rules' => 'trim|required'
		),
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|callback__unique_email'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|matches[password_confirm]'
		),
		'password_confirm' => array(
			'field' => 'password_confirm',
			'label' => 'Confirm password',
			'rules' => 'trim|matches[password]'
		),
	);

	function __construct ()
	{
		parent::__construct();
	}

	public function login ()
	{
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password')),
		), TRUE);

		if (count($user)) {
			// Log in user
			$data = array(
				'user_name' => $user->user_name,
				'email' => $user->email,
				'uid' => $user->id,
				'roles' => array($user->access),
				'loggedin' => TRUE,
				'access' => $user->access
			);
			$this->session->set_userdata($data);
            return TRUE;
		}

        // If we get to here then login did not succeed
        return FALSE;
	}
	public function get_all()
	{
		$this->db->from('users');
		$this->db->order_by('user_name');
		$result = $this->db->get();
  		$return = array();

		if($result->num_rows() > 0) {
		//$i = 0;
    	foreach($result->result_array() as $row) {
    		//$i = $i+1;

    		//nested array
      		$return[$row['id']] = $row['first_name'] . ' ' . $row['last_name'] ;
    		}
  		}

  return $return;

	}
	public function logout ()
	{
		$this->session->sess_destroy();
	}

	public function loggedin ()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	public function get_new(){
		$user = new stdClass();
		$user->user_name = '';
		$user->email = '';
		$user->password = '';
		$user->first_name = '';
		$user->middle_name = '';
		$user->last_name = '';
		$user->access = '';
		$user->active = '';
		$user->bio = '';
		$user->image= '';

		return $user;
	}

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}

	public function get_where_in($column, $dataset)
	{
		$this->db->from('users');
		$this->db->where_in($column, $dataset);
		$this->db->order_by('user_name');
		$result = $this->db->get();

  		return $result->result_array();

	}
}

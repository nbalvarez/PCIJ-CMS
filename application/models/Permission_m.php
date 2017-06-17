<?php
class Permission_m extends MY_Model
{
	protected $_table_name = 'permissions';
	protected $_order_by = 'id desc';
	protected $_timestamps = TRUE;
	public $rules = array(
		'role_id' => array(
			'field' => 'role_id',
			'label' => 'Role',
			'rules' => 'required'
		),
		'module_id' => array(
			'field' => 'module_id',
			'label' => 'Module',
			'rules' => 'required'
		),
		'action_id' => array(
			'field' => 'action_id',
			'label' => 'Action',
			'rules' => 'required'
		)
	);

	public function get_new ()
	{
		$permission = new stdClass();
		$permission->role_id = '';
		$permission->module_id = '';
		$permission->action_id = '';

		return $permission;
	}

	public function get_all()
	{
		$this->db->from($this->_table_name);
		$this->db->order_by($this->_order_by);
		$result = $this->db->get();

  	return $result;

	}

	public function where($dataset)
	{
		$this->db->from('permissions');
		$this->db->where($dataset);
		$result = $this->db->get();

  		return $result->result();

	}


}

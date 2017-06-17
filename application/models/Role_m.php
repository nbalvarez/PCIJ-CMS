<?php
class Role_m extends MY_Model
{
	protected $_table_name = 'roles';
	protected $_order_by = 'id desc';
	protected $_timestamps = TRUE;
	public $rules = array(
		'title' => array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'description' => array(
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'trim|required'
		)
	);

	public function get_new ()
	{
		$role = new stdClass();
		$role->title = '';
		$role->description = '';

		return $role;
	}

	public function get_all()
	{
		$this->db->from($this->_table_name);
		$this->db->order_by($this->_order_by);
		$result = $this->db->get();
  	$return = array();

		if($result->num_rows() > 0) {
		//$i = 0;
    	foreach($result->result_array() as $row) {
    		//$i = $i+1;

    		//nested array
      		$return[$row['id']] = $row['title'];
    		}
  		}

  	return $return;

	}


}

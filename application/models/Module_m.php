<?php
class Module_m extends MY_Model
{
	protected $_table_name = 'modules';
	protected $_order_by = 'id desc';
	protected $_timestamps = TRUE;
	// public $rules = array(
	// 	'pubdate' => array(
	// 		'field' => 'pubdate',
	// 		'label' => 'Publication date',
	// 		'rules' => 'trim|required|exact_length[10]|xss_clean'
	// 	),
	// 	'title' => array(
	// 		'field' => 'title',
	// 		'label' => 'Title',
	// 		'rules' => 'trim|required|max_length[100]|xss_clean'
	// 	),
	// 	'slug' => array(
	// 		'field' => 'slug',
	// 		'label' => 'Slug',
	// 		'rules' => 'trim|required|max_length[100]|url_title|xss_clean'
	// 	),
	// 	'body' => array(
	// 		'field' => 'body',
	// 		'label' => 'Body',
	// 		'rules' => 'trim|required'
	// 	)
	// );

	public function get_new ()
	{
		$module = new stdClass();
		$module->name = '';

		return $module;
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
      		$return[$row['id']] = $row['name'];
    		}
  		}

  	return $return;

	}

}

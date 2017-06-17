<?php
class Page_elements_m extends MY_Model
{
	protected $_table_name = 'pages_elements';
	protected $_order_by = 'id';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	public $rules = array(
		'page_id' => array(
			'field' => 'page_id',
			'label' => 'Page',
			'rules' => 'trim|intval'
		),
		'type' => array(
			'field' => 'type',
			'label' => 'Type',
			'rules' => 'trim|required|xss_clean'
		),
		'title' => array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'body' => array(
			'field' => 'body',
			'label' => 'Body',
			'rules' => 'trim|required'
		)
	);

	public function get_new ()
	{
		$element = new stdClass();
		$element->title = '';
		$element->body = '';
		$element->page_id = 0;
		$element->type = 'tab';
		$element->created_at = date('Y-m-d');
		$element->updated_at = NULL;
		$element->deleted_at = NULL;
		return $element;
	}

	public function get_all($page_id, $type = NULL)
	{
		$this->db->from('pages_elements');
		$this->db->where('page_id', $page_id);
		$this->db->where('deleted_at', NULL);

		if ($type) {
			$this->db->where('type', $type);
		}

		$this->db->order_by('id');
		$result = $this->db->get();
  	// $return = array();

		// if($result->num_rows() > 0) {
		// 	$i = 0;
    // 	foreach($result->result_array() as $row) {
    // 		$i = $i+1;
		//
    //   		$return[$i] = $row['author_id'];
    // 	}
  	// }
  	return $result->result_array();
  }

	public function delete ($id)
	{
		// Delete an element
		// parent::delete($id);

		// Reset parent ID for its children
		// $this->db->set(array(
		// 	'parent_id' => 0
		// ))->where('parent_id', $id)->update($this->_table_name);
		$data = array(
               'deleted_at' => date('Y-m-d H:i:s')
            );

		$filter = $this->_primary_filter;
		$id = $filter($id);	
		$this->db->where($this->_primary_key, $id);
		$this->db->update($this->_table_name, $data);

		return $id;
	}
}

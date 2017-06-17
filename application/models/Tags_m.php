<?php
class Tags_m extends MY_Model
{

	protected $_table_name = 'tags';

	function __construct ()
	{
		parent::__construct();
	}


	public function get_all()
	{
		$this->db->from('tags');
		$this->db->order_by('text');
		$result = $this->db->get();
  		$return = array();

		if($result->num_rows() > 0) {

    	foreach($result->result_array() as $row) {


      		$return[$row['id']] = $row['text'];
    		}
  		}

	  return $return;
	  }

  public function get_where_in($column, $dataset)
	{
		$this->db->from('tags');
		$this->db->where_in($column, $dataset);
		$this->db->order_by('text');
		$result = $this->db->get();

  		return $result->result_array();

	}

	public function save_multiple($tags, $id = NULL)
	{
		$ids = array();
		foreach ($tags as $tag)
		{
			$data = array('text' => $tag);
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			array_push($ids, $this->db->insert_id());
		}

		return $ids;

	}

	public function save_from_view($tag)
	{
		$data = array('text' => $tag);
		$this->db->set($data);
		$this->db->insert($this->_table_name);
		$id = $this->db->insert_id();
		$q = $this->db->get_where($this->_table_name, array('id' => $id));
		//$row = $q->row();
		// $return = array($row['id'] => $row['text']);

		return $q->row();

	}
}

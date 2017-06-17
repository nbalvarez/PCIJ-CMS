<?php
class Series_m extends MY_Model
{
	protected $_table_name = 'series';
	protected $_title = 'title';
	public $rules = array(
		'title' => array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		)
	);


	public function get_new ()
	{
		$series = new stdClass();
		$series->title = '';
		$series->author_id =  '';
		$series->created = date('Y-m-d');
		return $series;
	}
	public function get_all()
	{
		$this->db->from($this->_table_name);
		$this->db->order_by($this->_title);
		$result = $this->db->get();
  		$return = array();

		if($result->num_rows() > 0) {

			$return[''] = "Choose a Series..";

	    	foreach($result->result_array() as $row) {


	      		$return[$row['id']] = $row[$this->_title];
			}
		}

	return $return;
	}

  public function get_where_in($column, $dataset)
	{
		$this->db->from($this->_table_name);
		$this->db->where_in($column, $dataset);
		$this->db->order_by($this->_title);
		$result = $this->db->get();

  		return $result->result_array();

	}

	public function save_multiple($series, $id = NULL)
	{
		$ids = array();
		foreach ($series as $item)
		{
			$data = array($this->_title => $item, 'author_id' => $id, 'created' => date('Y-m-d'));
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			array_push($ids, $this->db->insert_id());
		}

		return $ids;

	}

	public function save_from_view($item)
	{
		$data = array($this->_title => $item);
		$this->db->set($data);
		$this->db->insert($this->_table_name);
		$id = $this->db->insert_id();
		$q = $this->db->get_where($this->_table_name, array('id' => $id));
		//$row = $q->row();
		// $return = array($row['id'] => $row['text']);

		return $q->row();

	}

}

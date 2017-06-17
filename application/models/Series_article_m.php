<?php
class Series_article_m extends MY_Model
{
	protected $_table_name = 'series_article';
	protected $_article_slug = 'article_slug';
	protected $_series_id = 'series_id';

	public function save_multiple($series, $slug){

		$this->db->where($this->_article_slug, $slug);
		$this->db->delete($this->_table_name);
		//save set of authors to table

		foreach ($series as $item)
		{
			// get highest rank in series (last item in series)
			$this->db->from($this->_table_name);
			$this->db->where($this->_series_id, $item);
			$this->db->select_max('rank');
			$rank = $this->db->get()->row()->rank;
			if ($rank == NULL)
			{
				$rank = 0;
			}
			$rank++;

			// add article to series
			$data = array($this->_series_id => $item,
						  $this->_article_slug => $slug, 'rank' => $rank);
			$this->db->set($data);
			$this->db->insert($this->_table_name);
		}

		return $slug;
	}

	public function get_all($slug)
	{
		$this->db->from($this->_table_name);
		$this->db->where($this->_article_slug, $slug);
		$this->db->order_by($this->_series_id);
		$result = $this->db->get();
  		$return = array();

		if($result->num_rows() > 0) {
			$i = 0;
	    	foreach($result->result_array() as $row) {
	    		$i = $i+1;

	      		$return[$i] = $row[$this->_series_id];
	    	}
  	}
  		return $return;
  }

  	public function get_all_id($series_id)
	{
		$this->db->from($this->_table_name);
		$this->db->where($this->_series_id, $series_id);
		$result = $this->db->get();
  		$return = array();

		if($result->num_rows() > 0) {
			$i = 0;
	    	foreach($result->result_array() as $row) {
	    		$i = $i+1;

	      		$return[$i] = $row[$this->_article_slug];
	    	}
  	}
  		return $return;
  }


	public function get_where_in($column, $dataset)
	{
		$this->db->from($this->_table_name);
		$this->db->where_in($column, $dataset);
		$this->db->order_by($this->_series_id);
		$result = $this->db->get();

  		return $result->result_array();

			$return = array();

		if($result->num_rows() > 0) {

    	foreach($result->result_array() as $row) {
      		$return[$row['id']] = $row[$this->_series_id];
  		}
		}

  		return $return;

	}

	public function get_column_array($select,$column,$dataset)
	{
		$this->db->from($this->_table_name);
		$this->db->where_in($column, $dataset);
		$this->db->order_by($column);
		$result = $this->db->get();
		$return = array();

		if($result->num_rows() > 0) {

    	foreach($result->result_array() as $row)
			{

					$return[] = $row[$select];
  		}

		}
  	return $return;

	}


}

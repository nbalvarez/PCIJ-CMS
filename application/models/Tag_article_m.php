<?php
class Tag_article_m extends MY_Model
{
	protected $_table_name = 'tag_article';
	protected $_article_slug = 'article_slug';

	public function save_multiple($tags, $slug, $id = NULL){

		$this->db->where($this->_article_slug, $slug);
		$this->db->delete($this->_table_name);
		//save set of authors to table

		foreach ($tags as $tag)
		{
			$data = array('tag_id' => $tag,
						  'article_slug'=> $slug);
			$this->db->set($data);
			$this->db->insert($this->_table_name);
		}

		return $id;
	}

	public function get_all($slug)
	{
		$this->db->from('tag_article');
		$this->db->where('article_slug', $slug);
		$this->db->order_by('tag_id');
		$result = $this->db->get();
  		$return = array();

		if($result->num_rows() > 0) {
			$i = 0;
	    	foreach($result->result_array() as $row) {
	    		$i = $i+1;

	      		$return[$i] = $row['tag_id'];
	    	}
  	}
  		return $return;
  }

	public function get_where_in($column, $dataset)
	{
		$this->db->from('tag_article');
		$this->db->where_in($column, $dataset);
		$this->db->order_by('tag_id');
		$result = $this->db->get();

  		return $result->result_array();

			$return = array();

		if($result->num_rows() > 0) {

    	foreach($result->result_array() as $row) {


      		$return[$row['id']] = $row['text'];
    		}
  		}

  return $return;

	}

	public function get_column_array($select,$column,$dataset)
	{
		$this->db->from('tag_article');
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

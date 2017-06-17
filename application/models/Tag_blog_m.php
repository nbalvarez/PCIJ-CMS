<?php
class Tag_blog_m extends MY_Model
{
	protected $_table_name = 'tag_blog';
	protected $_blog_slug = 'blog_slug';

	public function save_multiple($tags, $slug, $id = NULL){

		$this->db->where($this->_blog_slug, $slug);
		$this->db->delete($this->_table_name);
		//save set of authors to table

		foreach ($tags as $tag)
		{
			$data = array('tag_id' => $tag,
						  'blog_slug'=> $slug);
			$this->db->set($data);
			$this->db->insert($this->_table_name);
		}

		return $id;
	}

	public function get_all($slug)
	{
		$this->db->from('tag_blog');
		$this->db->where('blog_slug', $slug);
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

		public function get_column_array($select,$column,$dataset)
		{
			$this->db->from('tag_blog');
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

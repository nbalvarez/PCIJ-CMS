<?php
class Tagline_author_blog_m extends MY_Model
{
	protected $_table_name = 'tagline_author_blog';
	protected $_blog_slug = 'blog_slug';

	public function save_multiple($authors, $slug, $id = NULL){

		//clear table of the previous authors
		$this->db->where($this->_blog_slug, $slug);
		$this->db->delete($this->_table_name);
		//save set of authors to table

		foreach ($authors as $author)
		{
			$data = array('author_id' => $author,
						  'blog_slug'=> $slug);
			$this->db->set($data);
			$this->db->insert($this->_table_name);
		}

		return $id;
	}

	public function get_all($slug)
	{
		$this->db->from('tagline_author_blog');
		$this->db->where('blog_slug', $slug);
		$this->db->order_by('author_id');
		$result = $this->db->get();
  		$return = array();

		if($result->num_rows() > 0) {
			$i = 0;
	    	foreach($result->result_array() as $row) {
	    		$i = $i+1;

	      		$return[$i] = $row['author_id'];
	    	}
  		}
  		return $return;
  	}
}

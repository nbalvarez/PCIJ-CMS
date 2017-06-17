<?php
class File_article_m extends MY_Model
{
	protected $_table_name = 'file_article';
	protected $_article_slug = 'article_slug';
	protected $_file_id = 'file_id';

	public function save_multiple($files, $slug, $id = NULL){

		// clear table of the previous files
		// $this->db->where($this->_article_slug, $slug);
		// $this->db->delete($this->_table_name);
		// save set of files to table
		
		foreach ($files as $file)
		{
			$data = array($this->_file_id => $file,
						  $this->_article_slug => $slug);
			$this->db->set($data);
			$this->db->insert($this->_table_name);
		}

		return $id;
	}


	public function get_all($slug)
	{
		$this->db->from($this->_table_name);
		$this->db->where($this->_article_slug, $slug);
		$this->db->where('deleted_at', NULL);

		$this->db->order_by($this->_file_id);
		$result = $this->db->get();
  // 		$return = array();

		// if($result->num_rows() > 0) {
		// 	$i = 0;
	 //    	foreach($result->result_array() as $row) {
	 //    		$i = $i+1;

	 //      		$return[$i] = $row[$this->_file_id];
	 //    	}
  // 		}
  // 		return $return;
		return $result->result_array();
  	}
  	public function delete_item ($id)
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

<?php
class Subjects_M extends MY_Model
{
	
	protected $_table_name = 'subjects';

	function __construct ()
	{
		parent::__construct();
	}

	
	public function get_all()
	{
		$this->db->from('subjects');
		$this->db->order_by('text');
		$result = $this->db->get();
  		$return = array();
		
		if($result->num_rows() > 0) {
		$i = 0;
    	foreach($result->result_array() as $row) {
    		$i = $i+1;
    	
      		$return[$i] = $row['text'];
    		}
  		}

  return $return;
  }
		

}
<?php
class Tagline_m extends MY_Model
{

	protected $_table_name = 'tagline';

	function __construct ()
	{
		parent::__construct();
	}


	public function get_all()
	{
		$this->db->from('tagline');
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

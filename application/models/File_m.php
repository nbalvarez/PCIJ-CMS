<?php
class File_m extends MY_Model
{

	protected $_table_name = 'files';

	function __construct ()
	{
		parent::__construct();
	}


	public function get_all()
	{
		$this->db->from('files');
		$this->db->order_by('filename');
		$result = $this->db->get();
  		$return = array();

		if($result->num_rows() > 0) {

    	foreach($result->result_array() as $row) {


      		$return[$row['id']] = $row['filename'];
    		}
  		}

  return $return;
  }


}

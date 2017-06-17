<?php
class Blog_m extends MY_Model
{
	protected $_table_name = 'blogs';
	protected $_order_by = 'pubdate desc, id desc';
	protected $_timestamps = TRUE;
	public $rules = array(
		'pubdate' => array(
			'field' => 'pubdate',
			'label' => 'Publication date',
			'rules' => 'trim|required|exact_length[10]|xss_clean'
		),
		'title' => array(
			'field' => 'title',
			'label' => 'Posthead Title',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'slug' => array(
			'field' => 'slug',
			'label' => 'Slug',
			'rules' => 'trim|required|max_length[100]|url_title|xss_clean'
		),
		'body' => array(
			'field' => 'body',
			'label' => 'Body',
			'rules' => 'trim|required'
		),
		'summary' => array(
			'field' => 'summary',
			'label' => 'Summary',
			'rules' => 'trim'
		)
	);

	public function get_new ()
	{
		$blog = new stdClass();
		$blog->title = '';
		$blog->slug = '';
		$blog->body = '';
		$blog->summary = '';
		$blog->pubdate = '';
		$blog->created = date('Y-m-d');
		$blog->pre_head =  '';
		$blog->post_head =  '';
		$blog->tagline = '';
		$blog->general_notes =  '';
		$blog->series_indicator =  '';
		$blog->ireport_indicator =  '';
		$blog->subjects =  '';
		$blog->index_num = '';
		$blog->general_notes = '';
		$blog->status = 0;

		return $blog;
	}

	public function set_published(){
		$this->db->where('pubdate <=', date('Y-m-d'));
	}

	public function get_recent($limit = 3){

		// Fetch a limited number of recent blogs
		$limit = (int) $limit;
		$this->db->where('status',2);
		$this->set_published();
		$this->db->limit($limit);
		return parent::get();
	}
	public function get_published(){

		// Fetch all published articles
		$this->db->where('status', 2);
		return parent::get();
	}

}

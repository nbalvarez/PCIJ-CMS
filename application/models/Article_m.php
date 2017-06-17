<?php
class Article_m extends MY_Model
{
	protected $_table_name = 'articles';
	protected $_order_by = 'pubdate desc, id desc';
	protected $_timestamps = TRUE;
	public $rules = array(
		'pubdate' => array(
			'field' => 'pubdate',
			'label' => 'Publication date',
			'rules' => 'trim|exact_length[10]|xss_clean'
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
		$article = new stdClass();
		$article->title = '';
		$article->slug = '';
		$article->body = '';
		$article->summary = '';
		$article->pubdate = NULL;
		$article->created = date('Y-m-d');
		$article->pre_head =  '';
		$article->post_head =  '';
		$article->tagline = '';
		$article->general_notes =  '';
		$article->series_indicator =  '';
		$article->ireport_indicator =  '';
		$article->subjects =  '';
		$article->index_num =  '';
		$article->general_notes = '';
		$article->status = 0;

		return $article;
	}

	public function set_published(){
		$this->db->where('pubdate <=', date('Y-m-d'));
	}

	public function get_recent($limit = 3){

		// Fetch a limited number of recent articles
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
	public function get_where_in($column, $dataset, $order = 'title')
	{
		$this->db->from('articles');
		$this->db->where_in($column, $dataset);
		$this->db->order_by($order);
		$result = $this->db->get();

  		return $result->result_array();

	}

	public function get_where_in_object($column, $dataset, $order = 'title')
	{
		$this->db->from('articles');
		$this->db->where_in($column, $dataset);
		$this->db->order_by($order);
		$result = $this->db->get();

  		return $result;

	}

	public function get_series($column, $dataset, $order = 'title')
	{
		// $this->db->from('articles');
		$this->db->where_in($column, $dataset);
		$this->db->where('status',2);
		$this->set_published();
		$this->db->limit(3);
		return parent::get();

	}

}

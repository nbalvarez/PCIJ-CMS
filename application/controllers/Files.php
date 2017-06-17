<?php

class Files extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('file_article_m');
    }

    public function index() {

    }

    public function download($filename){
      // load download helper

      $this->load->helper('download');
      $path = APPPATH . 'uploads/'. $filename;

      force_download($path, NULL);
    }

    private function _homepage(){
    	$this->load->model('article_m');
    	$this->db->where('pubdate <=', date('Y-m-d'));
//    	$this->article_m->set_published();
    	$this->db->limit(6);
    	$this->data['articles'] = $this->article_m->get();
    }

    private function _news_archive(){

    	$this->data['recent_news'] = $this->article_m->get_recent();

		// Count all articles
		$this->article_m->set_published();
		$count = $this->db->count_all_results('articles');

		// Set up pagination
		$perpage = 4;
		if ($count > $perpage) {
			$this->load->library('pagination');
			$config['base_url'] = site_url($this->uri->segment(1) . '/');
			$config['total_rows'] = $count;
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 2;





			$this->pagination->initialize($config);
			$this->data['pagination'] = $this->pagination->create_links();
			$offset = $this->uri->segment(2);
		}
		else {
			$this->data['pagination'] = '';
			$offset = 0;
		}

		// Fetch articles
		$this->article_m->set_published();
		$this->db->limit($perpage, $offset);
		$this->data['articles'] = $this->article_m->get();
    }
}

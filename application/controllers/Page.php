<?php

class Page extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('page_m');
        $this->load->model('page_elements_m');
        $this->load->model('tag_article_m');
        $this->load->model('tag_blog_m');
        $this->load->model('tags_m');
        $this->load->model('article_m');
        $this->load->model('blog_m');
        $this->load->model('file_m');
    }

    public function index() {
    	// Fetch the page template
    	$this->data['page'] = $this->page_m->get_by(array('slug' => (string) $this->uri->segment(1)), TRUE);
      
      $this->data['page_elements'] = $this->page_elements_m->get_all($this->data['page']->id);

    	count($this->data['page']) || show_404(current_url());

    	add_meta_title($this->data['page']->title);

    	// Fetch the page data
    	$method = '_' . $this->data['page']->template;
    	if (method_exists($this, $method)) {
    		$this->$method();
    	}
    	else {
    		log_message('error', 'Could not load template ' . $method .' in file ' . __FILE__ . ' at line ' . __LINE__);
    		show_error('Could not load template ' . $method);
    	}

    	// Load the view
    	$this->data['subview'] = $this->data['page']->template;
    	$this->load->view('_main_layout_client', $this->data);
    }

    private function _page(){
    	$this->data['recent_news'] = $this->article_m->get_recent();
    }
    private function _about(){
    	$this->data['recent_news'] = $this->article_m->get_recent();
      $this->data['page']->image_src = './uploads/' . $this->file_m->get($this->data['page']->image_id)->filename;
    }
    private function _storylanding(){
    	$this->data['recent_news'] = $this->article_m->get_recent();
      $this->data['recent_blogs'] = $this->blog_m->get_recent();
    }
    private function _training(){
    	$this->data['recent_news'] = $this->article_m->get_recent();
    }

    private function _homepage(){
    	$this->load->model('article_m');
    	$this->db->where('pubdate <=', date('Y-m-d'));
      $this->data['recent_news'] = $this->article_m->get_recent();
      $this->data['recent_blogs'] = $this->blog_m->get_recent();
//    	$this->article_m->set_published();
    	$this->db->limit(6);
    	$this->data['articles'] = $this->article_m->get_published();
    }

    private function _news_archive(){

    	$this->data['recent_news'] = $this->article_m->get_recent();
      $this->data['all_tags'] = $this->tags_m->get_all();
  		// Count all articles
  		$this->article_m->set_published();
      $this->db->where('status',2);
  		$count = $this->db->count_all_results('articles');

  		// Set up pagination
  		$perpage = 4;
  		if ($count > $perpage) {
  			$this->load->library('pagination');
  			$config['base_url'] = site_url($this->uri->segment(1) . '/');
  			$config['total_rows'] = $count;
  			$config['per_page'] = $perpage;
  			$config['uri_segment'] = 2;
        $config['use_page_numbers'] = TRUE;




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
  		$this->data['articles'] = $this->article_m->get_published();
    }

    private function _blog_archive(){

      $this->data['recent_blogs'] = $this->blog_m->get_recent();
      $this->data['all_tags'] = $this->tags_m->get_all();
      // Count all blogs
      $this->blog_m->set_published();
      $this->db->where('status',2);
      $count = $this->db->count_all_results('blogs');

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

      // Fetch blogs
      $this->blog_m->set_published();
      $this->db->limit($perpage, $offset);
      $this->data['blogs'] = $this->blog_m->get_published();
    }


    public function search_tag($type,$tag) {

        //$this->data['recent_news'] = $this->{$type.'_m'}->get_recent();
        // get tag id
        $tag = strtolower(str_replace("-", " ", $tag));
        $this->db->from('tags');
        $this->db->where('LOWER(text)',$tag);
        $tag_object = $this->db->get()->first_row();

        // Count all articles
        $slug_array = $this->{'tag_'.$type.'_m'}->get_column_array($type.'_slug','tag_id',$tag_object->id);
        //$collection = $this->{$type.'_m'}->get_where_in_object($type.'_slug',$slug_array);
        // var_dump($slug_array);

        if(!empty($slug_array)) {
          $this->db->from($type.'s');
          $this->db->where_in('slug', $slug_array);
          $this->db->where('status',2);
          $query = $this->db->get();
      		//$this->db->order_by();
          // $this->{$type.'_m'}->set_published();

          $count = $query->num_rows();
        }
        else {
          $count = 0;
        }
        // $count = 5;
        // // Set up pagination
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
        //$this->{$type.'_m'}->set_published();
        if(!empty($slug_array)) {

          $this->db->where_in('slug', $slug_array);
          $this->db->from($type.'s');
          $this->db->where('status',2);
          $this->db->limit($perpage, $offset);
          $this->data[$type.'s'] = $this->db->get()->result();
        }
        else {
          $this->data[$type.'s'] = NULL;
        }
        $this->data['all_tags'] = $this->tags_m->get_all();
        $type == 'article' ?   $this->data['recent_news'] = $this->{$type.'_m'}->get_recent() :   $this->data['recent_'.$type.'s'] = $this->{$type.'_m'}->get_recent();

        // Load the view
      	$this->data['subview'] = $type == 'article' ? 'news_archive' : $type.'_archive';
        $this->data['tag'] = $tag;
      	$this->load->view('_main_layout_client', $this->data);
      }
      public function template($pagename) {
        $this->load->view('ui-templates/'.$pagename);
      }
}

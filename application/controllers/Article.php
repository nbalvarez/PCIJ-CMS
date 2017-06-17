<?php
class Article extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('author_article_m');
        $this->load->model('tagline_author_article_m');
        $this->load->model('tag_article_m');
        $this->load->model('file_article_m');
        $this->load->model('tags_m');
        $this->load->model('user_m');
        $this->load->model('tagline_m');
        $this->load->model('series_article_m');
        $this->load->model('series_m');
        $this->data['recent_news'] = $this->article_m->get_recent();
    }

    public function index($id, $slug) {
    	// Fetch the article
  		$this->article_m->set_published();
  		$this->data['article'] = $this->article_m->get($id);


    	// Return 404 if not found
    	count($this->data['article']) || show_404(uri_string());

    	// Redirect if slug was incorrect
    	$requested_slug = $this->uri->segment(3);
    	$set_slug = $this->data['article']->slug;

    	if ($requested_slug != $set_slug) {
    		redirect('article/' . $this->data['article']->id . '/' . $this->data['article']->slug, 'location', '301');
    	}
        $this->data['all_tags'] = $this->tags_m->get_all();
        $author_data = $this->author_article_m->get_all($set_slug);
        $tag_data = $this->tag_article_m->get_all($set_slug);
        $file_data = $this->file_article_m->get_all($set_slug);
        $tagline_author_data = $this->tagline_author_article_m->get_all($set_slug);
        $series_data = $this->series_article_m->get_all($set_slug);
        $this->data['series'] = [];
        if(!empty($series_data)){
            $series_data = $this->series_article_m->get_all_id($series_data[1]);
            $this->data['series'] = $this->article_m->get_series('slug',$series_data);
        }

        $this->data['authors'] = [];
        if (!empty($author_data)) {
          $this->data['authors'] = $this->user_m->get_where_in('id', $author_data);
        }


        $this->data['tagline_authors'] = [];
        if (!empty($tagline_author_data)) {
          $this->data['tagline_authors'] = $this->user_m->get_where_in('id', $tagline_author_data);

        }
        $this->data['tags'] = [];
        if (!empty($tag_data)) {
          $this->data['tags'] = $this->tags_m->get_where_in('id', $tag_data);

        }

        $this->data['files'] = $file_data;
        $tagline_id = $this->data['article']->tagline;
        $this->data['article']->tagline = $this->tagline_m->get($tagline_id)->text;
        $date = DateTime::createFromFormat('Y-m-d', $this->data['article']->pubdate);
        $this->data['date'] = $date->format('F Y');
      
    	// Load view
    	add_meta_title($this->data['article']->title);
    	$this->data['subview'] = 'article';
    	$this->load->view('_main_layout_client', $this->data);
    }

}

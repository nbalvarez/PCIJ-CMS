<?php
class Blog extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('author_blog_m');
        $this->load->model('tagline_author_blog_m');
        $this->load->model('tag_blog_m');
        $this->load->model('file_blog_m');
        $this->load->model('tags_m');
        $this->load->model('user_m');
        $this->load->model('tagline_m');
        $this->data['recent_blogs'] = $this->blog_m->get_recent();
    }

    public function index($id, $slug){
    	// Fetch the blog
		$this->blog_m->set_published();
		$this->data['blog'] = $this->blog_m->get($id);

    	// Return 404 if not found
    	count($this->data['blog']) || show_404(uri_string());

    	// Redirect if slug was incorrect
    	$requested_slug = $this->uri->segment(3);
    	$set_slug = $this->data['blog']->slug;

    	if ($requested_slug != $set_slug) {
    		redirect('blog/' . $this->data['blog']->id . '/' . $this->data['blog']->slug, 'location', '301');
    	}

        $author_data = $this->author_blog_m->get_all($set_slug);
        $tag_data = $this->tag_blog_m->get_all($set_slug);
        $file_data = $this->file_blog_m->get_all($set_slug);
        $tagline_author_data = $this->tagline_author_blog_m->get_all($set_slug);

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
        $tagline_id = $this->data['blog']->tagline;
        $this->data['blog']->tagline = $this->tagline_m->get($tagline_id)->text;
        $date = DateTime::createFromFormat('Y-m-d', $this->data['blog']->pubdate);
        $this->data['date'] = $date->format('F Y');
    	// Load view
    	add_meta_title($this->data['blog']->title);
    	$this->data['subview'] = 'blog';
    	$this->load->view('_main_layout_client', $this->data);
    }
}

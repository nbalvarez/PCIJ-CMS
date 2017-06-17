<?php

class File extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('file_m');
        $this->load->model('file_article_m');
        $this->load->model('file_blog_m');
    }

    public function index() {

    }

    public function get_file($id) {
    	// should be if file is an image -- add file->ext as column
    	$data = array();
    	$image = $this->file_m->get($id);
    	if (!empty($image) || $image != NULL) {			
			$data['id'] = $image->id;
			$data['image_name'] = $image->filename;
			$data['image_src'] = site_url('uploads') . '/' . $image->filename;
		} else {
			$data['message'] = "File does not exist";
		}
		header('Content-Type: application/json');
    	echo json_encode( $data );
    }

    
}

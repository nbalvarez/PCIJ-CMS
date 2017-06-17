<?php
class Article extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->library( array('acl','session'));

		$this->load->model('article_m');
		$this->load->model('user_m');
		$this->load->model('tagline_m');
		$this->load->model('tags_m');
		$this->load->model('role_m');
		$this->load->model('file_m');
		$this->load->model('subjects_m');
		$this->load->model('subject_article_m');
		$this->load->model('series_m');
		$this->load->model('tag_article_m');
		$this->load->model('author_article_m');
		$this->load->model('tagline_author_article_m');
		$this->load->model('file_article_m');
		$this->load->model('series_article_m');


	}

	public function index ($setting = "all")
	{

			// Fetch all articles
			$this->data['articles'] = $this->article_m->get();
			$this->data['is_editor'] = $this->acl->has_permission( 'admin_article', array('edit all'));

		// Load view
		$this->data['subview'] = 'admin/article/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function submissions ()
	{
		// Fetch all articles
		$this->data['articles'] = $this->article_m->get_by(array('status' => 1));
		$this->data['is_editor'] = $this->acl->has_permission( 'admin_article', array('edit all'));

		// Load view
		$this->data['subview'] = 'admin/article/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	public function published ()
	{
		// Fetch all articles
		$this->data['articles'] = $this->article_m->get_by(array('status' => 2));
		$this->data['is_editor'] = $this->acl->has_permission( 'admin_article', array('edit all'));

		// Load view
		$this->data['subview'] = 'admin/article/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit ($id = NULL)
	{
		// Fetch a article or set a new one
		$media_exist = array();
		if ($id) { //article exist
			$this->data['article'] = $this->article_m->get($id);
			$slug = $this->data['article']->slug;
			$this->data['selected_authors'] = $this->author_article_m->get_all($slug);
			$this->data['selected_tags'] = $this->tag_article_m->get_all($slug);
			$this->data['selected_subjects'] = $this->subject_article_m->get_all($slug);
			$this->data['selected_files'] = $this->file_article_m->get_all($slug);

			for($i=0; $i<count($this->data['selected_files']); $i++) {				
				$this->data['selected_files'][$i]['caption'] = html_entity_decode($this->data['selected_files'][$i]['caption']);
				$this->data['selected_files'][$i]['caption'] = strip_tags($this->data['selected_files'][$i]['caption']);
				$image_id = $this->data['selected_files'][$i]['file_id'];
				// should be if file is an image -- add file->ext as column
				if ($image_id) {
					$image = $this->file_m->get($image_id);
					$this->data['selected_files'][$i]['image_name'] = $image->filename;
					$this->data['selected_files'][$i]['image_src'] = site_url('uploads') . '/' . $image->filename;
				} else {
					$this->data['selected_files'][$i]['image_name'] = NULL;
					$this->data['selected_files'][$i]['image_src'] = NULL;
				}
				array_push($media_exist,$this->data['selected_files'][$i]['id']);
			}

			$this->data['selected_tagline_authors'] = $this->tagline_author_article_m->get_all($slug);
			$this->data['selected_series'] = $this->series_article_m->get_all($slug);
			//prepare body text
			// $this->data['article']->body = html_entity_decode($this->data['article']->body);
			// $this->data['article']->body = strip_tags($this->data['article']->body);
			$this->data['article']->summary = html_entity_decode($this->data['article']->summary);
			$this->data['article']->summary = strip_tags($this->data['article']->summary);
			$this->data['article']->general_notes = html_entity_decode($this->data['article']->general_notes);
			$this->data['article']->general_notes = strip_tags($this->data['article']->general_notes);
			count($this->data['article']) || $this->data['errors'][] = 'article could not be found';
			$this->data['is_editor'] = $this->acl->has_permission( 'admin_article', array('edit all'));
			// $title = $this->role_m->get($this->session->userdata('uid'))->title;
			$title = $this->session->userdata('access');
			$this->data['is_data_staff'] = false;
			if ($title == "data_staff" || $title == "admin") {
				$this->data['is_data_staff'] = true;
			}
			

			if ($this->acl->has_permission( 'admin_article', array('edit own'), $this->data['selected_authors']) || ($this->acl->has_permission( 'admin_article', array('edit all'))))
			{
				//is the author, editor or admin -- can edit

				$this->set_form($media_exist,$id);
			}
			else //not the author, editor or admin -- view only
			{
				$tagline_id = $this->data['article']->tagline;
				if ($tagline_id) {
					$this->data['article']->tagline = $this->tagline_m->get($tagline_id)->text;
				}    		
	    		$subjects_id = $this->data['article']->subjects;
	    		if ($subjects_id) {
	    			$this->data['article']->subjects = $this->subjects_m->get($subjects_id)->text;
	    		}    		
				$this->data['subview'] = 'admin/article/view';
				$this->load->view('admin/_layout_main', $this->data);
			}
		}
		else { //create new
			//initialize array for multiple selections
			$this->data['selected_authors'] = array();
			$this->data['selected_tags'] =  array();
			$this->data['selected_subjects'] = array();
			$this->data['selected_files'] =  array();
			$this->data['selected_tagline_authors'] =  array();
			$this->data['selected_series'] =  array();
			$this->data['is_editor'] = $this->acl->has_permission( 'admin_article', array('edit all'));
			// $title = $this->role_m->get($this->session->userdata('uid'))->title;
			$title = $this->session->userdata('access');
			$this->data['is_data_staff'] = false;
			if ($title == "data_staff" || $title == "admin") {
				$this->data['is_data_staff'] = true;
			}
			
			$this->data['article'] = $this->article_m->get_new();
			$this->set_form($media_exist);

		}



	}

	public function set_form($media_exist = NULL, $id = NULL){
		$this->data['authors'] = $this->user_m->get_all(); //for dropdown
		$this->data['tagline'] = $this->tagline_m->get_all();
		$this->data['tags'] = $this->tags_m->get_all();
		$this->data['subjects'] = $this->subjects_m->get_all();
		$this->data['files'] = $this->file_m->get_all();
		$this->data['series'] = $this->series_m->get_all();


		// Set up the form
		$rules = $this->article_m->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->article_m->array_from_post(array(
				'title',
				'slug',
				'body',
				'summary',
				'pubdate',
				'created',
				'pre_head',
				'post_head',
				'tagline',
				'series_indicator',
				'ireport_indicator',
				'index_num',
				'general_notes',
				'status'
			));

			// $data['body'] = html_entity_decode($data['body']);
			// $data['body'] = strip_tags($data['body']);

			$data['modified'] = date('Y-m-d');

			// if (strtotime($data['pubdate']) === strtotime('0000-00-00')) {
			// 	$data['pubdate'] = date('Y-m-d');
			// }
			if ($data['status'] == 2 && $data['pubdate'] == '') {
				$data['pubdate'] == date('Y-m-d');
			}
			$this->article_m->save($data, $id);

			$tag_data = $this->tag_article_m->array_from_post(array('tags','slug'));
			$subject_data = $this->subject_article_m->array_from_post(array('subjects','slug'));
			$new_tag_data = $this->tags_m->array_from_post(array('newtags'));
			$new_subject_data = $this->subjects_m->array_from_post(array('newsubjects'));
			$author_data = $this->author_article_m->array_from_post(array('authors','slug'));
			$tagline_author_data = $this->tagline_author_article_m->array_from_post(array('tagline_authors','slug'));
			// $file_data = $this->file_article_m->array_from_post(array('file_id','file_title','file_caption','slug'));
			$series_data = $this->series_article_m->array_from_post(array('series','slug'));
			$new_series_data = $this->series_m->array_from_post(array('newseries'));


				// remove leftover value of dropdown
			if (count($author_data['authors']) > 0)
			{
			 	array_pop($author_data['authors']);
			}
			if (count($tag_data['tags']) > 0)
			{
			 	array_pop($tag_data['tags']);
			}
			if (count($subject_data['subjects']) > 0)
			{
			 	array_pop($subject_data['subjects']);
			}
			if (count($tagline_author_data['tagline_authors']) > 0)
			{
			 	array_pop($tagline_author_data['tagline_authors']);
			}
			// if (count($file_data['files']) > 0)
			// {
			//  	array_pop($file_data['files']);
			// }
			if (count($series_data['series']) > 0)
			{
			 	array_pop($series_data['series']);
			}
			//implement add vs save functionalities.

			$this->author_article_m->save_multiple($author_data['authors'], $author_data['slug']);

			//saves new tags to tags_DB and returns the ids
			$newtags_id = $this->tags_m->save_multiple($new_tag_data['newtags']);

			//merges the new tags and the existing tags, saves to tag_article_DB
			$this->tag_article_m->save_multiple(array_merge((array)$tag_data['tags'], $newtags_id), $tag_data['slug']);
			//saves new tags to tags_DB and returns the ids
			$newsubjects_id = $this->subjects_m->save_multiple($new_subject_data['newsubjects']);

			//merges the new tags and the existing tags, saves to tag_article_DB
			$this->subject_article_m->save_multiple(array_merge((array)$subject_data['subjects'], $newsubjects_id), $subject_data['slug']);

			//saves to tagline_author_article_DB
			$this->tagline_author_article_m->save_multiple($tagline_author_data['tagline_authors'], $tagline_author_data['slug']);

			//saves new series to series_DB and returns the ids
			$newseries_id = $this->series_m->save_multiple($new_series_data['newseries'], $this->session->userdata('uid'));

			//merges the new series and the existing series, saves to series_article_DB
			$this->series_article_m->save_multiple(array_merge((array)$series_data['series'], $newseries_id), $series_data['slug']);

			//uploads new files
			$newfiles_id = $this->do_upload();
			//saves to file_article_DB
			$this->file_article_m->save_multiple($newfiles_id, $series_data['slug']);
			$media_remain = $this->save_files($series_data['slug']);
			$this->delete_files($media_exist, $media_remain);
			redirect('admin/article');
		}
		// Load the view
		$this->data['subview'] = 'admin/article/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function save_files($slug = NULL)
	{
		$media_remain = array();
		$media = $this->file_article_m->array_from_post(array(
			'file_article_id',
			'file_id',
			'file_title',
			'file_caption',
		));
		// $error = array('error' => var_dump($element));
		// $this->load->view('error', $error);
		$i = 0;
		for($i=0; $i < count($media['file_id']); $i++) {
			if ($media['file_article_id'][$i] != "") {
				$data_media = array(
					'id' => $media['file_article_id'][$i],
					'file_id' => $media['file_id'][$i],
					'article_slug' => $slug,
					'title' => $media['file_title'][$i],
					'caption' => $media['file_caption'][$i],
					'updated_at' => date('Y-m-d H:i:s'),
				);
				array_push($media_remain,$media['file_article_id'][$i]);
			} else {
				$data_media = array(
					'file_id' => $media['file_id'][$i],
					'article_slug' => $slug,
					'title' => $media['file_title'][$i],
					'caption' => $media['file_caption'][$i],
					'created_at' => date('Y-m-d H:i:s'),
				);
			}
			if ($media['file_article_id'][$i] != "") {

				$this->file_article_m->save($data_media, $media['file_article_id'][$i]);
				// $error = array('error' => var_dump($element['element_id']));
				// $this->load->view('error', $error);
			} else {
				// $error = array('error' => var_dump($data_element));
				// $this->load->view('error', $error);
				$this->file_article_m->save($data_media, NULL);
			}

		}
		return $media_remain;

	}
	public function delete_files($elements_exist, $elements_remain)
	{
		$elements_to_delete = array_diff($elements_exist,$elements_remain);
		// $error = array('error' => var_dump(count($elements_to_delete)));
		// $this->load->view('error', $error);

		foreach($elements_to_delete as $element) {
			if ($element != NULL) {
				$this->file_article_m->delete_item($element);
			}
			// $error = array('error' => var_dump($elements_to_delete[$i]));
			// $this->load->view('error', $error);
		}


	}

	public function do_upload()
	{
		// $image_path = APPPATH . 'uploads';
		$image_path = './uploads/';
		$config['upload_path']   = $image_path;
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size']      = 1000;
		$config['max_width']     = 2000;
		$config['max_height']    = 2000;
		$this->load->library('upload', $config);

		$files = $_FILES;
		$accepted_files = array();
	    $cpt = count($_FILES['new_files']['name']);
	    for($i=0; $i<$cpt; $i++)
	    {
	        $_FILES['new_files']['name']= $files['new_files']['name'][$i];
	        $_FILES['new_files']['type']= $files['new_files']['type'][$i];
	        $_FILES['new_files']['tmp_name']= $files['new_files']['tmp_name'][$i];
	        $_FILES['new_files']['error']= $files['new_files']['error'][$i];
	        $_FILES['new_files']['size']= $files['new_files']['size'][$i];

	        $this->upload->initialize($config);

	        if ( ! $this->upload->do_upload('new_files')) {
						 $error = array('error' => $this->upload->display_errors());
						 
					}

					else {
						 $data = $this->upload->data();
						 $set_data = array('filename' => $data['file_name']);
						 array_push($accepted_files, $this->file_m->save($set_data));

					}
	    }
			return $accepted_files;

  }

	public function delete ($id)
	{
		$this->article_m->delete($id);
		redirect('admin/article');
	}

}

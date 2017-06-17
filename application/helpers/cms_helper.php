<?php

function add_meta_title ($string)
{
	$CI =& get_instance();
	$CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title'];
}

function btn_edit ($uri)
{
	return anchor($uri, '<i class="icon-edit"></i>');
}

function btn_delete ($uri)
{
	return anchor($uri, '<i class="icon-remove"></i>', array(
		'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');"
	));
}
function get_tag_link($tag, $type){
	return site_url($type . '/' . 'tag' . '/' . e($tag));
}
function get_link($article, $type){
	return site_url($type . '/' . intval($article->id) . '/' . e($article->slug));
}
function get_links($articles, $type){
	$string = '<ul>';
	foreach ($articles as $article) {
		$url = get_link($article, $type);
		$string .= '<li>';
		$string .= '<h3>' . anchor($url, e($article->title)) .  ' ›</h3>';
		$string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
		$string .= '</li>';
	}
	$string .= '</ul>';
	return $string;
}

function get_excerpt($article, $type, $numwords = 50){
	$string = '';
	$url = get_link($article, $type);
	$string .= '<h2>' . anchor($url, e($article->title)) .  '</h2>';
	$string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
	$string .= '<p>' . e(limit_to_numwords(strip_tags($article->body), $numwords)) . '</p>';
	$string .= '<p>' . anchor($url, 'Read more ›', array('title' => e($article->title))) . '</p>';
	return $string;
}

function limit_to_numwords($string, $numwords){
	$excerpt = explode(' ', $string, $numwords + 1);
	if (count($excerpt) >= $numwords) {
		array_pop($excerpt);
	}
	$excerpt = implode(' ', $excerpt);
	return $excerpt;
}

function e($string){
	return htmlentities($string);
}

function get_menu ($array, $child = FALSE)
{
	$CI =& get_instance();
	$str = '';

	if (count($array)) {
		$str .= $child == FALSE ? '<ul class="nav">' . PHP_EOL : '<ul class="dropdown-menu">' . PHP_EOL;

		foreach ($array as $item) {

			$active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
			if (isset($item['children']) && count($item['children'])) {
				$str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
				$str .= '<a  class="dropdown-toggle" data-toggle="dropdown" href="' . site_url(e($item['slug'])) . '">' . e($item['title']);
				$str .= '<b class="caret"></b></a>' . PHP_EOL;
				$str .= get_menu($item['children'], TRUE);
			}
			else {
				$str .= $active ? '<li class="active">' : '<li>';
				$str .= '<a href="' . site_url($item['slug']) . '">' . e($item['title']) . '</a>';
			}
			$str .= '</li>' . PHP_EOL;
		}

		$str .= '</ul>' . PHP_EOL;
	}

	return $str;
}

/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}

function get_user_name ($id)
{
	if(empty($id)) {
		return '';
	}
	$CI = get_instance();
	$CI->load->model('user_m');
	$user = $CI->user_m->get($id);
	return $user->user_name;
}

function get_fullname ($id)
{
	if(empty($id)) {
		return '';
	}
	$CI = get_instance();
	$CI->load->model('user_m');
	$user = $CI->user_m->get($id);
	$name = $user->first_name . ' ' . $user->last_name;
	return $name;
}

function get_tag_name ($id)
{
	if(empty($id)) {
		return '';
	}
	$CI = get_instance();
	$CI->load->model('tags_m');
	$tag = $CI->tags_m->get($id);
	return $tag->text;
}
function get_subject_name ($id)
{
	if(empty($id)) {
		return '';
	}
	$CI = get_instance();
	$CI->load->model('subjects_m');
	$subject = $CI->subjects_m->get($id);
	return $subject->text;
}
function get_series_name ($id)
{
	if(empty($id)) {
		return '';
	}
	$CI = get_instance();
	$CI->load->model('series_m');
	$series = $CI->series_m->get($id);
	return $series->title;
}

function get_file_name ($id)
{
	if(empty($id)) {
		return '';
	}
	$CI = get_instance();
	$CI->load->model('file_m');
	$file = $CI->file_m->get($id);
	return $file->filename;
}

function get_role ($id, $column)
{
	if(empty($id)) {
		return '';
	}
	$CI = get_instance();
	$CI->load->model('role_m');
	$file = $CI->role_m->get($id);
	return $file->{$column};
}

 function get_role_id ($input, $column)
 {
	if(empty($input)) {
		return '';
	}
	$where = array($column => $input);
	$CI = get_instance();
	$CI->load->model('role_m');
	$file = $CI->role_m->get_by($where);
	//var_dump($file);
 	return $file[0]->id;
 }

function get_module ($id, $column)
{
	if(empty($id)) {
		return '';
	}
	$CI = get_instance();
	$CI->load->model('module_m');
	$file = $CI->module_m->get($id);
	return $file->{$column};
}

function get_action ($id, $column)
{
	if(empty($id)) {
		return '';
	}
	$CI = get_instance();
	$CI->load->model('action_m');
	$file = $CI->action_m->get($id);
	return $file->{$column};
}

function add_new_tag ($text)
{
	$CI = get_instance();
	$CI->load->model('tags_m');
	$data = array('text' => $tag);
	$tag = $CI->tags_m->save_from_view($data);
	return $tag;
}

function get_role_array ($module_id,$action_id)
{
	$where = array('module_id' => $module_id, 'action_id' => $action_id);
	$role_array = array();
	$CI = get_instance();
	$CI->load->model('permission_m');

	$files = $CI->permission_m->where($where);
	foreach ($files as $file)
	{
		array_push($role_array, get_role($file->role_id,'title'));

	}

	return $role_array;
}
function get_action_array ($module_id)
{
	$action_array = array();
	$CI = get_instance();
	$CI->load->model('action_m');
	$files = $CI->action_m->get();

	foreach ($files as $file)
	{
		$action_array[$file->text] = get_role_array ($module_id, $file->id);

	}

	return $action_array;
}

function get_module_array ()
{
	$module_array = array();
	$CI = get_instance();
	$CI->load->model('module_m');
	$files = $CI->module_m->get();

	foreach ($files as $file)
	{
		$module_array['admin_'.$file->name] = get_action_array($file->id);

	}

	return $module_array;
}
function access_helper ()
{
	return get_module_array();
}

function get_all_roles ()
{
	$CI = get_instance();
	$CI->load->model('role_m');
	$files = $CI->role_m->get();
	$role_array = array();

	foreach ($files as $file)
	{
		array_push($role_array, $file->title);
	}

	return $role_array;
}
function get_authors($slug,$type = 'article'){
	$CI = get_instance();
	if ($type == 'blog') {
		$CI->load->model('author_blog_m');
		$author_data = $CI->author_blog_m->get_all($slug);
	} else {
		$CI->load->model('author_article_m');
		$author_data = $CI->author_article_m->get_all($slug);
	}

	$CI2 = get_instance();
	$CI2->load->model('user_m');
	$authors = [];
	if (!empty($author_data)) {
		$authors = $CI2->user_m->get_where_in('id', $author_data);
	}
	$str = '';
	$i = 0;
	foreach($authors as $author){
		$str .= e($author["first_name"]);
		$str .= ' ' . e($author["middle_name"]);
		$str .= ' ' . e($author["last_name"]);

		if(++$i !== count($authors)) {
				$str .= ', ';
		}
	}
	return $str;
}

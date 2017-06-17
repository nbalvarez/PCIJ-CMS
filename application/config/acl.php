<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file
 *
 * Configuration for ACL permissions
 *
 */
 // $this->load->model('role_m');
 // $this->load->model('action_m');
 // $this->load->model('module_m');
 // $this->load->model('permission_m');
/**
 * Each controller or action can have its own permission array
 *
 * I've created some simple sample permissions based on the Drupal scheme
 *
 * Each controller or action can have add, edit own, edit all,
 * delete own and delete all - then add roles against the permissions
 */
$config['permission'] = access_helper();
// array(
// 	'admin_article' => array(
// 		'add' => array('writer', 'editor', 'admin'),
// 		'edit own' => array('writer', 'editor', 'admin'),
// 		'edit all' => array('editor', 'admin'),
// 		'delete own' => array('writer', 'editor', 'admin'),
// 		'delete all' => array('editor', 'admin'),
// 	),
// 	'admin_blog' => array(
// 		'add' => array('writer', 'editor', 'admin'),
// 		'edit own' => array('writer', 'editor', 'admin'),
// 		'edit all' => array('editor', 'admin'),
// 		'delete own' => array('writer', 'editor', 'admin'),
// 		'delete all' => array('editor', 'admin'),
// 	),
	// 'umpires' => array(
	// 	'add' => array('admin'),
	// 	'edit own' => array('umpire', 'admin'),
	// 	'edit all' => array('admin'),
	// 	'delete own' => array('umpire', 'admin'),
	// 	'delete all' => array('admin'),
	// ),
	// 'cricket' => array(
	// 	'add' => array('umpire', 'admin'),
	// 	'edit own' => array(), // not applicable
	// 	'edit all' => array('umpire', 'admin'),
	// 	'delete own' => array(), // not applicable
	// 	'delete all' => array('umpire', 'admin'),
	// ),

//var_dump(access_helper());
/**
 * You can have as many roles as you like, each user or object can have multiple roles.
 */
$config['roles'] = get_all_roles();
// $config['roles'] = array('staff', 'training', 'writer', 'editor', 'admin');
/* End of applications/config/acl.php */

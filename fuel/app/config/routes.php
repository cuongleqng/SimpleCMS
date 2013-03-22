<?php
return array(
	'_root_' 					 	=> 'welcome/index',  // The default route
	'_404_'   						=> 'welcome/404',    // The main 404 route
	'admin/media/:pagenumber' 		=> '/admin/media/',
	'admin'							=> 'admin',
	'admin/(:any)'					=> 'admin/$1',
	'categories'					=> 'categories',
	'category'						=> 'categories',
	'category/(:page)'	 			=> 'category',
	'contact'						=> 'contact',
	'article'						=> 'article',
	'author'						=> 'author',
	':page'							=> 'blog',
	
	
	/**
	 * This is an example of a BASIC named route (used in reverse routing).
	 * The translated route MUST come first, and the 'name' element must come
	 * after it.
	 */
	// 'foo/bar' => array('welcome/foo', 'name' => 'foo'),
	
	
	/// NOTE: The above works like url => 'controller/function'
);
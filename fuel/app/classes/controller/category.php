<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_Category extends Controller_Template {
	
		public $template = 'template_frontend';


    public function action_index()
    {
		$data = array();
		
 		$categories = Model_Category::find('all');
        	foreach ($categories as $c)
	    	{
	        	$cats[] = $c->catName;
	    	}
	    $categories = $cats;
	    
	    
        View::set_global('categories', $categories);
        
        $catURISegment = Uri::segment(2);
        
		$data['articles'] = DB::select('*')->from('articles')->where('articleCat', '=', $catURISegment)->execute()->as_array();
		
		
		$data['category'] = DB::select('*')->from('categories')->where('catID', '=', $catURISegment)->execute()->as_array();
		
			
		



		
		$articles = DB::select('*')->from('articles')->where('articleCat', '=', $catURISegment)->execute()->as_array();
		
		$pconf = array(
		    'pagination_url' => 'http://localhost:8888/asl1105/jbuff/cms/category/'. ($this->param('page') + 0),
		    'total_items' => count($articles),
		    'per_page' => 4,
		    'uri_segment' => 3,
		);
		
		//Pagination::set_config($paginationConfig); 
		Config::set('pagination', $pconf);
		
		$data['articles'] = DB::select('*')->from('articles')
												->where('articleCat', '=', $catURISegment)
												->order_by('startDate', 'desc')
                                                ->limit(Pagination::$per_page)
                                                ->offset(Pagination::$offset)
                                                ->execute()
                                                ->as_array();

		        
       	if($this->param('page') == 0){
       		$data['pageNum'] = 1;
       	}
       	else {
       		$data['pageNum'] = $this->param('page');
       	}
       	$data['totalPages'] = Pagination::total_pages();
		
   
    	
    	
     	$this->template->js = "$('#categories_page').addClass('active');";
        $this->template->title = 'Full Sail Times';
        $this->template->content = View::factory('site/category', $data);
    }
    
    public function action_404()
	{
		$messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
		$data['title'] = $messages[array_rand($messages)];

		// Set a HTTP 404 output header
		$this->response->status = 404;
		$this->template->content = View::factory('site/404', $data);
	}
}	

?>
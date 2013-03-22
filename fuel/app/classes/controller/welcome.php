<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_Welcome extends Controller_Template {
	
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
/* 		$data['articles'] = DB::select('*')->from('articles')->execute()->as_array();  */
		
		
		
		
		$articles = DB::select('*')->from('articles')->execute()->as_array();
		
		$paginationConfig = array(
		    'pagination_url' => 'http://localhost:8888/asl1105/jbuff/cms',
		    'total_items' => count($articles),
		    'per_page' => 4,
		    'uri_segment' => 1,
		);
		
		//Pagination::set_config($paginationConfig); NOTE: File bug report for this method.
		Config::set('pagination', $paginationConfig);
      
		$data['featArticle'] = DB::select('*')->from('articles') 
       											->where('featured', '=', '2')
       											->limit(1)
       											->order_by('startDate', 'desc')
       											->execute()
                                                ->as_array();  
                                                
		$data['articles'] = DB::select('*')->from('articles')
     											->where('articleID', '<>',  $data['featArticle'][0]['articleID'])
                                                ->limit(Pagination::$per_page)
                                                ->offset(Pagination::$offset)
                                                ->order_by('startDate', 'desc')
                                                ->execute()
                                                ->as_array();
     
		$data['featImg'] = DB::select('images.title', 'images.alt', 'images.imagePath')->from('articles')->join('images')
       											->on('images.articleID', '=', 'articles.articleID')
       											->where('articles.featured', '=', 2) 
       											->limit(1)
       											->order_by('images.imageID', 'desc')
       											->execute()
                                                ->as_array();                                  

		        
       	if($this->param('page') == 0){
       		$data['pageNum'] = 1;
       	}
       	else {
       		$data['pageNum'] = $this->param('page');
       	}
       	$data['totalPages'] = Pagination::total_pages();
       	
       	
		
		
		       
     	$this->template->js = "$('#home_page').addClass('active');";
        $this->template->title = 'Full Sail Times';
        $this->template->content = View::factory('site/new', $data);
        
    }
    
    public function action_404()
	{
		$messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
		$data['title'] = $messages[array_rand($messages)];

		// Set a HTTP 404 output header
		$this->template->title = "404 - Page Not Found";
		$this->response->status = 404;
		$this->template->content = View::factory('site/404', $data);
	}
}	

?>
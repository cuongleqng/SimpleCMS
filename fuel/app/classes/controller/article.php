<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_Article extends Controller_Template {
	
		public $template = 'template_frontend';


    public function action_index()
    {
  		
  		$categories = Model_Category::find('all');
        foreach ($categories as $c)
	    {
	        $cats[] = $c->catName;
	    }
	    $categories = $cats;
        View::set_global('categories', $categories);
   
    	
    	
        $data = array();
        $data['article'] = DB::select('*')->from('articles')->where('articleID', '=', Input::get('id'))->execute()->as_array();
       	$authorData = DB::select('*')->from('authors')->where('authorID', '=', $data['article'][0]['authorID'])->execute()->as_array();
       	$author = $authorData[0]['fname'] . " " . $authorData[0]['lname'];
       	$authorID = $authorData[0]['authorID'];
       	$bio = $authorData[0]['bio'];
        $articleID =  $data['article'][0]['articleID'];
        View::set_global('authorName', $author);
        View::set_global('authorID', $authorID);
        View::set_global('bio', $this->truncateTextbyWords($bio, 35));
        
       
       
        $postImageArray =  DB::select('imagePath')->from('images')->where('articleID', '=',  $articleID)->order_by('imageID', 'desc')->limit(1)->order_by('imagePath', 'desc')->execute()->as_array();
      	$data['imgs'] = $postImageArray;
      	if($postImageArray){
      		$data['postImage'] = $postImageArray[0]['imagePath'];
		}
		else {
			$data['postImage'] = null;
		}
		
		$articleCat =  DB::select('catName', 'catID')->from('categories')->where('catID', '=',  $data['article'][0]['articleCat'])->limit(1)->order_by('catName', 'desc')->execute()->as_array();
		if($articleCat){
			$data['postCategory'] = $articleCat[0];
		}
		else {
			$data['postCategory'] = null;
		}
		
		
		
     	$this->template->js = "$('#blog_page').addClass('active');";
        $this->template->title = html_entity_decode(stripslashes($data['article'][0]['articleTitle']. ' - ' .'Full Sail Times'));
        $this->template->content = View::factory('site/article', $data);
    }
    
    private function truncateTextbyWords($phrase, $max_words)
	{
	   $phrase_array = explode(' ',$phrase);
	   if(count($phrase_array) > $max_words && $max_words > 0)
	   $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...'; 
	   return $phrase;
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
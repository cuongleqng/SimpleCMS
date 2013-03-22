<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_Categories extends Controller_Template {
	
		public $template = 'template_frontend';


    public function action_index()
    {
        $data = array();	
        
		$data['categories'] = DB::select('*')->from('categories')->execute()->as_array();
			foreach($data['categories'] as $key => $category)
			{
				$data['articles'][] = DB::select('articleTitle', 'articleID')->from('articles')->where('articleCat', '=', ($key +1))->limit(5)->execute()->as_array(); 
			}
			
        
     	$this->template->js = "$('#categories_page').addClass('active');";
        $this->template->title = 'Full Sail Times';
        $this->template->content = View::factory('site/categories', $data);
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
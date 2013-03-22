<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_Contact extends Controller_Template {
	
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
     	
     	$this->template->js = "$('#contact_page').addClass('active');";
        $this->template->title = 'Full Sail Times';
        $this->template->content = View::factory('site/contact', $data);
        
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
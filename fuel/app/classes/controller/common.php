<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_Common extends Controller_Template {
	
	public $template = 'template_frontend';


    public function before()
    {
       $data['common'] = "This is common.";
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
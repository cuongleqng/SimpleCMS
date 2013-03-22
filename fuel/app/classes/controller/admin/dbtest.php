<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_admin_dbtest extends Controller_Template {
	
	
	public $template = 'template_backend';

    public function action_index()
    {
        $data = array();
        $data['articles'] = Model_Article::find('all');
		$this->template->content = View::factory('articles/view', $data);
    }
    
    public function action_view($id = null)
	{
		$data['articles'] = Model_Article::find($id);
		$this->template->title = "Monkey";
		$this->template->content = View::factory('articles/view', $data);
	}
    
    public function action_404()
	{
		$messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
		$data['title'] = $messages[array_rand($messages)];

		// Set a HTTP 404 output header
		$this->response->status = 404;
		$this->response->body = View::factory('welcome/404', $data);
	}
}	

?>
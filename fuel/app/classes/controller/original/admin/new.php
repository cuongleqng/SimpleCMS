<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_Admin_New extends Controller_Template {

    public function action_index()
    {
        $data = array();	
        $data['adminName'] = 'Jeremy Buff';	
        $this->template->title = 'Full Sail Times';
        $this->template->content = View::factory('admin/new', $data);
    }
    
    public function action_404()
	{
		$messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
		$data['title'] = $messages[array_rand($messages)];

		// Set a HTTP 404 output header
		$this->response->status = 404;
		$this->response->body = View::factory('admin/404', $data);
	}
}	

?>
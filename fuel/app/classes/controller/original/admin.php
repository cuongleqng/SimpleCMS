<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_Admin extends Controller_Template {

    public function action_index()
    {
    	$data = array();
        $data['adminName'] = 'Jeremy Buff';	
        $this->template->title = 'Example Page';
        $this->template->content = View::factory('admin/index', $data);
    }
}	

?>
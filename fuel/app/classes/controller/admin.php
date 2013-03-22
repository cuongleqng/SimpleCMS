<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_Admin extends Controller_Template {
	
	public $template = 'template_login';
	
	

    public function action_index()
    {
        $data = array();
        $data['adminUserName'] = "Jeremy Buff";	
        $data['adminRole'] = "Lead Developer";
        $data['user'] = Auth::instance()->get_user_array();
        $this->template->title = 'Full Sail Times';
/*         $this->template->content = View::factory('admin/login', $data); */
        
	    if(Auth::check())
        {
        	Response::redirect('../../admin/controlpanel');
        }
        
        if($_POST)
	    {
	
	        $val = Validation::factory('users');
	        $val->add_field('username', 'Your username', 'required|min_length[3]|max_length[20]');
	        $val->add_field('password', 'Your password', 'required|min_length[3]|max_length[20]');
	        if($val->run())
	        {
	            $auth = Auth::instance();
	
	        	// check the credentials. This assumes that you have the previous table created
		        if($auth->login($_POST['username'],$_POST['password'])) //  if($auth->login(Input::post('username'), Input::post('password')))
		        {
		            // credentials ok, go right in
		            Response::redirect('../../admin/controlpanel');
		        }
		        else
		        {
		            // Oops, no soup for you. try to login again.
		            // Set some values to repopulate the username field and give some error text back to the view
		
		            $data['username'] = $_POST['username'];
	                $data['errors'] = 'Wrong username/password. Try again';
		        }
	    	}
	    	else
	        {
	            if($_POST)
	            {
	                $data['username'] = $val->validated('username');
	                $data['errors'] = 'Validation Failed; Please reenter credentials.';
	            }
	            else
	            {
	                $data['errors'] = false;
	            }
	        }
	    }
	        $this->template->errors = @$data['errors'];
	        $this->template->content = View::factory('admin/login', $data);

       echo View::factory('admin/login',$data);
   	 }


	public function action_logout()
	{
		$data = array();
		
		
		try {
			$logoutSuccess = Auth::instance()->logout();
			$e = "shit";
			
		}
		catch(Exception $e)
		{
			$data['error'] = "We're sorry, we could not log you out due to an error. To fully logout, we suggest you clear your cookies and cache.";
		}
		
		echo View::factory('admin/login', $data);
	}
	
	public function action_recoverpassword() {
		$data = array();
		
		// 
		//$username = null
		
		//Auth::instance()->forgotten_password();

		$data['error'] = "We're sorry, but at this time there is no way to recover a lost password. Please email hello@avaluxdev.com.";
		echo View::factory('admin/login', $data);
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
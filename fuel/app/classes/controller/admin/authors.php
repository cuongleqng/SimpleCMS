<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_Admin_Authors extends Controller_Template {
	
	public $template = 'template_backend';

    public function action_index()
    {
  		
    
        $data = array();	
        $data['adminRole'] = "Lead Developer";
        $data['user'] = Auth::instance()->get_user_array();
        $data['userID'] = $data['user']['id'][1];
        $data['userGroup'] = $data['user']['usergroup'][0][1];
		$data['articles'] = DB::select()->where('authorID', '=', $data['userID'])->from('articles')->execute()->as_array();
		/*
//$data['authorName'] =  DB::select('fname', 'lname')->where('authorID', '=', $data['userID'])->from('authors')->execute()->as_array();
		//$data['authorName'] = $data['authorName'][0]['fname'] . " " . $data['authorName'][0]['lname'];
*/
		$data['authors'] = DB::select('authors.fname', 'authors.lname', 'authors.userID', 'authors.authorID','simpleauth.company', 'simpleauth.id', 'user_groups.groupName')->from('authors')->join('simpleauth','LEFT')->on('authors.userID', '=', 'simpleauth.id')->join('user_groups', 'LEFT')->on('simpleauth.group', '=', 'user_groups.groupID')->execute()->as_array();
		$data['usergroups'] = DB::select('groupName')->from('user_groups')->execute()->as_array();
		
		$userData = DB::select('authors.fname', 'authors.lname', 'authors.userID', 'simpleauth.id', 'simpleauth.group', 'user_groups.groupName', 'user_groups.groupNameArticle', 'images.imagePath')->from('authors')->join('simpleauth')->on('authors.userID', '=', 'simpleauth.id')->join('user_groups', 'LEFT')->on('simpleauth.group', '=', 'user_groups.groupID')->join('images', 'LEFT')->on('authors.userID', '=', 'images.authorID')->where('authors.userID', '=', $data['userID'])->and_where('images.imageType', '=', 1)->execute()->as_array();
        $data['userName'] = $userData[0]['fname'] . " " . $userData[0]['lname'];
		

		
/* 		$data['userRole'] =  DB::select('groupName')->where('groupID', '=', ----simple auth id----)->from('user_groups')->execute()->as_array(); */
		
		
		
		if(! Auth::check())
        {
        	Response::redirect('../../admin');
        }
        else {
        	if($data['userGroup'] > 2){
        		Response::redirect('../../admin');
        		$data['userRoleIsAdmin'] = false;
        	}
        	else {
        		$data['userRoleIsAdmin'] = true;
        	}
        }
        
		
		
        $this->template->title = 'Manage Authors';
        $this->template->content = View::factory('admin/authors', $data);
    }
    
    public function action_authors_controlpanel()
    {
    	Response::redirect('../../admin');
    }
    
    public function action_signup()
    {
    	if (! Auth::check())
        {
            Response::redirect('../../admin');
        }
        
        $data = array();
        $data['adminUserName'] = "Jeremy Buff";	
        $data['authorName'] = "Jeremy Buff";	
        $data['adminRole'] = "Lead Developer";
        $data['user'] = Auth::instance()->get_user_array();
        $data['userID'] = $data['user']['id'][1];
        $data['userGroup'] = $data['user']['usergroup'][0][1];
		$data['articles'] = DB::select()->where('authorID', '=', $data['userID'])->from('articles')->execute()->as_array();
		$data['authorName'] =  DB::select('fname', 'lname')->where('authorID', '=', $data['userID'])->from('authors')->execute()->as_array();
		$data['authorName'] = $data['authorName'][0]['fname'] . " " . $data['authorName'][0]['lname'];
		$data['authors'] = DB::select('authors.fname', 'authors.lname', 'authors.userID', 'simpleauth.company', 'simpleauth.id', 'user_groups.groupName')->from('authors')->join('simpleauth','LEFT')->on('authors.userID', '=', 'simpleauth.id')->join('user_groups', 'LEFT')->on('simpleauth.group', '=', 'user_groups.groupID')->execute()->as_array();
		$data['usergroups'] = DB::select('groupName', 'groupNameArticle')->from('user_groups')->execute()->as_array();
		
		$userData = DB::select('authors.fname', 'authors.lname', 'authors.userID', 'simpleauth.id', 'simpleauth.group', 'user_groups.groupName', 'user_groups.groupNameArticle', 'images.imagePath')->from('authors')->join('simpleauth')->on('authors.userID', '=', 'simpleauth.id')->join('user_groups', 'LEFT')->on('simpleauth.group', '=', 'user_groups.groupID')->join('images', 'LEFT')->on('authors.userID', '=', 'images.authorID')->where('authors.userID', '=', $data['userID'])->and_where('images.imageType', '=', 1)->execute()->as_array();
        $data['userName'] = $userData[0]['fname'] . " " . $userData[0]['lname'];
		
		
		
		if (Input::method() == 'POST')
		{
			
			$username = Input::post('uname');
			$firstname = Input::post('fname');
			$lastname = Input::post('lname');
			$password = Input::post('pword');
			$group = Input::post('ugroup') + 1;;
			$email = Input::post('email');

			
			$data['fields'] = array('username' => $username, 'firstname' => $firstname, 'lastname' => $lastname, 'password' => $password, 'email' => $email);
			
			$val = Validation::factory('user_signup');
	        $val->add_field('uname', 'Username', 'required|min_length[3]|max_length[20]|valid_string[alpha, numeric]');
	        $val->add_field('fname', 'First Name', 'required|min_length[3]|max_length[20]|valid_string[alpha]');
	        $val->add_field('lname', 'Last Name', 'required|min_length[3]|max_length[20]|valid_string[alpha]');
	        $val->add_field('pword', 'Password', 'required|min_length[8]|max_length[20]');
	        $val->add_field('email', 'Email', 'required|valid_email|min_length[3]|max_length[20]');
	        if ( $val->run() )
	        {
				$username = $val->validated('uname');
				$firstname = $val->validated('fname');
				$lastname = $val->validated('lname');
				$password = Auth::instance()->hash_password($val->validated('pword'));
				$email = $val->validated('email');
				
				
			
			
			try {
					$createuser = Model_Users::factory(array(
						'username' => $username,
						'password' => $password,
						'group' => $group,
						'email' => $email,
				));
			
			    $createuser->save();
			    
			    $newuserid =  DB::select('username', 'email', 'id')->where('username', '=', $username)->and_where('email', '=', $email)->from('simpleauth')->execute()->as_array();
				
				$createdauthor = Model_Author::factory(array(
					'fname' => $firstname,
					'lname' => $lastname,
					'userID' => $newuserid[0]['id'],
				));
				$createdauthor->save();
				
				
				foreach($data['usergroups'] as $usergroup){
					$usergroupnames[] = $usergroup['groupName'];
					$usergroupnamearticles[] = $usergroup['groupNameArticle'];
				}
					$dbUserGroup = $group - 1;
					$data['success'] = "You have successfully added " . $firstname . " as " . $usergroupnamearticles[$dbUserGroup] . " " . $usergroupnames[$dbUserGroup];
					
					
				$createdavatar = Model_Images::factory(array(
					'title' => $firstname . " " . $lastname ."'s Avatar",
					'alt' => 'Avatar',
					'authorID' => $newuserid[0]['id'],
					'imageType' => 1, //Default image type id for AuthorPic/Avatar
					'imagePath' => 'frontend/avatars/default.jpg',
				));
				$createdavatar->save();
				  
			}
			catch (Exception $e)
			{
				$useradderror = 'There was an error. It seems that user "' . $username . '" already exists.';
				$data['usererror'] = $useradderror;
			}
			}
			
			else {
				/*
$notvalidated = "We're sorry, some of the information was not valid.";
				$data['usererror'] = $notvalidated;
*/				
				$val->set_message('required', 'The field ":label" is required.');
				$val->set_message('min_length', 'The field ":label" must be at least :param:1 characters.');
				$val->set_message('max_length', 'The field ":label" must be not more than :rule characters.');
				$val->set_message('valid_email', 'The field ":label" must be a valid email.');
				$val->set_message('valid_string', 'The field ":label" must be :param:1 characters only.');
				$data['errorsArray'] = $val->errors();
					/*
$val->errors('uname')->get_message('The field :label must be filled out before auth is attempted.') 

					$val->errors('fname')->get_message('The field :label must be filled out before auth is attempted.')
*/
				
				;
				$this->template->content = View::factory('admin/authors', $data);
			}
		}	
	
		
        $this->template->title = 'Manage Authors';
        $this->template->content = View::factory('admin/authors', $data);
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
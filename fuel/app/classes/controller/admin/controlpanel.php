<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 
	
	
        
	class Controller_Admin_ControlPanel extends Controller_Template {
	
	public $template = 'template_backend';

    public function action_index()
    {
        $data = array();
        $data['adminUserName'] = "Jeremy Buff";	
        $data['categories'] = Model_Category::find('all');
        $data['user'] = Auth::instance()->get_user_array();
        $data['userID'] = $data['user']['id'][1];
        $data['userGroup'] = $data['user']['usergroup'][0][1];
      //    $data['authorName'] =  DB::select('fname', 'lname')->where('authorID', '=', $data['userID'])->from('authors')->execute()->as_array();
	  //	$data['authorName'] = $data['authorName'][0]['fname'] . " " . $data['authorName'][0]['lname'];
		
        $userData = DB::select('authors.fname', 'authors.lname', 'authors.userID', 'simpleauth.id', 'simpleauth.group', 'user_groups.groupName', 'user_groups.groupNameArticle', 'images.imagePath', 'images.imageID')->from('authors')->join('simpleauth')->on('authors.userID', '=', 'simpleauth.id')->join('user_groups', 'LEFT')->on('simpleauth.group', '=', 'user_groups.groupID')->join('images', 'LEFT')->on('authors.userID', '=', 'images.authorID')->where('authors.userID', '=', $data['userID'])->and_where('images.imageType', '=', 1)->order_by('images.imageID', 'desc')->execute()->as_array();
        $data['userName'] = $userData[0]['fname'] . " " . $userData[0]['lname'];
        $data['userRole'] = $userData[0]['groupNameArticle'] . " " .$userData[0]['groupName'];
		$data['authorPic'] = $userData[0]['imagePath'];
		
        if($data['authorPic'] == null)
        {
        	$data['authorPic'] = "frontend/avatars/default.jpg";
        }
                
        //Authentication check
        if(! Auth::check())
        {
        	Response::redirect('../../admin');
        }
        else {
        	if($data['userGroup'] > 2){
        		$data['userRoleIsAdmin'] = false;
        	}
        	else {
        		$data['userRoleIsAdmin'] = true;
        	}
        }
        
        
        //Preping the variable $cats to display the category name instead of the cateogry id.
        foreach ($data['categories'] as $c)
	    {
	        $cats[] = $c->catName;
	    }
		$data['cats'] = $cats;
			
		// Converting the result of the select field to a value that the database will accept since database IDs are not base index zero.
		$cat = Input::post('cparent');
		$newcat = $cat;
		
		// Checking to see if the first option, "None", is selected. If so, then null is passed into the database; a.k.a. new category doesn't have a parent.
		if($cat == 0){
			$newcat = null;
		}
		
		
			
		if (Input::method() == 'POST')
		{
			$category = Model_Category::factory(array(
				'catName' => Input::post('cname'),
				'catParent' => $newcat,
			));
			
			$category->save();
		}
		
		$this->template->title = 'Control Panel';
		$this->template->content = View::factory('admin/index', $data);
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
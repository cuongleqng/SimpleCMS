<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 
	class Controller_Admin_Reports extends Controller_Template {
	
	public $template = 'template_backend';

    public function action_index()
    {
   		 $data['categories'] = Model_Category::find('all');
        $data['user'] = Auth::instance()->get_user_array();
        $data['userID'] = $data['user']['id'][1];
        $data['userGroup'] = $data['user']['usergroup'][0][1];
		$data['articles'] = DB::select()->where('authorID', '=', $data['userID'])->from('articles')->execute()->as_array();
        $userData = DB::select('authors.fname', 'authors.lname', 'authors.userID', 'authors.authorID', 'simpleauth.id', 'simpleauth.group', 'user_groups.groupName', 'user_groups.groupNameArticle', 'images.imagePath')->from('authors')->join('simpleauth')->on('authors.userID', '=', 'simpleauth.id')->join('user_groups', 'LEFT')->on('simpleauth.group', '=', 'user_groups.groupID')->join('images', 'LEFT')->on('authors.userID', '=', 'images.authorID')->where('authors.userID', '=', $data['userID'])->and_where('images.imageType', '=', 1)->execute()->as_array();
       $data['userName'] = $userData[0]['fname'] . " " . $userData[0]['lname'];
       $data['userName'] = $userData[0]['fname'] . " " . $userData[0]['lname'];
       
       
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

        $this->template->title = 'Reports';
        $this->template->content = View::factory('admin/reports', $data);
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
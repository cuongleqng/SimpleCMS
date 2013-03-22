<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_Admin_Settings extends Controller_Template {
	
	public $template = 'template_backend';

    public function action_index()
    {
        $data = array();
        $data['user'] = Auth::instance()->get_user_array();
        $data['userID'] = $data['user']['id'][1];
        $data['userGroup'] = $data['user']['usergroup'][0][1];
        $userData = DB::select('authors.fname', 'authors.lname', 'authors.userID', 'authors.bio', 'authors.authorPhone', 'authors.authorID', 'simpleauth.id', 'simpleauth.group', 'user_groups.groupName', 'user_groups.groupNameArticle', 'images.imagePath', 'images.imageType', 'images.imageID', 'simpleauth.password')->from('authors')->join('simpleauth')->on('authors.userID', '=', 'simpleauth.id')->join('user_groups', 'LEFT')->on('simpleauth.group', '=', 'user_groups.groupID')->join('images', 'LEFT')->on('authors.userID', '=', 'images.authorID')->where('authors.userID', '=', $data['userID'])->and_where('images.imageType', '=', 1)->order_by('images.imageID', 'desc')->execute()->as_array();
                        
        $data['userName'] = $userData[0]['fname'] . " " . $userData[0]['lname'];
        $data['userRole'] = $userData[0]['groupNameArticle'] . " " .$userData[0]['groupName'];
		$data['authorPic'] = $userData[0]['imagePath'];
		//for form editing profile fields
		$data['firstName'] = $userData[0]['fname'];
		$data['lastName'] = $userData[0]['lname'];
		$data['bio'] = $userData[0]['bio'];
		$data['temp'] = $userData;
		
		$fullPhone = $userData[0]['authorPhone'];
		$phoneChunks = explode("-", $fullPhone);
		
		if(count($phoneChunks) == 3)
		{
			$data['phone1'] = $phoneChunks[0];
			$data['phone2'] = $phoneChunks[1];
			$data['phone3'] = $phoneChunks[2];
		} else {
			$data['phone1'] = null;
			$data['phone2'] = null;
			$data['phone3'] = null;
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
        
        $authorID = $userData[0]['authorID'];
        
        
        if (Input::method() == 'POST')
		{
		
			switch(Input::post('formname')) {
				case 'password' :
				
					$originalPassword = Input::post('opword');
					$newPassword1 = Input::post('npword1');
					$newPassword2 = Input::post('npword2');
					
					$val = Validation::factory('user_password_change');
			        $val->add_field('opword', 'Original Password', 'required|min_length[8]|max_length[20]');
			       	$val->add_field('npword1', 'New Password', 'required|min_length[8]|max_length[20]');
			        $val->add_field('npword2', 'Confirm Password', 'required|min_length[8]|max_length[20]|match_field[npword1]');
			        if ( $val->run() )
			        {
						$newpass = $val->validated('npword2');
						
						if ( Auth::instance()->hash_password($originalPassword) == $userData[0]['password']){
							Auth::instance()->change_password($originalPassword, $newpass,  $data['user']['screen_name']);
							$data['successpassword'] = "Your password was changed. Great success!";
						}
					}
					else {
						$val->set_message('match_field', 'Your new passwords do not match. Please try again.');
						$data['errorsArrayPassword'] = $val->errors();
					}
					break;
					
				case 'profile' :
				
					
						if(Upload::is_valid()){
							$avatarPath = DOCROOT. 'assets/img/frontend/avatars';
							Upload::process(array(
					            'path' => $avatarPath,
					            'normalize' => true,
					            'change_case' => 'lower'
					        ));
							Upload::save();
						    foreach( Upload::get_files() as $file )
							{
							    $uploadedFile = "frontend/avatars/" . $file['saved_as'];
							}
							
						}
						else {
/* 							$data['errorsArrayProfile'] = "This file could not be uploaded"; */
							$uploadedFile = null;
						}
					
					
				
					$firstName = Input::post('fname');
					$lastName = Input::post('lname');
					$phoneNumber = Input::post('phone') . "-" . Input::post('phone2') . "-" . Input::post('phone3');
					$bio = Input::post('bio');
					$avatar = Input::post('avatar');
					
					$val = Validation::factory('user_info_change');
					$val->add_field('fname', 'First Name', 'required|min_length[2]|max_length[25]|valid_string[alpha]');
					$val->add_field('lname', 'Last Name', 'required|min_length[2]|max_length[25]|valid_string[alpha]');
					$val->add_field('bio', 'Biography', 'max_length[1000]');
					$val->add_field('phone', 'Area Code', 'exact_length[3]');
					$val->add_field('phone2', 'Phone Number', 'exact_length[3]');
					$val->add_field('phone3', 'Phone Number', 'exact_length[4]');
					if ( $val->run() )
			        {
			        	try {
			        		$updateAuthor = Model_Author::find($authorID);
							$updateAuthor->fname = $val->validated('fname');
							$updateAuthor->lname = $val->validated('lname');
							$updateAuthor->bio = $val->validated('bio');
							$updateAuthor->authorPhone = $val->validated('phone') . "-" . $val->validated('phone2') . "-" . $val->validated('phone3');
							$updateAuthor->save();
							
							//I NEED TO INCLUDE THE FUNCTIONS TO UPDATE THE IMAGE TABLE IF A NEW IMAGE WAS SUCCESSFULLY UPLOADED.
								
							$data['firstName'] = $val->validated('fname');
							$data['lastName'] = $val->validated('lname');
							$data['bio'] = $val->validated('bio');							
							$fullPhone = $val->validated('phone') . "-" . $val->validated('phone2') . "-" . $val->validated('phone3');
							$phoneChunks = explode("-", $fullPhone);
							$data['phone1'] = $phoneChunks[0];
							$data['phone2'] = $phoneChunks[1];
							$data['phone3'] = $phoneChunks[2];
							// I need to update the avatar here
							
							if($uploadedFile != null){
								$uploadedImage = Model_Images::factory(array(
									'title' => $data['firstName'] ."'s Avatar",
									'alt' => "Avatar", 
									'authorID' => $data['userID'],
									'imageType' => 1,
									'imagePath' => $uploadedFile,
								));
								$uploadedImage->save();	
							}	
			        	}
			        	catch(Exception $e) {
							//I need to throw an error here that will inform the user that their data cannot be updated.
						}
					}
			        else
			        {
			        	$data['errorsArrayProfile'] = $val->errors();
			        }
					
					
					$this->template->js = "
						$('#profileform').trigger('click', function(){
							$.scrollTo('#profileform');
						});
					";
					$data['profilesuccess'] = "You have successfully updated your profile.";
					break;
					
			}
				
				
		}
		
/* 		$data['oldpwd'] = $originalPassword; */

		
		
		$this->template->title = 'Your Settings';
        $this->template->content = View::factory('admin/settings', $data);
        
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
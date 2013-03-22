<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 
	class Controller_Admin_Edit extends Controller_Template {
	
	
	public $template = 'template_backend';

    public function action_index()
    {
    
        $data = array();
        
        $data['postTitle'] = "This is an Example Post";
        $data['articleID'] = Input::get('id');
        $data['savemsgs'] = "";
        $data['entry'] = Model_Article::find(Input::get('id'));
        $data['categories'] = Model_Category::find('all');
        $categories = $data['categories'];
        $data['user'] = Auth::instance()->get_user_array();
       	$data['userID'] = $data['user']['id'][1];
        $data['userGroup'] = $data['user']['usergroup'][0][1];
      	$userData = DB::select('authors.fname', 'authors.lname', 'authors.userID', 'authors.authorID', 'simpleauth.id', 'simpleauth.group', 'user_groups.groupName', 'user_groups.groupNameArticle', 'images.imagePath')->from('authors')->join('simpleauth')->on('authors.userID', '=', 'simpleauth.id')->join('user_groups', 'LEFT')->on('simpleauth.group', '=', 'user_groups.groupID')->join('images', 'LEFT')->on('authors.userID', '=', 'images.authorID')->where('authors.userID', '=', $data['userID'])->and_where('images.imageType', '=', 1)->execute()->as_array();
      	$postImageArray =  DB::select('imagePath')->from('images')->where('articleID', '=', $data['articleID'])->limit(1)->order_by('imagePath', 'desc')->execute()->as_array();
      	if($postImageArray){
      		$data['postImage'] = $postImageArray[0]['imagePath'];
		}
		else {
			$data['postImage'] = null;
		}
              
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
        
        
        if ( Upload::is_valid() )
		{
		    Upload::save();
		    foreach( Upload::get_files() as $file )
			{
			    $uploadedFile = $file['saved_as'];
			}
		}else {
			$uploadedFile = false;
		}
        
        foreach ($categories as $c)
	    {
	        $cats[] = $c->catName;
	    }
		$data['cats'] = $cats;
			
		$cat = Input::post('pcat');
		$featuredOrNot = Input::post('pfeature');
		$newcat = $cat + 1;
        
        
        if (Input::method() == 'POST')
		{
		
			$val = Validation::factory('edit_article');
			$val->add_field('ptitle', 'Article Title', 'required|min_length[2]|max_length[65]');
			$val->add_field('pexcerpt', 'Article Excerpt', 'required|min_length[2]|max_length[350]');
			$val->add_field('pbody', 'Article Body', 'required|min_length[2]');
			
			if ($val->run()) {
				try {
					$data['entry']->articleTitle = $val->validated('ptitle');
					$data['entry']->articleExcerpt = $val->validated('pexcerpt');
					$data['entry']->articleBody = $val->validated('pbody');
					$data['entry']->articleCat = $newcat;
					$data['entry']->modDate = date('Y-m-d H:i:s');
					$data['entry']->featured = $featuredOrNot;
					$data['entry']->save();
					$data['savemsgs'] = "Your post was successfully updated.";
					
					if($uploadedFile) {
						$image = Model_Images::factory(array(
							'title' => $val->validated('ptitle'),
							'alt' => 'Post Image',
							'authorID' => $userData[0]['authorID'],
							'imageType' => 2,
							'imagePath' => 'frontend/content/'.$uploadedFile,
							'articleID' => $data['articleID'],
						));
						$image->save();
					}
				}
				catch(Exception $e){
					$data['editErrors'] = "There was an error connecting to the database.";
				}
			}
			else {
				$data['editErrors'] = $val->errors();
			}
		}
		
		$this->template->excerptJS = "
        
        initText = $('#pexcerpt').val().length;
		excerptLimit = 350;
		
		$('#charlimitinfo').html('You have ' + (excerptLimit -initText) + ' characters left');
		
	 	$('#pexcerpt').keyup(function(){
	 		limitChars('pexcerpt', excerptLimit, 'charlimitinfo');
	 	});
        
        ";
		
		$this->template->title = "Edit " . stripslashes($data['entry']->articleTitle);
        $this->template->content = View::factory('admin/edit', $data);
        
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
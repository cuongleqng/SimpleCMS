<?php

	class Controller_Admin_New extends Controller_Template {
	
	public $template = 'template_backend';
	

    public function action_index()
    {
        
        $data['user'] = Auth::instance()->get_user_array();
      	$data['userID'] = $data['user']['id'][1];
        $data['userGroup'] = $data['user']['usergroup'][0][1];
        $data['articles'] = Model_Article::find('all');
        $data['categories'] = Model_Category::find('all');
        $categories = $data['categories'];
        $userData = DB::select('authors.fname', 'authors.lname', 'authors.userID', 'authors.authorID', 'simpleauth.id', 'simpleauth.group', 'user_groups.groupName', 'user_groups.groupNameArticle', 'images.imagePath')->from('authors')->join('simpleauth')->on('authors.userID', '=', 'simpleauth.id')->join('user_groups', 'LEFT')->on('simpleauth.group', '=', 'user_groups.groupID')->join('images', 'LEFT')->on('authors.userID', '=', 'images.authorID')->where('authors.userID', '=', $data['userID'])->and_where('images.imageType', '=', 1)->execute()->as_array();
        $data['userName'] = $userData[0]['fname'] . " " . $userData[0]['lname'];
        $authorID = $userData[0]['authorID'];
        
        $lastPostArray =  DB::select('articleID')->from('articles')->where('authorID', '=', $authorID)->limit(1)->order_by('articleID', 'desc')->execute()->as_array();
        
        // This if statement covers the chance that an author may not previously have an article ID, thus we can not grab it. 
        if($lastPostArray != null) {
        	$lastpost = $lastPostArray[0]['articleID'];
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


        

        
        if (Input::method() == 'POST')
		{
		
			if ( Upload::is_valid() )
			{
			    Upload::save();
			    foreach( Upload::get_files() as $file )
				{
				    $uploadedFile = "frontend/content/" .$file['saved_as'];
				}
			}
			else {
				$uploadedFile = NULL;
			}
			
			foreach ($categories as $c)
			    {
			        $cats[] = $c->catName;
			    }
			
			$featured = Input::post('pfeature');
			$cat = Input::post('pcat');
			$newcat = $cat + 1;
			$catName = $cats[$cat];
			
			$val = Validation::factory('new_article');
			$val->add_field('ptitle', 'Article Title', 'required|min_length[2]|max_length[65]');
			$val->add_field('pexcerpt', 'Article Excerpt', 'required|min_length[2]|max_length[350]');
			$val->add_field('pbody', 'Article Body', 'required|min_length[2]');
			
			if ($val->run()) {
				try {
					$article = Model_Article::factory(array(
						'articleTitle' => $val->validated('ptitle'),
						'articleExcerpt' => $val->validated('pexcerpt'),
						'articleBody' => $val->validated('pbody'),
						'authorID' => $authorID,
						'articleCat' => $newcat,
						'startDate' => date('Y-m-d H:i:s'),
						'featured' => $featured,
					));
					$article->save();
					$data['success'] = "Your post was successfully saved.";
					
					$lastPostArray =  DB::select('articleID')->from('articles')->where('authorID', '=', $authorID)->limit(1)->order_by('articleID', 'desc')->execute()->as_array();
       				$lastpost = $lastPostArray[0]['articleID'];
					
					if($uploadedFile != null){
						$image = Model_Images::factory(array(
							'title' => $val->validated('ptitle'),
							'alt' => $catName . ' Image',
							'authorID' => $authorID,
							'imageType' => 2,
							'imagePath' => $uploadedFile,
							'articleID' => $lastpost,
						));
						$image->save();
					}
					
				}
				catch(Exception $e){
					$data['addErrors'] = "There was an error connecting to the database.";
				}
			}
			else{
				$data['addErrors'] = $val->errors();
			}
		}
		
		
		
        $this->template->title = 'Full Sail Times';
        $this->template->excerptJS = "
        
        initText = $('#pexcerpt').val().length;
		excerptLimit = 350;
		
		$('#charlimitinfo').html('You have ' + (excerptLimit -initText) + ' characters left');
		
	 	$('#pexcerpt').keyup(function(){
	 		limitChars('pexcerpt', excerptLimit, 'charlimitinfo');
	 	});
        
        ";
        $this->template->content = View::factory('admin/new', $data);
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
<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_Admin_Media extends Controller_Template {
	
	public $template = 'template_backend';

    public function action_index()
    {
        
       $data = array();
       /* this is how to delete a file; but remember, it must also be removed from the database.
\Fuel::add_path('/Applications/MAMP/htdocs/asl1105/jbuff/cms/public/assets/img/frontend/');
       $path = \Fuel::find_file('content', 'Screen shot 2011-05-09 at 2.50.50 AM_1', '.png');
       \File::delete($path);
*/
       $data['user'] = Auth::instance()->get_user_array();
       $data['userGroup'] = $data['user']['usergroup'][0][1];
       $data['userID'] = $data['user']['id'][1];
       $userData = DB::select('authors.fname', 'authors.lname', 'authors.userID', 'authors.authorID', 'simpleauth.id', 'simpleauth.group', 'user_groups.groupName', 'user_groups.groupNameArticle', 'images.imagePath')->from('authors')->join('simpleauth')->on('authors.userID', '=', 'simpleauth.id')->join('user_groups', 'LEFT')->on('simpleauth.group', '=', 'user_groups.groupID')->join('images', 'LEFT')->on('authors.userID', '=', 'images.authorID')->where('authors.userID', '=', $data['userID'])->and_where('images.imageType', '=', 1)->execute()->as_array();
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
        
              
        $authorID = $userData[0]['authorID'];
        
        $articleImages = DB::select('*')->from('images')->where('imageType', '=', 2)->and_where('authorID', '=', $authorID)->execute()->as_array();
 
        
        
        if (Input::method() == 'POST')
		{
		
			if ( Upload::is_valid() ){
			    Upload::save();
			    foreach( Upload::get_files() as $file )
				{
				    $uploadedFile = "frontend/content/" . $file['saved_as'];
				}
			}
			$val = Validation::factory('upload_image');
			$val->add_field('imgtitle', 'Image Title', 'required|min_length[2]|max_length[25]');
			$val->add_field('imgalt', 'Image Alt Tag', 'required|min_length[2]|max_length[25]');
			
			if ($val->run()) {
				try {
					$uploadedImage = Model_Images::factory(array(
						'title' => $val->validated('imgtitle'),
						'alt' => $val->validated('imgalt'),
						'authorID' => $authorID,
						'imageType' => 2,
						'imagePath' => $uploadedFile,
					));
					$uploadedImage->save();
					$data['success'] = "Images added successfully.";
				}
				catch(Exception $e){
					//throw image upload error
					$data['error'] = "There was an error.";
				}
			}
			else {
				$data['error'] = $val->errors();
			}
		}
        
        
        $paginationConfig = array(
		    'pagination_url' => 'admin/media',
		    'total_items' => count($articleImages),
		    'per_page' => 6,
		    'uri_segment' => 3,
		);
		
		//Pagination::set_config($paginationConfig); NOTE: File bug report for this method.
		Config::set('pagination', $paginationConfig);
		
		$data['article_images'] = DB::select('*')->from('images')->where('imageType', '=', 2)->and_where('authorID', '=', $authorID)
                                                ->limit(Pagination::$per_page)
                                                ->offset(Pagination::$offset)
                                                ->execute()
                                                ->as_array();

		        
       	if($this->param('pagenumber') == 0){
       		$data['pageNum'] = 1;
       	}
       	else {
       		$data['pageNum'] = $this->param('pagenumber');
       	}
       	$data['totalPages'] = Pagination::total_pages();
        
        $this->template->galleryJS = "";
        
        $this->template->title = 'Media Manager';
        $this->template->content = View::factory('admin/media', $data);
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
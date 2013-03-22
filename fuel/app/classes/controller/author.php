<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class Controller_Author extends Controller_Template {
	
	public $template = 'template_frontend';


    public function action_index()
    {
        $data = array();

		$authors = DB::select('*')->from('authors')->execute()->as_array();
		View::set_global('authors', $authors);
        
        $authorData = DB::select('*')->from('authors')->where('authorID', '=', Input::get('id'))->execute()->as_array();
       	
		$data['authorName'] = $authorData[0]['fname'] . " " . $authorData[0]['lname'];
		View::set_global('authorName', $data['authorName']);
       	$data['bio'] = $authorData[0]['bio'];
       	$userid = $authorData[0]['userID'];
		
        $authorImg = DB::select('imagePath', 'imageID')->from('images')->where('authorID', '=', $userid)->and_where('imageType', '=', 1)->order_by('imageID', 'desc')->execute()->as_array();
		
		if($authorImg != null)
		{
			$authorImg = $authorImg[0]['imagePath'];
       		View::set_global('authorImage', $authorImg);
		}	
		
		$authorID = Input::get('id');
        
        $this->template->js = '$("#' .$authorID. '").css("color", "#fff");';
        $this->template->title = 'Full Sail Times';
        $this->template->content = View::factory('site/author', $data);
        
    }
    
    public function action_404()
	{
		$messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
		$data['title'] = $messages[array_rand($messages)];

		// Set a HTTP 404 output header
		$this->template->title = "404 - Page Not Found";
		$this->response->status = 404;
		$this->template->content = View::factory('site/404', $data);
	}
}	

?>
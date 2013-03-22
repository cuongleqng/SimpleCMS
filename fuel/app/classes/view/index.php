<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 

	class View_Admin_New extends ViewModel {
	
		public function view()
		    {
		        $this->title = 'Testing this ViewModel thing';
		
		        $this->articles = Model_Category::find('all');
		    }
	
	}	

?>
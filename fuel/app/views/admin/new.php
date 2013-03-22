<div id="top">
		
		<div class="content_pad">			
			<ul class="right">
				<li><a href="<?php echo $base_path;  ?>admin/profile" class="top_icon"><span class="ui-icon ui-icon-person"></span>Logged in as <?php echo $userName; ?></a></li>
				<li><a rel="facebox" href="#messages" class="new_messages top_alert">1 New Message</a></li>
				<li><a href="<?php echo $base_path;  ?>admin/settings">Settings</a></li>
				<li><a href="<?php echo $base_path;  ?>admin/logout">Logout</a></li>
			</ul>
		</div> <!-- .content_pad -->
		
	</div> <!-- #top -->	
	
	<div id="header">
		
		<div class="content_pad">
			<h1><a href="<?php echo $base_path;  ?>admin">Dashboard Admin</a></h1>
			
			<ul id="nav">
				<li class="nav_icon"><a href="<?php echo $base_path;  ?>admin"><span class="ui-icon ui-icon-home"></span>Home</a></li>
				

				<li class="nav_current nav_dropdown nav_icon">
					<a href="./posts"><span class="ui-icon ui-icon-gripsmall-diagonal-se"></span>Site Content</a>
					
					<div class="nav_menu">			
						<ul>
							<li><a href="./new">Create a New Post</a></li>	
							<li><a href="./posts">Edit an Existing Post</a></li>	
							<?php if($userRoleIsAdmin) { echo '<li><a href="' . $base_path . 'admin/authors">Create / Edit Authors</a></li>'; } ?>	
							<li><a href="./media">Manage Images</a></li>	
						</ul>
						
					</div>
				</li>
				
				<li class="nav_icon"><a href="<?php echo $base_path;  ?>admin/configuration"><span class="ui-icon ui-icon-gear"></span>Configuration</a></li>
				<li class="nav_icon"><a href="<?php echo $base_path;  ?>admin/reports"><span class="ui-icon ui-icon-signal"></span>Reports</a></li>
				
				<li class="nav_dropdown nav_icon_only">
					<a href="javascript:;">&nbsp;</a>
					
					<div class="nav_menu">
						
						<ul>
							<li><a href="<?php echo $base_path;  ?>admin/messages">Messages</a></li>
							<li><a href="<?php echo $base_path;  ?>admin/comments">Comments</a></li>
							<li><a href="<?php echo $base_path;  ?>admin/avalux">Contact Avalux</a></li>
						</ul>
					</div> <!-- .menu -->
				</li>
			</ul>
		</div> <!-- .content_pad -->
		
	</div> <!-- #header -->	
	
	<div id="masthead">
		
		<div class="content_pad">
			
			<h1>Create a New Post</h1>
			
			<div id="bread_crumbs">
				<a href="<?php echo $base_path;  ?>admin">Home</a> / 
				<a href="<?php echo $base_path;  ?>admin" class="current_page">New Post</a>				
			 </div> <!-- #bread_crumbs -->
			
			<div id="search">
				<?php echo Form::open(array('action' => $base_path. 'admin/search', 'method' => 'GET')); ?>
				
					<?php echo Form::input(array('type' => 'text','value' => 'Search Posts', 'placeholder' => 'Search Posts', 'name' => 'search', 'id' => 'search_input', 'title' => 'Search')); ?>
					<?php echo Form::submit(array('name' => 'submit', 'class' => 'submit')); ?>
					
				<?php echo Form::close(); ?>
			</div> <!-- #search -->
			
		</div> <!-- .content_pad -->
		
	</div> <!-- #masthead -->	
	
	<div id="content" class="xgrid">

		<div class="x12">
		
		<?php
			// turn the $categories into an array to pass to the form select field.
		    foreach ($categories as $c)
		    {
		        $cats[] = $c->catName;
		    }
		?>
    


		<?php echo Form::open(array('class' => 'form label-inline uniform', 'enctype' => 'multipart/form-data')); ?>

			<?php 
					if(isset($addErrors)) {
					echo '<div class="error"><strong>';
						foreach($addErrors as $e) {
							echo $e . "<br />";
						}
					echo '</strong></div><br />';
						}
				?>
				<?php 
					if(isset($success)) {
						echo '<div class="success"><strong>';
						echo $success . "<br /><br />";
						echo '</strong></div>';
					}
				?>

	
			<div class="field">
				<label for="ptitle">Post Title</label>
				<?php echo Form::input(array('name' => 'ptitle', 'id' => 'ptitle', 'class' => 'full'), Input::post('ptitle', isset($article) ? $article->articleTitle : '')); ?>
			</div>
			
			<div class="field">
				<label for="pexcerpt">Post Excerpt</label>
				<?php echo Form::textarea(array('name' => 'pexcerpt', 'id' => 'pexcerpt', 'rows' => 3, 'class' => 'full'), Input::post('pexcerpt', isset($article) ? $article->articleExcerpt : '')); ?>
				<p class="field_help" id="charlimitinfo">You have 350 characters left.</p>
			</div>
			
			<div class="field">
				<label for="pbody">Post Body</label>
				<?php echo Form::textarea(array('name' => 'pbody', 'id' => 'pbody', 'rows' => 10, 'class' => 'full'), Input::post('pbody', isset($article) ? $article->articleBody : '')); ?>
			</div>
			
			<div class="field clearfix">								
				<label for="pimage">Post Image</label> 								
				<?php echo Form::input(array('type' => 'file', 'name' => 'pimage', 'id' => 'pimage'), Input::post('pimage', isset($article) ? $article->articleImage : '')); ?>
				<p class="field_help nudge_down"> &nbsp; &nbsp; or <a href="javascript:;">select a file</a> from your library.</p>
			</div>
			
			<div class="field">
				<label for="pcat">Post Category </label>
				<?php echo Form::select('pcat', array('name' => 'test', 'id' => 'type', 'class' => 'medium'), $cats) ?>
			</div>
			
			<div class="field clearfix">								
				<label for="pfeature">Feature Post?</label> 								
				<?php echo Form::select('pfeature', array('name' => 'test', 'id' => 'type', 'class' => 'medium'), array(1 => 'No', 2 =>'Yes')) ?>
			</div>
			
			
				
			<div class="buttonrow">
				<?php echo Form::submit(array('class' => 'btn', 'value' => 'Submit Post')); ?>
			</div>	

		<?php echo Form::close(); ?>
		
			
		</div> <!-- .x12 -->
		
	</div> <!-- #content -->
	
	<div id="messages" style="display: none">
			<h4 class="deletetitle">This Feature Arriving Soon</h4>
			<p>Before too long, you will be able to utilize the messaging and notification system.</p>
		</div>
	
	<div id="footer">		
		<div class="content_pad">			
			<p>&copy; 2011 Copyright <a href="http://www.avaluxdev.com">Avalux Web Development</a>. Powered by <a href="http://fuelphp.com/">Fuel PHP Framework</a>.</p>
		</div> <!-- .content_pad -->
	</div> <!-- #footer -->	

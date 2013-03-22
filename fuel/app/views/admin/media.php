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
				

				<li class="nav_dropdown nav_icon">
					<a href="<?php echo $base_path;  ?>admin/posts"><span class="ui-icon ui-icon-gripsmall-diagonal-se"></span>Site Content</a>
					
					<div class="nav_menu">			
						<ul>
							<li><a href="<?php echo $base_path;  ?>admin/new">Create a New Post</a></li>	
							<li><a href="<?php echo $base_path;  ?>admin/posts">Edit an Existing Post</a></li>	
							<?php if($userRoleIsAdmin) { echo '<li><a href="' . $base_path . 'admin/authors">Create / Edit Authors</a></li>'; } ?>	
							<li><a href="<?php echo $base_path;  ?>admin/media">Manage Images</a></li>	
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
			
			<h1>Your Media</h1>
			
			<div id="bread_crumbs">
				<a href="<?php echo $base_path;  ?>admin">Home</a> / 
				<a href="<?php echo $base_path;  ?>admin/media" class="current_page">Manage Media</a>				
			 </div> <!-- #bread_crumbs -->
			
			<div id="search">
				<?php echo Form::open(array('action' => $base_path .'admin/search', 'method' => 'GET')); ?>
				
					<?php echo Form::input(array('type' => 'text','value' => 'Search Posts', 'placeholder' => 'Search Posts', 'name' => 'search', 'id' => 'search_input', 'title' => 'Search')); ?>
					<?php echo Form::submit(array('name' => 'submit', 'class' => 'submit')); ?>
					
				<?php echo Form::close(); ?>
			</div> <!-- #search -->
			
		</div> <!-- .content_pad -->
		
	</div> <!-- #masthead -->	
	
	<div id="content" class="xgrid">

				
		<div class="x4">
			<h3>Upload New Image</h3>
			<?php echo Form::open(array('class' => 'imgupload label-inline uniform', 'enctype' => 'multipart/form-data')); ?>
			<div style="margin:-15px 0 5px 0 !important; font-size: 11px;" class="field_help">To upload an avatar, <a href="<?php echo $base_path;  ?>admin/settings">edit your profile</a>.</div>
			<div class="error"><strong>
				<?php 
					if(isset($error)){
						foreach($error as $e){
							echo $e . "<br />";
						} 
					}
				?>
			</strong></div>
			<div class="success"><strong>
				<?php
					if(isset($success)){
						echo $success;
					}
				?>
			</strong></div>

				<div class="field">
					<label for="imgtitle">Image Title</label> <br />
					<?php echo Form::input(array('name' => 'imgtitle', 'id' => 'imgtitle', 'class' => 'medium')); ?>
				</div>
							
				<div class="field">
					<label for="imgalt">Image Alt</label> <br />
					<?php echo Form::input(array('name' => 'imgalt', 'id' => 'imgalt', 'class' => 'medium')); ?>
				</div>
				
				<div class="field clearfix">								
					<label for="imagefile">Image</label> 	<br />							
					<?php echo Form::input(array('type' => 'file', 'name' => 'imagefile', 'id' => 'imagefile', 'class' => 'medium')); ?>	
				</div>
				
				<div class="buttonrow">
					<?php echo Form::submit(array('class' => 'btn', 'value' => 'Submit Post')); ?>
				</div>
			<?php echo Form::close(); ?>
	
		</div> <!-- .x4 -->
		
		<div class="x1"></div>
		
		
		<div class="x7">
			<h3>Your Existing Images</h3>
				<ul id="imggallery">
					<?php
						if(count($article_images) > 0)
						{
							foreach($article_images as $image){
								
								echo '<li class="galleryImg">';
									echo '<a rel="facebox" href="' . $base_path . 'public/assets/img/' . $image['imagePath'] .   '"> '. Asset::img($image['imagePath'], array('class' => 'galleryImage', 'alt' => $image['alt'])) . '</a>';
									echo '<div class="imgtitle">'. stripslashes($image['title']) .'</div>';
								echo '</li>';
							}
						}
						else {
							echo 'Uh oh! It looks like you don\'t have any images yet. Upload some to the right!';
						}
					?>	
				</ul>
				<div style="clear:both;"></div>
				
				<br /><br />
				
				<?php echo '<span style="float:left; margin: 12px 0 0 370px;" id="pagenumbers">' . Pagination::create_pagenum_links() . '</span>'; ?>
				<div class="dataTables_paginate paging_two_button" id="example_paginate" style="margin-right: 25px;">
				<?php 
				
					if($pageNum == 1){
						echo '<div class="paginate_disabled_previous" title="Next" id="example_next"></div>';
					}else {
						echo '<a href="' .$base_path. 'admin/media/' . ($pageNum -1) . '"><div class="paginate_enabled_previous" title="Previous" id="example_previous"></div></a>';
					}
					
					
					
					
					if($totalPages == $pageNum )
					{
						echo '<div class="paginate_disabled_next" title="Next" id="example_next"></div>';
					}
					else {
						echo '<a href="' .$base_path. 'admin/media/' . ($pageNum +1) . '"><div class="paginate_enabled_next" title="Next" id="example_next"></div></a>';
					}
					
					
					
					?>
				</div>
								
			
			
		</div> <!-- .x3 -->
		
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
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
				<li class="nav_icon"><a href="controlpanel"><span class="ui-icon ui-icon-home"></span>Home</a></li>
				

				<li class="nav_dropdown nav_icon">
					<a href="<?php echo $base_path;  ?>admin/posts"><span class="ui-icon ui-icon-gripsmall-diagonal-se"></span>Site Content</a>
					
					<div class="nav_menu">			
						<ul>
							<li><a href="<?php echo $base_path;  ?>admin/new">Create a New Post</a></li>	
							<li><a href="<?php echo $base_path;  ?>admin/edit">Edit an Existing Post</a></li>	
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
			
			<h1>Your Settings</h1>
			
			<div id="bread_crumbs">
				<a href="<?php echo $base_path;  ?>admin">Home</a> / 
				<a href="<?php echo $base_path;  ?>admin/settings" class="current_page">Settings</a>				
			 </div> <!-- #bread_crumbs -->
			
			<div id="search">
				<?php echo Form::open(array('action' => $base_path . 'admin/search', 'method' => 'GET')); ?>
				
					<?php echo Form::input(array('type' => 'text','value' => 'Search Posts', 'placeholder' => 'Search Posts', 'name' => 'search', 'id' => 'search_input', 'title' => 'Search')); ?>
					<?php echo Form::submit(array('name' => 'submit', 'class' => 'submit')); ?>
					
				<?php echo Form::close(); ?>
			</div> <!-- #search -->
			
		</div> <!-- .content_pad -->
		
	</div> <!-- #masthead -->	
	
	<div id="content" class="xgrid">

				
		<div class="x9">
			
	<div class="accordion_container">	
				
				<h2 class="accordion_panel"><a class="passwordform" href="#">Change Password</a></h2> 
	<div class="accordion_content"> 
		<div class="block"> 
		
		<div class="error"><strong>
			<?php 
				if(isset($errorsArrayPassword)){ 
					foreach($errorsArrayPassword as $error) {
						echo $error . "<br />";
					}
					echo "<br />";
				}
			?>
		</strong></div>
		
		<div class="success"><strong>
			<?php 
				if(isset($successpassword)){ 
					echo $successpassword . "<br /><br />";
				}
			?>
		</strong></div>
		
		
			
			<?php echo Form::open(array('class' => 'form label-inline')); ?>
	
				<div class="field">
					<label for="opword">Old Password: </label>
					<?php echo Form::input(array('type' => 'password','name' => 'opword', 'id' => 'opword', 'class' => 'medium')); ?>
				</div>
	
				<div class="field">
					<label for="npword1">New Password: </label>
					<?php echo Form::input(array('type' => 'password','name' => 'npword1', 'id' => 'npword1', 'class' => 'medium')); ?>
				</div>

				<div class="field">
					<label for="npword2">Retype Password: </label>
					<?php echo Form::input(array('type' => 'password','name' => 'npword2', 'id' => 'npword2', 'class' => 'medium')); ?>
				</div>
				
				<?php echo Form::hidden(array('name' => 'formname', 'id' => 'formname', 'value' => 'password')); ?>

				<br />
				<div class="buttonrow">
					<?php echo Form::submit(array('name' => 'submit', 'class' => 'btn btn-orange', 'value' => 'Change Password')); ?>
				</div>
				
					
			<?php echo Form::close(); ?>

			
		</div> 
	</div>
				
				<h2 class="accordion_panel"><a id="profileform" href="#">Personal Information</a></h2> 
	<div class="accordion_content"> 
		<div class="block"> 
		
		<div class="error"><strong>
			<?php 
				if(isset($errorsArrayProfile)){ 
					if($errorsArrayProfile == array()){
						foreach($errorsArrayProfile as $error) {
							echo $error . "<br />";
						}
					}
					else {
						echo $errorsArrayProfile;
					}					
					echo "<br />";
				}
			?>
		</strong></div>
		
		<div class="success"><strong>
			<?php 
				if(isset($profilesuccess)){ 
					echo $profilesuccess . "<br /><br />";
				}
			?>
		</strong></div>
			<?php echo Form::open(array('class' => 'form label-inline uniform', 'enctype' => 'multipart/form-data')); ?>
	
							<div class="field">
								<label for="fname">First Name </label>
								<?php echo Form::input(array('type' => 'text','name' => 'fname', 'id' => 'fname', 'class' => 'medium', 'value' => $firstName)); ?>
							</div>
				
							<div class="field">
								<label for="lname">Last Name </label>
								<?php echo Form::input(array('type' => 'text','name' => 'lname', 'id' => 'lname', 'class' => 'medium', 'value' => $lastName)); ?>
							</div>

							<div class="field phone_field">
								<label for="phone">Telephone</label> 
									<?php echo Form::input(array('type' => 'text','name' => 'phone', 'id' => 'phone', 'class' => 'xsmall', 'value' => $phone1, 'maxlength' => '3')); ?> -
									<?php echo Form::input(array('type' => 'text','name' => 'phone2', 'id' => 'phone2', 'class' => 'xsmall', 'value' => $phone2, 'maxlength' => '3')); ?> -
									<?php echo Form::input(array('type' => 'text','name' => 'phone3', 'id' => 'phone3', 'class' => 'xsmall', 'value' => $phone3, 'maxlength' => '4')); ?>
							</div>
							
							<div class="field">
								<label for="bio">Bio</label> 
								<?php echo Form::textarea(array('cols' => '50', 'rows' => '7', 'type' => 'password','name' => 'bio', 'id' => 'bio', 'class' => 'xlarge', 'value' => html_entity_decode(stripslashes($bio)))); ?>

							</div>
							
							<div class="field">
								<label for="avatar">Avatar</label> 
								<div class="avatar"><?php echo Asset::img($authorPic, array('height' => '75')); ?></div>
								<?php echo Form::input(array('type' => 'file', 'name' => 'avatar', 'id' => 'avatar')); ?>
								<p class="field_help nudge_down"> &nbsp; &nbsp; or <a href="javascript:;">select an avatar</a> from your collection. 
								<br /><br />Note: Avatar must be 75x75px.</p>
							</div>
							
							<?php echo Form::hidden(array('name' => 'formname', 'id' => 'formname', 'value' => 'profile')); ?>


							
							<br />
							<div class="buttonrow">
								<?php echo Form::submit(array('name' => 'submit', 'class' => 'btn btn-orange', 'value' => 'Update Information')); ?>
							</div>

						<?php echo Form::close(); ?>
		</div> 
	</div> 
	
	 
		
	<h2 class="accordion_panel"><a href="#">Your Role</a></h2> 
	<div class="accordion_content"> 
		<div class="block"> 
			<p>You're role is <strong><?php echo $userRole; ?></strong>. As a member of the development team, this means that you have full access to all facets of the site. With this role, you have full access to the frontend and backend of <i>Full Sail Times</i>. If you are unsure of the risks of any change which you are considering making, please consult the development team: <a href="#">Avalux Web Development</a>. Your role contains permissions that could result in a significant change to the website- possibly one resulting in downtime. Please be alert and aware of the ramifications of any change you may make.
		</div> 
	</div> 
	
</div> <!-- .accordion_container -->

		</div> <!-- .x9 -->
		
		
		<div class="x3">
			<h3>Adjust Your Settings</h3>

			
			<p><strong>Your Role: </strong><?php echo $userRole; ?><br />
			To adjust your settings, utilize the fields to the left. Please remember that this information is considered confidential, and should not be shared with other people.</p>
			<p>If your role should need to be changed, please contact the <a href="javascript:;">site administrator</a>.</p>
			
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
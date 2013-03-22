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
					<a href="<?php echo $base_path;  ?>admin/posts"><span class="ui-icon ui-icon-gripsmall-diagonal-se"></span>Site Content</a>
					
					<div class="nav_menu">			
						<ul>
							<li><a href="<?php echo $base_path;  ?>admin/new">Create a New Post</a></li>	
							<li><a href="<?php echo $base_path;  ?>admin/posts">Edit an Existing Post</a></li>	
							<li><a href="<?php echo $base_path;  ?>admin/authors">Create / Edit Authors</a></li>	
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
			
			<h1>Manage Authors</h1>
			
			<div id="bread_crumbs">
				<a href="<?php echo $base_path;  ?>admin">Home</a> / 
				<a href="<?php echo $base_path;  ?>admin/authors" class="current_page">Manage Authors</a>				
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

		<div class="x12">
			<h2>Create a New Author</h2>
				<div class="error"><strong>
				
					<?php 
							if(isset($errorsArray)){
								foreach($errorsArray as $error) {
									echo $error . "<br />";
								}
								echo "<br />";
						  	} 
						  	
						  	if(isset($usererror)){
								echo $usererror . "<br /><br />";
						  	} 
						   
					?>
				</strong></div>
				
				<div class="success"><strong><?php if(isset($success)) { echo $success . "<br /><br />"; } ?></strong></div>
				
				
				
			
				<?php /* echo render('admin/_newauthorform', $fields);  */?>	
				
				
				<?php 
					if(isset($fields)) {
						$data['fields'] = $fields;
					} else {
						$data['fields'] = array();
					}
					
					
					$data['usergroups'] = $usergroups;
					
					echo View::factory('admin/_newauthorform', $data)->render();	
				?>
		
			<h2>Listing of Authors</h2>
				
				<table class="data display" id="example">
					<thead>
						<tr>
							<th>Author Name</th>
							<th>Author Role</th>
							<th>Manage Author</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($authors as $author): ?>
						<tr class="odd gradeX">
							<td><?php echo $author['fname']; ?> <?php echo $author['lname'] ?></td>
							<td><?php echo $author['groupName'] . " - " . $author['company']; ?></td>
							<td>
								<a rel="facebox" href="#edit_user"><button class="btn btn-grey">Edit</button></a>
								<a rel="facebox" id="<?php echo $userID; ?>" href="#delete_user"><button class="btn btn-red">Delete</button></a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
		
		<div id="edit_user" style="display: none">
			<h4>Edit User <?php echo $author['fname']; ?> <?php echo $author['lname'] ?></h4>
				<form action="#" method="post" class="label-inline uniform">
	
					<div class="field">
						<label for="fname">First Name</label>
						<input id="fname" name="fname" size="50" type="text" class="xlarge" />
					</div>
					
					<div class="field">
						<label for="lname">Last Name</label>
						<input id="lname" name="lname" size="50" type="text" class="xlarge" />
					</div>
					
					<div class="field">
						<label for="type">Author Role</label>
						<select id="type" class="medium">

							<optgroup label="Please Pick a Role">
								<option>Developer</option>
								<option selected="selected">Author</option>
								<option>Editor</option>
							</optgroup>
						</select>
					</div>
					
					<div class="field buttonrow" style="margin-top: 20px;">
						<button class="btn btn-small">Save Changes</button>
					</div>
				</form>
		</div>
		
		<div id="delete_user" style="display: none">
			<h4>Delete User This User?</h4>
			
			<?php echo Form::open(); ?>
			
				<div class="artid"></div>
							
				<?php echo Form::submit(array('class' => 'btn btn-small btn-red', 'value' => 'Delete Post')); ?>
		
			<?php echo Form::close(); ?>
		</div>
			
			
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

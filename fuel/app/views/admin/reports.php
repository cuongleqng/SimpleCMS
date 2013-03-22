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
				<li class="nav_icon nav_current"><a href="./reports"><span class="ui-icon ui-icon-signal"></span>Reports</a></li>
				
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
			
			<h1>Site Configuration</h1>
			
			<div id="bread_crumbs">
				<a href="<?php echo $base_path;  ?>admin">Home</a> / 
				<a href="<?php echo $base_path;  ?>admin/configuration" class="current_page">Site Configuration</a>				
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
			<h2>This Feature Coming Soon</h2>
			
			<p>As of right now, we are hard at work developing this feature. Soon, you will be able to view performance reports and analytics right from your admin panel. You will be able to edit frontend details, such as the website's title, widgets, and featured post(s). We'll keep you notified of any new details via the messaging system. </p>
				
					
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

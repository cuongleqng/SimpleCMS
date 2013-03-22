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
			<h1><a href="<?php echo $base_path;  ?>admin/">Dashboard Admin</a></h1>
			
			<ul id="nav">
				<li class="nav_current nav_icon"><a href="<?php echo $base_path;  ?>admin/"><span class="ui-icon ui-icon-home"></span>Home</a></li>
				

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
			
			<h1 class="no_breadcrumbs">Home</h1>
			
			<div id="search">
				<?php echo Form::open(array('action' => './admin/search', 'method' => 'GET')); ?>
				
					<?php echo Form::input(array('type' => 'text','value' => 'Search Posts', 'placeholder' => 'Search Posts', 'name' => 'search', 'id' => 'search_input', 'title' => 'Search')); ?>
					<?php echo Form::submit(array('name' => 'submit', 'class' => 'submit')); ?>
					
				<?php echo Form::close(); ?>
			</div> <!-- #search -->		
		</div> <!-- .content_pad -->
		
	</div> <!-- #masthead -->	
	
	<div id="content" class="xgrid">
		
		<div id="welcome" class="x4">			
			
			<h3>Welcome back, <?php echo $userName; ?></h3>
			
			<div class="avatar"><?php echo Asset::img($authorPic, array('height' => '75', 'alt' => 'Avatar')); ?></div>


You are currently signed in as <?php echo $userRole; ?> <br /><a target="_new" href="<?php echo $base_path;  ?>">View your site.</a>

</p>

<h3 class="top_space">Latest News from the Dev Team</h3>

<ul>
	<li><a href="#">Your site is now updated to v1.5!</a></li>
	<li><a href="#">UPGRADE: Planned Upgrade Downtime</a></li>
	<li><a href="#">ANALYTICS: Your April Analytics are available</a></li>
	<li><a href="#">UPGRADE: Planned Homepage Redesign</a></li>
	<li><a href="#">ANALYTICS: Your March Analytics are available</a></li>
	<li><a href="#">BILLING: Your Q1 2011 Bill is now available</a></li>
</ul>
<a href="<?php echo $base_path;  ?>admin/messages"> View All Messages</a>

</p>

<h3>Year-Over-Year Pageviews</h3>
			
			<table class="stats" data-chart="pie">
				<caption>2008/2009/2010 Views by Year (Million)</caption>
				<thead>
					<tr>
						<td>&nbsp;</td>
						<th>2008</th>
						<th>2009</th>
						<th>2010</th>
					</tr>

				</thead>
				
				<tbody>
					<tr>
						<th>2008</th>
						<td>25</td>
					</tr>
					<tr>
						<th>2009</th>
						<td>40</td>
					</tr>
					
					<tr>
						<th>2010</th>
						<td>35</td>
					</tr>							
				</tbody>
			</table>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			
		</div> <!-- .x4 -->
			
		<div class="x8" style="border-left: 2px solid #DFDFDF; padding-left: 20px; width: 590px">
			<h2>Manage Your Site</h2>

				<a href="./new" class="admin_action">
					<h4 class="action">Create a Post</h4>
					<span>Add a new article to your website</span>
				</a>
				
				<a href="./posts" class="admin_action">
					<h4 class="action">Edit a Post</h4>
					<span>Edit an existing post on your website</span>
				</a>
				
				<a href="./media" class="admin_action">
					<h4 class="action">Upload Images</h4>
					<span>Upload a new image to your website gallery</span>
				</a>
				
				<?php 
					if($userRoleIsAdmin) {
						echo '
						
						<a href="./authors" class="admin_action">
							<h4 class="action">Create an Author</h4>
							<span>Add a new author role to your website</span>
						</a>
						
						'; 
					} 
					else {
						echo '
						
						<a href="./categories" class="admin_action">
							<h4 class="action">Edit Categories</h4>
							<span>Add or edit your website categories</span>
						</a>
						
						'; 
					}
				?>
		
		
		
			<br /><br /><br /><br /><br /><br />
			<div style="clear:both; margin-top: 10px !important;"></div>
			
			<h2>Manage Your Categories</h2>
			<p>Add a new category or edit your <a href="<?php echo $base_path;  ?>admin/categories">existing categories</a>.</p>
			
				<?php echo Form::open(array('class' => 'form label-inline uniform', 'enctype' => 'multipart/form-data')); ?>
				
					
					<div class="field">
						<label for="cname">Category Name</label>
						<?php echo Form::input(array('name' => 'cname', 'id' => 'cname', 'class' => 'medium')); ?>
					</div>
					
					<div class="field">
						<label for="cparent">Category Parent</label>
						<?php 
						
 						 array_unshift($cats, 'None'); 
 						
						
						echo Form::select('cparent', array('name' => 'test', 'id' => 'type', 'class' => 'medium'), $cats) ?>
					</div>
					
					<div class="field buttonrow" style="margin-top: -20px;">
						<?php echo Form::submit(array('class' => 'btn btn-small', 'value' => 'Submit Post')); ?>
					</div>	
					
				<?php echo Form::close(); ?>
				
			
			<h2>Recent Comments</h2>
			
			<table class="data support_table">
				<tbody>
				<tr>
					<td><span class="ticket open">Open</span></td>
					<td class="full"><a href="#">Lorem ipsum dolor sit amet</a></td>					
					<td class="who">Posted by Bill</td>
				</tr>

				<tr>
					<td><span class="ticket open">Open</span></td>
					<td class="full"><a href="#">Consectetur adipiscing</a></td>
					<td class="who">Posted by Pam</td>
				</tr>
				<tr>
					<td><span class="ticket open">Open</span></td>
					<td class="full"><a href="#">Sed in porta lectus maecenas</a></td>					
					<td class="who">Posted by Curtis</td>
				</tr>
				<tr>
					<td><span class="ticket closed">Closed</span></td>
					<td class="full"><a href="#">Dignissim enim</a></td>					
					<td class="who">Posted by John</td>
				</tr>
				<tr>
					<td><span class="ticket responded">Responded</span></td>
					<td class="full"><a href="#">Duis nec rutrum lorem</a></td>


					<td class="who">Posted by James</td>
				</tr>
				<tr>
					<td><span class="ticket closed">Closed</span></td>
					<td class="full"><a href="#">Maecenas id velit et elit</a></td>					
					<td class="who">Posted by Sam</td>
				</tr>
				<tr>
					<td><span class="ticket responded">Responded</span></td>
					<td class="full"><a href="#">Duis nec rutrum lorem</a></td>
					<td class="who">Posted by Carlos</td>
				</tr>
				</tbody>
			</table>
			
		</div> <!-- .x8 -->
		
		<div class="xbreak "></div> <!-- .xbreak -->
		
		
		<div id="messages" style="display: none">
			<h4 class="deletetitle">This Feature Arriving Soon</h4>
			<p>Before too long, you will be able to utilize the messaging and notification system.</p>
		</div>

		
		
			
	
		
	</div> <!-- #content -->
	
	<div id="footer">		
		<div class="content_pad">			
			<p>&copy; 2011 Copyright <a href="http://www.avaluxdev.com">Avalux Web Development</a>. Powered by <a href="http://fuelphp.com/">Fuel PHP Framework</a>.</p>
		</div> <!-- .content_pad -->
	</div> <!-- #footer -->	
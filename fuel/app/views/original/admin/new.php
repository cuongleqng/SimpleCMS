<div id="main">
	<div id="admin">
		<div class="infobar">
			<h3>Thank you for logging in, <?php echo $adminName; ?></h3> <span><?php echo Date::factory()->format("%a, %b %d, %Y"); ?></span>
			<div id="breadcrumbs"> <a href="/asl1105/jbuff/cms/">homepage</a> &rarr; <a href="/asl1105/jbuff/cms/admin">admin</a> &rarr; <a class="current" href="/asl1105/jbuff/cms/admin/new">new post</a> </div>
		</div>
		
		<form id="newpost" action="?" method="POST">
		
		<ul>
		
			<li>
				<label for="title">Post Title</label>
				<input type="text" name="title" id="title" />
			</li>
			
			<li>
				<label for="excerpt">Excerpt</label>
				<textarea name="excerpt" id="excerpt"></textarea>
			</li>
			
			<li>
				<label for="postbody">Body</label>
				<textarea name="postbody" id="postbody"></textarea>
			</li>
			
			<fieldset class="abc">
				<legend>Post Options</legend>
				
				<li>
					<label for="image">Post Image</label>
					<input type="file" name="image" id="image" />
				</li>
				
			</fieldset>
			
			
			
			<li>
				<input type="submit" value="Submit" />  <span><a href="#">or cancel</a></span>
			</li>
		
		</ul>
	
		
		
		</form>
	
	</div><!-- end /#admin -->
</div><!-- end /#main -->
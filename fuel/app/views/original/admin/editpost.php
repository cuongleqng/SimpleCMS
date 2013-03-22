<div id="main">
	<div id="admin">
		<div class="infobar">
			<h3>Thank you for logging in, <?php echo $adminName; ?></h3> <span><?php echo Date::factory()->format("%a, %b %d, %Y"); ?></span>
			<div id="breadcrumbs"> <a href="/asl1105/jbuff/cms/">homepage</a> &rarr; <a href="/asl1105/jbuff/cms/admin">admin</a> &rarr; <a class="current" href="/asl1105/jbuff/cms/admin/posts">edit</a> </div>
		</div>
		
		<form id="newpost" action="?" method="POST">
		
		<ul>
		
			<li>
				<label for="title">Post Title</label>
				<input type="text" name="title" id="title" value="This is an Example Title" />
			</li>
			
			<li>
				<label for="excerpt">Excerpt</label>
				<textarea name="excerpt" id="excerpt">This is an example excerpt.</textarea>
			</li>
			
			<li>
				<label for="postbody">Body</label>
				<textarea name="postbody" id="postbody">This is an example post body.</textarea>
			</li>
			
			<li>
				<input type="submit" value="Submit" />  <span><a href="#">or cancel</a></span>
			</li>
		
		</ul>
	
		
		
		</form>
	
	</div><!-- end /#admin -->
</div><!-- end /#main -->
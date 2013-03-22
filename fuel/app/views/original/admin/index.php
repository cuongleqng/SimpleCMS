<div id="main">
	<div id="admin">
		<div class="infobar">
			<h3>Thank you for logging in, <?php echo $adminName; ?></h3> <span><?php echo Date::factory()->format("%a, %b %d, %Y"); ?></span>
			<div id="breadcrumbs"> <a href="/asl1105/jbuff/cms/">homepage</a> &rarr; <a class="current" href="/asl1105/jbuff/cms/admin">admin</a> </div>
		</div>
		
		<ul id="options">
			<li><a href="admin/new/">Add Article</a></li>
			<li><a href="admin/posts/">Edit Articles</a></li>
			<li><a href="#">Upload Photos</a></li>
			<li><a href="#">Edit Authors</a></li>
			<li><a href="#">Edit Category</a></li>
		</ul>
	
	</div><!-- end /#admin -->
</div><!-- end /#main -->
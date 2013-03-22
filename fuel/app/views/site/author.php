<article class="post">
<?php 
	echo View::factory('site/authorsidebar')->render();
?>
<h2 style="color: #C9C9C9;">Author Spotlight: <?php echo $authorName ?></h2>
<br />
<p class="excerpt"><?php echo html_entity_decode(stripslashes($bio)); ?></p>	
</article>
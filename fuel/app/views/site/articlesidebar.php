<aside id="sidebar">
	<h3>Author: <?php echo $authorName; ?></h3>
	<p class="welcome"><?php echo html_entity_decode(stripslashes($bio)) ;?></p>
	<p class="welcome" style="float: right;margin-top: 5px;"><a href="<?php echo $base_path . 'author/?id=' . $authorID ?>">View My Profile</a></p>
	<h3 class="title">Topics</h3>
	<ul>
		<?php
		// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 		
			if(isset($categories)){
				foreach($categories as $key => $cat) {
					echo '<li><a href="' .  $base_path. 'category/' . ($key +1) .'">' . $cat . '</a></li>';
				}
			}	
		?>
	</ul>
	<div class="fullsail"></div>
</aside>
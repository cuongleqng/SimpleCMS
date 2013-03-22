<aside id="sidebar">
	<h3><?php echo $authorName; ?></h3>
	<?php if(isset($authorImage)){
		 echo Asset::img($authorImage, array('class' => 'biopic', 'width' => 75, 'height' => 75)); 
	}
	?>
	<h3>Site Authors</h3>
	<ul>
		<?php
		// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 		
			if(isset($authors)){
				foreach($authors as $key => $author) {
					echo '<li><a id="' .$author['authorID']. '" href="' .  $base_path. 'author/?id=' . $author['authorID'] .'">' . $author['fname'] . " " . $author['lname'] . '</a></li>';
				}
			}	
		?>
		
	</ul>
	<div class="fullsail"></div>
</aside>
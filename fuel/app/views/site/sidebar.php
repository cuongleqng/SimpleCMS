<aside id="sidebar">
	<h3>Welcome to Full Sail Times</h3>
	<p class="welcome">Welcome to the official online newspaper of Full Sail University. Here, you will find many topics; from campus news to GPS point events. We look forward to serving you!</p>
	<h3 class="title">Topics</h3>
	<ul>
		<?php
		// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 		
			if(isset($categories)){
				foreach($categories as $key => $cat) {
					echo '<li><a href="' .$base_path. 'category/' . ($key +1) .'">' . $cat . '</a></li>';
				}
			}	
		?>
	</ul>
	<div class="fullsail"></div> <!-- Placeholder for the fullsail logo loaded by css -->
</aside>
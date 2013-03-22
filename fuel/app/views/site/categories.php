<h2 class="nudgecatname">Overview of all Full Sail Times Categories</h2>
<div id="categories">
	<?php
	// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 
		foreach($categories as $key => $category) {
			$catKey = $key;
			echo '<section>';
			echo '<h2>' . $category['catName'] . '</h2>';
			echo '<ul>';
			
			foreach($articles as $key => $article){
				if(isset($articles[($catKey)][$key])){
					$articleTitle = $articles[($catKey)][$key]['articleTitle'];
					$articleID = $articles[($catKey)][$key]['articleID'];
					echo '<li><a href="' .$base_path. 'article?id=' . $articleID . '">' . html_entity_decode(stripslashes($articleTitle))  . "</a></li>";
				}
			}	
			echo '</ul>';
			echo '<a href="' .$base_path. 'category/' . $category['catID'] . '" class="viewcat">View All Articles</a>';
			echo '</section>';
		}	
	?>
</div>
<div id="articles">
	<div id="titlebar">
		<h2><?php
			 if($category)
			 {
			 	echo 'Articles from "' . $category[0]['catName'] . '"';
			 
			 }
			 ?></h2>
	</div>
	<?php
	// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 
	
		if($articles){
			foreach($articles as $article){
				
				echo '<article class="reg">';
				echo '<h2>' . stripslashes($article['articleTitle']) . '</h2>';
				echo '<p class="excerpt-small">' . stripslashes($article['articleExcerpt']) . '</p>';
				echo '<aside><a class="readmore" href="' .$base_path. 'article/?id=' . $article['articleID'] .'">Read More &raquo;</a></aside>';
				echo '</article>';
				
			}
		 	if($totalPages > 1){
		 		echo '<div id="titlebar" class="pagination">' . Pagination::prev_link('&laquo; Previous'). '<span class="numlinks">' . Pagination::create_pagenum_links() . '</span>'  . Pagination::next_link('Next &raquo;'). '</div>';
		 	}
		}
		else {
			echo " There seems to be no articles in this category.";
		}
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 			
	?>
</div>
<?php 
	echo View::factory('site/sidebar')->render();
?>
<div id="articles">
<div id="titlebar"><h2>Welcome to the Blog - Page <?php echo $pageNum; ?></h2></div>
	<?php
		// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 
		
			foreach($articles as $article){
				
				echo '<article class="reg">';
				
				echo stripslashes('<h2>' . $article['articleTitle'] . '</h2>');
				
				echo stripslashes('<p class="excerpt-small">' . $article['articleExcerpt'] . '</p>');
				
				echo '<aside><a class="readmore" href="./article/?id=' . $article['articleID'] .'">Read More &raquo;</a></aside>';
				
				echo '</article>';
			}
				
				echo '<div id="titlebar" class="pagination">' . Pagination::prev_link('&laquo; Previous'). '<span class="numlinks">' . Pagination::create_pagenum_links() . '</span>'  . Pagination::next_link('Next &raquo;'). '</div>'; 
		?>
</div> <!-- end #articles -->
<?php 
	echo View::factory('site/sidebar')->render();
?>


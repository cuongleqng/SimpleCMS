<div id="articles">
	<div id="featured">
		<article>
		<h2><a href="<?php echo $base_path .'article/?id='. $featArticle[0]['articleID'] ?>"><?php echo $featArticle[0]['articleTitle']; ?></a></h2>
		<div class="homepage_featimg"></div>
		<?php if(!empty($featImg)){ echo '<a href="' . $base_path . 'article/?id='. $featArticle[0]['articleID'] .'">' .Asset::img($featImg[0]['imagePath'], array('width' => '866', 'height' => '146', 'alt' => 'Feature Image')) . '</a>'; } ?>
		<p class="excerpt"><?php echo html_entity_decode(stripslashes($featArticle[0]['articleExcerpt'])); ?></p>
		<a class="readmore" href="<?php echo $base_path .'article/?id='. $featArticle[0]['articleID'] ?>">Read More &raquo;</a>
		</article>
	</div><!-- end #featured -->
	<?php
		// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 
			foreach($articles as $article){
				
				echo '<article class="reg">';
				
				echo '<a href="' .$base_path. 'article/?id=' . $article['articleID'] .'">' .stripslashes('<h2>' . html_entity_decode(stripslashes($article['articleTitle'])) . '</h2></a>');
				
				echo stripslashes('<p class="excerpt-small">' . html_entity_decode(stripslashes($article['articleExcerpt'])) . '</p>');
				
				echo '<aside><a class="readmore" href="' .$base_path. 'article/?id=' . $article['articleID'] .'">Read More &raquo;</a></aside>';
				
				echo '</article>';
			}
				echo '<div id="titlebar" class="pagination">' . Pagination::prev_link('&laquo; Previous'). '<span class="numlinks">' . Pagination::create_pagenum_links() . '</span>'  . Pagination::next_link('Next &raquo;'). '</div>'; 
		?>
</div> <!-- end #articles -->
<?php 
	echo View::factory('site/sidebar')->render();
?>
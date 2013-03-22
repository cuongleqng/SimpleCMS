<?php 
	echo View::factory('site/articlesidebar')->render();
?>
<article class="post">
<?php
// This PHP code developed by Jeremy Buff of Avalux Web Development - AvaluxDev.com 
	echo '<h2 class="articletitle"><a href="'.$base_path . 'article/?id=' . $article[0]['articleID'] .'">' . html_entity_decode(stripslashes($article[0]['articleTitle'])) . '</a></h2>';
	echo '<p class="excerpt" style="font-style: italic;">'  . stripslashes($article[0]['articleExcerpt']) .  '</p>';	
	if(isset($postImage)){
		echo Asset::img($postImage, array('class' => 'postImg'));
	}
	echo '<p class="text">' . html_entity_decode(stripslashes(nl2br($article[0]['articleBody']))) . '</p>';
	echo '<div style="clear:both;"></div>';
	echo '<aside class="meta">
				Posted in <a href=" ' .$base_path. 'category/'. $postCategory['catID'] . '">' . $postCategory['catName'] . '</a>
				&nbsp;&nbsp;|&nbsp;&nbsp; Written by <a href="' .$base_path. 'author/?id=' .$authorID.  '">' .$authorName. '</a>
				&nbsp;&nbsp;|&nbsp;&nbsp; Published on ' . date("F j, Y", strtotime($article[0]['startDate'])) . '
		  </aside>';
?>
</article>
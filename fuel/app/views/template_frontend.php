<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php echo $title; ?></title>
<?php echo Asset::css('frontend/newstyle.css'); ?>
</head>
<body>
<div id="container">
	<header>
		<a href="<?php echo $base_path; ?>"><h1 class="logo">Full Sail Times <span>Curated by WDDBS Students</span></h1></a>
		<nav>
			<a id="home_page" href="<?php echo $base_path; ?>">Home</a>
			<a id="blog_page" href="<?php echo $base_path; ?>blog">Blog</a>
			<a id="categories_page" href="<?php echo $base_path; ?>categories/">Categories</a>
			<a id="contact_page" href="<?php echo $base_path; ?>contact/">Contact</a>
		</nav>
	</header>
	<div id="main" style="position:relative; overflow: auto;">
		<?php echo $content; ?> 
	</div> <!-- end main -->
	<footer>
		Copyright &copy; 2011 Avalux Web Development. All rights reserved.
	</footer>
</div><!-- end container -->
<?php echo Asset::js('frontend/jquery.js'); ?>
<?php echo Asset::js('frontend/cufon.js'); ?>
<?php echo Asset::js('frontend/font.js'); ?>
<script type="text/javascript">
	jQuery(document).ready(function() {
		Cufon.replace('h1, h2, h3');
	});
</script>
<script type="text/javascript"> 
		Cufon.now(); 
		<?php 
		 	if(isset($js)){
		 		echo html_entity_decode($js);
		 	}
		?>
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php echo $title; ?> - ASL Content Management System</title>


<?php echo Asset::css('style.css'); ?>
<?php echo Asset::css('admin.css'); ?>


</head>

<body>

<div id="container">

<div id="header">
	<a id="logo" href="/asl1105/jbuff/cms/">ASL Content Management System</a>
	<div id="signin">
		<form action="?" method="POST">
			<input type="text" id="username" value="username" />
			<input type="password" id="password" value="password" />
			<input type="submit" id="submitbtn" value="" />
		</form>
	</div>
</div>



<div id="main">

<?php echo $content; ?>
	
</div>

</div><!-- end container -->

<div id="footer">
	Copyright &copy; 2011 Avalux Web Development. All rights reserved.
</div>



</body>
</html>
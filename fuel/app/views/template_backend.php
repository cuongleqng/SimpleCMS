<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml"> 
 
<head> 
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
	<title><?php echo $title; ?> | Avalux Admin</title> 
	
	<?php echo Asset::css('backend/reset.css'); ?>
	<?php echo Asset::css('backend/text.css'); ?>
	<?php echo Asset::css('backend/form.css'); ?>
	<?php echo Asset::css('backend/buttons.css'); ?>
	<?php echo Asset::css('backend/grid.css'); ?>
	<?php echo Asset::css('backend/layout.css'); ?>
	
	<?php echo Asset::css('backend/ui-darkness/jquery-ui-1.8.12.custom.css'); ?>	
	<?php echo Asset::css('backend/plugin/jquery.visualize.css'); ?>
	<?php echo Asset::css('backend/plugin/facebox.css'); ?>
	<?php echo Asset::css('backend/plugin/uniform.default.css'); ?>
	<?php echo Asset::css('backend/plugin/dataTables.css'); ?>
	<?php echo Asset::css('backend/custom.css'); ?>

</head> 
 
<body> 

<div id="wrapper">
	
	<?php echo $content; ?>	
	
</div> <!-- #wrapper -->

	<?php echo Asset::js('backend/jquery/jquery-1.5.2.min.js'); ?>
	<?php echo Asset::js('backend/jquery/jquery-ui-1.8.12.custom.min.js'); ?>
	<?php echo Asset::js('backend/misc/excanvas.min.js'); ?>
	<?php echo Asset::js('backend/jquery/facebox.js'); ?>
	<?php echo Asset::js('backend/jquery/jquery.visualize.js'); ?>
	<?php echo Asset::js('backend/jquery/jquery.dataTables.min.js'); ?>
	<?php echo Asset::js('backend/jquery/jquery.tablesorter.min.js'); ?>
	<?php echo Asset::js('backend/jquery/jquery.uniform.min.js'); ?>
	<?php echo Asset::js('backend/jquery/jquery.placeholder.min.js'); ?>
	<?php echo Asset::js('backend/jquery/jquery.scrollTo-min.js'); ?>
	
	<?php echo Asset::js('backend/widgets.js'); ?>
	<?php echo Asset::js('backend/dashboard.js'); ?>

		
<script type="text/javascript">
function limitChars(textid, limit, infodiv)
{
	var text = $('#'+textid).val();	
	var textlength = text.length;
	
	if(textlength >= (limit - 10)) {
		$('#' + infodiv).addClass('warning');
	}
	if(textlength <= (limit - 11)) {
		$('#' + infodiv).removeClass('warning');
	}
	
	if(textlength > limit)
	{
		$('#' + infodiv).removeClass('warning').addClass('error').html('You cannot write more then '+limit+' characters!');
		$('#'+textid).val(text.substr(0,limit));
		return false;
	}
	else
	{
		$('#' + infodiv).removeClass('error').html('You have '+ (limit - textlength) +' characters left.');
		return true;
	}
}

</script>

<script type="text/javascript">
	
$(document).ready ( function () 
{
	

	$deleteid = "";
	Dashboard.init ();	
	
	//For jQuery
	
	

$.extend({

  getUrlVars: function(){

    var vars = [], hash;

    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

    for(var i = 0; i < hashes.length; i++)

    {

      hash = hashes[i].split('=');

      vars.push(hash[0]);

      vars[hash[0]] = hash[1];

    }

    return vars;

  },

  getUrlVar: function(name){

    return $.getUrlVars()[name];

  }

});

var search = $.getUrlVar('search');


/* $('#example_filter').find('input').val(search); */
$('#example_filter').find('input').val(search).end().trigger('keyup');
$('.searchinput').trigger('keyup');


	
	
	$('.accordion_container').accordion ();
	$('.tab_container').tabs ();
	
	$('.row').mouseenter(function() {
		    $('.options').removeClass('hidden').addClass('shown');
	});
	
	$('.row').mouseleave(function() {
		    $('.options').removeClass('shown').addClass('hidden');
	});
	
	$('a.delete').mouseover(function(){
/* 		    console.log(this.id); */
	});
	
	$('a.delete').click(function(){
			$deleteid = this.id;
			console.log($deleteid);
			
			/* $('.deletetitle').html($deleteid); */
			
			$('.artid').html(
				" " + "<input type='hidden' name='articleid' value='" + $deleteid +  "' />"
			);
			
	});
	
	$('#search_input').focus(function(){
		if(this.value == 'Search Posts'){
			this.value = '';
		}
	});
	
	$('#search_input').blur(function(){
		if(this.value == ''){
			this.value = 'Search Posts';
		}
	});
	
	
	
	
	
	$(function(){
	 <?php 
	 	if(isset($excerptJS)){
	 		echo $excerptJS;
	 	}
	 ?>
	});	
});

</script>

<script type="text/javascript">

$(document).ready ( function () 
{
	
	<?php 
	
		if(isset($js)){
			echo $js;
		}
		
		if(isset($galleryJS)){
			echo $galleryJS;
		}
		
	?>	
});

</script>

</body> 
 
</html>
<!-- Localized -->
<?php 
	echo View::factory('site/sidebar')->render();
?>
<h2 style="color: #C9C9C9;">Get In Touch With Us!</h2>
<p class="excerpt">Feel free to get in touch with us! Fill out the form below to ask us a question, suggest an article, or report a bug.</p>
	<form action="" method="post" id="contact">
		<div class="field">
			<label>Your Name:</label>
			<input type="text" />
		</div>
		
		<div class="field">
			<label>Your Email:</label>
			<input type="text" />
		</div>
		
		<div class="field">
			<label>Message:</label>
			<textarea></textarea>
		</div>
		<br /><br />
		<input type="submit" value="Send Message" />
	</form>
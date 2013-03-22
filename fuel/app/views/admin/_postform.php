<?php echo Form::open(array('class' => 'form label-inline uniform', 'enctype' => 'multipart/form-data')); ?>


	
	<div class="field">
		<label for="ptitle">Post Title</label>
		<?php echo Form::input(array('name' => 'ptitle', 'id' => 'ptitle', 'class' => 'full'), Input::post('ptitle', isset($article) ? $article->articleTitle : '')); ?>
	</div>
	
	<div class="field">
		<label for="pexcerpt">Post Excerpt</label>
		<?php echo Form::textarea(array('name' => 'pexcerpt', 'id' => 'pexcerpt', 'rows' => 3, 'class' => 'full'), Input::post('pexcerpt', isset($article) ? $article->articleExcerpt : '')); ?>
		<p class="field_help" id="charlimitinfo">You have 350 characters left.</p>
	</div>
	
	<div class="field">
		<label for="pbody">Post Body</label>
		<?php echo Form::textarea(array('name' => 'pbody', 'id' => 'pbody', 'rows' => 10, 'class' => 'full'), Input::post('pbody', isset($article) ? $article->articleBody : '')); ?>
	</div>
	
	<div class="field clearfix">								
		<label for="pimage">Post Image</label> 								
		<?php echo Form::input(array('type' => 'file', 'name' => 'pimage', 'id' => 'pimage'), Input::post('pimage', isset($article) ? $article->articleImage : '')); ?>
		<p class="field_help nudge_down"> &nbsp; &nbsp; or <a href="javascript:;">select a file</a> from your library.</p>
	</div>
	
	<div class="field">
		<label for="pcat">Post Category </label>
		
		<?php echo Form::select('pcat', array('name' => 'test', 'id' => 'type', 'class' => 'medium'), array(
		    'gen' => 'General News',
		    'op' => 'Opportunities'
		)); ?>
		
	</div>
	
	
		
	<div class="buttonrow">
		<?php echo Form::submit(array('class' => 'btn', 'value' => 'Submit Post')); ?>
	</div>
		
		
		
		
		

<?php echo Form::close(); ?>
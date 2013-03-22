<!-- <span style="color: #fff;"><?php print_r(Auth::instance()); ?></span> -->

<div id="login">
	<h1>Dashboard</h1>
	<div id="login_panel">
	
	
	
	<?php echo Form::open(array('action' => $base_path .'admin', 'enctype' => 'multipart/form-data')); ?>
		<div class="login_fields">
			<div class="field">
			<span class="error"><?php if(isset($error)){ echo $error; } ?></span>
				<label for="username">Username</label>
				<?php echo Form::input(array('name' => 'username', 'id' => 'username')); ?>
			</div>
			
			<div class="field">
				<label for="password">Password <small><a href="<?php echo $base_path;  ?>admin/recoverpassword">Forgot Password?</a></small></label>
				<?php echo Form::input(array('name' => 'password', 'id' => 'password', 'type' => 'password')); ?>
			</div>
		</div> 
		
		<div class="login_actions">
			<button type="submit" class="btn btn-orange" tabindex="3">Login</button>
			<span class="error">
				<?php 
					if(isset($errors))
					{
						echo $errors;
					}; 
				?>
			</span>
		</div>
		
	<?php echo Form::close(); ?>
	

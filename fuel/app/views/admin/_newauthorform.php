<?php 

		foreach($usergroups as $usergroup){
			$usergroupnames[] = $usergroup['groupName'];
		} 
		
?>
<?php echo Form::open(array('action' => '../../admin/authors/signup', 'class' => 'form author label-inline ', 'enctype' => 'multipart/form-data')); ?>

<div style="float: left; position: absolute;" class="x6">
	<div class="field">
		<label for="uname">Username</label>
		<?php echo Form::input('uname', isset($fields['username']) ? $fields['username'] : '' , array('name' => 'uname', 'id' => 'uname', 'class' => 'medium')); ?>
		
		
		
		<div class="field_help">Not less than 3 or more than 20 characters</div>
	</div>
	
	<div class="field">
		<label for="fname">First Name</label>
		<?php echo Form::input('fname', isset($fields['firstname']) ? $fields['firstname'] : '' ,array('name' => 'fname', 'id' => 'fname', 'class' => 'medium')); ?>
		<div class="field_help">Not less than 3 or more than 20 characters</div>
	</div>
	
	<div class="field">
		<label for="lname">Last Name</label>
		<?php echo Form::input('lname', isset($fields['lastname']) ? $fields['lastname'] : '' ,array('name' => 'lname', 'id' => 'lname', 'class' => 'medium')); ?>
		<div class="field_help">Not less than 3 or more than 20 characters</div>
	</div>
</div>
	

<div style="float: right;" class="x6">
	<div class="field">
		<label for="pword">Password</label>
		<?php echo Form::input('pword', isset($fields['password']) ? $fields['password'] : '' ,array('name' => 'pword', 'id' => 'pword', 'class' => 'medium')); ?>
				<div class="field_help">Not less than 8 or more than 20 characters</div>

	</div>
	
	<div class="field">
		<label for="email">Email</label>
		<?php echo Form::input('email', isset($fields['email']) ? $fields['email'] : '' ,array('name' => 'email', 'id' => 'email', 'class' => 'medium')); ?>
		<div class="field_help">Must be a valid email</div>
	</div>
	
	<div class="field">
		<label for="ugroup">User Group</label>
		<?php echo Form::select("ugroup", array('name' => 'test', 'id' => 'type', 'class' => 'medium'), $usergroupnames) ?>
	</div>
	
	<div class="field buttonrow ">
		<?php echo Form::submit(array('class' => 'btn', 'value' => 'Create Author')); ?>
	</div>
</div>


<?php echo Form::close(); ?>

<div style="clear:both;"></div>
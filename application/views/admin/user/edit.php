<h3><?php echo empty($user->id) ? 'Add a new user' : 'Edit user ' . $user->user_name; ?></h3>

<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>First Name</td>
		<td><?php echo form_input('first_name', set_value('first_name', $user->first_name)); ?></td>
	</tr>
	<tr>
		<td>Middle Name</td>
		<td><?php echo form_input('middle_name', set_value('middle_name', $user->middle_name)); ?></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td><?php echo form_input('last_name', set_value('last_name', $user->last_name)); ?></td>
	</tr>
	<tr>
		<td>User Name</td>
		<td><?php echo form_input('user_name', set_value('user_name', $user->user_name)); ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo form_input('email', set_value('email', $user->email)); ?></td>
	</tr>
	<tr>
		<td>Image</td>
		<td><?php echo form_input('image', set_value('image', $user->image)); ?></td>
	</tr>
	<tr>
		<td>Biography</td>
		<td><?php echo form_textarea('bio', set_value('bio', $user->bio)); ?></td>
	</tr>
	<tr>
		<td>Still with PCIJ?</td>
		<td><?php $options = array('yes' => 'yes', 'no' => 'no'); echo form_dropdown('active', $options, set_value('active', $user->active)); ?></td>
	</tr>
	<tr>
		<td>Access</td>
		<td><?php echo form_dropdown('access', $roles, set_value('access', get_role_id($user->access, 'title')));?></td>
	</tr>


	<tr>
		<td>Password</td>
		<td><?php echo form_password('password'); ?></td>
	</tr>
	<tr>
		<td>Confirm password</td>
		<td><?php echo form_password('password_confirm'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>

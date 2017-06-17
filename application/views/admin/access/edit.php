<h3><?php echo empty($permission->id) ? 'Add a new permission' : 'Edit permission'; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Role</td>
		<td><?php echo form_dropdown('role_id', $roles, set_value('role_id', $permission->role_id),'id="role_id"'); ?></td>
	</tr>
	<tr>
		<td>Action</td>
		<td><?php echo form_dropdown('action_id', $actions, set_value('action_id', $permission->action_id),'id="action_id"')?></td>
	</tr>
	<tr>
		<td>Module</td>
		<td><?php echo form_dropdown('module_id', $modules, set_value('module_id', $permission->module_id),'id="module_id"')?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>

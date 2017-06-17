<h3><?php echo empty($role->id) ? 'Add a new Role' : 'Edit Role'; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Title</td>
		<td><?php echo form_input('title', set_value('title', $role->title)); ?></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><?php echo form_textarea('description', set_value('description', $role->description), 'class="ckeditor"'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>

<spacer type="10" />
<h3><?php echo 'Role: ' . $role->title . ' ' . btn_edit('admin/role/edit/' . $role->id) . btn_delete('admin/role/delete/' . $role->id); ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Title</td>
		<td> <?php echo $role->title ?></td>
	</tr>
	<tr>
		<td>Description</td>
		<td> <?php echo $role->description ?></td>
	</tr>
</table>
<?php echo form_close();?>

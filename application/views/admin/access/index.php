<section>
	<h2>Permissions | <?php echo anchor('admin/role', 'Roles'); ?></h2>
	<?php echo anchor('admin/access/edit', '<i class="icon-plus"></i> Add a Permission'); ?>
	<?php echo anchor('admin/role/edit', '<i class="icon-plus"></i> Add new Role'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Role</th>
				<th>Action</th>
				<th>Module</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($permissions)): foreach($permissions as $permission): ?>
		<tr>
			<td><?php echo anchor('admin/role/view/' . $permission->role_id, get_role($permission->role_id,'title')); ?></td>
			<td><?php echo get_action($permission->action_id,'text'); ?></td>
			<td><?php echo get_module($permission->module_id,'name'); ?></td>
			<td><?php echo btn_edit('admin/access/edit/' . $permission->id); ?></td>
			<td><?php echo btn_delete('admin/access/delete/' . $permission->id); ?></td>
		</tr>

<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any permissions.</td>
		</tr>
<?php endif; ?>
		</tbody>
	</table>
</section>

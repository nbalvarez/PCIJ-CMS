<section>
	<h2><?php echo anchor('admin/access', 'Permissions'); ?> | Roles</h2>
	<?php echo anchor('admin/access/edit', '<i class="icon-plus"></i> Add a Permission'); ?>
	<?php echo anchor('admin/role/edit', '<i class="icon-plus"></i> Add new Role'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Role</th>
				<th>Description</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($roles)): foreach($roles as $role): ?>
		<tr>
			<td><?php echo anchor('admin/role/view/' . $role->id, $role->title); ?></td>
			<td><?php echo $role->description; ?></td>
			<td><?php echo btn_edit('admin/role/edit/' . $role->id); ?></td>
			<td><?php echo btn_delete('admin/role/delete/' . $role->id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any roles.</td>
		</tr>
<?php endif; ?>
		</tbody>
	</table>
</section>

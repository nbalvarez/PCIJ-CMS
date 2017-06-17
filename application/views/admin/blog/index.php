<section>
	<h2>Blogs</h2>
	<h3><?php echo anchor('admin/blog', 'All')?><?php echo $is_editor ? " | " . anchor('admin/blog/submissions', 'Submissions') : "" ;?><?php echo " | " . anchor('admin/blog/published', 'Published');?></h3>
	<?php echo anchor('admin/blog/edit', '<i class="icon-plus"></i> Add a blog'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Pubdate</th>
				<th>Edit</th>
				<?php if($is_editor) { ?>
				<th>Delete</th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>
<?php if(count($blogs)): foreach($blogs as $blog): ?>
		<tr>
			<td><?php echo anchor('admin/blog/edit/' . $blog->id, $blog->title); ?></td>
			<td><?php echo $blog->pubdate; ?></td>
			<td><?php echo btn_edit('admin/blog/edit/' . $blog->id); ?></td>
			<?php if($is_editor) { ?>
			<td><?php echo btn_delete('admin/blog/delete/' . $blog->id); ?></td>
			<?php } ?>
			
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any blogs.</td>
		</tr>
<?php endif; ?>

		</tbody>
	</table>
</section>

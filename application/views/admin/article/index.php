<section>
	<h2>News articles</h2>
	<?php ?>
	<h3><?php echo anchor('admin/article', 'All')?><?php echo $is_editor ? " | " . anchor('admin/article/submissions', 'Submissions') : "" ;?><?php echo " | " . anchor('admin/article/published', 'Published');?></h3>
	<?php echo anchor('admin/article/edit', '<i class="icon-plus"></i> Add an article'); ?>
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
<?php if(count($articles)): foreach($articles as $article): ?>
		<tr>
			<td><?php echo anchor('admin/article/edit/' . $article->id, $article->title); ?></td>
			<td><?php echo $article->pubdate; ?></td>
			<td><?php echo btn_edit('admin/article/edit/' . $article->id); ?></td>
			<?php if($is_editor) { ?>
			<td><?php echo btn_delete('admin/article/delete/' . $article->id); ?></td>
			<?php } ?>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any articles.</td>
		</tr>
<?php endif; ?>

		</tbody>
	</table>
</section>

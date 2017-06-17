<h3>Blog</h3>

<table class="table">
	<tr>
		<td>Publication date</td>
		<td><?php echo $blog->pubdate; ?></td>
	</tr>
	<tr>
		<td>Creation date</td>
		<td><?php echo $blog->created; ?></td>
	</tr>
	<tr>
		<td>Title</td>
		<td><?php echo $blog->title; ?></td>

	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo $blog->slug; ?></td>
	</tr>
	<tr>
		<td>Author</td>
		<td>
			<ul>
				<?php foreach($selected_authors as $author) { ?>
					<li>
					  <?php echo get_user_name($author); ?>
					</li>
				<?php } ?>
			</ul>
		</td>

	</tr>
	<tr>
		<td>Body</td>
		<td><?php echo $blog->body; ?></td>
	</tr>
	<tr>
		<td>Summary</td>
		<td><?php echo $blog->summary; ?></td>
	</tr>
	<tr>
		<td>Prehead </td>
		<td><?php echo $blog->pre_head; ?></td>
	</tr>
	<tr>
		<td>Posthead</td>
		<td><?php echo $blog->post_head; ?></td>
	</tr>
	<tr>
		<td>Tagline name</td>
		<td>
			<ul>
				<?php foreach($selected_tagline_authors as $author) { ?>
					<li>
					    <?php echo get_user_name($author); ?>
					</li>
				<?php } ?>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Tagline</td>
		<td><?php echo $blog->tagline; ?></td>
	</tr>

	<tr>
		<td>Series Indicator</td>
		<td><?php echo $blog->series_indicator; ?></td>
	</tr>
	<tr>
		<td>I-Report Indicator</td>
		<td><?php echo $blog->ireport_indicator; ?></td>
	</tr>
	<tr>
		<td>Tags</td>
		<td>
			<ul>
			<?php foreach($selected_tags as $tag) { ?>
			 <li>
			   	<?php echo get_tag_name($tag); ?>
			 </li>
			<?php } ?>
			</ul>
		</td>
	</tr>
	<?php if ($is_data_staff) { ?>
	<tr>
		<td>Subjects</td>
		<td>
			<ul>
			<?php foreach($selected_subjects as $subject) { ?>
			 <li>
			   	<?php echo get_subject_name($subject); ?>
			 </li>
			<?php } ?>
			</ul>
		</td>
	</tr>
	<?php } ?>




	<tr>
		<td>General Notes</td>
		<td><?php echo $blog->general_notes; ?></td>
	</tr>

  <tr>
    <td>Upload Files</td>
    <td>
	    <ul>
	      <?php foreach($selected_files as $file) { ?>
	  		 <li>
	  		  	<?php echo $file; ?>
	  		 </li>
	  	  <?php } ?>
	  	</ul>
    </td>

  </tr>
  <tr>
    <td>
  		<?php echo anchor('admin/blog', 'Back', array('class' => 'btn btn-primary')); ?>
  	</td>
  </tr>
</table>

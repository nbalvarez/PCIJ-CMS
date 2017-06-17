<h3>Article</h3>

<table class="table">
	<tr>
		<td>Publication date</td>
		<td><?php echo $article->pubdate; ?></td>
	</tr>
	<tr>
		<td>Creation date</td>
		<td><?php echo $article->created; ?></td>
	</tr>
	<tr>
		<td>Prehead Title</td>
		<td><?php echo $article->pre_head; ?></td>
	</tr>
	<tr>
		<td>Posthead Title</td>
		<td><?php echo $article->title; ?></td>

	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo $article->slug; ?></td>
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
		<td><?php echo $article->body; ?></td>
	</tr>
	<tr>
		<td>Summary</td>
		<td><?php echo $article->summary; ?></td>
	</tr>
	
	<!-- <tr>
		<td>Posthead</td>
		<td><?php echo $article->post_head; ?></td>
	</tr> -->
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
		<td><?php echo $article->tagline; ?></td>
	</tr>
	<tr>
		<td>I-Report Indicator</td>
		<td><?php echo $article->ireport_indicator; ?></td>
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
		<td><?php echo $article->general_notes; ?></td>
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
  		<?php echo anchor('admin/article', 'Back', array('class' => 'btn btn-primary')); ?>
  	</td>
  </tr>
</table>

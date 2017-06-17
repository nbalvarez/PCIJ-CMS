<spacer type="10" />
<h3><?php echo 'Details for user: ' . $user->user_name; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Image</td>
		<td> <img src = <?php echo site_url() . "img/" . $user->image; ?> style="width:100px;height:130px" 	/> </td>
	</tr>

	<tr>
		<td>Name</td>
		<td><?php echo  $user->first_name . ' '  . $user->middle_name . ' ' . $user->last_name; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $user->email; ?> </td>
	</tr>
	<tr>
		<td>Biography</td>
		<td><?php echo $user->bio; ?> </td>
	</tr>
		<tr>
		<td>Still connected with PCIJ?</td>


		<td><?php echo $user->active?> </td>

</tr>
	<tr>
		<td>Access Control</td>


		<td><?php echo $user->access ?> </td>

</tr>
</table>
<?php echo form_close();?>

<?php 
	require "process/admin/get_encoder_info.php";
	$user=$_GET['username'];
?>

<div class="section_label">
	<label>Profile</label>
</div>

<div class="section_content">

	<label class="name"><?php echo $name?></label>
	<br/>
	
	<table class="profile_table">
		<tr>
			<td><label>Employee Number</label></td>
			<td><?php echo $encoder_no; ?></td>
		</tr>
	</table>
		
</div>
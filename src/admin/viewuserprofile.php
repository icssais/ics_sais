<?php require "process/admin/get_user_info.php"; ?>

<div class="section_label">
	<label>Profile</label>
</div>

<div class="section_content">
	<label class="name"><?php echo $name?></label>
	<br/>
	<table class="profile_table">
		<tr>
			<td><label>Employee Number</label></td>
			<td><?php echo $empno?></td>
		</tr>
		<tr>
			<td><label>Email Address</label></td>
			<td><?php echo $eadd?></td>
		</tr>	
	</table>
</div>
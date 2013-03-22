<?php require "process/admin/get_profile_info.php"; ?>

<div id="fade">

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
		<tr>
			<td colspan="2" style="text-align: right;">
				<a href="index.php?action=change_password"><input class="simple_submit" type="submit" value="Change password"/></a>
			</td>
		</tr>
	
	</table>
</div>

<div>
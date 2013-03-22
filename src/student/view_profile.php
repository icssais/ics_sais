<?php require "process/student/get_profile_info.php"; ?>

<div class="section_label">
	<label>Profile</label>
</div>

<div class="section_content">

	<label class="name"><?php echo $full?></label>
	<br/>
	<table class="profile_table">
		<tr>
			<td><label>Student Number</label></td>
			<td><?php echo $sno?></td>
		</tr>
		<tr>
			<td><label>Birthday</label></td>
			<td><?php echo $fbdate?></td>
		</tr>
		<tr>
			<td><label>Home Address</label></td>
			<td><?php echo $hadd?></td>
		</tr>
		<tr>
			<td><label>Home Address Contact No.</label></td>
			<td><?php echo $hadd_no?></td>
		</tr>
		<tr>
			<td><label>College Address</label></td>
			<td><?php echo $cadd?></td>
		</tr>
		<tr>
			<td><label>College Address Contact No.</label></td>
			<td><?php echo $cadd_no?></td>
		</tr>
		<tr>
			<td><label>Email Address</label></td>
			<td><?php echo $eadd?></td>
		</tr>
		<tr>
			<td><label>Mobile Number</label></td>
			<td><?php echo $mno?></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: right;">
				<a href="index.php?action=edit_profile"><input class="simple_submit" type="submit" value="Edit"/></a>
				<a href="index.php?action=change_password"><input class="simple_submit" type="submit" value="Change password"/></a>
			</td>
		</tr>
	</table>

</div>
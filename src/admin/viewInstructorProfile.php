<?php 
	require "process/admin/get_instructor_info.php";
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
			<td><?php echo $emp_no; ?></td>
		</tr>
		<tr>
			<td><label>Designation</label></td>
			<td><?php echo $designation; ?></td>
		</tr>
		<tr>
			<td><label>Rank</label></td>
			<td><?php echo $rank; ?></td>
		</tr>
		<tr>
			<td><label>Faculty Room</label></td>
			<td><?php echo $fac_room; ?></td>
		</tr>
		<tr>
			<td><label>Mobile Number</label></td>
			<td><?php echo $mobile_no; ?></td>
		</tr>
	</table>
		
</div>
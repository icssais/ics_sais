<?php require "process/admin/get_student_info.php"; 
	$user=$_GET['username'];
?>

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
	</table>

</div>
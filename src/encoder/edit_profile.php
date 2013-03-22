<?php
	require "includes/connect_db.php";
	
	$username=$_SESSION['username'];
	
	$query2="Select * from encoder Where username='{$username}'";
	$found2=mysql_query($query2, $conn);
	$result2=mysql_fetch_array($found2);
	
	$encoder_no=$result2['encoder_no'];
	$firstname=$result2['firstname'];
	$middlename=$result2['middlename'];
	$lastname=$result2['lastname'];
	
?>
	<div class="section_label">
	<label>Edit Profile</label>
</div>
<div class='section_content'>
	<form method='post' action='process/encoder/edit_profile.php'>
	<table class='profile_table' >
		<tr><td><label>Encoder Number:</label></td><td><input type='text' name='new_encoder_no' value='<?php echo $encoder_no?>'></td></tr>
		<tr><td><label>First Name:</label></td><td><input type='text' name='new_firstname' value='<?php echo $firstname?>'></td></tr>
		<tr><td><label>Middle Name:</label></td><td><input type='text' name='new_middlename' value='<?php echo $middlename?>'></td></tr>
		<tr><td><label>Last Name:</label></td><td><input type='text' name='new_lastname' value='<?php echo $lastname?>'></td></tr>
		<tr><td><input type='submit'></td></tr>
		<tr><td><input type='text' hidden='hidden' name='encoder_no' value='<?php echo $encoder_no?>'></td></tr>
		<tr><td><input type='text' hidden='hidden' name='firstname' value='<?php echo $firstname?>'></td></tr>
		<tr><td><input type='text' hidden='hidden' name='middlename' value='<?php echo $middlename?>'></td></tr>
		<tr><td><input type='text' hidden='hidden' name='lastname' value='<?php echo $lastname?>'></td></tr>
	</table>
	</form>
</div>
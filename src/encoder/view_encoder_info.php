<?php require "process/encoder/get_profile_info.php"; ?>
<html>
	<head>
		<title>ICS SAIS</title>
		<meta charset= "utf-8">
		<script src="js/main.js"></script>
		<link rel='stylesheet' type='text/css' href='style/styles.css'>
	</head>
	<body>
<div class="section_label">
	<label>Add Elective</label>
</div>

<div class="section_label">
	<label>Profile</label>
</div>

<div class="section_content">

	<br/>
	<table class="profile_table">
		<?php
			if(isset($_SESSION['changed'])){
				if($_SESSION['changed']==1){
				echo "<tr><td>Password changed</td></tr>";
				}
				$_SESSION['changed']=-1;
			}
		?>
		<tr>
			<td><label>Encoder Number</label></td>
			<td><?php echo $encoder_no?></td>
		</tr>
		<tr>
			<td><label>First Name</label></td>
			<td><?php echo $firstname?></td>
		</tr>
		<tr>
			<td><label>Middle Name</label></td>
			<td><?php echo $middlename?></td>
		</tr>
		<tr>
			<td><label>Last Name</label></td>
			<td><?php echo $lastname?></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: right;">
				
				<a href="index.php?action=change_password"><input class="simple_submit" type="submit" value="Change password"/></a>
			</td>
		</tr>
	</table>

</div>
</body>
</html>
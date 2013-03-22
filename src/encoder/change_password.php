<?php
	require "includes/connect_db.php";
	
	$username=$_SESSION['username'];
	
	$query="Select * from user Where username='{$username}'";
	$found=mysql_query($query, $conn);
	$result=mysql_fetch_array($found);
	
	$password=$result['password'];
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ICS SAIS</title>
		<meta charset= "utf-8">
		<script src="js/main.js"></script>
		<link rel='stylesheet' type='text/css' href='style/styles.css'>
	</head>
	<body>
	<div class="section_label">
	<label>Change Password</label>
</div>
<div class='section_content'>
	<form method='post' action='process/encoder/change_password.php'>
	<table class='profile_table' >
		<?php
			if(isset($_SESSION['error'])){
				$error=$_SESSION['error'];
				if($error==1) echo"<tr><td>Wrong password</td></tr>";
				else if($error==2) echo"<tr><td colspan=2>New password did not match</td></tr>";
				$_SESSION['error']=-1;
			}
		?>
		<tr><td><label>Current Password:</label></td><td><input autofocus='autofocus' type='password' name='password' ></td></tr>
		<tr><td><label>New Password:</label></td><td><input type='password' name='new_password1' ></td></tr>
		<tr><td><label>Retype Password:</label></td><td><input type='password' name='new_password2' ></td></tr>
		<tr><td><input type='submit'></td></tr>
	</table>
	</form>
</div>
</body>
</html>
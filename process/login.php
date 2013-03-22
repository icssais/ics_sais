<?php
	require "../includes/connect_db.php";
	session_start();
	
	/* Log in */
	
	$username=$_POST['uname'];
	$password=md5($_POST['pwd']);
	
	$query="select * from user where username=\"".$username."\" and password=\"".$password."\"";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	
	if($row!=null){ //username and password match in database
		if($row['approve_disapprove']==0)
			$_SESSION["error_message"]="Your account is pending for approval.";
		else if($row['active']==0)
			$_SESSION["error_message"]="Your account is currently deactivated.";
		else{
			/* log in successful */
			$_SESSION['username']=$username;
			header("Location:../index.php?action=profile");
		}
	}
	else //username or password mismatch in database
		$_SESSION["error_message"]="Invalid username or password";
	
	/* log in not successful */
	if(isset($_SESSION["error_message"]))
		header("Location:../src/login.php");

	mysql_close($conn);
?>
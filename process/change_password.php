<?php
	require "../includes/connect_db.php";
	session_start();
	
	$new_pwd=$_POST["new_pwd"];
	$reenter_new_pwd=$_POST["reenter_new_pwd"];
	$old_pwd=md5($_POST["old_pwd"]);

	/* update password */

	//get read old password
	$query="select password from user where username=\"".$_SESSION["username"]."\"";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	$real_old_pwd=$row["password"];
	
	/* validate password */
	
	if($new_pwd!=$reenter_new_pwd){
		//new passwords did not match
		$_SESSION["not_match"]=true;
		$_SESSION["error_message"]="Passwords did not match.";
	}
	else if($new_pwd==$_SESSION["username"]){
		$_SESSION["same_uname"]=true;
		$_SESSION["error_message"]="Your password cannot be the same as your username.";
	}
	else if($old_pwd!=$real_old_pwd){
		//incorrect old password
		$_SESSION["old_incorrect"]=true;
		$_SESSION["error_message"]="Incorrect old password";
	}
	else if( strlen($new_pwd)< 8 ){
		//password too short
		$_SESSION["too_short"]=true;
		$_SESSION["error_message"]="Password should be 8-15 characters.";
	}
	else{		
		//update password
		$_SESSION["success_message"]="Password successfully changed";
		$query="update user set password=\"".md5($new_pwd)."\" where username=\"".$_SESSION["username"]."\"";
		$found=mysql_query($query,$conn);
	}
	
	mysql_close($conn);
	
	header("Location: ../index.php?action=change_password");
?>
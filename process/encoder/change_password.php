<?php 
	require "../../includes/connect_db.php";
	session_start();
	echo $password=$_POST['password'];
	$new_password1=$_POST['new_password1'];
	$new_password2=$_POST['new_password2'];
	echo $_SESSION['username'];
	$query="Select * from user where username ='{$_SESSION['username']}' and password='{$password}'";
	$found=mysql_query($query,$conn);
	$result=mysql_fetch_array($found);
	
	if($result==null){
		header("Location:../../index.php?action=change_password&error=1");
	}
	else{
		if($new_password1!==$new_password2){
			header("Location:../../index.php?action=change_password&error=2");
		}
		else{
				$query="UPDATE user set password='{$new_password1}' WHERE (username='{$_SESSION['username']}' AND password='{$password}')";
	mysql_query($query,$conn);
	header("Location:../../index.php?action=profile&changed=1");
		}
	}

?>
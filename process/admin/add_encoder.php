<?php
	session_start();

	require "../../includes/connect_db.php";
	
	$encoder_no=$_POST['encoder_no'];
	$firstname=$_POST['fname'];
	$middlename=$_POST['mname'];
	$lastname=$_POST['lname'];
	$fullname=$lastname.", ".$firstname." ".$middlename;
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	$retype_pwd=$_POST['pwd2'];
	
	//error checking
	$query="SELECT * from user WHERE username='$uname'";
	$found=mysql_query($query, $conn);
	$row=mysql_fetch_array($found);

	$error=false;
	
	if($row!=0){
		$error=true;
		$_SESSION['message']='Username Already Taken.';
	}
	else if($pwd!=$retype_pwd){
		$error=true;
		$_SESSION['message']='Passwords did not match.';
	}
	else{
		//add to encoder table
		$query="insert into encoder values ('{$encoder_no}', '{$fullname}', '{$uname}')";
		mysql_query($query,$conn);
		
		//add to user table
		$query="insert into user values('{$uname}', '{$pwd}', 'Encoder', 1, 1)";
		$found=mysql_query($query,$conn);
		if($found){
			$_SESSION['message']='User Account Added.';
		}
	}
	mysql_close($conn);

	header("Location: ../../index.php?action=adduser");
?>
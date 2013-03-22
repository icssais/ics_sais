<?php
	include "../includes/connect_db.php";
	session_start();

	$subject = $_POST['subject'] ;
	$message = $_POST['message'] ;
	
	$query="select role from user where username='{$_SESSION['username']}'";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	$role=$row["role"];
	
	if($role=='Student'){
	
		$query="select * from admin";
		$found=mysql_query($query,$conn);
		$row=mysql_fetch_array($found);
		
			$to=$row["username"];
			$from=$_SESSION["username"];
			
		$query="INSERT INTO inbox VALUES (NULL, '{$to}','{$from}', '{$message}', '{$subject}', current_date(),current_time())";
		mysql_query($query,$conn);
		$query2="INSERT INTO log_activities VALUES ('{$_SESSION['username']}',current_date(),current_time(),'Sent message to Admin')";
		mysql_query($query2, $conn);
		header("Location: ../index.php?action=sent");
	
	}
	else if($role=='Admin'){

			$from='Admin';
			$to=$_POST['recipient'] ;
			
		$query="INSERT INTO inbox VALUES (NULL, '{$to}','{$from}', '{$message}', '{$subject}')";
		mysql_query($query,$conn);
		$query2="INSERT INTO log_activities VALUES ('Admin',current_date(),current_time(),'Sent message to {$username}')";
		mysql_query($query2, $conn);
	
		header("Location: ../index.php?action=sent");
	}
	
	mysql_close($conn);
?>
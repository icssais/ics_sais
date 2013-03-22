<?php
	include "../../includes/connect_db.php";
	session_start();
	
	if (isset($_POST['activateAll'])) {
		$query="UPDATE user SET active=1 WHERE role!='Admin'";
		$query2="INSERT INTO log_activities VALUES ('Admin',current_date(),current_time(),'Activated all users.')";
		$found=mysql_query($query, $conn);
		mysql_query($query2, $conn);
		if($found){
			$_SESSION['message']='All accounts activated.';
		}
	}
	
	else if(isset($_POST['deactivateAll'])) {
		$query="UPDATE user SET active=0 WHERE role!='Admin'";
		$query2="INSERT INTO log_activities VALUES ('Admin',current_date(),current_time(),'Dectivated all users.')";
		$found=mysql_query($query, $conn);
		mysql_query($query2, $conn);
		if($found){
			$_SESSION['message']='All accounts deactivated.';
		}
	}
	
	else if(isset($_POST['activateStudents'])) {
		$query="UPDATE user SET active=1 WHERE role='Student'";
		$query2="INSERT INTO log_activities VALUES ('Admin',current_date(),current_time(),'Activated all student accounts.')";
		$found=mysql_query($query, $conn);
		mysql_query($query2, $conn);
		if($found){
			$_SESSION['message']='All student accounts activated.';
		}
	}
	
	else if(isset($_POST['deactivateStudents'])) {
		$query="UPDATE user SET active=0 WHERE role='Student'";
		$query2="INSERT INTO log_activities VALUES ('Admin',current_date(),current_time(),'Deactivated all student accounts.')";
		$found=mysql_query($query, $conn);
		mysql_query($query2, $conn);
		if($found){
			$_SESSION['message']='All student accounts deactivated.';
		}
	}
	
	else if(isset($_POST['activateInstructors'])) {
		$query="UPDATE user SET active=1 WHERE role='Instructor'";
		$query2="INSERT INTO log_activities VALUES ('Admin',current_date(),current_time(),'Activated all instructor accounts.')";
		$found=mysql_query($query, $conn);
		mysql_query($query2, $conn);
		if($found){
			$_SESSION['message']='All instructor accounts activated.';
		}
	}
	
	else if(isset($_POST['deactivateInstructors'])) {
		$query="UPDATE user SET active=0 WHERE role='Instructor'";
		$query2="INSERT INTO log_activities VALUES ('Admin',current_date(),current_time(),'Deactivated all instructor accounts.')";
		$found=mysql_query($query, $conn);
		mysql_query($query2, $conn);
		if($found){
			$_SESSION['message']='All instructor accounts deactivated.';
		}
	}
	
	else if(isset($_POST['activateEncoders'])) {
		$query="UPDATE user SET active=1 WHERE role='Encoder'";
		$query2="INSERT INTO log_activities VALUES ('Admin',current_date(),current_time(),'Activated all encoder accounts.')";
		$found=mysql_query($query, $conn);
		mysql_query($query2, $conn);
		if($found){
			$_SESSION['message']='All encoder accounts activated.';
		}
	}
	
	else if(isset($_POST['deactivateEncoders'])) {
		$query="UPDATE user SET active=0 WHERE role='Encoder'";
		$query2="INSERT INTO log_activities VALUES ('Admin',current_date(),current_time(),'Deactivated all encoder accounts.')";
		$found=mysql_query($query, $conn);
		mysql_query($query2, $conn);
		if($found){
			$_SESSION['message']='All encoder accounts deactivated.';
		}
	}
	
	else if(isset($_POST['activate'])) {
		$username=$_POST['username'];
		//error checking
		$query="SELECT * from user WHERE username='$username' and role!='Admin'";
		$found=mysql_query($query, $conn);
		$row=mysql_fetch_array($found);
		
		if($row!=0){
			$query="UPDATE user SET active=1 WHERE username='$username'";
			$query2="INSERT INTO log_activities VALUES ('Admin',current_date(),current_time(),'Activated user: $username.')";
			$found=mysql_query($query, $conn);
			mysql_query($query2, $conn);
			if($found){
				$_SESSION['message']= 'User: ' . $username . ' activated.';
			}
		}
		else{
			$_SESSION['error_message']= 'User: ' . $username . ' does not exists.';
		}
	}
	
	else if(isset($_POST['deactivate'])) {
		$username=$_POST['username'];
		//error checking
		$query="SELECT * from user WHERE username='$username' and role!='Admin'";
		$found=mysql_query($query, $conn);
		$row=mysql_fetch_array($found);
		if($row!=0){
			$query="UPDATE user SET active=0 WHERE username='$username'";
			$query2="INSERT INTO log_activities VALUES ('Admin',current_date(),current_time(),'Deactivated user: $username.')";
			$found=mysql_query($query, $conn);
			mysql_query($query2, $conn);
			if($found){
				$_SESSION['message']= 'User: ' . $username . ' deactivated.';
			}
		}
		else{
			$_SESSION['error_message']= 'User: ' . $username . ' does not exists.';
		}
	}
	
	header("Location: ../../index.php?action=act_deact");
?>
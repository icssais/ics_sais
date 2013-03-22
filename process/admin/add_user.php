<?php
	include "../include/connect_db.php";
	session_start();
	
	$firstname=$_POST['fname'];
	$middlename=$_POST['mname'];
	$lastname=$_POST['lname'];
	$fullname=$lastname." ".$firstname." ".$middlename;
	$studentempno=$_POST['student_emp_no'];
	$birthdate=$_POST['bday'];
	$home_add=$_POST['homeadd'];
	$college_add=$_POST['collegeadd'];
	$eadd=$_POST['email'];
	$eadd2=$_POST['email2'];
	
	$username=$_POST['uname'];
	$password=$_POST['pwd'];
	$password2=$_POST['pwd2'];
	$role=$_POST['role'];
	
	$success=0;
	
	$query="SELECT * from user";
	$found=mysql_query($query, $conn);
	
	$success=0;
	
	while($row=mysql_fetch_array($found)){
		if($row['username']==$username or $row==NULL){
			echo 'may kaparehas';
			break;
				//header("Location:../index.php");
		}else{
			if($eadd!=$eadd2){
				echo 'Email addresses did not match!';
			}
			if($password!=$password2){
				echo 'Passwords did not match!';
			}
			else{	
				$query1="INSERT INTO user VALUES ('{$username}','{$password}', '{$role}', '1', '0')";
				if($role=="Student")
					$query2="INSERT INTO student VALUES ('{$studentempno}', '{$lastname}', '{$firstname}', '{$middlename}', '{$home_add}', '', '{$college_add}', '', '1', '{$eadd}', '{$username}', '{$birthdate}')";
				else if($role=="Instructor")
					$query2="INSERT INTO instructor VALUES ('{$studentempno}', '{$fullname}', '', '', '', '', '{$username}')";
				else if($role=="Encoder")
					$query2="INSERT INTO encoder VALUES ('{$studentempno}', '{$fullname}', '{$username}')";
				
				mysql_query($query1,$conn);
				$found2=mysql_query($query2,$conn);
				
			}
		}
	}

	if($found2){
		$query3="INSERT INTO log_activities VALUES ('Admin',current_date(),current_time(),'Added new user: $username.')";
		mysql_query($query3,$conn);
	}
?>
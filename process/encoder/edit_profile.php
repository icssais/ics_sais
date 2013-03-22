<?php 
	require "../../includes/connect_db.php";
	
	$encoder_no=$_POST['encoder_no'];
	$firstname=$_POST['firstname'];
	$middlename=$_POST['middlename'];
	$lastname=$_POST['lastname'];
	
	$new_encoder_no=$_POST['new_encoder_no'];
	$new_firstname=$_POST['new_firstname'];
	$new_middlename=$_POST['new_middlename'];
	$new_lastname=$_POST['new_lastname'];
	
	$query="UPDATE encoder set encoder_no='{$new_encoder_no}', firstname='{$new_firstname}', middlename='{$new_middlename}', lastname='{$new_lastname}' WHERE (encoder_no='{$encoder_no}')";
	mysql_query($query,$conn);
	header("Location:../../index.php?action=profile");
?>
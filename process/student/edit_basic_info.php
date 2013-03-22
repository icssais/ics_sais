<?php
	require "../../includes/connect_db.php";
	session_start();
	
	if(isset($_POST["cancel"]))
		header("Location: ../../index.php?action=profile");
	else if(isset($_POST["save"])){
		
		$h_add=$_POST["h_add"];
		$h_add_no=$_POST["h_add_no"];
		$c_add=$_POST["c_add"];
		$c_add_no=$_POST["c_add_no"];
		$eadd=$_POST["eadd"];
		$mob_no=$_POST["mob_no"];
		
		//inserting
		
		if($mob_no==null)
			$mob_no_q="mobile_no=NULL";
		else
			$mob_no_q="mobile_no=\"".$mob_no."\"";
		
		if($h_add_no==null)
			$h_add_no_q="home_add_no=NULL";
		else
			$h_add_no_q="home_add_no=\"".$h_add_no."\"";
		
		if($c_add==null)
			$c_add_q="college_add=NULL";
		else
			$c_add_q="college_add=\"".$c_add."\"";
		
		if($c_add_no==null)
			$c_add_no_q="college_add_no=NULL";
		else
			$c_add_no_q="college_add_no=\"".$c_add_no."\"";
		
		if($mob_no==null)
			$mob_no_q="mobile_no=NULL";
		else
			$mob_no_q="mobile_no=\"".$mob_no."\"";
	
		$query="update student set home_add=\"{$h_add}\", {$h_add_no_q}, {$c_add_q}, {$c_add_no_q}, {$mob_no_q}, email_add=\"{$eadd}\"  where username=\"{$_SESSION["username"]}\"";
		$query2="INSERT INTO log_activities VALUES ('{$_SESSION['username']}',current_date(),current_time(),'Updated basic info')";
		mysql_query($query, $conn);
		mysql_query($query2,$conn);
	
	}
	mysql_close($conn);
	
	header("Location: ../../index.php?action=profile");
?>
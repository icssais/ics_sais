<?php
	require "../../includes/connect_db.php";
	session_start();
	$mob_no=$_POST["mob_no"];
	
	/* update instructor basic information */
	
	$query="update instructor set mobile_no=\"".$mob_no."\"  where username=\"".$_SESSION["username"]."\"";
	mysql_query($query,$conn);
	
	mysql_close($conn);
	
	$_SESSION["mob_updated"]="Mobile number updated";
	
	header("Location: ../../index.php?action=profile");
?>
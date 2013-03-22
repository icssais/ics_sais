<?php
	session_start();

	if(!isset($_SESSION['username'])){
		header("Location:src/login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<title>ICS SAIS</title>

	<link rel="icon" type="image/x-icon" href="icon.ico" />
	<link rel="stylesheet" type="text/css" href="style/styles.css" media="screen" />
	<script src="style/js/jquery-1.9.1.js"></script>
	<script src="style/js/main.js"></script>

</head>
    <body>
		<div id="container">
			<?php
				include('includes/header.php');
				include('includes/middle.php');
				include('includes/footer.php');
			?>
		</div> 
    </body>
</html>
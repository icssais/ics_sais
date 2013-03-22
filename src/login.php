<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

<head>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	
	<link rel="stylesheet" type="text/css" href="../style/styles.css" media="screen" />
	<script type="text/javascript" href="../style/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" href="../style/first.js"></script>
	
	
	<title>Log in</title>

</head>

<div id="login_notif">
	<br/><br/><br/>
	<?php
		if(isset($_SESSION['error_message'])){
			echo "<label class='alert'>{$_SESSION['error_message']}</label>";
			unset($_SESSION['error_message']);
		}
	?>
</div>

<div id="login_box">
	<div id="login_header"></div>
	<div id="login_div">
		<form action="../process/login.php" method="post">
			<table id="login_table">
				<tr>
					<td><label for="uname">Username</label></td>
					<td><input id="uname" name="uname" type="text" maxlength='15' required="required"/></td>
				</tr>
				<tr>
					<td><label for="pwd">Password </label></td>
					<td><input id="pwd" name="pwd" type="password" maxlength='15' required="required"/></td>
				</tr>
				<tr>
					<td align="left" colspan="2" style="text-align: center;"><input class="submit" name="submit" type="submit" value="Log in"/></td>
				</tr>
			</table>
		</form>
		<div style="float: left; width: 95%; text-align: right; margin-top: 60px;"><label class="link">No account yet?</label> <a href="signup.php"><label class="link">Sign up here!</label></a></div>
		
	</div>
</div>

</html>
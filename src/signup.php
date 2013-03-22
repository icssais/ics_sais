<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

<head>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	
	<link rel="stylesheet" type="text/css" href="../style/styles.css" media="screen" />
	
	<title>Sign up</title>

</head>

<div id="signup_box">
	<div id="signup_header"></div>
	
	<div id="signup_div">
		<form action="../process/signup.php" method="post">
			<table id="signup_table">
				<tr>
					<td> <label for="student_no">Student Number</label> </td>
					<td> <input id="student_no" name="student_no" type="text" placeholder="XXXX-YYYYY" pattern='[0-9]{4}-[0-9]{5}' required="required"/></td>
				</tr>
				<tr>
					<td> <label for="email">E-mail</label> </td>
					<td> <input id="email" name="email" type="email" required="required"/> </td>
				</tr>
				<tr>
					<td> <label for="reenter_email">Re-enter e-mail</label> </td>
					<td> <input id="reenter_email" name="reenter_email" type="email" required="required"/> </td>
				</tr>
				<tr>
					<td> <label for="uname">Username</label> </td>
					<td> <input id="uname" name="uname" type="text" required="required"/> </td>
				</tr>
				<tr>
					<td> <label for="pwd">Password</label> </td>
					<td> <input id="pwd" name="pwd" type="password" required="required"/> </td>
				</tr>
				<tr>
					<td> <label for="retype_pwd">Retype Password</label> </td>
					<td> <input id="retype_pwd" name="retype_pwd" type="password" required="required"/> </td>
				</tr>
				<tr>
					<td align="left" colspan="2" style="text-align: center;"><input class="submit" name="submit" type="submit" value="Sign up"/></td>
				</tr>
			</table>
		</form>
	</div>
</div>
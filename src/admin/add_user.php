<div id="fade">

<div class="section_label">
	<label>Add User</label>
</div>
	
<div class="section_content" id="addUser_section">
	<div id="notification">
		<h3 id="alert">
			<?php
				if (isset($_SESSION['message'])) {
					echo $_SESSION['message'];
					unset($_SESSION['message']);
				}
			?>
		</h3>
	</div>
	<div class="section_label" id="add_student">
		<label>Student</label>
	</div>
	<form action="process/admin/add_student.php" method="post" id="addStudent">
		<table style="margin-left:50px;">
			<tr><td><br /></td></tr>
			<tr>
				<td> <label>Student Number:</label> </td>
				<td> <input class="add_user" name="student_no" type="text" required="required" pattern='[0-9]{4}-[0-9]{5}' /></td>
			</tr>
			<tr>
				<td> <label>E-mail:</label> </td>
				<td> <input class="add_user" name="email" type="email" required="required"/> </td>
			</tr>
			<tr>
				<td> <label>Re-enter e-mail:</label> </td>
				<td> <input class="add_user" name="email2" type="email" required="required"/> </td>
			</tr>
			<tr>
				<td> <label>Username:</label> </td>
				<td> <input class="add_user" name="uname" type="text" required="required" pattern='.{6,20}'/> </td>
			</tr>
			<tr>
				<td> <label>Password:</label> </td>
				<td> <input class="add_user" name="pwd" type="password" required="required" pattern='.{8,30}'/> </td>
			</tr>
			<tr>
				<td> <label>Retype Password:</label> </td>
				<td> <input class="add_user" name="pwd2" type="password" required="required" pattern='.{8,30}'/> </td>
			</tr>
			<tr style="text-align:center;">
				<td colspan="2"> <input class="submit" name="submit" type="submit" value="Add Student"/> </td>
			</tr>
			<tr><td><br /></td></tr>
		</table>
	</form>
	<div class="section_label" id="add_instructor">
		<label>Instructor</label>
	</div>
	<form action="process/admin/add_instructor.php" method="post" id="addInstructor">
		<table style="margin-left:50px;">
			<tr><td><br /></td></tr>
			<tr>
				<td> <label>Employee Number:</label> </td>
				<td> <input class="add_user" name="emp_no" type="text" required="required" pattern='[0-9]{10}' /></td>
			</tr>
			<tr>
				<td> <label>Username:</label> </td>
				<td> <input class="add_user" name="uname" type="text" required="required" pattern='.{6,20}'/> </td>
			</tr>
			<tr>
				<td> <label>Password:</label> </td>
				<td> <input class="add_user" name="pwd" type="password" required="required" pattern='.{8,30}'/> </td>
			</tr>
			<tr>
				<td> <label>Retype Password:</label> </td>
				<td> <input class="add_user" name="pwd2" type="password" required="required" pattern='.{8,30}'/> </td>
			</tr>
			<tr style="text-align:center;">
				<td colspan="2"> <input class="submit" name="submit" type="submit" value="Add Instructor"/> </td>
			</tr>
			<tr><td><br /></td></tr>
		</table>
	</form>
	<div class="section_label" id="add_encoder">
		<label>Encoder</label>
	</div>
	<form action="process/admin/add_encoder.php" method="post" id="addEncoder">
		<table style="margin-left:50px;">
			<tr><td><br /></td></tr>
			<tr>
				<td> <label>Encoder Number:</label> </td>
				<td> <input class="add_user" name="encoder_no" type="text" required="required" pattern='[0-9]{10}' /></td>
			</tr>
			<tr>
				<td> <label>First Name:</label> </td>
				<td> <input class="add_user" name="fname" type="text" required="required"/> </td>
			</tr>
			<tr>
				<td> <label>Middle Name:</label> </td>
				<td> <input class="add_user" name="mname" type="text"/> </td>
			</tr>
			<tr>
				<td> <label>Last Name:</label> </td>
				<td> <input class="add_user" name="lname" type="text" required="required"/> </td>
			</tr>
			<tr>
				<td> <label>Username:</label> </td>
				<td> <input class="add_user" name="uname" type="text" required="required" pattern='.{6,20}'/> </td>
			</tr>
			<tr>
				<td> <label>Password:</label> </td>
				<td> <input class="add_user" name="pwd" type="password" required="required" pattern='.{8,30}'/> </td>
			</tr>
			<tr>
				<td> <label>Retype Password:</label> </td>
				<td> <input class="add_user" name="pwd2" type="password" required="required" pattern='.{8,30}'/> </td>
			</tr>
			<tr style="text-align:center;">
				<td colspan="2"> <input class="submit" name="submit" type="submit" value="Add Encoder"/> </td>
			</tr>
			<tr><td><br /></td></tr>
		</table>
	</form>
</div>

</div>
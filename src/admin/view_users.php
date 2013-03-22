<?php include "includes/connect_db.php"; ?>

<div class="section_label">
	<label>View Users</label>
</div>
	
<div class="section_content" id="viewUser_section">
	<div id="view_student">
		<br/>
		<a class='simple_submit' href="index.php?action=viewStudents">Student</a>
	</div>
	<div>
		<br/>
		<a class='simple_submit' href="index.php?action=viewInstructors">Instructor</a>
	</div>
	<div>
		<br/>
		<a class='simple_submit' href="index.php?action=viewEncoders">Encoder</a>
	</div>
</div>
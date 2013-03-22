<!DOCTYPE html>
<html>
	<head>
		<title>ICS SAIS</title>
		<meta charset= "utf-8">
		<script src="js/main.js"></script>
		<link rel='stylesheet' type='text/css' href='style/styles.css'>
	</head>
	<body>
		<div class="section_label">
	<label>Add Subject</label>
</div>
		<div class="section_content">
	
			<fieldset class="form_field">
				<?php
					
					if(isset($_SESSION['stud_num'])){
					require "includes/connect_db.php";
						$query="SELECT name from student where student_no='{$_SESSION['stud_num']}'";
						$found=mysql_query($query,$conn);
						echo $found;
					}
					
					
				?>
				
				<?php
					echo "<form method='post' action='index.php?action=view_subjects' >
						<input type='text' hidden='hidden' name='stud_num' value='{$_SESSION['stud_num']}'>
							<input type='submit' value='View Subjects'>
					";
					echo "</form>";
				?>

			<?php
			//require "includes/connect_db.php";
			if(isset($_SESSION['stud_num'])){
				
				$stud_num=$_SESSION['stud_num'];
				unset($_SESSION['stud_num']);
				$query="SELECT * from student where student_no='{$stud_num}'";
				$found=mysql_query($query, $conn);
				$row=mysql_fetch_array($found);
				if($row==NULL){
					echo "No records";
				}
				else{
					
				echo "
					<table style='border: 1px solid;'>
					
					<th>Name: {$row['lastname']}, {$row['firstname']} {$row['middlename']}
					</th>
					<tr>
					<th>Add Subject</th></tr>
					<form name='addSubject' method='post' action='process/encoder/add_acad_info.php?stud_num={$stud_num}'>
				";
				echo"
					<tr><td>Course number:</td><td>
						<select name='course_no'>
							<optgroup label='Major'>
					";
				$query="Select * from subject where subject_type='Major'";
				$found=mysql_query($query,$conn);
				while($subjects=mysql_fetch_array($found)){
					echo"
					<option value='{$subjects['course_no']}'>{$subjects['course_no']}</option>
					";
					}
					
				echo"<optgroup label='GE(MST)'>";
				$query="Select * from subject where subject_type='GE(MST)'";
				$found=mysql_query($query,$conn);
				while($subjects=mysql_fetch_array($found)){
					echo"
					<option value='{$subjects['course_no']}'>{$subjects['course_no']}</option>
					";
					}
					
					echo"<optgroup label='GE(SSP)'>";
				$query="Select * from subject where subject_type='GE(SSP)'";
				$found=mysql_query($query,$conn);
				while($subjects=mysql_fetch_array($found)){
					echo"
					<option value='{$subjects['course_no']}'>{$subjects['course_no']}</option>
					";
					}
					
				echo"<optgroup label='GE(AH)'>";
				$query="Select * from subject where subject_type='GE(AH)'";
				$found=mysql_query($query,$conn);
				while($subjects=mysql_fetch_array($found)){
					echo"
					<option value='{$subjects['course_no']}'>{$subjects['course_no']}</option>
					";
					}
					
				
				echo"
					<tr>
					<td><label>Registered/Taken?</label></td>
					<td><input type='checkbox' id='taken' name='taken' onChange='disableBelow()'><div id='promptAlert' style='color:#0000ff'>Save as Approved Subject only</div></td>
					</tr>
						</select>
					</td></tr>
					";
				echo"
					<tr><td>Sem taken:</td> 
					<td><input type='radio' value='1st' name='sem_taken' checked='checked' disabled='disabled'/>1st sem
					<input type='radio' value='2nd' name='sem_taken' disabled='disabled'/ >2nd sem
					<input type='radio' value='Summer' name='sem_taken' disabled='disabled'/>Summer</td ></tr>
					<tr><td>Year taken:</td> <td><input type='text' name='year_taken' disabled='disabled' onempty='enter year'></td></tr>
					<tr><td>Lecture Section:</td> <td><input type='text' name='lect_section' disabled='disabled'></td></tr>
					<tr><td>Laboratory Section:</td> <td><input type='text' name='lab_section'disabled='disabled'></td></tr>
					<tr><td>Recit Section:</td> <td><input type='text' name='recit_section' disabled='disabled'></td></tr>
					<tr><td>Grade:</td> <td>Grade: 
						<select name='grade' disabled='disabled'>
							<option value='1.0'>1.0</option>
							<option value='1.25'>1.25</option>
							<option value='1.5'>1.5</option>
							<option value='1.75'>1.75</option>
							<option value='2.0'>2.0</option>
							<option value='2.25'>2.25</option>
							<option value='2.5'>2.5</option>
							<option value='2.75'>2.75</option>
							<option value='3.0'>3.0</option>
							<option value='4.0'>4.0</option>
							<option value='5.0'>5.0</option>
							<option value='INC'>INC</option>
							<option value='DRP'>DRP</option>
							<option value='S'>Satisfactory</option>
							<option value='U'>Unsatisfactory</option>
							<option value='REGD'>Registered</option>
						</select></td></tr>
					<tr><td><input type='submit'/></td>
					</form>
				";
				echo "<form method='post' action='index.php?action=view_subjects&request=view_list_subjects' >
																<td><input type='submit' value='Cancel'></td></tr>
																<td><input type='text' hidden='hidden' name='stud_num' value='{$stud_num}'></td>
															";
															echo "</form>";
				if(isset($_SESSION['error'])){
					$error=$_SESSION['error'];
					if($error==-1){
						echo "<tr><td>Error: Subject not added</td></tr>";
					}
					else if($error==0){
						echo "<tr><td>Error: Subject not added</td></tr>";
					}
					else if($error==1){
						echo "<tr><td>Error: Wrong lab section</td></tr>";
					}
					else if($error==2){
						echo "<tr><td>Error: Wrong recit section</td></tr>";
					}
					else if($error==3){
						echo "<tr><td>Error: lab or recit section required</td></tr>";
					}
					unset($_SESSION['error']);
				}
				echo "
					</table>
				";
				}
			}
			
			if(isset($_GET['stud_num']) && isset($_GET['success'])){
				$stud_num=$_GET['stud_num'];
				$course_no=$_GET['course_no'];
				
				$query="SELECT * from student_sem_history_subject WHERE student_no='{$stud_num}' AND course_no='{$course_no}'";
				$found=mysql_query($query, $conn);
				$row=mysql_fetch_array($found);
				
				$query1="SELECT * from student WHERE student_no='{$stud_num}'";
				$found1=mysql_query($query1, $conn);
				$row1=mysql_fetch_array($found1);
				
				echo "<table> <th>Added</th>";
				echo "<tr><td>Name: {$row1['lastname']},{$row1['firstname']} {$row1['middlename']}<td></tr>";
				echo "<tr><td>Student No: {$row['student_no']}</td></tr>";
				echo "<tr><td>Course No: {$row['course_no']}</td></tr>";
				echo "<tr><td>Sem taken: {$row['sem']}</td></tr>";
				echo "<tr><td>Year taken: {$row['year']}</td></tr>";
				echo "<tr><td>Lecture Section: {$row['lec_section']}</td></tr>";
				echo "<tr><td>Lab Section: {$row['lab_section']}</td></tr>";
				echo "<tr><td>Recit Section: {$row['recit_section']}</td></tr>";
				echo "<tr><td>Grade: {$row['grade']}</td></tr>";
			}
			?>
			</fieldset>
		</div>
	</body>
</html>
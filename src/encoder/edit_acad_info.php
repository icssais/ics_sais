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
	<label>EDIT ACADEMIC INFORMATION</label>
</div>
<div class="section_content">
<?php
	include "includes/connect_db.php";
	
	$stud_num=$_SESSION['stud_num'];
	$course_no=$_SESSION['course_no'];
	$sem=$_SESSION['sem'];
	$year=$_SESSION['year'];
	$lec_section=$_SESSION['lec_section'];
	$grade=$_SESSION['grade'];
	
	$query="Select * from student_sem_history_subject WHERE student_no='{$stud_num}' AND course_no='{$course_no}' AND sem='{$sem}' AND year='{$year}' AND lec_section='{$lec_section}' AND grade='{$grade}'";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	?>
	<?php 
		if($row!=null){
		echo "<form method='post' action='process/encoder/edit_acad_info.php'>";
		echo "<table>";
		echo "<tr><td><input type='text' name='stud_num' value='{$row['student_no']}' hidden='hidden'/></td></tr>";
		echo "<tr><td><input type='text' name='prev_course_no' value='{$row['course_no']}' hidden='hidden'/></td></tr>";
		echo "<tr><td><input type='text' name='prev_sem' value='{$row['sem']}' hidden='hidden'/></td></tr>";
		echo "<tr><td><input type='text' name='prev_year' value='{$row['year']}' hidden='hidden'/></td></tr>";
		echo "<tr><td><input type='text' name='prev_lec_section' value='{$row['lec_section']}' hidden='hidden'/></td></tr>";
		echo "<tr><td><input type='text' name='prev_grade' value='{$row['grade']}' hidden='hidden'/></td></tr>";
		echo "<tr><td><input type='text' name='course_no' value='{$row['course_no']}' hidden='hidden'></td></tr>";
		echo "<tr><td>Course Number: {$row['course_no']}</td></tr>";
		echo "<tr><td>Semester taken";
		if($row['sem']=='1st') echo "<input type='radio' name='sem' value='1st' checked='checked'>1st";
		else echo "<input type='radio' name='sem' value='1st'>1st";
		
		if($row['sem']=='2nd') echo "<input type='radio' name='sem' value='2nd' checked='checked'>2nd";
		else echo "<input type='radio' name='sem' value='2nd'>2nd";
		
		if($row['sem']=='Summer') echo "<input type='radio' name='sem' value='Summer' checked='checked'>Summer";
		else echo "<input type='radio' name='sem' value='Summer'>Summer";
		echo "</td></tr>";
		echo "<tr><td>Year taken:<input type='text' min='1994' name='year' value='{$row['year']}'></td></tr>";
		echo "<tr><td>Lecture Section:<input type='text' name='lec_section' value='{$row['lec_section']}'></td></tr>";
		if($row['lab_section']=="")echo "<tr><td>Laboratory Section:<input type='text' name='lab_section' disabled='disabled' value='{$row['lab_section']}'></td></tr>";
		else {
			echo "<tr><td>Laboratory Section:<input type='text' name='lab_section' value='{$row['lab_section']}'></td></tr>";
		}
		echo "<tr><td><input type='text' name='prev_lab_section' value='{$row['lab_section']}' hidden='hidden'></td></tr>";
			
		if($row['recit_section']=="")echo "<tr><td>Recit Section:<input type='text' name='recit_section' value='{$row['recit_section']}' disabled='disabled'></td></tr>";
		else {
			echo "<tr><td>Recit Section:<input type='text' name='recit_section' value='{$row['recit_section']}' ></td></tr>";
		}
		echo "<tr><td><input type='text' name='prev_recit_section' value='{$row['recit_section']}' hidden='hidden'></td></tr>";
		echo "<tr><td>Grade: 
			<select name='grade'>
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
			</select>
		</td></tr>";
		echo "<tr><td><input type='submit'/></td><td><a href='index.php?action=view_subjects'>Cancel</a></td></tr>";
		if(isset($_SESSION['error'])){
			$error=$_SESSION['error'];
			if($error==1) echo "<tr><td>Error: 1</td></tr>";
			if($error==2) echo "<tr><td>Error: 2</td></tr>";
			if($error==3) echo "<tr><td>Error: 3</td></tr>";
			unset($_SESSION['error']);
		}
			echo "</table>";
	echo "</form>";
		}
	
	else header("Location:index.php?action=view_subjects");
	
?>
</div>
</body>
</html>
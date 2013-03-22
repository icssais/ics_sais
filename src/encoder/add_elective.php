<?php
	require"includes/connect_db.php";
	
	$stud_num=$_SESSION['stud_num'];
	
	?>
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
	<label>Add Elective</label>
</div>

<div class="section_content">

	<form name='addElective' method='post' action='process/encoder/add_elective.php'>
	<table class="profile_table">
		<tr>
			<td><label>Course_no</label></td>
			<td><select name='course_no'>
			<?php
				$query="Select * from subject WHERE subject_type='Elective'";
				$found=mysql_query($query, $conn);
				while($row=mysql_fetch_array($found)){
					echo "<option value='{$row['course_no']}'>{$row['course_no']}</option>";
				}
			?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label>Registered/Taken?</label></td>
			<td><input type='checkbox' id='taken' name='taken' onChange='disableBelowE()'><div id='promptAlert' style='color:#0000ff'>Save as Approved Elective only</div></td>
		</tr>
		<tr>
			<td><label>Sem</label></td> 
			<td><input type='radio' name='sem' value='1st' checked='checked' disabled='disabled'>1st
					<input type='radio' name='sem' value='2nd' disabled='disabled'>2nd
					<input type='radio' name='sem' value='Summer' disabled='disabled'>Summer
			</td>
		</tr>
		
		<tr>
			<td><label>Year</label></td>
			<td><input type='text' name='year' disabled='disabled'></td>
		</tr>
		<tr>
			<td><label>Lecture Section</label></td>
			<td><input type='text' name='lec_section' disabled='disabled'></td>
		</tr>
		<tr>
			<td><label>Lab Section</label></td>
			<td><input type='text' name='lab_section' disabled='disabled'></td>
		</tr>
		<tr>
			<td><label>Recit Section</label></td>
			<td><input type='text' name='recit_section' disabled='disabled'></td>
		</tr>
		<tr>
			<td><label>Grade</label></td>
			<td>
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
						</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type='submit'>
			</td>
		</form>
			
			<?php
				echo "<form method='post' action='index.php?action=view_subjects&request=view_electives' >
																<td><input type='submit' value='Cancel'></td></tr>
																<td><input type='text' hidden='hidden' name='stud_num' value='{$stud_num}'></td>
															";
															echo "</form>";
									?>
			
		</tr>
	<?php
		if(isset($_GET['error'])){
			$error=$_GET['error'];
			if($error==0) echo "<tr><td>Error: Duplicate</td></tr>";
			if($error==1) echo "<tr><td>Error: Wrong year or sem</td></tr>";
			if($error==2) echo "<tr><td>Error: Wrong lab section</td></tr>";
			if($error==3) echo "<tr><td>Error: Wrong recit section</td></tr>";
			if($error==4) echo "<tr><td>Error: lab or recit required</td></tr>";
		}
	?>
	</table>
	

</div>
</body>
</html>
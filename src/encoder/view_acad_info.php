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
	<label>Academic Information</label>
</div>
		<div class="section_content">
			<fieldset class="form_field">
				<form method="post" action="index.php?action=view_subjects">
				<?php
					if(isset($_SESSION['stud_num'])){
						echo "Student Number:<input type='text' name='stud_num' pattern='[0-9]{4}-[0-9]{5}' placeholder='XXXX-XXXXX' value='{$_SESSION['stud_num']}'/>";
					}
					else{
						echo 'Student Number:<input type="text" name="stud_num" pattern="[0-9]{4}-[0-9]{5}" placeholder="XXXX-XXXXX"/>';
				
					}
					echo '<input type="submit" value="Search">';
				?>
				
				</form>
			<?php
			include "includes/connect_db.php";
			if(isset($_SESSION['stud_num'])){
				$stud_num=$_SESSION['stud_num'];
				//unset($_SESSION['stud_num']);
				$query="SELECT * from student where student_no='{$stud_num}'";
				$found=mysql_query($query, $conn);
				$row=mysql_fetch_array($found);
				$query="SELECT * from student_sem_history_subject where student_no='{$stud_num}' ORDER BY year, sem";
				$found1=mysql_query($query, $conn);
				if($row==NULL){
					echo "No records";
				}
				else{
					
				echo "
					
				Name: {$row['lastname']}, {$row['firstname']} {$row['middlename']}
				";
				echo "<table>";
				echo "<tr><td><a href='index.php?action=view_subjects&request=view_advisers'>View Advisers</a></td>";
				echo "<td><a href='index.php?action=view_subjects&request=view_list_subjects'>View List of Subjects</a></td>";
				echo "<td><a href='index.php?action=view_subjects&request=view_ge_plan'>View GE PLAN</a></td>";
				echo "<td><a href='index.php?action=view_subjects&request=view_electives'>View Electives</a></td></tr>";
				echo "</tr>";
				echo "</table>";
				if(isset($view_advisers)){
					echo"
						<table border=1>
					
							<tr><th>Current Adviser<th></tr>
					";
					$query="Select * from advises where student_no='{$stud_num}' AND end_sem='' And end_year=''";
					$found=mysql_query($query, $conn);
					$advise=mysql_fetch_array($found);

					$present_adviser_emp_no=$advise['emp_no'];
					$present_adviser_start_sem=$advise['start_sem'];
					$present_adviser_start_year=$advise['start_year'];
					
					
					$query2="Select * from instructor WHERE emp_no='{$present_adviser_emp_no}'";
					$found=mysql_query($query2,$conn);
					$result=mysql_fetch_array($found);
					if($result!=null){
						echo "<tr><td>Name: {$result['name']}</td><td>Start sem: {$present_adviser_start_sem}</td><td>Start year: {$present_adviser_start_year}</td></tr>";
					}
					
					
					$query="Select * from advises where student_no='{$stud_num}' and end_sem!='' and end_year!='' ORDER BY start_sem AND start_year";
					$found=mysql_query($query, $conn);
					$advise1=mysql_fetch_array($found);
					if($advise1!=null){
						echo "<tr><th>Previous Adviser/s</th></tr>";
						$found2=mysql_query($query, $conn);
						while($advise2=mysql_fetch_array($found2)){
							$query2="Select * from instructor where emp_no='{$advise2['emp_no']}'";
							$found3=mysql_query($query2, $conn);
							$result=mysql_fetch_array($found3);
							if($result!=null){
								echo "<tr><td>Name: {$result['name']}</td><td>Start sem: {$advise2['start_sem']}</td><td>Start year: {$advise2['start_year']}</td><td>End sem: {$advise2['end_sem']}</td><td>End year: {$advise2['end_year']}</td></tr>";
							}
						}
					}
					
					echo"</table>";
					//change adviser
					echo "<form method='post' action='index.php?action=change_adviser'>";
						echo"<input type='text' hidden='hidden' name='stud_num' value={$stud_num}>";
						echo"<input type='text' hidden='hidden' name='present_adviser_emp_no' value={$present_adviser_emp_no}>";
						echo"<input type='text' hidden='hidden' name='present_adviser_start_sem' value={$present_adviser_start_sem}>";
						echo"<input type='text' hidden='hidden' name='present_adviser_start_year' value={$present_adviser_start_year}>";
						echo "<input type='submit' value='Change Adviser'>";
					echo "</form>";
				
				}
				
				if(isset($view_list_subjects)){
				echo "
				<form method='post' action='index.php?action=add_subject'>
					<input type='text' name='stud_num' hidden='hidden' value='{$stud_num}'/>
					<input type='submit' value='Add Subject'/>
				</form>
			";
				echo"
					<table border='1'>
					<th>Subjects</th>
					<tr><td>Course No</td><td>Sem</td><td>Year</td><td>Lecture Section</td><td>Lab Section</td><td>Recit Section</td><td>Grade</td><td></td></tr>
				";
					
				while($row1=mysql_fetch_array($found1)){
				$link="process/encoder/delete_acad_info.php?stud_num=".urlencode($stud_num)."&course_no=".urlencode($row1['course_no'])."&sem=".urlencode($row1['sem'])."&year=".urlencode($row1['year']);
				//$link2="src/encoder/edit_acad_info.php?stud_num=".urlencode($stud_num)."&course_no=".urlencode($row1['course_no'])."&sem=".urlencode($row1['sem'])."&year=".urlencode($row1['year'])."&lec_section=".urlencode($row1['lec_section'])."&grade=".urlencode($row1['grade']);
				$link2="index.php?action=edit_subject&stud_num=".urlencode($stud_num)."&course_no=".urlencode($row1['course_no'])."&sem=".urlencode($row1['sem'])."&year=".urlencode($row1['year'])."&lec_section=".urlencode($row1['lec_section'])."&grade=".urlencode($row1['grade']);
				echo "<tr><td>{$row1['course_no']}</td>";
				echo "<td>{$row1['sem']}</td>";
				echo "<td>{$row1['year']}</td>";
				echo "<td>{$row1['lec_section']}</td>";
				echo "<td>{$row1['lab_section']}</td>";
				echo "<td>{$row1['recit_section']}</td>";
				echo "<td>{$row1['grade']}</td>";
				echo "<td><a href='{$link}'>Delete</a></td>";
				echo "<td><a href='{$link2}'>Edit</a></td></tr>";
				};
				echo "
					</form>
					</table>
				";
				
				
			}
			}
			if(isset($view_electives)){
				echo "<table border=1>";
				echo "<tr><th>Taken/Registered Electives</th></tr>";
				echo "<tr><td>Course Number</td><td>Sem</td><td>Year</td><td>Lecture Section</td><td>Laboratory Section</td><td>Recitation Section</td><td>Grade</td></tr>";
				
				$num_of_elective=0;
			
				
				
				//for electives taken or currently registered
				$query="SELECT * from student_sem_history_subject where student_no='{$stud_num}'";
				$found=mysql_query($query,$conn);
				
				while($row=mysql_fetch_array($found)){
					$query2="Select * from subject where course_no='{$row['course_no']}'and subject_type='Elective'";
					$found2=mysql_query($query2, $conn);
					$row2=mysql_fetch_array($found2);
					if($row2!=null){
						$num_of_elective++;
						echo "<tr><td>{$row['course_no']}</td><td>{$row['sem']}</td><td>{$row['year']}</td><td>{$row['lec_section']}</td><td>{$row['lab_section']}</td><td>{$row['recit_section']}</td><td>{$row['grade']}</td><td><a href='{$link}'>Delete</a></td><td><a href='{$link2}'>Edit</a></td></tr>";
					
					}
				}
				if($num_of_elective==0){
					echo "<tr><td>Empty</td></tr>";
				}
				
				//for approved subjects only
				$query="SELECT * from approved_subjects where student_no='{$stud_num}'";
				$found=mysql_query($query,$conn);
				
				$tempfound=mysql_query($query,$conn);
				$temprow=mysql_fetch_array($tempfound);
				if($temprow!=null){
					$tempfound2=mysql_query($query,$conn);
					while($temprow2=mysql_fetch_array($tempfound2)){
						$query2="Select * from subject where course_no='{$temprow2['course_no']}' AND subject_type='Elective'";
						$found2=mysql_query($query2, $conn);
						$result2=mysql_fetch_array($found2);
						if($result2!=null){
							echo "<tr><th>Approved Electives</th></tr>";
							break;
					}
					}
				}
				
				while($row=mysql_fetch_array($found)){
					$query2="Select * from subject where course_no='{$row['course_no']}'and subject_type='Elective'";
					$found2=mysql_query($query2, $conn);
					$row2=mysql_fetch_array($found2);
					if($row2!=null){
						$num_of_elective++;
						echo "<tr><td>{$row['course_no']}</td></tr>";
					}
				}
				echo "</table>";
				if($num_of_elective<3){
					echo "<form method='post' action='index.php?action=add_elective'>";
					echo "<input type='submit' value='Add Elective'>";
					echo "</form>";
				}
			}
			
			if(isset($view_ge_plan)){
				require("view_ge_plan.php");
				}
			}
			
			?>
			</fieldset>
		</div>
	</body>
</html>
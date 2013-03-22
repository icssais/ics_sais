<?php
	require "includes/connect_db.php";
	
	$search_course=$_POST["course"];
	
	//check if search course is valid
	$query="select * from subject where course_no='{$search_course}'";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	$course=$row["course_no"];
		
	if($course==null){
		/*invalid course*/
		echo "<br/><label class='alert'>Please enter a valid course number.</label>";
	}
	else{
		$query="select * from is_prerequisite where course_no='{$search_course}'";
		$found=mysql_query($query,$conn);
		$row=mysql_fetch_array($found);
		$course=$row["course_no"];
		
		if($course==null){
			/*course is terminal course*/
			echo "<br/><label class='alert'>{$search_course} is a terminal course.</label>";
		}
		else{
			/*valid course*/
			echo	"<br/>
					<div id='subject_label'><label>{$_POST["course"]}</label></div>";
			
			//fetch curriculums since prerequisites of subjects varies on curriculum
			$curriculum_query="select name from curriculum order by name desc";
			$curriculum_found=mysql_query($curriculum_query,$conn);	
			
			while($curriculum_row=mysql_fetch_array($curriculum_found)){
				$curriculum=$curriculum_row["name"];
				echo "<br/><label class='name'>{$curriculum}</label><br/>";
				
				//fetch prerequisite count
				$query="select count(prereq_course_no) from is_prerequisite where course_no='{$search_course}' and curriculum='{$curriculum}'";
				$found=mysql_query($query,$conn);
				$row=mysql_fetch_array($found);
				$prereq_count=$row["count(prereq_course_no)"];
				
				//fetch student/s who satisfied prerequisite of the course
				$query="select * from student st, student_sem_history_subject s, is_prerequisite i where st.student_no=s.student_no and i.course_no='{$search_course}' and i.prereq_course_no=s.course_no and s.grade!='5.00' and s.grade!='DRP' and s.grade!='REGD' and s.grade!='4.00' and s.grade!='INC' and i.curriculum='{$curriculum}' and i.curriculum=st.curriculum group by s.student_no having count(s.student_no)={$prereq_count} and st.is_undergraduate=1 order by st.lastname, firstname, middlename asc";
				$found=mysql_query($query,$conn);
				
				for($i=0; $row=mysql_fetch_array($found); $i++)
					$student_list[$i]=$row["student_no"];
				
				if(isset($student_list)){
					//print table description
					echo "<table class='prereq_table'>
							<tr>
								<td><label>Student Number</label></td>
								<td width='250px'><label>Name</label></td>
								<td width='100px'><label>Subject</label></td>
								<td><label>Grade</label></td>
							</tr>";
					
					//fetch prerequisite subjects of the student who satisfied prerequisite of the course
					for($i=0; $i<count($student_list); $i++){
						$query="select * from student st, student_sem_history_subject s, is_prerequisite i where i.course_no='{$search_course}' and i.prereq_course_no=s.course_no and s.grade!='5.00' and s.grade!='DRP' and s.grade!='REGD' and s.grade!='4.00' and s.grade!='INC' and i.curriculum='{$curriculum}' and i.curriculum=st.curriculum and s.student_no='{$student_list[$i]}' and st.student_no='{$student_list[$i]}' order by i.prereq_course_no asc";
						$found=mysql_query($query,$conn);
						$row=mysql_fetch_array($found);
						
						//print student info and subject grades
						
						echo "
							<tr>		
								<td>{$row["student_no"]}</td>
								<td>{$row["lastname"]}, {$row["firstname"]} {$row["middlename"]}</td>
								<td>{$row["prereq_course_no"]}</td><td>{$row["grade"]}</td>
							</tr>";
						
						while($row=mysql_fetch_array($found))
							echo "<tr><td colspan='2'></td><td>{$row["prereq_course_no"]}</td><td>{$row["grade"]}</td></tr>";
							 
					}
					echo "</table>";
				}
				else{
					//no students fetched
					echo "<label style='margin-left: 	10px;'><i>There are no students.</i></label>";
				}
				echo "<br/>";
				unset($student_list);
			} //end of one curicullum
		}
	}
	mysql_close($conn);
?>
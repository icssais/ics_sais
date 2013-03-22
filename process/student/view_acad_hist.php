<?php
	require "process/student/get_student_no.php";
	require "process/student/get_total_units_earned.php";
	require "includes/connect_db.php";
	
	$username=$_SESSION['username'];
	
	$query="SELECT distinct sem, year from student_sem_history_subject where student_no='{$student_no}' order by year asc, sem asc";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	$count=1;
	if($row==null)
		echo
			"<i>No academic history.</i>";
	else{
		
		do{
			$sem=$row["sem"];
			$year=$row["year"];
			
			require "process/student/get_total_units_sem.php";
			require "process/student/get_scholastic_standing.php";
			require "process/student/get_gpa.php";
			echo "</br>";
			
			if($row["sem"]=="Summer")
				echo "<div class='section_label' id='hist_{$count}'><label class='hist'>{$sem}, {$year}</label></div>";
			else
				echo "<div class='section_label' id='hist_{$count}'><label class='hist'>{$sem} Semester, {$year}</label></div>";
				
			$query="Select distinct s.course_no, h.grade, s.units from student_sem_history_subject h, subject s where h.sem='{$sem}' and h.year='{$year}' and h.student_no='{$student_no}' and s.course_no=h.course_no";
			$found1=mysql_query($query,$conn);
			echo "<form id='hist{$count}'>
			<table class='app_table'>
				<tr>
					<td><label>Course Number</label></td>
					<td><label>Grade</label></td>
					<td><label>Units</label></td>
				</tr>
				";
			while($row1=mysql_fetch_array($found1)){

				echo "<tr><td>{$row1['course_no']}</td>
					<td>{$row1['grade']}</td>
					<td>{$row1['units']}</td>
					</tr>";
			}
			
			echo "<tr><td></td><td></td><td></td></tr>
			<tr><td></td><td></td><td></td></tr>
			<tr><td></td><td></td><td></td></tr>";
			
			echo "<tr><td><i>Scholastic standing: </i>{$standing}</td>";
			echo "<td><i>GPA: </i>{$gpa}</td>";
			echo "<td><i>Units Earned: </i>{$units_earned_per_sem}</td>";
			echo "</tr></table></form>";
			
			$count++;

		}while($row=mysql_fetch_array($found));
		
		require "process/student/get_gwa.php";
		
		echo "<table class='app_table'>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td><label>Total Units Earned: </label>{$total_units}</td><td></td><td></td></tr>
		<tr><td><label>Current GWA: </label>{$gwa}</td><td></td><td></td></tr>
		</table>";
	}

	mysql_close($conn);
?>
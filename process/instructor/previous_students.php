<?php
	require "process/instructor/get_emp_no.php";
	require "includes/connect_db.php";
	
	if($type=="Lecture")
		$sec_cond="i.section='{$section}' and i.section=s.lec_section";
	else if($type=="Laboratory")
		$sec_cond="i.section='{$section}' and i.section=s.lab_section";
	else if($type=="Recit")
		$sec_cond="i.section='{$section}' and i.section=s.recit_section";
	
	$query="select s.student_no, s.grade, st.firstname, st.middlename, st.lastname from instructor_sem_history_subject i, student_sem_history_subject s, student st where i.emp_no='{$emp_no}' and s.student_no=st.student_no and i.sem='{$sem}' and i.sem=s.sem and i.year='{$year}' and i.year=s.year and {$sec_cond} order by st.lastname, st.firstname, st.middlename";
	$found=mysql_query($query,$conn);

	$row=mysql_fetch_array($found);
	if($row==null)
		echo
			"<i>No students.</i>";
	else{
?>
	<table class="assoc_table">
		<tr>
			<td><label>Student Number</label></td>
			<td width="250px"><label>Name</label></td>
			<td><label>Grade</label></td>
		</tr>
	<?php		
		do{
			echo"
			<tr>
				<td>{$row["student_no"]}</td>
				<td>{$row["lastname"]}, {$row["firstname"]} {$row["middlename"]}</td>
				<td>{$row["grade"]}</td>
			</tr>";
		}while($row=mysql_fetch_array($found));
?>

	</table>
<?php
	}
	mysql_close($conn);
?>
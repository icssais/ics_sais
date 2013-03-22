<br/>
<br/>
<?php
	require "process/instructor/get_emp_no.php";
	require "includes/connect_db.php";
	
	$query="select s.course_no, s.section, s.day_time, s.place, i.type from instructor_sem_history_subject i, schedule s where i.emp_no='{$emp_no}' and i.sem='{$sem}' and i.sem=s.sem and i.year='{$year}' and i.year=s.year and i.section=s.section";
	$found=mysql_query($query,$conn);

	$row=mysql_fetch_array($found);
	if($row==null)
		echo
			"<i>No schedule.</i>";
	else{
?>
	<table class="schedule_table">
		<tr>
			<td width="100px"><label>Course</label></td>
			<td width="100px"><label>Section</label></td>
			<td width="120px"><label>Time</label></td>
			<td width="120px"><label>Place</label></td>
		</tr>
	<?php		
		do{
			echo"
			<tr>
				<td>{$row["course_no"]}</td>
				<td>{$row["section"]}</td>
				<td>{$row["day_time"]}</td>
				<td>{$row["place"]}</td>
				<td>";
			
			if(!isset($_GET["current"]))
				echo "
					<a class='simple_submit' href='index.php?action=previous_students&sem={$sem}&year={$year}&course={$row["course_no"]}&section={$row["section"]}&type={$row["type"]}'>
							View students
					</a>";
			echo "
				</td>
			</tr>";
		}while($row=mysql_fetch_array($found));
?>

	</table>
<?php
	}
	mysql_close($conn);
?>
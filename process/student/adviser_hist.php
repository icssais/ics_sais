<?php
	require "includes/connect_db.php";
	
	$username=$_SESSION['username'];
	
	$query="SELECT a.emp_no, a.start_sem, a.end_sem, a.start_year, a.end_year, i.name FROM advises a, instructor i, student s
	WHERE s.username='{$username}' AND a.emp_no=i.emp_no AND a.student_no=s.student_no order by a.start_sem desc, a.start_year desc, end_sem desc, end_year desc";
	$found=mysql_query($query,$conn);
	
	$row=mysql_fetch_array($found);
	if($row==null){
		echo
			"<tr>
				<td colspan='3' style='text-align: center;'><i>You have no advisers.</i></td>
			</tr>
			";
	}
	else{
?>			
	<table id='adviser_table'>
		<tr>
			<td><label>Employee Number</label></td>
			<td width='250px'><label>Name</label></td>
			<td><label>Semester, Academic Year</label></td>
		</tr>
<?php	
		do{
			echo "
				<tr>
					<td>{$row['emp_no']}</td>
					<td>{$row['name']}</td>
					<td>{$row["start_sem"]}, {$row["start_year"]} to {$row["end_sem"]}, {$row["end_year"]}</td>
				</tr>";
		}while($row=mysql_fetch_array($found));
?>
	</table>
<?php	
	}
	mysql_close($conn);
?>
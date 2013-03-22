<?php
	require "includes/connect_db.php";
	
	$username=$_SESSION['username'];
	
	$query="SELECT c.case_no, c.description, c.sem, c.year FROM case_history c, student s
	WHERE s.username='{$username}' AND c.student_no=s.student_no";
	$found=mysql_query($query,$conn);

	$row=mysql_fetch_array($found);
	if($row==null){
		echo
			"<tr>
				<td colspan='3' style='text-align: center;'><i>You have no university cases.</i></td>
			</tr>
			";
	}
	else{
?>			
	<table id='case_table'>
		<tr>
			<td width="120px"><label>Case Number</label></td>
			<td width="300px"><label>Description</label></td>
			<td><label>Semester, Academic Year</label></td>
		</tr>
<?php	
		do{
			echo "
				<tr>
					<td>{$row['case_no']}</td>
					<td>{$row['description']}</td>
					<td>{$row['sem']}, {$row['year']}</td>
				</tr>";
		}while($row=mysql_fetch_array($found));
?>
	</table>
<?php	
	}
	mysql_close($conn);
?>
<?php
	require "includes/connect_db.php";
	
	/* get instructor alumni advisees */
	
	//fetch employee number
	$query="select emp_no from instructor where username=\"".$_SESSION["username"]."\"";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	
	$emp_no=$row["emp_no"];
	
	//fetch instructor alumni advisees
	$query="select s.student_no, s.lastname, s.firstname, s.middlename, a.start_sem, a.start_year from advises a, student s where a.emp_no=\"".$emp_no."\" and s.is_undergraduate=0 and a.student_no=s.student_no and a.end_sem='' and a.end_year='' order by a.start_sem desc, a.start_year desc, s.lastname asc, s.firstname asc, s.middlename asc";
	$found=mysql_query($query,$conn);
	
	$row=mysql_fetch_array($found);
	if($row==null)
		echo
			"<tr>
				<td colspan='3' style='text-align: center;'><i>You have no alumni advisees.</i></td>
			</tr>
			";
	else{
?>
		<table class="advises_table">
		<tr>
			<td><label>Student Number</label></td>
			<td width="280px"><label>Name</label></td>
			<td><label>Semester, Academic Year</label></td>
		</tr>
<?php
		do{
			echo"
			<tr>
				<td>{$row["student_no"]}</td>
				<td>{$row["lastname"]}, {$row["firstname"]} {$row["middlename"]}</td>
				<td>{$row["start_sem"]}, {$row["start_year"]} to Graduation</td>
			</tr>";
		}while($row=mysql_fetch_array($found));
?>
	</table>
<?php	
	}
	mysql_close($conn);
?>
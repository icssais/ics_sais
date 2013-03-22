<?php
	require "includes/connect_db.php";
	
	$username=$_SESSION['username'];
?>
	
	<div class='section_label'><label class="name">Electives Allowed To Be Taken</label></div>

<?php
	
	$query="SELECT s.course_no, s.course_title, s.available_1st, s.available_2nd, s.available_summer FROM subject s, student st
	WHERE st.username='{$username}' AND s.subject_type='Elective'";
	$found=mysql_query($query,$conn);
	
	$row=mysql_fetch_array($found);
	if($row==null){
		echo
			"<i>No Electives.</i>";
	}
	else{
?>			
		<table class='app_table'>
		<tr>
			<td><label>Course Number</label></td>
			<td><label>Course Title</label></td>
			<td><label>Sem Available</label></td>
		</tr>
<?php	
		do{
			echo "
				<tr>
					<td>{$row['course_no']}</td>
					<td>{$row['course_title']}</td>
					<td>";
			if($row['available_1st']==1)
				echo '1st ';
			if($row['available_2nd']==1)
				echo '2nd ';
			if($row['available_summer']==1)
				echo 'Summer';
				
			echo "</td></tr>";
			
		}while($row=mysql_fetch_array($found));
?>
	</table>

<?php	
	}

mysql_close($conn);

?>
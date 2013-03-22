<?php
	require "includes/connect_db.php";
	
	$username=$_SESSION['username'];
?>
	
	<div class='section_label' id='app_ge'><label class="name">GE</label></div>

<?php
	
	/* get approved GE */

	$query="SELECT a.course_no, s.course_title, s.subject_type, s.available_1st, s.available_2nd, s.available_summer FROM approved_subjects a, subject s, student st
	WHERE st.username='{$username}' AND a.course_no=s.course_no AND st.student_no=a.student_no AND s.subject_type='GE'";
	$found=mysql_query($query,$conn);
	
	$row=mysql_fetch_array($found);
	if($row==null){
		echo
			"<form id='ge'><i>No approved GE.</i></form>";
	}
	else{
?>			
		<form id='ge'>
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
	</form>
<?php	
	}
?>

	<div class='section_label' id='app_electives'><label class="name">Electives</label></div>
<?php

	/* get approved Electives */
	
	$query="SELECT a.course_no, s.course_title, s.subject_type, s.available_1st, s.available_2nd, s.available_summer FROM approved_subjects a, subject s, student st
	WHERE st.username='{$username}' AND a.course_no=s.course_no AND st.student_no=a.student_no AND s.subject_type='Elective'";
	$found=mysql_query($query,$conn);
	
	$row=mysql_fetch_array($found);
	if($row==null){
		echo
			"<form id='electives'><i>No approved electives.</i></form>";
	}
	else{
?>	
	<form id='electives'>
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
				echo 'Summer ';
			echo "</td></tr>";
		}while($row=mysql_fetch_array($found));
?>
	</table>
<?php	
	}
?>

<br/>
<br/>
<div style="text-align: right; padding-right: 20px;">
	<a href="index.php?action=electives_allowed">View electives allowed to be taken</a>
</div>
</form>
<?php

mysql_close($conn);

?>
<?php
	include "../../includes/connect_db.php";
	
	$stud_num=$_GET['stud_num'];
	$course_no=$_GET['course_no'];
	$sem=$_GET['sem'];
	$year=$_GET['year'];
	
	$query="Delete from student_sem_history_subject WHERE student_no='{$stud_num}' AND course_no='{$course_no}' AND sem='{$sem}' AND year='{$year}'";
	$found=mysql_query($query,$conn);
	if($found) echo "success";
	header("Location: ../../index.php?action=view_subjects&stud_num={$stud_num}&request=view_list_subjects");
	
?>
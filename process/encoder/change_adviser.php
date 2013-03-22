<?php 
	require "../../includes/connect_db.php";
	session_start();
	$stud_num=$_POST['stud_num'];
	$present_adviser_emp_no=$_POST['present_adviser_emp_no'];
	$present_adviser_start_sem=$_POST['present_adviser_start_sem'];
	$present_adviser_start_year=$_POST['present_adviser_start_year'];
	$new_adviser=$_POST['new_adviser'];
	
	require"get_current_sem_year.php";
	if($sem=='2nd') $end_sem='1st';
	if($sem=='1st') $end_sem='Summer';
	if($sem=='Summer') $end_sem='Summer';
	$query="UPDATE advises Set end_sem='{$end_sem}', end_year='{$acadyear}' WHERE emp_no='{$present_adviser_emp_no}' AND student_no='{$stud_num}' AND start_sem='{$present_adviser_start_sem}' AND start_year='{$present_adviser_start_year}'";
	mysql_query($query,$conn);
	
	$query2="Select * from instructor WHERE emp_no='{$new_adviser}'";
	$found2=mysql_query($query2,$conn);
	$result=mysql_fetch_array($found2);
	
	if($result!=null){
		$query3="Insert into advises(emp_no, student_no,start_sem,start_year) values('{$new_adviser}', '{$stud_num}', '{$sem}', '{$acadyear}')";
		mysql_query($query3,$conn);
		
		header("Location:../../index.php?action=view_subjects&request=view_advisers");
	}

?>
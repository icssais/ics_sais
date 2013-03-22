<?php
	include "../../includes/connect_db.php";
	
	echo $stud_num=$_POST['stud_num'];
	
	echo $prev_sem=$_POST['prev_sem'];
	echo $prev_year=$_POST['prev_year'];
	echo $prev_lec_section=$_POST['prev_lec_section'];
	echo $prev_lab_section=$_POST['prev_lab_section'];
	echo $prev_recit_section=$_POST['prev_recit_section'];
	echo $prev_grade=$_POST['prev_grade'];
	echo "<br>grabe<br>";
	echo $course_no=$_POST['course_no'];
	echo $sem=$_POST['sem'];
	echo $year=$_POST['year'];
	echo $lec_section=$_POST['lec_section'];
	if(isset($_POST['lab_section'])) echo $lab_section=$_POST['lab_section'];
	if(isset($_POST['recit_section'])) echo $recit_section=$_POST['recit_section'];
	echo $grade=$_POST['grade'];
	
	
	if($sem=='1st') $query="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_1st=1 AND b.year='{$year}' AND b.sem='{$sem}' AND b.section='{$lec_section}'";
	else if($sem=='2nd')$query="SELECT * from subject a,schedule b WHERE a.course_no='{$course_no}' AND a.available_2nd=1 AND b.year='{$year}' AND b.sem='{$sem}' AND b.section='{$lec_section}'";
	else $query="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_summer=1 AND b.year='{$year}' AND b.sem='{$sem}' AND b.section='{$lec_section}'" ;
	
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	if($row==NULL){
		echo "not found";
	}
	else{
		if(isset($lab_section)){
			if($sem=='1st')$query1="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_1st=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Laboratory' AND b.section='{$lab_section}'";
			else if($sem=='2nd')$query1="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_2nd=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Laboratory' AND b.section='{$lab_section}'";
			else $query1="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_summer=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Laboratory' AND b.section='{$lab_section}'";
			
			$found=mysql_query($query1,$conn);
			$row=mysql_fetch_array($found);
			if($row==null){
			header("Location: ../../index.php?action=edit_subject&stud_num={$stud_num}&stud_num={$stud_num}&course_no={$course_no}&sem={$prev_sem}&year={$prev_year}&lec_section={$prev_lec_section}&grade={$prev_grade}&error=1");
			}
			else{
			$query="UPDATE student_sem_history_subject SET sem='{$sem}', year='{$year}', lec_section='{$lec_section}',lab_section='{$lab_section}', grade='{$grade}' WHERE student_no='{$stud_num}' AND course_no='{$course_no}' AND lec_section='{$prev_lec_section}' AND lab_section='{$prev_lab_section}'";
			mysql_query($query);
			header("Location: ../../index.php?action=view_subjects&stud_num={$stud_num}&request=view_list_subjects");
			}
		}
		else if(isset($recit_section)){
		if($sem=='1st')$query2="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_1st=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Recitation' AND b.section='{$recit_section}'";
		elseif($sem=='2nd')$query2="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_2nd=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Recitation' AND b.section='{$recit_section}'";
		else $query2="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_summer=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Recitation' AND b.section='{$recit_section}'";
			$found=mysql_query($query2,$conn);
			$row=mysql_fetch_array($found);
			if($row==null){
				//if no recit section = $recit_section exists
				header("Location: ../../index.php?action=edit_subject&stud_num={$stud_num}&stud_num={$stud_num}&course_no={$course_no}&sem={$prev_sem}&year={$prev_year}&lec_section={$prev_lec_section}&grade={$prev_grade}&error=2");
			}
			else{
			$query="UPDATE student_sem_history_subject SET sem='{$sem}', year='{$year}', lec_section='{$lec_section}',recit_section='{$recit_section}', grade='{$grade}' WHERE student_no='{$stud_num}' AND course_no='{$course_no}' AND lec_section='{$prev_lec_section}' AND  recit_section='{$prev_recit_section}'";
			mysql_query($query);
			header("Location: ../../index.php?action=view_subjects&stud_num={$stud_num}&request=view_list_subjects");
			}
		}
		elseif(!isset($lab_section) && !isset($recit_section)){
			if($sem=='1st')$query3="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_1st=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Laboratory'";
			elseif($sem=='2nd')$query3="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_2nd=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Laboratory'";
			else $query3="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_summer=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Laboratory'";
			$found=mysql_query($query3,$conn);
			$row=mysql_fetch_array($found);
			if($row!=null){
				echo "lab or recit missing";
				//if there should be an input in lab or recit
				header("Location: ../../index.php?action=edit_subject&stud_num={$stud_num}&stud_num={$stud_num}&course_no={$course_no}&sem={$prev_sem}&year={$prev_year}&lec_section={$prev_lec_section}&grade={$prev_grade}&error=3");
			}
			else{
			echo "no lab or recit required";
			$query="UPDATE student_sem_history_subject SET sem='{$sem}', year='{$year}', lec_section='{$lec_section}', grade='{$grade}' WHERE student_no='{$stud_num}' AND course_no='{$course_no}' AND lec_section='{$prev_lec_section}'";
			if(mysql_query($query)) echo "sucess";
			header("Location: ../../index.php?action=view_subjects&stud_num={$stud_num}&request=view_list_subjects");
			}
			}
		}

	
?>
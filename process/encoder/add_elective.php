<?php
	include "../../includes/connect_db.php";
	session_start();
	$course_no=$_POST['course_no'];
	$sem=$_POST['sem'];
	$year=$_POST['year'];
	$lec_section=$_POST['lec_section'];
	$lab_section=$_POST['lab_section'];
	$recit_section=$_POST['recit_section'];
	$grade=$_POST['grade'];
	$stud_num=$_SESSION['stud_num'];
	
	if($lec_section==""&&$lab_section==""&&$recit_section==""){
		$query1="SELECT * from approved_subjects WHERE course_no='{$course_no}' AND student_no='{$stud_num}'";
		$found1=mysql_query($query1,$conn);
		$result1=mysql_fetch_array($found1);
		if($result1!=null) header("Location: ../../index.php?action=add_elective&stud_num={$stud_num}&error=0");
		
	}
	
	else{
	
		$query1="SELECT * from student_sem_history_subject WHERE course_no='{$course_no}' AND student_no='{$stud_num}' AND grade!='5.0'";
		$found1=mysql_query($query1,$conn);
		$result1=mysql_fetch_array($found1);
	if($result1!=null) header("Location: ../../index.php?action=add_elective&stud_num={$stud_num}&error=0");
	
	else{
		if($lec_section==""&&$lab_section==""&&$recit_section==""){
			$query1="Select * from approved_subjects a, schedule b where a.course_no='{$course_no}' AND a.student_no='{$stud_num}' AND a.course_no=b.course_no AND a.student_no=b.student.no";
			$found1=mysql_query($query1,$conn);
			$result1=mysql_fetch_array($found1);
			if($result==null){
				$query2="INSERT into approved_subjects values('{$course_no}', '{$stud_num}')";
				$found2=mysql_query($query2,$conn);
				if($found2){
					header("Location: ../../index.php?action=view_subjects&stud_num={$stud_num}&request=view_electives");
					}
			}
			else header("Location: ../../index.php?action=add_elective&stud_num={$stud_num}&error=0");
		}
		else{
			if($sem=='1st') $query="SELECT * from subject a WHERE a.course_no='{$course_no}' AND a.available_1st=1 AND a.subject_type='Elective' ";
			else if($sem=='2nd') $query="SELECT * from subject a WHERE a.course_no='{$course_no}' AND a.available_2nd=1 AND a.subject_type='Elective' ";
			else $query="SELECT * from subject a WHERE a.course_no='{$course_no}' AND a.available_Summer=1 AND a.subject_type='Elective' " ;
			
			$found=mysql_query($query,$conn);
			$row=mysql_fetch_array($found);
			if($row==NULL){
			//wrong year or sem
			header("Location: ../../index.php?action=add_elective&stud_num={$stud_num}&error=1");
			echo "not found";
			}
			else{
				if($lab_section!=""){
					if($sem=='1st')$query1="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_1st=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Laboratory' AND b.section='{$lab_section}'";
					else if($sem=='2nd')$query1="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_2nd=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Laboratory' AND b.section='{$lab_section}'";
					else $query1="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_Summer=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Laboratory' AND b.section='{$lab_section}'";
					
					$found=mysql_query($query1,$conn);
					$row=mysql_fetch_array($found);
					if($row==null){
						header("Location: ../../index.php?action=add_elective&stud_num={$stud_num}&error=2");
					}
					else{
					$query="INSERT into student_sem_history_subject values('{$stud_num}','{$sem}','{$year}', '{$course_no}','{$lec_section}','{$lab_section}', '{$recit_section}', '{$grade}' )";
					mysql_query($query);
					//$_SESSION['stud_num']=$stud_num;
					header("Location: ../../index.php?action=view_subjects&stud_num={$stud_num}&request=view_electives");
					}
				}
				
				else if($recit_section!=""){
					if($sem=='1st')$query2="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_1st=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Recitation' AND b.section='{$recit_section}'";
					elseif($sem=='2nd')$query2="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_2nd=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Recitation' AND b.section='{$recit_section}'";
					else $query2="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_Summer=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Recitation' AND b.section='{$recit_section}'";
					$found=mysql_query($query2,$conn);
					$row=mysql_fetch_array($found);
					if($row==null){
						//if no recit section = $recit_section exists
						header("Location: ../../index.php?action=add_elective&stud_num={$stud_num}&error=3");
					}
					else{
					$query="INSERT into student_sem_history_subject values('{$stud_num}','{$sem}','{$year}', '{$course_no}','{$lec_section}','{$lab_section}', '{$recit_section}', '{$grade}' )";
					mysql_query($query);
					$_SESSION['stud_num']=$stud_num;
					header("Location: ../../index.php?action=view_subjects&stud_num={$stud_num}&request=view_electives");
					}
				}
				
			elseif($lab_section=="" && $recit_section==""){
					if($sem=='1st')$query3="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_1st=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Laboratory'";
					elseif($sem=='2nd')$query3="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_2nd=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Laboratory'";
					else $query3="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_Summer=1 AND b.year= '{$year}' AND b.sem='{$sem}' AND b.type='Laboratory'";
					$found=mysql_query($query3,$conn);
					$row=mysql_fetch_array($found);
					if($row!=null){
						echo "lab or recit missing";
						//if there should be an input in lab or recit
						$_SESSION['stud_num']=$stud_num;
					header("Location: ../../index.php?action=add_elective&stud_num={$stud_num}&error=4");
					}
					else{
					echo "no lab or recit required";
					$query="INSERT into student_sem_history_subject values('{$stud_num}','{$sem}','{$year}', '{$course_no}','{$lec_section}','{$lab_section}', '{$recit_section}', '{$grade}' )";
					mysql_query($query);
					$_SESSION['stud_num']=$stud_num;
					header("Location: ../../index.php?action=view_subjects&stud_num={$stud_num}&request=view_electives");
					}
				}
			}
		}
	}
	}
	
	
?>
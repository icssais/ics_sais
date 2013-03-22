<?php
	include "../../includes/connect_db.php";
	
	$course_no=$_POST['course_no'];
	$sem_taken=$_POST['sem_taken'];
	$year_taken=$_POST['year_taken'];
	$lect_section=$_POST['lect_section'];
	$lab_section=$_POST['lab_section'];
	$recit_section=$_POST['recit_section'];
	$grade=$_POST['grade'];
	$stud_num=$_GET['stud_num'];
	
	$query1="SELECT * from approved_subjects WHERE course_no='{$course_no}' AND student_no='{$stud_num}'";
	$found1=mysql_query($query1,$conn);
	$result1=mysql_fetch_array($found1);
	if($result1!=null) {header("Location: ../../index.php?action=add_subject&stud_num={$stud_num}&error=-1");
	}
	/*if($lect_section=="NULL") $lect_section="";
	if($lab_section=="NULL") $lab_section="";
	if($recit_section=="NULL") $recit_section="";*/
	else{
	
		$query1="SELECT * from student_sem_history_subject WHERE course_no='{$course_no}' AND student_no='{$stud_num}' AND grade!='5.0'";
		$found1=mysql_query($query1,$conn);
		$result1=mysql_fetch_array($found1);
		if($result1!=null) {header("Location: ../../index.php?action=add_elective&stud_num={$stud_num}&error=-1");
		}
	
		else{
			if($sem_taken=='1st') $query="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_1st=1 AND b.year= '{$year_taken}' AND b.sem='{$sem_taken}' AND b.section='{$lect_section}'";
			else if($sem_taken=='2nd') $query="SELECT * from subject a,schedule b WHERE a.course_no='{$course_no}' AND a.available_2nd=1 AND b.year= '{$year_taken}' AND b.sem='{$sem_taken}' AND b.section='{$lect_section}'";
			else $query="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_Summer=1 AND b.year= '{$year_taken}' AND b.sem='{$sem_taken}' AND b.section='{$lect_section}'" ;
			
			$found=mysql_query($query,$conn);
			$row=mysql_fetch_array($found);
			if($row==NULL){
				header("Location: ../../index.php?action=add_subject&stud_num={$stud_num}&error=0");
				echo "not found";
			}
			else{
			
				if($lab_section!=""){
					if($sem_taken=='1st')$query1="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_1st=1 AND b.year= '{$year_taken}' AND b.sem='{$sem_taken}' AND b.type='Laboratory' AND b.section='{$lab_section}'";
					else if($sem_taken=='2nd')$query1="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_2nd=1 AND b.year= '{$year_taken}' AND b.sem='{$sem_taken}' AND b.type='Laboratory' AND b.section='{$lab_section}'";
					else $query1="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_Summer=1 AND b.year= '{$year_taken}' AND b.sem='{$sem_taken}' AND b.type='Laboratory' AND b.section='{$lab_section}'";
					
					$found=mysql_query($query1,$conn);
					$row=mysql_fetch_array($found);
					if($row==null){
						header("Location: ../../index.php?action=add_subject&stud_num={$stud_num}&error=1");
					}
					else{
					$query="INSERT into student_sem_history_subject values('{$stud_num}','{$sem_taken}','{$year_taken}', '{$course_no}','{$lect_section}','{$lab_section}', '{$recit_section}', '{$grade}' )";
					mysql_query($query);
					//$_SESSION['stud_num']=$stud_num;
					header("Location: ../../index.php?action=view_subjects&stud_num={$stud_num}&request=view_list_subjects");
					}
				}
				
				else if($recit_section!=""){
					if($sem_taken=='1st')$query2="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_1st=1 AND b.year= '{$year_taken}' AND b.sem='{$sem_taken}' AND b.type='Recitation' AND b.section='{$recit_section}'";
					elseif($sem_taken=='2nd')$query2="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_2nd=1 AND b.year= '{$year_taken}' AND b.sem='{$sem_taken}' AND b.type='Recitation' AND b.section='{$recit_section}'";
					else $query2="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_Summer=1 AND b.year= '{$year_taken}' AND b.sem='{$sem_taken}' AND b.type='Recitation' AND b.section='{$recit_section}'";
					$found=mysql_query($query2,$conn);
					$row=mysql_fetch_array($found);
					if($row==null){
					//if no recit section = $recit_section exists
					header("Location: ../../index.php?action=add_subject&stud_num={$stud_num}&error=2");
					}
					else{
					$query="INSERT into student_sem_history_subject values('{$stud_num}','{$sem_taken}','{$year_taken}', '{$course_no}','{$lect_section}','{$lab_section}', '{$recit_section}', '{$grade}' )";
					mysql_query($query);
					$_SESSION['stud_num']=$stud_num;
					header("Location: ../../index.php?action=view_subjects&stud_num={$stud_num}&request=view_list_subjects");
					}
				}
				elseif($lab_section=="" && $recit_section==""){
					if($sem_taken=='1st')$query3="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_1st=1 AND b.year= '{$year_taken}' AND b.sem='{$sem_taken}' AND b.type='Laboratory'";
					elseif($sem_taken=='2nd')$query3="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_2nd=1 AND b.year= '{$year_taken}' AND b.sem='{$sem_taken}' AND b.type='Laboratory'";
					else $query3="SELECT * from subject a, schedule b WHERE a.course_no='{$course_no}' AND a.available_Summer=1 AND b.year= '{$year_taken}' AND b.sem='{$sem_taken}' AND b.type='Laboratory'";
					$found=mysql_query($query3,$conn);
					$row=mysql_fetch_array($found);
					if($row!=null){
						echo "lab or recit missing";
						//if there should be an input in lab or recit
						$_SESSION['stud_num']=$stud_num;
						header("Location: ../../index.php?action=add_subject&stud_num={$stud_num}&error=3");
					}
					else{
						echo "no lab or recit required";
						$query="INSERT into student_sem_history_subject values('{$stud_num}','{$sem_taken}','{$year_taken}', '{$course_no}','{$lect_section}','{$lab_section}', '{$recit_section}', '{$grade}' )";
						mysql_query($query);
						$_SESSION['stud_num']=$stud_num;
						header("Location: ../../index.php?action=view_subjects&stud_num={$stud_num}&request=view_list_subjects");
						}
					}
				}
			}
		}
	
?>
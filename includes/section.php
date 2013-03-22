<div id="section">
	<?php
		if(isset($_GET['action'])){
			$action=$_GET['action'];
		
			if($role=='Student'){
				if($action=='profile')
					require('src/student/view_profile.php');
				else if($action=='edit_profile')
					require('src/student/edit_basic_info.php');
				else if($action=='change_password')
					require('src/change_password.php');
				else if($action=='viewhist')
					require('src/student/view_hist.php');
				else if($action=='appsub')
					require('src/student/view_approved_sub.php');
				else if($action=='adviserhist')
					require('src/student/adviser_hist.php');
				else if($action=='casehist')
					require('src/student/casehistory.php');
				else if($action=='electives_allowed')
					require('src/student/electives_allowed.php');
				else if($action=='sendmessage')
					require('src/student/send_message.php');
				else if($action=='sent')
					require('src/sent.php');
				else if($action=='inbox')
					require('src/inbox.php');
				else if($action=='showmessage')
					require('src/showmessage.php');
			}
			else if($role=='Admin'){
				if($action=='profile')
					require('src/admin/view_profile.php');
				else if($action=='change_password')
					require('src/change_password.php');
				else if($action=='act_deact')
					require('src/admin/activate_deactivate.php');
				else if($action=='app_dis')
					require('src/admin/approve_disapprove.php');
				else if($action=='adduser')
					require('src/admin/add_user.php');
				else if($action=='monitor_logs')
					require('src/admin/monitor_logs.php');
				else if($action=='sendmessage')
					require('src/admin/send_message.php');
				else if($action=='sent')
					require('src/sent.php');
				else if($action=='inbox')
					require('src/inbox.php');
				else if($action=='showmessage')
					require('src/showmessage.php');
			}
			else if($role=="Instructor"){
				if($action=="profile")
					require("src/instructor/edit_basic_info.php");
				else if($action=='change_password')
					require('src/change_password.php');
				else if($action=='view_students')
					require('src/instructor/view_students.php');
				else if($action=='previous_students')
					require('src/instructor/previous_students.php');
				else if($action=="current_advisees")
					require("src/instructor/current_advisees.php");
				else if($action=="previous_advisees")
					require("src/instructor/previous_advisees.php");
				else if($action=="alumni_advisees")
					require("src/instructor/alumni_advisees.php");
				else if($action=="view_current_schedule")
					require("process/instructor/view_current_schedule.php");
				else if($action=="view_schedule")
					require("src/instructor/view_schedule.php");
				else if($action=="sem_history")
					require("src/instructor/view_sem_history.php");
				else if($action=="assoc")
					require("src/instructor/students_associated.php");
			}
			else if($role=="Encoder"){
				if($action=="profile"){
					if(isset($_GET['changed'])){
						$_SESSION['changed']=1;
					}
					require("src/encoder/view_encoder_info.php");
				}
				else if($action=="search"){
					require("src/encoder/view_acad_info.php");
				}
				else if($action=="add_subject"){
						if(isset($_GET['error'])){
							$_SESSION['error']=$_GET['error'];
							}
						if(isset($_GET['stud_num'])){$stud_num=$_GET['stud_num'];
					$_SESSION['stud_num']=$stud_num;}
						if(isset($_POST['stud_num'])){$stud_num=$_POST['stud_num'];
					$_SESSION['stud_num']=$stud_num;}
					require("src/encoder/add_acad_info.php");
				}
				else if($action=="view_subjects"){
					if(isset($_POST['stud_num'])){$stud_num=$_POST['stud_num'];
					$_SESSION['stud_num']=$stud_num;}
					if(isset($_GET['stud_num'])){$stud_num=$_GET['stud_num'];
					
					$_SESSION['stud_num']=$stud_num;}
					if(isset($_GET['request'])){
						$request=$_GET['request'];
						if($request=="view_advisers"){
							$view_advisers=1;
						}
						else if($request=="view_list_subjects"){
							$view_list_subjects=1;
						}
						else if($request=="view_ge_plan"){
							$view_ge_plan=1;
						}
						else if($request=="view_electives"){
							$view_electives=1;
						}
					}
					require("src/encoder/view_acad_info.php");
				}
				else if($action=="edit_subject"){
					$_SESSION['stud_num']=$_GET['stud_num'];
					$_SESSION['course_no']=$_GET['course_no'];
					$_SESSION['sem']=$_GET['sem'];
					$_SESSION['year']=$_GET['year'];
					$_SESSION['lec_section']=$_GET['lec_section'];
					$_SESSION['grade']=$_GET['grade'];
					if(isset($_GET['error']))$_SESSION['error']=$_GET['error'];
					require("src/encoder/edit_acad_info.php");
				}
				else if($action=="change_adviser"){
					$_SESSION['stud_num']=$_POST['stud_num'];
					$_SESSION['present_adviser_emp_no']=$_POST['present_adviser_emp_no'];
					$_SESSION['present_adviser_start_sem']=$_POST['present_adviser_start_sem'];
					$_SESSION['present_adviser_start_year']=$_POST['present_adviser_start_year'];
					require("src/encoder/change_adviser.php");
				}
				else if($action=="edit_profile"){
					require("src/encoder/edit_profile.php");
				}
				else if($action=="change_password"){
					if(isset($_GET['error'])){
						$error=$_GET['error'];
						$_SESSION['error']=$error;
					}
					require("src/encoder/change_password.php");
				}
				else if($action =="add_elective"){
					require("src/encoder/add_elective.php");
				}
			}
		}
		else
			header("Location: index.php?action=profile");
	?>
</div>
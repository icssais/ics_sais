<?php
	include "../../includes/connect_db.php";
	session_start();
	
	//if checked
	if(isset($_POST['approveAll'])) {
		$approve = $_POST['approve_disapprove'];
			//traverse all checked
				for($i=0; $i<count($approve); $i++){
					//sets approve_disapprove=1
					$query="UPDATE user SET approve_disapprove=1, active=1 where username='$approve[$i]'";
					$found=mysql_query($query, $conn);
						//inserts one by one to monitor log
					if($found){
						$_SESSION['message']='Approved all selected accounts.';
						$query2="INSERT INTO log_activities VALUES ('Admin',current_date(),current_time(),'Approved user: $approve[$i].')";
						mysql_query($query2,$conn);
					}
				}
	}
	header("Location: ../../index.php?action=app_dis");
?>
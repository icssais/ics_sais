<div id="aside">
    <?php
		if(isset($_SESSION['username'])){
			require "includes/connect_db.php";
		
			//get role
			$query="select role from user where username=\"".$_SESSION["username"]."\"";
			$found=mysql_query($query,$conn);
			$row=mysql_fetch_array($found);
			$role=$row["role"];
			
			mysql_close($conn);
			
			if($role=='Student'){
	?>
		<table class="aside">
			<tr><td onClick="document.location.href='index.php?action=profile';">Profile</td></tr>
			<tr><td onClick="document.location.href='index.php?action=viewhist';">Academic History</td></tr>
			<tr><td onClick="document.location.href='index.php?action=adviserhist';">Adviser History</td></tr>
			<tr><td onClick="document.location.href='index.php?action=appsub';">Approved subjects</td></tr>
			<tr><td onClick="document.location.href='index.php?action=casehist';">University cases</td></tr>
			<tr><td onClick="document.location.href='index.php?action=inbox';">Inbox</td></tr>
			<tr><td onClick="document.location.href='index.php?action=sendmessage';">Send message</td></tr>
		</table>
	<?php
			}
			else if($role=='Admin'){
	?>
		<table class="aside">
			<tr><td onClick="document.location.href='index.php?action=profile';">Profile</td></tr>
			<tr><td onClick="document.location.href='index.php?action=act_deact';">Activate/Deactivate accounts</td></tr>
			<tr><td onClick="document.location.href='index.php?action=app_dis';">Pending accounts</td></tr>
			<tr><td onClick="document.location.href='index.php?action=adduser';">Add user</td></tr>
			<tr><td onClick="document.location.href='index.php?action=monitor_logs';">System Logs</td></tr>
			<tr><td onClick="document.location.href='index.php?action=inbox';">Inbox</td></tr>
			<tr><td onClick="document.location.href='index.php?action=sendmessage';">Send message</td></tr>
		</table>
	<?php
			}
			else if($role=="Instructor"){
	?>
		<table class="aside">
			<tr><td onClick="document.location.href='index.php?action=profile';">Profile</td></tr>
			<tr><td onClick="document.location.href='index.php?action=view_current_schedule';">Current Schedule</td></tr>
			<tr><td onClick="document.location.href='index.php?action=sem_history';">Semester History</td></tr>
			<tr><td onClick="document.location.href='index.php?action=view_students';">Students</td></tr>
			<tr><td onClick="document.location.href='index.php?action=current_advisees';">Current Advisees</td></tr>
			<tr><td onClick="document.location.href='index.php?action=previous_advisees';">Previous Advisees</td></tr>
			<tr><td onClick="document.location.href='index.php?action=alumni_advisees';">Alumni Advisees</td></tr>
		</table>
	<?php
			}
			else if($role=="Encoder"){
	?>
		<table class="aside">
			<tr><td onClick="document.location.href='index.php?action=profile';">Profile</td></tr>
			<tr><td onClick="document.location.href='index.php?action=search';">Search Student</td></tr>	
		</table>
	<?php
			}
		}
?>
</div>
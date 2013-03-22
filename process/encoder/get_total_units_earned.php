<?php
	require "includes/connect_db.php";
	
	$query="select SUM(su.units) from subject su, student_sem_history_subject st, student sd where (su.curriculum_name=sd.curriculum OR su.curriculum_name='') and st.student_no= '{$student_no}' and st.student_no=sd.student_no and st.course_no=su.course_no and st.grade!='5.00' and st.grade!='DRP' and st.grade!='REGD' and st.grade!='4.00' and st.grade!='INC'";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	$total_units=$row["SUM(su.units)"];
	mysql_close($conn);
	
?>
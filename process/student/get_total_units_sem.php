<?php
	
	$query="select SUM(su.units) from subject su, student_sem_history_subject st, student sd where (su.curriculum_name=sd.curriculum OR su.curriculum_name='') and st.student_no= '{$student_no}' and st.student_no=sd.student_no and st.sem='{$sem}' and st.year='{$year}' and st.course_no=su.course_no and st.grade!='5' and st.grade!='DRP' and st.grade!='REGD' and st.grade!='4' and st.grade!='INC'";
	$found3=mysql_query($query,$conn);
	$row3=mysql_fetch_array($found3);
	
	if($row3["SUM(su.units)"]==null)
		$units_earned_per_sem=0;
	else
		$units_earned_per_sem=$row3["SUM(su.units)"];
	
?>
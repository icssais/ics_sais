<?php

	$query="select SUM(su.units) from subject su, student_sem_history_subject st, student sd where st.student_no='{$student_no}' and st.student_no=sd.student_no and st.sem='{$sem}' and st.year='{$year}' and (su.curriculum_name=sd.curriculum OR su.curriculum_name='') and st.course_no=su.course_no and st.grade!='DRP'";
	$found5=mysql_query($query,$conn);
	$row5=mysql_fetch_array($found5);
	
	if($row5["SUM(su.units)"]==null)
		$units_regd_per_sem=0;
	else
		$units_regd_per_sem=$row5["SUM(su.units)"];
	
	$fail_rate=1-($units_earned_per_sem/$units_regd_per_sem);
	
	if($fail_rate<.25)
		$standing="Good";
	else if($fail_rate>=.25 && $fail_rate<=.49)
		$standing="Warning";
	else if($fail_rate>=.50 && $fail_rate<=.75)
		$standing="Probation";
	else if($fail_rate>=.76 && $fail_rate<=.99)
		$standing="Dismissed";
	else if($units_earned_per_sem==0 && $units_regd_per_sem!=NULL)
		$standing="n/a";
	else	
		$standing="Permanently Disqualified";
	
?>
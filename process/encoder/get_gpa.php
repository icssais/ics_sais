<?php

	$query="select SUM(su.units*st.grade)/SUM(su.units) from subject su, student_sem_history_subject st where st.student_no= '{$student_no}' and st.sem='{$sem}' and st.year='{$year}' and st.course_no=su.course_no and st.grade!='DRP' and st.grade!='REGD' and st.grade!='INC'";
	$found4=mysql_query($query,$conn);
	$row4=mysql_fetch_array($found4);

	if($row4['SUM(su.units*st.grade)/SUM(su.units)']==NULL)
		$gpa="n/a";
	else
		$gpa=$row4['SUM(su.units*st.grade)/SUM(su.units)'];
?>
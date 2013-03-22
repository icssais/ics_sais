<?php

	$query="select SUM(su.units*st.grade)/SUM(su.units) from subject su, student_sem_history_subject st where st.student_no= '{$student_no}' and st.course_no=su.course_no and st.grade!='DRP' and st.grade!='REGD' and st.grade!='INC'";
	$found6=mysql_query($query,$conn);
	$row6=mysql_fetch_array($found6);

	$gwa=$row6['SUM(su.units*st.grade)/SUM(su.units)'];
?>
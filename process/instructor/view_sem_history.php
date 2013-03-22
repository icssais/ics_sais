<?php
	require "process/instructor/get_emp_no.php";
	require "process/instructor/get_current_sem_year.php";
	require "includes/connect_db.php";
	
	$query="select distinct sem, year from instructor_sem_history_subject where emp_no='{$emp_no}' and not(sem='{$sem}' and year='{$acadyear}') order by year desc, sem desc";
	$found=mysql_query($query,$conn);

	$row=mysql_fetch_array($found);
	if($row==null)
		echo
			"<i>No schedule.</i>";
	else{		
		do{
			echo "<a href='index.php?action=view_schedule&sem={$row["sem"]}&year={$row["year"]}'>";
			
			if($row["sem"]=="Summer")
				echo"<input class='simple_submit' type='submit' value='{$row["sem"]}, {$row["year"]}'/>";
			else
				echo"<input class='simple_submit' type='submit' value='{$row["sem"]} Semester, {$row["year"]}'/>";
		
			echo "</a><br/>";
		}while($row=mysql_fetch_array($found));
	}
	mysql_close($conn);
?>
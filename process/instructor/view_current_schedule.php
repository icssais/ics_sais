<?php
	require "process/instructor/get_current_sem_year.php";
	
	header("Location: index.php?action=view_schedule&sem={$sem}&year={$acadyear}&current=1");
?>
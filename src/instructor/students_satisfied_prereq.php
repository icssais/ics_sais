<form action="#" method="post">
	<table id="search_crs_table" style="margin-left: auto; margin-right: auto;">
		<tr>
			<td>Course</td>
			<td><input name="course" type="text"/></td>
			<td align="center"><input class="submit" type="submit" name="submit_course" value="View students"/></td>
		</tr>
	</table>
</form>
	
<?php
	if(isset($_POST["submit_course"])){
		require "process/instructor/students_satisfied_prereq.php"; 
	}
?>
</div>
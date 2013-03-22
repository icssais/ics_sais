<div class="section_label">
	<label>Previous Students</label>
</div>

<div class="section_content">
	<?php 
		$sem=$_GET["sem"];
		$year=$_GET["year"];
		$course=$_GET["course"];
		$section=$_GET["section"];
		$type=$_GET["type"];
		
		if($sem=="Summer")
			echo "<label class='name'>{$sem}, {$year}</label>";
		else
			echo "<label class='name'>{$sem} Semester, {$year}</label>";
	
		echo "<br/><br/><div id='subject_label'><label>{$course}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$section}</label></div><br/>";
	
		require "process/instructor/previous_students.php";
	
	?>
</div>
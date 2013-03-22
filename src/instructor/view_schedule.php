<div class="section_label">
	<label><?php if(isset($_GET["current"])) echo "Current "; else echo "Previous ";?>Schedule</label>
</div>

<div class="section_content">
	<?php
		$sem=$_GET["sem"];
		$year=$_GET["year"];
		
		if($sem=="Summer")
			echo "<label class='name'>{$sem}, {$year}</label>";
		else
			echo "<label class='name'>{$sem} Semester, {$year}</label>";
	?>
	
	<?php require "process/instructor/view_schedule.php"; ?>
</div>
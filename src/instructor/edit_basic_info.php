<?php 
	require "process/instructor/get_profile_info.php";
?>

<div class="section_label">
	<label>Profile</label>
</div>

<div class="section_content">

	<label class="name"><?php echo $name?></label>
	<br/>
			
	<table class="profile_table">
		<tr>
			<td><label>Employee Number</label></td>
			<td><?php echo $emp_no; ?></td>
		</tr>
		<tr>
			<td><label>Designation</label></td>
			<td><?php echo $designation; ?></td>
		</tr>
		<tr>
			<td><label>Rank</label></td>
			<td><?php echo $rank; ?></td>
		</tr>
		<tr>
			<td><label>Faculty Room</label></td>
			<td><?php echo $fac_room; ?></td>
		</tr>
	<form action="process/instructor/edit_basic_info.php" method="post">	
		<tr>
			<td><label>Mobile Number</label></td>
			<td><input name="mob_no" type="text" maxlength="11" value="<?php echo $mobile_no; ?>" placeholder="09XXXXXXXXX" pattern='09[0-9]{9}'/></td>
			<td style="padding-left: 0;"><input class="simple_submit" type="submit" value="Update mobile number"/></td>
		</tr>
	</form>
		<tr>
			<td colspan="2" style="text-align: right;">
				<a href="index.php?action=change_password"><input class="simple_submit" type="submit" value="Change password"/></a>
			</td>
		</tr>
	</table>
	
	<?php
		if(isset($_SESSION["mob_updated"])){
			echo "<br/><br/><div class='notif'><label class='success'>{$_SESSION["mob_updated"]}</label></div>";
			unset($_SESSION["mob_updated"]);
		}
	?>
	
</div>
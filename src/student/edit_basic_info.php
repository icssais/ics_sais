<?php require "process/student/get_profile_info.php"; ?>

<div class="section_label">
	<label>Edit Profile</label>
</div>

<div class="section_content">

<label class="name"><?php echo $full?></label>
	<br/>
	<form action="process/student/edit_basic_info.php" method="post">
		<table class="edit_profile_table">
			<tr>
				<td><label>Student Number</label></td>
				<td><?php echo $sno?></td>
			</tr>
			<tr>
				<td><label>Birthday</label></td>
				<td><?php echo $fbdate?></td>
			</tr>
			<tr>
				<td><label>Home Address</label></td>
				<td><textarea class="add" name="h_add" required="required"><?php echo $hadd?></textarea></td>
			</tr>
			<tr>
				<td><label>Home Address Contact No.</label></td>
				<td><input name="h_add_no" type="text" value="<?php echo $hadd_no?>"/></td>
			</tr>
			<tr>
				<td><label>College Address</label></td>
				<td><textarea class="add" name="c_add"><?php echo $cadd?></textarea></td>
			</tr>
			<tr>
				<td><label>College Address Contact No.</label></td>
				<td><input name="c_add_no" type="text" value="<?php echo $cadd_no?>"/></td>
			</tr>
			<tr>
				<td><label>Email Address</label></td>
				<td><input name="eadd" type="email" value="<?php echo $eadd?>" required="required"/></td>
			</tr>
			<tr>
				<td><label>Mobile Number</label></td>
				<td><input name="mob_no" type="text" value="<?php echo $mno?>"/></td>
			</tr>
			<tr align="center">
				<td colspan="2">
					<input name="save" class="submit" type="submit" value="Save Changes"/>
					<input name="cancel" class="submit" type="submit" value="Cancel"/>
				</td>
			</tr>
		</table>			
	</form>
</div>
<div id="fade">

<div class="section_label">
	<label>Activate/Deactivate accounts</label>
</div>
	
<div class="section_content">
	<div class="notif">
		<?php
			if(isset($_SESSION['message'])) {
				echo "<label class='success'>{$_SESSION['message']}</label>";
				unset($_SESSION['message']);
			}
			else if(isset($_SESSION['error_message'])) {
				echo "<label class='alert'>{$_SESSION['error_message']}</label>";
				unset($_SESSION['error_message']);
			}
		?>
		</h3>
	</div>
	<form action="process/admin/activate_deactivate.php" method="post">
		<input type="hidden" value="" id="mode" name="mode" />
		<table id="act_deact_table">
			<tr>
				<td><input name="activateAll" class="submit" style="width: 250px;" type="submit" value="Activate all users"/></td>
				<td><input name="deactivateAll" class="submit" style="width: 250px;" type="submit" value="Deactivate all users"/></td>
			</tr>
			<tr>
				<td><input name="activateStudents" class="submit" style="width: 250px;" type="submit" value="Activate all students"/></td>
				<td><input name="deactivateStudents" class="submit" style="width: 250px;" type="submit" value="Deactivate all students"/></td>
			</tr>
			<tr>
				<td><input name="activateInstructors" class="submit" style="width: 250px;" type="submit" value="Activate all instructors"/></td>
				<td><input name="deactivateInstructors" class="submit" style="width: 250px;" type="submit" value="Deactivate all instructors"/></td>
			</tr>
			<tr>
				<td><input name="activateEncoders" class="submit" style="width: 250px;" type="submit" value="Activate all encoders"/></td>
				<td><input name="deactivateEncoders" class="submit" style="width: 250px;" type="submit" value="Deactivate all encoders"/></td>
			</tr>
			<tr>
				<td colspan="3" style="padding-top: 50px;">
					<input type="text" name="username" placeholder="Enter username"/>
					<input name="activate" type="submit" class="submit" style="width: 100px;" value="Activate"/>
					<input name="deactivate" type="submit" class="submit" style="width: 100px;" value="Deactivate"/>
				</td>
			</tr>
		</table>
	</form>
</div>

</div>
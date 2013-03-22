<div class="section_label">
	<label>Change Password</label>
</div>

<div style="margin: 100px auto; margin-bottom: -50px; text-align: center; height: 25px; width: 400px;">
	<?php
		if(isset($_SESSION["error_message"])){
			//print error message
			if(isset($_SESSION["not_match"])){
				echo "<label class='alert'>{$_SESSION["error_message"]}</label>";
				unset($_SESSION["not_match"]);
			}
			else if(isset($_SESSION["same_uname"])){
				echo "<label class='alert'>{$_SESSION["error_message"]}</label>";
				unset($_SESSION["same_uname"]);
			}
			else if(isset($_SESSION["old_incorrect"])){
				echo "<label class='alert'>{$_SESSION["error_message"]}</label>";
				unset($_SESSION["old_incorrect"]);
			}
			else if(isset($_SESSION["too_short"])){
				echo "<label class='alert'>{$_SESSION["error_message"]}</label>";
				unset($_SESSION["too_short"]);
			}
			unset($_SESSION["error_message"]);
		}
		else if(isset($_SESSION["success_message"])){
			//print success message
			echo "<label class='success'>{$_SESSION["success_message"]}</label>";
			unset($_SESSION["success_message"]);
		}
		
	?>
</div>

<div class="section_content">
	<table id="cpwd_table" style="margin-left: auto; margin-right: auto; margin-top: 50px;">
		
		<form action="process/change_password.php" method="post">
			<tr>
				<td>New Password</td>
				<td><input name="new_pwd" type="password" required="required" maxlength="15"/></td>
			</tr>
			<tr>
				<td>Re-enter new Password</td>
				<td><input name="reenter_new_pwd" type="password" required="required" maxlength="15"/></td>
			</tr>
			<tr>
				<td>Old Password</td>
				<td><input name="old_pwd" type="password" required="required" maxlength="15"/></td>
			</tr>
			
			<tr>
				<td colspan="2" align="center">
					<input class="submit" type="submit" value="Save"/>
		</form>
				
					<a href="index.php?action=profile"><input class="submit" type="submit" value="Cancel"/></a>
				</td>
			</tr>
		</table>
</div>
<?php
	include "includes/connect_db.php";
	
	$id=$_GET['msgID'];
	
	$query="SELECT * FROM inbox WHERE msgID={$id}";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	
	echo "<div class='form_box'>
		<fieldset class='form_field'>
			<form>
				<table class='inbox_table'>
					<tr>
					<td><label>Sender: </label></td>
					<td>{$row['sender']}</td>
					</tr>
					<tr>
					<td><label>Subject: </label></td>
					<td>{$row['subject']}</td>
					</tr>
					<td><label>Message: </label></td>
					<td>{$row['message']}</td>
					</tr>
				</table>
			</form>
		</fieldset>
	</div>";
	
	echo "<table class='show_table'><tr><td class='inbox'><a href='process/process_delete_msg.php?id={$id}'>Delete</a></td>
	<td class='inbox'><a href='index.php?action=inbox'>Back</a></td></tr></table>";
	
	mysql_close($conn);
?>
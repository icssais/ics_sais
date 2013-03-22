<?php
	require "includes/connect_db.php";
	
	$username=$_SESSION['username'];
	
	$query="SELECT * FROM inbox WHERE recipient='{$username}'";
	$found=mysql_query($query,$conn);

	echo "<div class='form_box'>
		<fieldset class='form_field'>
			<form>
				<table class='inbox_table'>
					<tr>
					<td><label>Sender</label></td>
					<td><label>Subject</label></td>
					<td><label>Date</label></td>
					<td><label>Time</label></td>
					</tr>";
	
	while($row=mysql_fetch_array($found)){

				echo "<tr>
					<td>{$row['sender']}</td>
					<td class='inbox'><a href='index.php?action=showmessage&&msgID={$row['msgID']}'>{$row['subject']}</a></td>
					<td>{$row['date']}</td>
					<td>{$row['time']}</td>
					</tr>";
	}
	
	echo "</table>
			</form>
		</fieldset>
	</div>";
	
	mysql_close($conn);
?>
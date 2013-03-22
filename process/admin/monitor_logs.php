<table id='logs_table'>
	<tr>
		<td width='120px'><label>Username</label></td>
		<td width='100px'><label>Date</label></td>
		<td width='100px'><label>Time</label></td>
		<td width='250px'><label>Description</label></td>
	</tr>
<?php
	require "includes/connect_db.php";
	$query="SELECT * from log_activities order by date desc, time desc";
	$found=mysql_query($query, $conn);

	while($row=mysql_fetch_array($found)){
		echo "<tr>
			<td>" . $row['username'] . "</td>
			<td>" . $row['date'] . "</td>
			<td>" . $row['time'] . "</td>
			<td>" . $row['description'] . "</td>
			</tr>";
	}
?>
</table>
<?php include "includes/connect_db.php"; ?>

<div class="section_label">
	<label>View Users</label>
</div>
	
<div class="section_content" id="viewUser_section">
	<div class="section_label" id="view_encoder">
		<label>Encoder</label>
	</div>
	<div id="viewEncoder">
		<table style="margin-left:50px; text-align:center;" class='view_table'>
			<tr><td><br /></td></tr>
			<tr>
				<td width='120px'><label>Username</label></td>
				<td width='100px'><label>Approved</label></td>
				<td width='100px'><label>Active</label></td
			</tr>
			<?php
				require "includes/connect_db.php";
				$query="SELECT * from user where role='Encoder'";
				$found=mysql_query($query, $conn);

				while($row=mysql_fetch_array($found)){
					echo "<tr>";?>
						<td><a class='simple_submit' href="index.php?action=viewEncoderProfile&username=<?php echo $row['username'] ?>"><?php echo $row['username'];?></a></td>
					<?php echo"
						<td>" . $row['approve_disapprove'] . "</td>
						<td>" . $row['active'] . "</td>";?>
						
						</tr>
				<?php
				}
			?>
			<tr><td><br /></td></tr>
		</table>
	</div>
</div>
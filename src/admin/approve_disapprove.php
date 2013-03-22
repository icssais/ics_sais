<script>
	function checkall()
	{
		var target=document.getElementsByTagName('input');
		for(i=0; i<target.length; i++)
		{
			if(target[i].type=='checkbox')
				target[i].checked='checked';
		}
	}
	
	function uncheckall()
	{
		var target=document.getElementsByTagName('input');
		for(i=0; i<target.length; i++)
		{
			if(target[i].type=='checkbox')
				target[i].checked='';
		}
	}
</script>

<div class="section_label">
	<label>Pending accounts</label>
</div>

<div class="section_content">
	<div id="notification">
		<h3 id="alert">
			<?php
				if (isset($_SESSION['message'])) {
					echo $_SESSION['message'];
					unset($_SESSION['message']);
				}
			?>
		</h3>
	</div>
	<form action="process/admin/approve_disapprove.php" method="post">
		<?php
			include "includes/connect_db.php";
			$query="SELECT * from user where approve_disapprove=0 and role!='Admin'";
			$found=mysql_query($query, $conn);
			$row=mysql_fetch_array($found);
			if($row==null){
				echo
					"<tr>
						<td colspan='3' style='text-align: center;'><i>No pending accounts.</i></td>
					</tr>
					";
			}
			else{
				echo "<table id='app_dis_table'>
						<tr>
							<td></td>
							<td><label>Username</label></td>
							<td><label>Role</label></td>
							
						</tr>
						<input type='hidden' value='0' name='approve_disapprove'/>";
				
				do {
					echo"<tr>
						<td><input type='checkbox' value='".$row['username']."' name='approve_disapprove[]'/></td>
						<td>" . $row['username'] . "</td>
						<td>" . $row['role'] . "</td>
						</tr>";
				} while($row=mysql_fetch_array($found));
				echo "
						<tr>
							<td colspan='3'>
								<input class='submit' type='button' value='Check All' name='check' onclick='checkall();'/>
								<input class='submit' type='button' value='Uncheck All' name='uncheck' onclick='uncheckall();'/>
								<input class='submit' name='approveAll' type='submit' value='Approve All Checked'/>
							</td>
						</tr>
					</table>";
			}
		?>
	</form>
</div>
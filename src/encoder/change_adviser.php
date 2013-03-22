<?php
	require"includes/connect_db.php";
	
	$stud_num=$_SESSION['stud_num'];
	$present_adviser_emp_no=$_SESSION['present_adviser_emp_no'];
	$present_adviser_start_sem=$_SESSION['present_adviser_start_sem'];
	$present_adviser_start_year=$_SESSION['present_adviser_start_year'];
	
	
	
	$query="Select * from instructor where emp_no='{$present_adviser_emp_no}'";
	$found=mysql_query($query,$conn);
	$result=mysql_fetch_array($found);
	?>
<!DOCTYPE html>
<html>
	<head>
		<title>ICS SAIS</title>
		<meta charset= "utf-8">
		<script src="js/main.js"></script>
		<link rel='stylesheet' type='text/css' href='style/styles.css'>
	</head>
	<body>
	<div class="section_label">
	<label>Change Adviser</label>
</div>

<div class="section_content">

	<form method='post' action='process/encoder/change_adviser.php'>
	<table class="profile_table">
		<?php
			if(isset($_SESSION['changed'])){
				if($_SESSION['changed']==1){
				echo "<tr><td>Aviser changed</td></tr>";
				}
				$_SESSION['changed']=-1;
			}
		?>
		<tr>
			<td><label>Present Adviser</label></td>
		</tr>
		<tr>
			<td><?php echo $result['name']?></td>
			<td>(<?php echo $result['designation']?>
			<?php echo $result['rank']?>)</td>
		</tr>
		<tr>
			<td><input type='text' name='stud_num' value='<?php echo $stud_num?>' hidden='hidden'/></td>
			<td><input type='text' name='present_adviser_emp_no' value='<?php echo $present_adviser_emp_no?>' hidden='hidden'/></td>
			<td><input type='text' name='present_adviser_start_sem' value='<?php echo $present_adviser_start_sem?>' hidden='hidden'/></td>
			<td><input type='text' name='present_adviser_start_year' value='<?php echo $present_adviser_start_year?>' hidden='hidden'/></td>
		</tr>
		<tr>
			<td><label>New Adviser</label></td>
			<td>
				<select name='new_adviser'>
			<?php
				$query="Select * from instructor where emp_no!='{$present_adviser_emp_no}'";
				$found=mysql_query($query,$conn);
				
				while($row=mysql_fetch_array($found)){
					echo "<option value='{$row['emp_no']}'>{$row['name']} ({$row['designation']} {$row['rank']})</option>";
				}
			?>
				</select>
			</td>
		</tr>
		
			<td>
				<input type='submit'>
					</form>
			
			</td>
				<td>
				<?php
						echo "<form method='post' action='index.php?action=view_subjects&request=view_advisers' >
																<td><input type='submit' value='Cancel'></td></tr>
																<td><input type='text' hidden='hidden' name='stud_num' value='{$stud_num}'></td>
															";
															echo "</form>";
				?>
				</td>
		</tr>
	</table>


		</div>
	</body>
</html>
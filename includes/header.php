<div id="header">
    <div id='banner'>
		<a href="index.php?action=profile"><div id='logo'></div></a>
	</div>
	
<?php
		if(!isset($_SESSION['username'])){
			require_once "src/login.php";
		}
		else{
	?>
		<table id="table_header">
			<tr>
				<td onClick="document.location.href='index.php?action=profile';"><?php echo "{$_SESSION['username']}"; ?></td>
				<td onClick="document.location.href='process/logout.php';">Log out</td>
			</tr>
		</table>
	<?php				
		}
	
	?>
</div>
<div class="section_label">
	<label>Send message</label>
</div>

<div class="section_content">
	<form action="process/process_mail.php" method="post">
		<table class="msg_table" style="width: 80%; margin-left: auto; margin-right: auto;">
			<tr>
				<td><label class="name">To</label></td>
				<td>Admin</td>
			</tr>
			
			<tr>
				<td><label class="name">Subject</label></td>
				<td><input name="subject" type="text" style="width: 100%;"/></td>
			</tr>
			
			<tr>
				<td colspan="2">
					<textarea class="msg" name="message" placeholder="Type your message here"></textarea>
				</td>
			</tr>

			<tr align="center">
				<td colspan="2">
					<input name="send" class="submit" type="submit" value="Send"/>
					<input name="cancel" class="submit" type="submit" value="Cancel"/>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php defined('NANOMUS') OR header('Location: ../index.php'); ?>
<script type="text/javascript" src="js/calendarDateInput.js"></script>
<form method='post' action='ajouterNewsXML.php'>
	<table>
		<tr>
			<td>Titre</td>
			<td><input type='text' name='titre' size='30'maxlength="50" class='text'/></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><input type='text' name='description' size='30'maxlength="100" class='text'/></td>
		</tr>
		<tr>
			<td>Liens</td>
			<td><input type='text' name='lien' size='30'maxlength="100" class='text'/></td>
		</tr>
		<tr>
			<td>Date</td>
			<td><script>DateInput('orderdate', true, 'DD-MON-YYYY')</script></td>
		</tr><tr>
			<td>Heure <span style="font-size: 10">(hh:mm)</span></td>
			<td><input type='text' name='heure' size='1'maxlength="5" class='text' value="00:00"/></td>
		</tr>
		<tr>
			<td colspan='2' align='center'>
				<input type='submit' name='valider' class='submit' value="Valider" />
			</td>
		</tr>
	</table>
</form>
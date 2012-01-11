<?php defined('NANOMUS') OR header('Location: ../index.php'); ?>
<form method='post' action='ajouterNewsXML.php'>
	<table>
		<tr>
			<td>Titre</td>
			<td>
				<input type='text' name='titre' size='30'maxlength="50" class='text'/>
			</td>
		</tr>
		<tr>
			<td>Mot de passe</td>
			<td>
				<input type='text' name='description' size='30'maxlength="100" class='text'/>
			</td>
		</tr>
		<tr>
			<td>Liens</td>
			<td>
				<input type='text' name='lien' size='30'maxlength="100" class='text'/>
			</td>
		</tr>
		<tr>
			<td colspan='2' align='center'>
				<input type='submit' name='valider' class='submit' value="Valider" />
			</td>
		</tr>
	</table>
</form>
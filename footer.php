	
	<div data-role="footer" data-theme="a" align="center">
		<input type="button" value="fr" onclick='setLanguage("fr")' />
		<input type="button" value="de" onclick='setLanguage("de")' />
        
        <p><a href="./contact.php" data-role="button"><span class="bouttonContact">Contact</span></a><br/>
        	<br>
			 Version : <a href="#Standard"><span class="versionStandard">Standard</span></a> | <span class="versionMobile">Mobile</span> | <a href="#Simple"><span class="versionMobileSimplifiée">Mobile Simplifiée</span></a> | <a href="./Admin/index.php?op=login">Admin</a>
        </p>
       
        <!-- Appel de la méthode qui va lire le cookie pour définir la langue de l'utilisateur -->
        <script type="text/javascript" language="javascript">{loadLanguageText();}</script>

    </div><!-- /footer -->
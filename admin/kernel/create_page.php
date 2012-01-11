<?php
defined('NANOMUS') OR Header('Location: ../index.php');

if ( @ empty( $_SESSION['identite'] ) ) die('Illegal action');

	if ( count( $IP_ADMIN ) > 0 ) {
		if ( ! in_array( $_SERVER['REMOTE_ADDR'], $IP_ADMIN ) ) {
			header('location: '.INDEX.'.php');die();
		}
	}

	if ( ! is_writeable(PATH.''.DATAS) ) die(_WARNING_CHMOD_DATAS.' '.DATAS.' '._WARNING_CHMOD_DATAS2);
	$tpl->content .= '<script type="text/javascript" src="js/control.js"></script>';
	$tpl->content .= menu_admin( 1 );
	$tpl->content .= "<form action=\"".INDEX.".php\" method=\"post\" name='InputLimiter'>";
	$tpl->content .= _PAGENAME."<br /><input type=\"text\" name='titre' id='LettersOnly' onkeypress='return inputLimiter(event,\"Letters\")' value='' size=\"100\" /><br/>";

	$form = new Form();
	if ( WYSIWYG === false ) {
		$tpl->content .= $form->Textarea_Edit_Center( _DESCRIPTION, 'name="texte" id="textarea"', '');
	} elseif ( WYSIWYG == 'nicedit' ) {
		$tpl->content .= '<script type="text/javascript" src="js/nicEdit.js"></script>'."\n";
		$tpl->content .= $form->NicEdit_Edit_Billet( '' );
	} elseif ( WYSIWYG == 'fckeditor' ) {
		$tpl->content .= $form->FCKeditor_Edit_Center( _DESCRIPTION, 'texte', '', 'full' );
	}
	$tpl->content .= _META_TITLE."<br /><input type=\"text\" name='metatitle' value='' size=\"100\" /><br/>";
	$tpl->content .= $form->Textarea_Edit_Center( _META_DESC, 'name="metadesc" class="meta_textarea"', '');
	$tpl->content .= $form->Textarea_Edit_Center( _META_KEY, 'name="metakey" class="meta_textarea"', '');
	$tpl->content .= "<input type=\"hidden\" name=\"copie\" value=\"0\" />";
	$tpl->content .= "<input type=\"hidden\" name=\"op\" value=\"save_page\" />
	<center><input type=\"submit\" value=\""._PAGE_VALID."\" /></center></form><br /><br />";

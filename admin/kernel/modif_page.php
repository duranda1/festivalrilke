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

	$tpl->content .= menu_admin( 2 );
	$texte = '';
	$form = new Form();
	if ( is_file( PATH.''.DATAS.''.PREFIX_DATAS.'_'.$id.'.php' ) ) {
		$file2 = PATH.''.DATAS.''.PREFIX_DATAS.'_'.$id.'.php';
		$texte = html_entity_decode( stripslashes( file_get_contents($file2) ) );
	}

	$config_install = '<?php defined(\'NANOMUS\') OR header(\'Location: ../index.php\');?>' . "\n\n";
	$texte  = str_replace( $config_install , '', $texte );
	$titre2 = str_replace('_', ' ', $id );

	if ( is_file( PATH.''.DATAS.'metas/'.PREFIX_DATAS.'_'.$id.'.php') )
		include_once( PATH.''.DATAS.'metas/'.PREFIX_DATAS.'_'.$id.'.php');

	$tpl->content .= "<br/><form action=\"".INDEX.".php\" method=\"post\" name='InputLimiter'>";
	$tpl->content .= _PAGE_URL."<br /><input type=\"text\" id='LettersOnly' onkeypress='return inputLimiter(event,\"Letters\")' name=\"titre\" size=\"100\" value='".$titre2."' /><br/><br/>";

	if ( WYSIWYG === false ) {
		$tpl->content .= $form->Textarea_Edit_Center( _DESCRIPTION, 'name="texte" id="textarea"', $texte);
	} elseif ( WYSIWYG == 'nicedit' ) {
		$tpl->content .= '<script type="text/javascript" src="js/nicEdit.js"></script>'."\n";
		$tpl->content .= $form->NicEdit_Edit_Billet( $texte );
	} elseif ( WYSIWYG == 'fckeditor' ) {
		$tpl->content .= $form->FCKeditor_Edit_Center( _DESCRIPTION, 'texte', $texte, 'full' );
	}
	$tpl->content .= _META_TITLE."<br /><input type=\"text\" name='metatitle' value='".$meta_title."' size=\"100\" /><br/>";
	$tpl->content .= $form->Textarea_Edit_Center( _META_DESC, 'name="metadesc" class="meta_textarea"', $meta_desc);
	$tpl->content .= $form->Textarea_Edit_Center( _META_KEY, 'name="metakey" class="meta_textarea"', $meta_key);
	$tpl->content .= "<br/>"._PAGE_COPY." <input id='oui' type=\"radio\" name=\"copie\" value=\"1\" /> <label for='oui'>"._YES."</label>
	<input id='non' type=\"radio\" name=\"copie\" value=\"0\" checked='checked' />  <label for='non'>"._NO."</label><br/>";
	$tpl->content .= "<input type=\"hidden\" name=\"id\" value=\"$id\" />
	<input type=\"hidden\" name=\"op\" value=\"save_page\" />
	<center><input type=\"submit\" value=\""._PAGE_VALID."\" /></center></form><br /><br />";

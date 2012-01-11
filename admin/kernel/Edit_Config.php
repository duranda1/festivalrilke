<?php
defined('NANOMUS') OR Header('Location: ../index.php');

if ( @ empty( $_SESSION['identite'] ) ) die('Illegal action');

if ( count( $IP_ADMIN ) > 0 ) {
	if ( ! in_array( $_SERVER['REMOTE_ADDR'], $IP_ADMIN ) ) {
		header('location: '.INDEX.'.php');die();
	}
}

	Function Edit_Config() {
		if ( ! @is_writable(PATH.'kernel/config.php') )
			@chmod(PATH.'kernel/config.php', 0777 );
		if ( @is_writable(PATH.'kernel/config.php') ) {

			function fieldset_config( $title, $xname, $value ) {
				return "<fieldset><legend> ".$title." </legend>"
				."<input type='text' size='40' name='x".$xname."' value='".$value."' /></fieldset>";
			}
			$content = "<br/><form method='post' action='".INDEX.".php'>";
			$content .= "<div id='boxdel'>";

			$content .= "<input type='hidden' name='op' value='Valid_Config' />";
			$content .= "<input type='submit' class='submit' value=\""._SETUP_VALID."\" />";

			$content .= fieldset_config( _SITENAME, 'sitename', SITENAME );
			$content .= fieldset_config( _SLOGAN, 'slogan', SLOGAN );
			$content .= fieldset_config( _META_DESC, 'metadesc', METADESC );
			$content .= fieldset_config( _META_KEY, 'metakey', METAKEY );
			$content .= fieldset_config( _USERNAME, 'admin', ADMIN_PSEUDO );
			$content .= fieldset_config( _PASSWORD, 'pass', '' );
			$content .= fieldset_config( _URL_SITE, 'urlsite', URL_SITE );
			$content .= fieldset_config( _EMAIL, 'mail', ADMIN_MAIL );

			$content .= "<fieldset><legend> "._LANGUE."  </legend>";
			$array    = array('en', 'fr');
			$content .= "<select name='xlangue'>";
			$sel1 = $sel2 = '';
			( LANGUE === 'en' ) ? $sel1 = " selected='selected'" : $sel2 = " selected='selected'";
			$content .= "<option value='en' $sel1>"._ENGLISH."</option>";
			$content .= "<option value='fr' $sel2>"._FRENCH."</option>";
			$content .= '</select></fieldset>';

			$content .= "<fieldset><legend> "._URL_FRIENDLY."  </legend>";
			$content .= "<select name='xurl_friendly'>";
			$sel1 = $sel2 = '';
			( URL_FRIENDLY === true ) ? $sel1 = " selected='selected'" : $sel2 = " selected='selected'";
			$content .= "<option value='true' $sel1>"._ACTIVE."</option>";
			$content .= "<option value='false' $sel2>"._ACTIVE_NO."</option>";
			$content .= '</select></fieldset>';

			$content .= "<fieldset><legend> "._DISPLAY_ERRORS."  </legend>";
			$content .= "<select name='xdisplay_errors'>";
			$sel1 = $sel2 = '';
			( DISPLAY_ERRORS === true ) ? $sel1 = " selected='selected'" : $sel2 = " selected='selected'";
			$content .= "<option value='true' $sel1>"._ACTIVE."</option>";
			$content .= "<option value='false' $sel2>"._ACTIVE_NO."</option>";
			$content .= '</select></fieldset>';

			$content .= "<input type='submit' class='submit' value=\""._SETUP_VALID."\" />";
			$content .= '</div></form>';
		} else {
			$content = '<div id="boxdel"><br/>'._WARNING_CONFIG.'<br/><br/></div>';
		}
		return $content;
	}
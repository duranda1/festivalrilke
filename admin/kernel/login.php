<?php
defined('NANOMUS') OR Header('Location: ../index.php');

	if ( count( $IP_ADMIN ) > 0 ) {
		if ( ! in_array( $_SERVER['REMOTE_ADDR'], $IP_ADMIN ) ) {
			header('location: '.INDEX.'.php');die();
		}
	}

	if ( @ empty( $_SESSION['identite'] ) ) {
		if ( $_SESSION['pages'] < 3 OR ( $_SESSION['blackIP'] == $_SERVER['REMOTE_ADDR'] ) ) {
			$tpl->content .= "<div id='login'><form method='post' action='".INDEX.".php'><table width='90%'>"
				."<tr><td width='50%' align='right'>"._USER."</td><td width='50%' align='left'><input type='text' name='name' size='30'/></td></tr>"
				."<tr><td width='50%' align='right'>"._PASSWORD."</td><td width='50%' align='left'><input type='password' name='clef' size='30'/></td></tr>"
				."<tr><td colspan='2' align='center'><input type='submit' name='submit' class='submit' value=\""._VALID."\" /></td></tr></table>"
				."</form><div style='text-align: center;font-style : italic;'>"._WARNING_PROTECTED."</div>";
			if ( ! @ empty( $_SESSION['pages'] ) ) {
				$tpl->content .= "<div style='text-align: center;font-weight: bold;'>!!! "._WARNING." ".$_SESSION['pages']." "._ATTEMPS." !!!</div>";
			}
			$tpl->content .= '</div>';
		} else {
			$tpl->content .= "<div id='login' style='text-align: center;'>"._WARNING_MAIL."</div>";

			if ( empty( $_SESSION['blackOUT'] ) ) {
				$subject = _ATTEMPS_ACCESS.' '.SITENAME.' !';
				$msg     = _MAIL." ".SITENAME." "._MAIL2." !\n\n"._MAIL3.":\nIP: ".$_SERVER['REMOTE_ADDR']."\nDNS: ".@gethostbyaddr( $_SERVER['REMOTE_ADDR'] )."\nUSER AGENT:".get_env('HTTP_USER_AGENT')."\n\nTeam Nanomus Development";
				if ( SITENAME != '' ) push_email( $subject, $msg );
			}
			$_SESSION['blackOUT'] = 1;
		}
	} else {
		header('location: '.URL.'admin');
	}

<?php
defined('NANOMUS') OR Header('Location: ../index.php');

if ( @ empty( $_SESSION['identite'] ) ) die('Illegal action');

if ( count( $IP_ADMIN ) > 0 ) {
	if ( ! in_array( $_SERVER['REMOTE_ADDR'], $IP_ADMIN ) ) {
		header('location: '.INDEX.'.php');die();
	}
}

	if ( ! is_writeable(PATH.'kernel/config.php') ) die(_WARNING_CHMOD_CONFIG.' kernel/config.php '._WARNING_CHMOD_DATAS2);
	$tpl->content .= menu_admin( 3 );
	$date = date("j M Y, g:i:s a");
	$config_install = '<?php'."\n";
	$config_install .= '// Write by Nanomus CMS: \''. $date .'\' ;' . "\n\n";
	$config_install .= '/************************************************************************/'."\n";
	$config_install .= '/* Nanomus CMS: Web Portal System                                       */'."\n";
	$config_install .= '/* =============================                                        */'."\n";
	$config_install .= '/*                                                                      */'."\n";
	$config_install .= '/* Copyright (c) 2010                                                   */'."\n";
	$config_install .= '/* http://www.php-nanomus.org                                           */'."\n";
	$config_install .= '/* dev@php-nanomus.org                                                  */'."\n";
	$config_install .= '/*                                                                      */'."\n";
	$config_install .= '/* This program is free software.                                       */'."\n";
	$config_install .= '/************************************************************************/'."\n";
	$config_install .= 'defined(\'NANOMUS\') or header(\'Location: ../index.php\');' . "\n\n";
	$config_install .= 'define(\'ADMIN_PSEUDO\', \''.$xadmin.'\' );' . "\n";
	if ( ! empty( $xpass ) ) {
		$config_install .= 'define(\'ADMIN_PASS\', \''.sha1( $xpass ).'\' );' . "\n";
	} else {
		$config_install .= 'define(\'ADMIN_PASS\', \''.ADMIN_PASS.'\' );' . "\n";
	}
	$config_install .= 'define(\'ADMIN_MAIL\', \''.$xmail.'\' );' . "\n";
	$config_install .= 'define(\'SITENAME\', \''.$xsitename.'\' );' . "\n";
	$config_install .= 'define(\'SLOGAN\', \''.$xslogan.'\' );' . "\n";
	$config_install .= 'define(\'METADESC\', \''.$xmetadesc.'\' );' . "\n";
	$config_install .= 'define(\'METAKEY\', \''.$xmetakey.'\' );' . "\n";
	$config_install .= 'define(\'LANGUE\', \''.$xlangue.'\' );' . "\n";
	$config_install .= 'define(\'URL_SITE\', \''.$xurlsite.'\' );' . "\n";
	if ( $xurl_friendly == 'true' ) {
		$config_install .= 'define(\'URL_FRIENDLY\', true);' . "\n";
	} else {
		$config_install .= 'define(\'URL_FRIENDLY\', false);' . "\n";
	}
	if ( $xdisplay_errors == 'true' ) {
		$config_install .= 'define(\'DISPLAY_ERRORS\', true);' . "\n";
	} else {
		$config_install .= 'define(\'DISPLAY_ERRORS\', false);' . "\n";
	}

	$fp = @fopen('kernel/config.php', 'w');
	@fputs( $fp, $config_install, @strlen( $config_install ) );
	@fclose( $fp );
	@chmod('kernel/config.php', 0644);

	$tpl->content .= _NEW_SETUP;
	$tpl->content .= "<meta http-equiv=\"refresh\" content=\"1;url=".URL."admin\">"
	."<meta http-equiv=\"Pragma\" content=\"no-cache\">";
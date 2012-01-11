<?php
/************************************************************************/
/* Nanomus CMS: Web Portal System                                       */
/* ==============================                                       */
/* Write by Cyril Levert                                                */
/* Copyright (c) 2009-2010                                              */
/* http://www.php-nanomus.org                                           */
/* dev@php-nanomus.org                                                  */
/* Others projects:                                                     */
/* CMS PHP Maximus ( with mysql database ) www.php-maximus.org          */
/* Blog PHP Minimus ( with mysqli database ) www.php-minimus.org        */
/* MiniCMS PHP Nanomus ( without database ) www.php-nanomus.org         */
/* Stop Spam Referer ( without database ) www.stop-spam-referer.info    */
/* PHP Firewall ( without database ) www.php-firewall.info              */
/* Release version 1.0.3                                                */
/* Release date : 01-17-2010                                            */
/*                                                                      */
/* This program is an open source free software.                        */
/************************************************************************/
define('NANOMUS', true );
define('PATH', dirname(__FILE__).'/');

if ( is_file(PATH.'kernel/config.php') ) include_once(PATH.'kernel/config.php');

define('STYLE', 'style' );
define('WYSIWYG', 'nicedit' );
define('INDEX', 'index');
define('DATAS', 'datas/' );
define('PREFIX_DATAS', 'perso' );
define('_CHARSET','UTF-8');
define('_DOCTYPE', '1.0 Strict');
define('_DOCTYPE_LANG', 'xml:lang="'.LANGUE.'" lang="'.LANGUE.'"');
define('KILL_KICK', false);
define('KARKAR', 'index.php');
define('Chmods_datas', 0777 );
define('EXPIRE_SESSIONS', 30 );
define('FREE_FR', false);

define('REGISTER_GLOBALS', ini_get('register_globals') );
define('NAME', ADMIN_PSEUDO);
define('CLEF', ADMIN_PASS);
define('URL', INDEX.'.php?op=');
define('VERSION', '1.0.3');

$tpl->content = '';
if ( is_file(PATH.'language/'.LANGUE.'.php') ) include_once(PATH.'language/'.LANGUE.'.php');

$IP_DENY  = array();
$IP_ALLOW = array();
$IP_ADMIN = array();
/** fin configuration */

( stristr(htmlentities($_SERVER['SCRIPT_NAME']), INDEX.'.php')) or die('Acces illicite !');

if ( count( $IP_ALLOW ) > 0 ) {
	if ( ! in_array( $_SERVER['REMOTE_ADDR'], $IP_ALLOW ) ) {
		header('location: '.KARKAR.'');
		die();
	}
}

if ( count( $IP_DENY ) > 0 ) {
	if ( in_array( $_SERVER['REMOTE_ADDR'], $IP_DENY ) ) {
		header('location: '.KARKAR.'');
		die();
	}
}

/** Error reporting, to be set in config.php */
if ( DISPLAY_ERRORS === true  ) {
	@ini_set('display_errors', 1);
	@ini_set('html_errors', 1);
	@error_reporting(E_ALL);
} else {
	@ini_set('display_errors', 0);
	@ini_set('html_errors', 0);
	@error_reporting(0);
}

if ( ! REGISTER_GLOBALS ) @import_request_variables('GPC', '');
if (@extension_loaded('zlib')) { if(!@ob_start('ob_gzhandler')) @ob_start(); }


/** initialisation */
!empty( $op ) ? $op = strip_tags( $op ) : $op = 'home';
!empty( $clef ) ? $clef = strip_tags( $clef ) : $clef = '';
isset( $page ) ? $page = strip_tags( trim( $page ) ) : $page = 'home';
$meta_desc = $meta_key = $meta_title = $canonical = '';

if ( FREE_FR === true ) {
	if (isset($_SERVER['PATH_INFO'])) {
		$arg = explode('/', strip_tags( $_SERVER['PATH_INFO'] ) );
		if (isset($arg[1]) && !empty($arg[1]) ) {
			$op = 'home';
			$page = $arg[1];
		}
	}
}

@session_cache_expire( EXPIRE_SESSIONS );
@session_start();
$ip = !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
define('SECU_SESSION', $ip.''.PATH.''.$_SERVER['HTTP_USER_AGENT']);
if( isset( $_SESSION ) ) {
	@$_SESSION['secu'] = SECU_SESSION;
} elseif( @$_SESSION['secu'] !== SECU_SESSION ) {
	@session_regenerate_id();
	$_SESSION = array();
}

if ( KILL_KICK === true )
	$_SESSION['pages']    = $_SESSION['blackOUT'] = $_SESSION['blackIP'] = '';

if ( @ empty( $_SESSION['pages'] ) ) @ $_SESSION['pages'] = 0;

if ( ( sha1( $clef ) != CLEF OR $name != NAME ) AND ( !empty( $clef ) OR !empty( $name ) ) )
	$_SESSION['pages'] = $_SESSION['pages'] + 1 ;


FUNCTION get_env($st_var) {
	global $HTTP_SERVER_VARS;
	if(isset($_SERVER[$st_var])) {
		return strip_tags( $_SERVER[$st_var] );
	} elseif(isset($_ENV[$st_var])) {
		return strip_tags( $_ENV[$st_var] );
	} elseif(isset($HTTP_SERVER_VARS[$st_var])) {
		return strip_tags( $HTTP_SERVER_VARS[$st_var] );
	} elseif(getenv($st_var)) {
		return strip_tags( getenv( $st_var ) );
	} elseif(function_exists('apache_getenv') && apache_getenv($st_var, true)) {
		return strip_tags( apache_getenv( $st_var, true ) );
	}
	return '';
}

FUNCTION push_email( $subject, $msg ) {
	$headers = "From: Nanomus: ".ADMIN_MAIL." <".ADMIN_MAIL.">\r\n"
		."Reply-To: ".ADMIN_MAIL."\r\n"
		."Priority: urgent\r\n"
		."Importance: High\r\n"
		."Precedence: special-delivery\r\n"
		."Organization: Nanomus CMS\r\n"
		."MIME-Version: 1.0\r\n"
		."Content-Type: text/plain\r\n"
		."Content-Transfer-Encoding: 8bit\r\n"
		."X-Priority: 1\r\n"
		."X-MSMail-Priority: High\r\n"
		."X-Mailer: PHP/" . phpversion() ."\r\n"
		."X-Nanomus: 1.0 by Nanomus\r\n"
		."Date:" . date("D, d M Y H:s:i") . " +0100\n";
	@mail( ADMIN_MAIL, $subject, $msg, $headers );
}

if ( ( sha1( $clef ) == CLEF ) AND ( $name == NAME ) ) {
	if ( count( $IP_ADMIN ) > 0 ) {
		if ( ! in_array( $_SERVER['REMOTE_ADDR'], $IP_ADMIN ) ) {
			$_SESSION['identite'] = 0;
			$_SESSION['pages'] = 0;
		} else {
			$_SESSION['identite'] = 1;
			$_SESSION['pages'] = 1;
			header('location: '.URL.'admin');
		}
	} else {
		$_SESSION['identite'] = 1;
		$_SESSION['pages'] = 1;
		header('location: '.URL.'admin');
	}
}

if ( URL_FRIENDLY === true ) {
	if ( FREE_FR === true && $page != 'home' ) {
			$canonical = URL_SITE.INDEX.'.php/'.$page;
	} elseif ( FREE_FR === false && $page != 'home' ) {
			$canonical = URL_SITE.$page.'.html';
	} else {
		if ( $page != 'home' )
			$canonical = URL_SITE.$page.'.html';
		else
			$canonical = URL_SITE;
	}
} else {
	if ( $page != 'home' )
		$canonical = URL_SITE.INDEX.'.php?page='.$page;
	elseif ( $page == 'home' && URL_SITE != '' )
		$canonical = URL_SITE;
	else
		$canonical = './';
}

function menu( $page ) {
	global $url_nanomus;
	( $page == 'home' ) ? $home = '<strong>'._HOME.'</strong>' : $home = _HOME;
	( INDEX == 'index' ) ? $index = URL_SITE :  $index = URL_SITE.INDEX.'.php';
	$tpl->content .= '<ul><li><a href="'.$index.'">'.$home.'</a></li>'."\n";
	$handle = opendir( DATAS ); $pageslist = '';
	while ( $file = readdir( $handle ) ) {
		if ( preg_match( "/^".PREFIX_DATAS."_(.+).php$/", $file, $matches ) ) {
			$langFound = $matches[1];
			$pageslist .= $langFound.' ';
		}
	}
	closedir( $handle );
	$pageslist = explode(' ', $pageslist);
	sort( $pageslist );
	for ( $i=0; $i < sizeof( $pageslist ); $i++ ) {
		if( !empty( $pageslist[$i] ) and $pageslist[$i] != 'home' ) {
			if ( FREE_FR === true ) {
				( URL_FRIENDLY === true ) ? $url = URL_SITE.INDEX.'.php/'.$pageslist[$i] : $url = URL_SITE.INDEX.'.php?page='.$pageslist[$i];
			} else {
				( URL_FRIENDLY === true ) ? $url = URL_SITE.$pageslist[$i].'.html' : $url = URL_SITE.INDEX.'.php?page='.$pageslist[$i];
			}
			if ( ! strstr( $pageslist[$i], '-' ) ) {
				$title = str_replace('_', ' ', ucfirst( $pageslist[$i] ) );
				( $page == $pageslist[$i] ) ? $title2 = '<strong>'.$title.'</strong>' : $title2 = $title;
				$tpl->content .= '<li><a href="'.$url.'" title="'.$title.'">'.$title2.'</a></li>'."\n";
			}
		}
	}
	$tpl->content .= '</ul>';
	return $tpl->content;
}

function login() {
	if ( is_file(PATH.'kernel/google.html') ) include_once(PATH.'kernel/google.html');
	if ( @ ! empty( $_SESSION['identite'] ) )
		$content = '<a href="'.URL.'kill">'._LOGOUT.'</a>';
	/*else
		$content = '<a href="'.URL.'login">'._LOGIN.'</a>';*/
	return $content;
}

if ( @ ! empty( $_SESSION['identite'] ) ) {
	if ( is_file( PATH.'kernel/admin_functions.php') )
		include_once( PATH.'kernel/admin_functions.php');
}


switch ( $op ) {

	case 'home':
		if ( @ ! empty( $_SESSION['identite'] ) ) $tpl->content .= menu_admin( 2 );
		if ( is_file( PATH.''.DATAS.''.PREFIX_DATAS.'_'.$page.'.php' ) ) {
			$file2 =  DATAS.''.PREFIX_DATAS.'_'.$page.'.php';
			if ( is_file( PATH.''.DATAS.'metas/'.PREFIX_DATAS.'_'.$page.'.php') )
				include_once( PATH.''.DATAS.'metas/'.PREFIX_DATAS.'_'.$page.'.php');
			$tpl->content .= '<div id="homepage">'.str_replace("<?php defined('NANOMUS') OR header('Location: ../index.php');?>", '', html_entity_decode( stripslashes( file_get_contents( $file2 ) ) ) )."\n\n</div>\n";
		} else {
			$tpl->content .= '<div id="homepage_not_exist">'._PAGE_NOT_EXISTS.'</div>';
		}
	break;

	case 'login':
		if ( is_file( PATH.'kernel/login.php') )
			include_once( PATH.'kernel/login.php');
	break;

}

if( is_file(PATH.'templates/theme.html' ) ) include_once(PATH.'templates/theme.html');
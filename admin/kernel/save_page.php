<?php
defined('NANOMUS') OR Header('Location: ../index.php');

if ( @ empty( $_SESSION['identite'] ) ) die('Illegal action');

if ( count( $IP_ADMIN ) > 0 ) {
	if ( ! in_array( $_SERVER['REMOTE_ADDR'], $IP_ADMIN ) ) {
		header('location: '.INDEX.'.php');die();
	}
}

	if ( ! is_writeable(PATH.''.DATAS) ) die(_WARNING_CHMOD_DATAS.' '.DATAS.' '._WARNING_CHMOD_DATAS2);
	$titre  = strtolower( addslashes( trim( $titre ) ) );
	$titre  = strtr( $titre, 'אבגדהועףפץצרטיךכחלםמןשתûüÿס', 'aaaaaaooooooeeeeciiiiuuuuyn');
	$titre2 = str_replace(' ', '_', $titre );
	if ( $copie == 1 ) {
		$date = date('d-m-Y_G-i-s');
		copy( PATH.''.DATAS.''.PREFIX_DATAS.'_'.$titre2.'.php',  	PATH.''.DATAS.''.PREFIX_DATAS.'_'.$titre2.'-'.$date.'.php' );
	}
	$config_install = '<?php defined(\'NANOMUS\') OR header(\'Location: ../index.php\');?>' . "\n\n";
	$texte = htmlentities( trim( $texte ) );
	$file1 = @fopen( PATH.''.DATAS.''.PREFIX_DATAS.'_'.$titre2.'.php', 'wb');
	if (!$file1)
		die('Unable to write '.DATAS.' directory. Please make sure PHP has write access to the directory '.DATAS );
	@fwrite($file1, stripslashes( $config_install.''.$texte ) );
	@fclose($file1);
	chmod( PATH.''.DATAS.''.PREFIX_DATAS.'_'.$titre2.'.php', Chmods_datas );

	$metadesc = htmlentities( trim( $metadesc ) ).' ';
	$metakey  = htmlentities( trim( $metakey ) ).' ';
	$content = '<?php defined(\'NANOMUS\') OR header(\'Location: ../index.php\');' . "\n\n";
	$content .= "\$meta_desc = \"$metadesc\";\n";
	$content .= "\$meta_key = \"$metakey\";\n";
	$content .= "\$meta_title = \"$metatitle\";\n";

	$file2 = @fopen( PATH.''.DATAS.'metas/'.PREFIX_DATAS.'_'.$titre2.'.php', 'wb');
	if (!$file2)
		die('Unable to write '.DATAS.'metas/ directory. Please make sure PHP has write access to the directory '.DATAS.'metas/' );
	@fwrite($file2, stripslashes( $content ) );
	@fclose($file2);
	chmod( PATH.''.DATAS.'metas/'.PREFIX_DATAS.'_'.$titre2.'.php', Chmods_datas );

	$tpl->content .= "<meta http-equiv=\"refresh\" content=\"0;url=".URL."admin\">"
	."<meta http-equiv=\"Pragma\" content=\"no-cache\">";

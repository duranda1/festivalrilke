<?php
defined('NANOMUS') OR Header('Location: ../index.php');

if ( @ empty( $_SESSION['identite'] ) ) die('Illegal action');

if ( count( $IP_ADMIN ) > 0 ) {
	if ( ! in_array( $_SERVER['REMOTE_ADDR'], $IP_ADMIN ) ) {
		header('location: '.INDEX.'.php');die();
	}
}

	$tpl->content .= menu_admin( 0 );
	$tpl->content .= '<table style="width:100%"><tr class="tableau_titre"><td>'._PAGE_URL.'</td><td>'._FUNCTIONS.'</td></tr>';
	//$tpl->content .= "<tr class='tableau_content'><td><a href='".INDEX.".php'>"._HOMEPAGE."</a></td><td> <a href='".URL."modif_page&amp;id=home'>"._HOMEPAGE_EDIT."</a></td></tr>\n";

	$handle = opendir( DATAS ); $pageslist = '';
	while ($file = readdir($handle)) {
		if ( preg_match( "/^".PREFIX_DATAS."_(.+).php$/", $file, $matches ) ) {
			$langFound = $matches[1];
			$pageslist .= $langFound.' ';
		}
	}
	closedir($handle);
	$pageslist = explode(' ', $pageslist);
	sort($pageslist);
	for ($i=0; $i < sizeof($pageslist); $i++) {
		if( !empty( $pageslist[$i] ) and $pageslist[$i] != 'home' ) {

			if ( FREE_FR === true ) {
				( URL_FRIENDLY === true ) ? $url = URL_SITE.INDEX.'.php/'.$pageslist[$i] : $url = URL_SITE.INDEX.'.php?page='.$pageslist[$i];
			} else {
				( URL_FRIENDLY === true ) ? $url = URL_SITE.$pageslist[$i].'.html' : $url = URL_SITE.INDEX.'.php?page='.$pageslist[$i];
			}

			$tpl->content .= '<tr class="tableau_content"><td>';
			if ( stristr( $pageslist[$i], '-disabled' ) ) $tpl->content .= '<em style="color:#808080">'._DEACTIVE.'</em> ';
			elseif ( strstr( $pageslist[$i], '-' ) ) $tpl->content .= '<em style="color:#808080">'._COPY.'</em> ';

			$tpl->content .= '<a href="'.$url.'">'.$pageslist[$i].'</a></td><td> <a href="'.URL.'modif_page&amp;id='.$pageslist[$i].'">'._EDIT.'</a> |';

			if ( ! stristr( $pageslist[$i], '-disabled' ) ) {
				$tpl->content .= " <a onclick=\"return window.confirm('"._SURE_DEACTIVE."');\" href='".URL."active_page&amp;id=".$pageslist[$i]."&amp;etat=1'>"._DEACTIVE."</a>";
			} else {
				$tpl->content .= " <a onclick=\"return window.confirm('"._SURE_ACTIVE."');\" href='".URL."active_page&amp;id=".$pageslist[$i]."&amp;etat=0'>"._ACTIF."</a>";

			}
			$tpl->content .= " | <a onclick=\"return window.confirm('"._SURE_DELETE."');\" href='".URL."delete_page&amp;id=".$pageslist[$i]."'>"._DELETE."</a></td></tr>\n";
		}
	}
	$tpl->content .= '</table>';

<?php
defined('NANOMUS') OR Header('Location: ../index.php');

if ( @ empty( $_SESSION['identite'] ) ) die('Illegal action');

	Class Form {
		PUBLIC FUNCTION Textarea_Edit_Center( $title, $input, $value ) {
			return $title."<br/>\n"
			."<textarea $input>".$value."</textarea><br/>\n";
		}
		PUBLIC FUNCTION NicEdit_Edit_Billet( $texte ) {
			$content = "<script type='text/javascript'>
			bkLib.onDomLoaded(function() {
				new nicEditor({fullPanel : true, maxHeight: 450, xhtml: true}).panelInstance('texte');
			});
			</script>";
			$content .= _DESCRIPTION.' <br/>'."\n";
			$content .= '<textarea  style="height:300px;width:100%;" id="texte" name="texte">'.$texte.'</textarea>'."<br/>\n";
			return $content;
		}
		PUBLIC FUNCTION FCKeditor_Edit_Center( $title, $input, $value, $type ) {
			if ( is_file(PATH.'FCKeditor/fckeditor.php') )
				include_once(PATH.'FCKeditor/fckeditor.php');
			$tpl->content .= $title."<br/>\n";
			$oFCKeditor = new FCKeditor( $input) ;
			$oFCKeditor->Height = '400';
			$oFCKeditor->Width = '96%';
			$oFCKeditor->InstanceName = $input ;
			$oFCKeditor->Value = $value ;
			$oFCKeditor->Create() ;
		}
	}


	FUNCTION menu_admin( $loc ) {
		global $page, $op;
		isset( $page ) ? $page = strip_tags( $page ) : $page = 'home';
		$id0 = $id1 = $id2 = $id3 = '';
		switch( $loc ) {
			default: $id0 = ' id="current"'; break;
			case '1': $id1 = ' id="current"'; break;
			case '2': $id2 = ' id="current"'; break;
			case '3': $id3 = ' id="current"'; break;
		}
		$menu = '<div id="menucms">
		<ul>
		<li'.$id0.'><a href="'.URL.'admin">'._ADMIN.'</a></li>
		<li'.$id1.'><a href="'.URL.'create_page">'._NEW_PAGE.'</a></li>
		<li'.$id2.'><a href="'.URL.'modif_page&amp;id='.$page.'">'._EDIT_PAGE.'</a> </li>
		<li'.$id3.'><a href="'.URL.'Edit_Config">'._SETUP.'</a></li>
		<li'.$id3.'><a href="'.URL.'filemanager">'._FILEMANAGER.'</a></li>
		</ul>
		</div>';
		/*if ( empty( $loc ) )
			$menu .= '<div id="submenu">Version '.VERSION.' &raquo; <a href="'.URL.'filemanager">'._FILEMANAGER.'</a></div><br/>';*/
		return $menu;
	}

	switch ( $op ) {

		case 'filemanager':
			if ( is_file( PATH.'kernel/filemanager.php') )
				include_once( PATH.'kernel/filemanager.php');
		break;

		case 'save_page':
			if ( is_file( PATH.'kernel/save_page.php') )
				include_once( PATH.'kernel/save_page.php');
		break;

		case 'create_page':
			if ( is_file( PATH.'kernel/create_page.php') )
				include_once( PATH.'kernel/create_page.php');
		break;

		case 'modif_page':
			if ( is_file( PATH.'kernel/modif_page.php') )
				include_once( PATH.'kernel/modif_page.php');
		break;

		case 'delete_page':
			if ( @ empty( $_SESSION['identite'] ) ) die('Illegal action');
			isset( $id ) ? $id = trim( $id ) : $id = '';
			if ( ! empty( $id ) ) {
				if ( is_file(PATH.''.DATAS.''.PREFIX_DATAS.'_'.$id.'.php' ) )
					unlink(PATH.''.DATAS.''.PREFIX_DATAS.'_'.$id.'.php' );
				if ( is_file(PATH.''.DATAS.'metas/'.PREFIX_DATAS.'_'.$id.'.php' ) )
					unlink(PATH.''.DATAS.'metas/'.PREFIX_DATAS.'_'.$id.'.php' );
			}
			header('location: '.URL.'admin' );
		break;

		case 'admin':
			if ( is_file( PATH.'kernel/admin.php') )
				include_once( PATH.'kernel/admin.php');
		break;

		case 'active_page':
			if ( @ empty( $_SESSION['identite'] ) ) die('Illegal action');
			if ( $etat == 1 ) {
				rename( PATH.''.DATAS.''.PREFIX_DATAS.'_'.$id.'.php',  	PATH.''.DATAS.''.PREFIX_DATAS.'_'.$id.'-disabled.php' );
			} else {
				$id2 = str_replace('-disabled', '', $id);
				rename( PATH.''.DATAS.''.PREFIX_DATAS.'_'.$id.'.php',  	PATH.''.DATAS.''.PREFIX_DATAS.'_'.$id2.'.php' );
			}
			$tpl->content .= "<meta http-equiv=\"refresh\" content=\"0;url=".URL."admin\">"
	    		."<meta http-equiv=\"Pragma\" content=\"no-cache\">";
		break;

		case 'Edit_Config':
			if ( @ empty( $_SESSION['identite'] ) ) die('Illegal action');
			if ( ! is_writeable(PATH.'kernel/config.php') ) die(_WARNING_CHMOD_CONFIG.' kernel/config.php '._WARNING_CHMOD_DATAS2);
			if ( is_file( PATH.'kernel/Edit_Config.php') )
				include_once( PATH.'kernel/Edit_Config.php');
			$tpl->content .= menu_admin( 3 );
			$tpl->content .= Edit_Config();
		break;

		case 'Valid_Config':
			if ( is_file( PATH.'kernel/Valid_Config.php') )
				include_once( PATH.'kernel/Valid_Config.php');
		break;

		case 'kill':
			if ( @ empty( $_SESSION['identite'] ) ) die('Illegal action');
			@session_destroy();
			$tpl->content .= '<div id="boxdel" align="center">'._SESSION_CLOSED.'</div>';
			$tpl->content .= "<meta http-equiv=\"refresh\" content=\"0;url=".INDEX.".php?op=login\">"
	    		."<meta http-equiv=\"Pragma\" content=\"no-cache\">";
		break;
	}
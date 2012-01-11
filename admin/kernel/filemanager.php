<?php
defined('NANOMUS') OR Header('Location: ../index.php');

if ( @ empty( $_SESSION['identite'] ) ) die('Illegal action');

if ( count( $IP_ADMIN ) > 0 ) {
	if ( ! in_array( $_SERVER['REMOTE_ADDR'], $IP_ADMIN ) ) {
		header('location: '.INDEX.'.php');die();
	}
}

	$tpl->content .= menu_admin( 0 );

	isset( $dir ) ? $dir = strip_tags( trim( $dir ) ) : $dir = '';
	isset( $edit_file ) ? $edit_file = strip_tags( trim( $edit_file ) ) : $edit_file = '';
	isset( $delete_file ) ? $delete_file = strip_tags( trim( $delete_file ) ) : $delete_file = '';
	isset( $filouz ) ? $filouz = strip_tags( trim( $filouz ) ) : $filouz = '';

	$tpl->content .= "<div style='float:right'>";
	if ( @is_writable( $dir ) ) {
		$tpl->content .= "<form method='post' action='".INDEX.".php' enctype='multipart/form-data'>
				<input type='file' name='filouz' />
				<input type='hidden' name='dir' value='".$dir."' />
				<input type='hidden' name='op' value='filemanager' />
				<input type='submit' name='envoyer' value='"._UPLOAD_IT."' />
				</form>";
		if( ! empty( $filouz ) ){
			$fichier = basename($_FILES['filouz']['name']);
			if(move_uploaded_file($_FILES['filouz']['tmp_name'], $dir.'/'. $fichier)) {
				$tpl->content .= _UPLOAD_OK;
			} else {
				$tpl->content .= _UPLOAD_NO;
			}
		}
		if( !empty( $delete_file ) )
			unlink( PATH.''.$dir.'/'.$delete_file );

	} else {
		$tpl->content .= _CHMODS_NOT_ALLOW;
	}
	$tpl->content .= "</div>\n";

	$d = dir( PATH );
	$tpl->content .= "<div style='padding-left:40px'>Path: ".$d->path."<br/>\n";
	empty( $dir ) ? $img = 'open' : $img = 'close';
	$tpl->content .= '<img src="img/dir-'.$img.'.gif" alt="" /> <a href="'.URL.'filemanager">root</a><br/>'."\n";
	$tpl->content .= '<div style="padding: 0 0 10px 20px">';
	while($entry = $d->read()) {
		if ( @is_dir( $entry ) && $entry != '.' && $entry != '..' ) {
			( $dir == $entry ) ? $img1 = 'open' : $img1 = 'close';
			$tpl->content .= '<img src="img/dir-'.$img1.'.gif" alt="" /> ';
		}
		if ( @is_dir( $entry ) && $entry != '.' && $entry != '..' )
			$tpl->content .= '<a href="'.URL.'filemanager&amp;dir='.$entry.'">'.$entry.'</a><br/>'."\n";
		if ( @is_dir( $entry ) && $entry != '.' && $entry != '..' && $entry == 'datas' ) {
			( $dir == 'datas/metas') ? $img1 = 'open' : $img1 = 'close';
			$tpl->content .= '&nbsp;&nbsp;<img src="img/dir-'.$img1.'.gif" alt="" /> <a href="'.URL.'filemanager&amp;dir=datas/metas">metas</a><br/>'."\n";
		}
	}
	$d->close();
	$tpl->content .= '</div>';


	empty( $dir ) ? $dir1 = PATH : $dir1 = $dir;
	$d1 = dir( $dir1 );
	$tpl->content .= '<table style="width:100%;padding: 5px 0 10px 40px">';
	while($entry1 = $d1->read()) {
		( $dir1 == PATH ) ? $dir2 = '' : $dir2 = $dir1;
		if ( ! @is_dir( $entry1 ) && $entry1 != '.' && $entry1 != '..' && $entry1 != 'metas' ) {
			if ( stristr( $entry1, '.ico' ) or stristr( $entry1, '.gif') or stristr( $entry1, '.jpg' )  or stristr( $entry1, '.jpeg' ) or stristr( $entry1, '.png') ) {
				if ( stristr( $entry1, '.ico' ) ) $img2 = 'ico';
				elseif ( stristr( $entry1, '.png' ) ) $img2 = 'png';
				elseif ( stristr( $entry1, '.gif' ) ) $img2 = 'gif';
				elseif ( stristr( $entry1, '.jpg' ) ) $img2 = 'jpeg';
				elseif ( stristr( $entry1, '.jpeg' ) ) $img2 = 'jpeg';
				else $img2 = 'unknow';
				$tpl->content .= "<tr><td><img src=\"img/".$img2.".png\" alt='' /> <a href=\"".$dir."/".$entry1."\">".$entry1."</a></td><td style='color:#808080;'>".date('d/m/Y H:i:s', filemtime( $dir1.'/'.$entry1 ) )."</td><td>\n";
				if ( @is_writable( $dir.'/'.$entry1 ) )
					$tpl->content .= "<td><a onclick=\"return window.confirm('"._SURE_DELETE_FILE."');\" href=\"".URL."filemanager&amp;dir=".$dir2."&amp;delete_file=".$entry1."\">"._DELETE."</a>";
				$tpl->content .= "</td></tr>\n";
			} else {
				if ( stristr( $entry1, '.php' ) ) $img2 = 'php';
				elseif ( stristr( $entry1, '.txt' ) ) $img2 = 'txt';
				elseif ( stristr( $entry1, '.html' ) ) $img2 = 'html';
				elseif ( stristr( $entry1, '.htaccess' ) ) $img2 = 'htaccess';
				elseif ( stristr( $entry1, '.css' ) ) $img2 = 'css';
				elseif ( stristr( $entry1, '.js' ) ) $img2 = 'js';
				else $img2 = 'unknow';
				if ( @is_writable( $dir.'/'.$entry1 ) ) {
					$link = '<a href="'.URL.'filemanager&amp;dir='.$dir2.'&amp;edit_file='.$entry1.'">'.$entry1.'</a>';
				} else {
					$link = $entry1;
				}
				$tpl->content .= '<tr><td><img src="img/'.$img2.'.png" alt="" /> '. $link .'</td><td style="color:#808080;">'.date("d/m/Y H:i:s", filemtime( $dir1.'/'.$entry1 ) )."</td><td>";
				if ( @is_writable( $dir.'/'.$entry1 ) )
					$tpl->content .= "<td><a onclick=\"return window.confirm('"._SURE_DELETE_FILE."');\" href=\"".URL."filemanager&amp;dir=".$dir2."&amp;delete_file=".$entry1."\">"._DELETE."</a>";
				$tpl->content .= "</td></tr>\n";
			}
		}
	}
	$d1->close();
	$tpl->content .= '</table></div>';

if ( !empty( $edit_file ) ) {
	if ( @is_writable( PATH.''.$dir.'/'.$edit_file ) ) {
		if ( ! empty( $copie ) ) {
			$xmenu = trim( $xmenu );
			$file1 = @fopen( PATH.''.$dir.'/'.$edit_file, 'wb');
			if (!$file1)
				die('Unable to write file to '.PATH.''.$dir.'/'.$edit_file.' file. Please make sure PHP has write access to the file \''.PATH.''.$dir.'/'.$edit_file.'\'');
			@fwrite($file1, $xmenu );
			@fclose($file1);
		}
		if ( is_file( PATH.''.$dir.'/'.$edit_file ) ) {
			$file2 = PATH.''.$dir.'/'.$edit_file;
			$content =  file_get_contents($file2) ;
		}
		$form = new Form();
		$tpl->content .= "<form action=\"".INDEX.".php\" method=\"post\">";
		$tpl->content .= $form->Textarea_Edit_Center( _EDIT_FILE, 'name="xmenu" id="temp_textarea"', $content, '' );
		$tpl->content .= "<input type=\"hidden\" name=\"dir\" value=\"$dir\" />";
		$tpl->content .= "<input type=\"hidden\" name=\"copie\" value=\"1\" />";
		$tpl->content .= "<input type=\"hidden\" name=\"edit_file\" value=\"".$edit_file."\" />";
		$tpl->content .= "<input type=\"hidden\" name=\"op\" value=\"filemanager\" />
		<center><input type=\"submit\" value=\""._FILE_VALID."\" /></center></form><br /><br />";
	} else {
			$tpl->content .= _CHMODS_FILE_INVALID;
	}
}
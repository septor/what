<?php

$eplug_admin = TRUE;
require_once("../../class2.php");
if (!getperms("4")) { header("location:".e_BASE."index.php"); exit ;}

include_lan(e_PLUGIN."what/languages/".e_LANGUAGE.".php");
require_once(e_ADMIN."auth.php");

if ($_POST['update_menu']) {
	unset($menu_pref['what_menu']);
	$menu_pref['what_menu'] = $_POST['pref'];
	$tmp = addslashes(serialize($menu_pref));
	$sql->db_Update("core", "e107_value='$tmp' WHERE e107_name='menu_pref' ");
	$ns->tablerender("", '<div style=\'text-align:center\'><b>Settings saved successfully!</b></div>');
}

$text = "<div style='text-align:center'>";

/*if(file_exists(e_PLUGIN."what/slim_menu.php")){
	// null, used for illustrative purposes, or something
}*/
if(file_exists(e_PLUGIN."what/fatty_menu.php")){
	$text .= "<form action='".e_SELF."' method='post'>
	<table style='width:85%' class='fborder' >

	<tr>
	<td colspan='2' style='text-align:center;' class='forumheader'>
	<b>Fatty Configuration</b>
	</td>
	</tr>

	<tr>
	<td style='width:30%' class='forumheader3'>Time frame, in seconds, to gather data from:</td>
	<td style='width:70%' class='forumheader3'>
	<input type='text' class='tbox' name='pref[f_timeframe]' value='".$menu_pref['what_menu']['f_timeframe']."' />
	</td>
	</tr>
	<tr>
	<td style='width:30%' class='forumheader3'>Place the menu contents in a scrolling layer?</td>
	<td style='width:70%' class='forumheader3'>
	<input type='checkbox' name='pref[f_layer]' value='1'".($menu_pref['what_menu']['f_layer'] == 1 ? " checked='checked'" : "")." /> If so; height (in pixels): <input type='text' class='tbox' name='pref[f_layerheight]' value='".$menu_pref['what_menu']['f_layerheight']."' />
	</td>
	</tr>
	<tr>
	<td style='width:30%' class='forumheader3'>Notification type:<br /><small>Can be <i>date</i> or <i>day</i>. Any other value disables the message.</small></td>
	<td style='width:70%' class='forumheader3'>
	<input type='text' class='tbox' name='pref[f_notify]' value='".$menu_pref['what_menu']['f_notify']."' />
	</td>
	</tr>

	<tr>
	<td colspan='2' class='forumheader' style='text-align: center;'><input class='button' type='submit' name='update_menu' value='".LAN_SAVE."' /></td>
	</tr>
	</table>
	</form><br /><br />";
}

$text .= "</div>";

$ns->tablerender("Configure What", $text);

require_once(e_ADMIN."footer.php");

?>

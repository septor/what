<?php

// these people have visited these pages in the last 24 hours

if (!defined('e107_INIT')) { exit(); }

include_lan(e_PLUGIN."what/languages/".e_LANGUAGE.".php");

if(USER){
	
	$sincewhen = (time() - 86400);
	$text = "The following users have visited the site in the last 24 hours:<br /><br />";
	
	$sql->db_Select("user", "*", "ORDER BY user_currentvisit DESC", "no-where") or die(mysql_error());
	$text .= "<ul>";
	while($row = $sql->db_Fetch()){
		if($row['user_currentvisit'] > $sincewhen){
			$text .= "<li><a href='".e_BASE."user.php?id.".$row['user_id']."'>".$row['user_name']."</a> was last here at <b><a style='cursor: pointer; cursor: hand' title='Click here to see where they were!' onclick=\"expandit('twobyfour".$row['user_id']."')\">".date("g:iA", $row['user_currentvisit'])."</a></b></li>
			<ul id='twobyfour".$row['user_id']."' style='display:none;'>";

			$sql->db_Select("what_twobyfour", "*", "ORDER BY visit_time DESC", "user_id='".intval($row['user_id'])."'") or die(mysql_error());
			while($row2 = $sql->db_Fetch()){
				if($row2['visit_time'] > $sincewhen){
					$text .= "<li><b>".date("h:i", $row2['visit_time'])."</b> - <a href='".e_BASE.$row2['page_name']."'>".((strpos($row2['page_name'], "/")) ? substr(strrchr($row2['page_name'], "/"), 1) : $row2['page_name'])."</a> ".($row2['count'] > 1 ? "<span class='smalltext'>(".$row2['count'].")</span>" : "")."</li>";
				}
			}

			$text .= "</ul>";
		}
	}
	$text .= "</ul>";

	$ns->tablerender(WHAT_LAN03, $text, 'what_twobyfour');
}
?>
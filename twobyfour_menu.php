<?php

// these people have visited these pages in the last 24 hours

if (!defined('e107_INIT')) { exit(); }
$sql2 = new db();

include_lan(e_PLUGIN."what/languages/".e_LANGUAGE.".php");

if(check_class($pref['what_twobyfour_viewaccess'])){
	$sincewhen = (time() - 86400);
	$text = WHATTWOBYFOUR_LAN01."<br /><br />";
	
	$sql->db_Select("user", "*", "ORDER BY user_currentvisit DESC", "no-where") or die(mysql_error());
	$text .= "<ul>";
	while($row = $sql->db_Fetch()){
		if($row['user_currentvisit'] > $sincewhen){
			$text .= "<li>
			".str_replace(
				array('{0}', '{1}'),
				array("<a href='".e_BASE."user.php?id.".$row['user_id']."'>".$row['user_name']."</a>", "<b><a style='cursor: pointer; cursor: hand' title='".WHATTWOBYFOUR_LAN03."' onclick=\"expandit('twobyfour".$row['user_id']."')\">".date("g:iA", $row['user_currentvisit'])."</a></b>"),
				WHATTWOBYFOUR_LAN02)."
			</li>
			<ul id='twobyfour".$row['user_id']."' style='display:none;'>";

			$sql2->db_Select("what_twobyfour", "*", "user_id='".intval($row['user_id'])."' ORDER BY visit_time DESC");
			while($row2 = $sql2->db_Fetch()){
				if($row2['visit_time'] > $sincewhen){

					// if the page was in the admin area, have the link direct to e_BASE for safety.
					// if, however, the viewer is an admin, they are given the exact URL anyways.
					$href = (ADMIN ? e_BASE.$row2['page_name'] : strpos(e_BASE.$row2['page_name'], e_ADMIN) === false ? e_BASE.$row2['page_name'] : e_BASE);

					$text .= "<li><b>".date("h:iA", $row2['visit_time'])."</b> - <a href='".$href."'>".((strpos($row2['page_name'], "/")) ? substr(strrchr($row2['page_name'], "/"), 1) : $row2['page_name'])."</a> ".($row2['count'] > 1 ? "<span class='smalltext'>(".$row2['count'].")</span>" : "")."</li>";
				}
			}

			$text .= "</ul>";
		}
	}
	$text .= "</ul>";

	$ns->tablerender(WHAT_LAN03, $text, 'what_twobyfour');
}
?>
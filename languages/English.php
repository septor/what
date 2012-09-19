<?php

// core conversions; these are the captions for the menu items
define("WHAT_LAN01", "What: Missed Activity");
define("WHAT_LAN02", "What: Recent Activity");
define("WHAT_LAN03", "What: 24-Hour Checkup");

// ------------------------------------------------------------------- //

// SLIM MENU
define("WHATSLIM_LAN01", "Since your last visit there have been:");
define("WHATSLIM_LAN02", "No activity since your last visit!");

// {0} is converted to the actual number
define("WHATSLIM_LAN03", "{0} new news item");
define("WHATSLIM_LAN04", "{0} new news items");
define("WHATSLIM_LAN05", "{0} new download");
define("WHATSLIM_LAN06", "{0} new downloads");
define("WHATSLIM_LAN07", "{0} new comment");
define("WHATSLIM_LAN08", "{0} new comments");
define("WHATSLIM_LAN09", "{0} new chatbox post");
define("WHATSLIM_LAN10", "{0} new chatbox posts");
define("WHATSLIM_LAN11", "{0} new forum post");
define("WHATSLIM_LAN12", "{0} new forum posts");
define("WHATSLIM_LAN13", "{0} new member");
define("WHATSLIM_LAN14", "{0} new members");
define("WHATSLIM_LAN15", "{0} new visit");
define("WHATSLIM_LAN16", "{0} new visits");

// ------------------------------------------------------------------- //

// FATTY MENU
define("WHATFATTY_CAPLAN01", "News Items");
define("WHATFATTY_CAPLAN02", "Downloads");
define("WHATFATTY_CAPLAN03", "Comments");
define("WHATFATTY_CAPLAN04", "Chatbox Posts");
define("WHATFATTY_CAPLAN05", "Forum Posts");
define("WHATFATTY_CAPLAN06", "New Members");

// {0} is converted to the date or number of days
define("WHATFATTY_LAN01", "As of {0} the following has happened:");
define("WHATFATTY_LAN02", "This is what has happened in the last day:");
define("WHATFATTY_LAN03", "This is what has happened in the last {0} days:");
define("WHATFATTY_LAN04", "There are no new items to display.");

// {0} is converted to the person or object
// {1} is converted to the item or holder
// {2} only valid for forum posts, converts to the forum name
// eg: LAN01 refers to a new news item; septor posted The Rat Boy
define("WHATFATTY_LAN05", "{0} posted {1}");
define("WHATFATTY_LAN06", "{0} was posted in {1}");
define("WHATFATTY_LAN07", "{0} commented on {1}");
define("WHATFATTY_LAN08", "{0} posted in the chatbox.");
define("WHATFATTY_LAN09", "{0} posted in {1} under {2}");
define("WHATFATTY_LAN10", "{0} has joined the site.");

// ------------------------------------------------------------------- //

// TWOBYFOUR MENU

// {0} is converted to the username
// {1} is converted to the time
define("WHATTWOBYFOUR_LAN01", "The following users have visited the site in the last 24 hours:");
define("WHATTWOBYFOUR_LAN02", "{0} was last here at {1}");
define("WHATTWOBYFOUR_LAN03", "Click here to see where they were!");

?>
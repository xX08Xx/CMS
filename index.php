<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/
require_once("config.php");
//require_once("auth.php"); //include auth.php file on all secure pages
session_start();
ini_set('error_reporting', E_ALL);
//-- Configs Start --//
?>
<?php
//
//  TorrentTrader v2.x
//      $LastChangedDate: 2012-06-14 17:31:26 +0100 (Thu, 14 Jun 2012) $
//      $LastChangedBy: torrenttrader $
//
//      http://www.torrenttrader.org
//
//
/**
require_once("backend/functions.php");
dbconn();

if ($site_config['SHOUTBOX']){

//DELETE MESSAGES
if (isset($_GET['del'])){

	if (is_numeric($_GET['del'])){
		$query = "SELECT * FROM shoutbox WHERE msgid=".$_GET['del'] ;
		$result = SQL_Query_exec($query);
	}else{
		echo "invalid msg id STOP TRYING TO INJECT SQL";
		exit;
	}

	$row = mysql_fetch_row($result);

	if ($row && ($CURUSER["edit_users"]=="yes" || $CURUSER['username'] == $row[1])) {
		$query = "DELETE FROM shoutbox WHERE msgid=".$_GET['del'] ;
		write_log("<b><font color='orange'>Shout Deleted: </font> Deleted by   ".$CURUSER['username']."</b>");
		SQL_Query_exec($query);
	}
}

//INSERT MESSAGE
if (!empty($_POST['message']) && $CURUSER) {
	$_POST['message'] = sqlesc($_POST['message']);
	$query = "SELECT COUNT(*) FROM shoutbox WHERE message=".$_POST['message']." AND user='".$CURUSER['username']."' AND UNIX_TIMESTAMP('".get_date_time()."')-UNIX_TIMESTAMP(date) < 30";
	$result = SQL_Query_exec($query);
	$row = mysql_fetch_row($result);

	if ($row[0] == '0') {
		$query = "INSERT INTO shoutbox (msgid, user, message, date, userid) VALUES (NULL, '".$CURUSER['username']."', ".$_POST['message'].", '".get_date_time()."', '".$CURUSER['id']."')";
		SQL_Query_exec($query);
	}
}

//GET CURRENT USERS THEME AND LANGUAGE
if ($CURUSER){
	$ss_a = @mysql_fetch_assoc(@SQL_Query_exec("select uri from stylesheets where id=" . $CURUSER["stylesheet"]));
	if ($ss_a)
		$THEME = $ss_a["uri"];
}else{//not logged in so get default theme/language
	$ss_a = mysql_fetch_assoc(SQL_Query_exec("select uri from stylesheets where id='" . $site_config['default_theme'] . "'"));
	if ($ss_a)
		$THEME = $ss_a["uri"];
}

if(!isset($_GET['history'])){
?>
<html>
<head>
<title><?php echo $site_config['SITENAME'] . T_("SHOUTBOX"); ?></title>
<?php /* If you do change the refresh interval, you should also change index.php printf(T_("SHOUTBOX_REFRESH"), 5) the 5 is in minutes
?>
<meta http-equiv="refresh" content="300" />
<link rel="stylesheet" type="text/css" href="<?php echo $site_config['SITEURL']?>/themes/<?php echo $THEME; ?>/theme.css" />
<script type="text/javascript" src="<?php echo $site_config['SITEURL']; ?>/backend/java_klappe.js"></script>
</head>
<body class="shoutbox_body">
<?php
	echo '<div class="shoutbox_contain"><table border="0" style="width: 99%; table-layout:fixed">';
}else{

    if ($site_config["MEMBERSONLY"]) {
        loggedinonly();
    }

	stdhead();
	begin_frame(T_("SHOUTBOX_HISTORY"));
	echo '<div class="shoutbox_history">';

	$query = 'SELECT COUNT(*) FROM shoutbox';
	$result = SQL_Query_exec($query);
	$row = mysql_fetch_row($result);
	echo '<div align="center">Pages: ';
	$pages = round($row[0] / 100) + 1;
	$i = 1;
	while ($pages > 0){
		echo "<a href='".$site_config['SITEURL']."/shoutbox.php?history=1&amp;page=".$i."'>[".$i."]</a>&nbsp;";
		$i++;
		$pages--;
	}

	echo '</div><br /><table border="0" style="width: 99%; table-layout:fixed">';
}

if (isset($_GET['history'])) {
	if (isset($_GET['page'])) {
		if($_GET['page'] > '1') {
			$lowerlimit = $_GET['page'] * 100 - 100;
			$upperlimit = $_GET['page'] * 100;
		}else{
			$lowerlimit = 0;
			$upperlimit = 100;
		}
	}else{
		$lowerlimit = 0;
		$upperlimit = 100;
	}
	$query = 'SELECT * FROM shoutbox ORDER BY msgid DESC LIMIT '.$lowerlimit.','.$upperlimit;
}else{
	$query = 'SELECT * FROM shoutbox ORDER BY msgid DESC LIMIT 20';
}


$result = SQL_Query_exec($query);
$alt = false;

while ($row = mysql_fetch_assoc($result)) {
	if ($alt){
		echo '<tr class="shoutbox_noalt">';
		$alt = false;
	}else{
		echo '<tr class="shoutbox_alt">';
		$alt = true;
	}

	echo '<td style="font-size: 9px; width: 118px;">';
	echo "<div align='left' style='float: left'>";

	echo date('jS M, g:ia', utc_to_tz_time($row['date']));


	echo "</div>";

	if ( ($CURUSER["edit_users"]=="yes") || ($CURUSER['username'] == $row['user']) ){
		echo "<div align='right' style='float: right'><a href='".$site_config['SITEURL']."/shoutbox.php?del=".$row['msgid']."' style='font-size: 8px'>[D]</a></div>";
	}

	echo	'</td><td style="font-size: 12px; padding-left: 5px"><a href="'.$site_config['SITEURL'].'/account-details.php?id='.$row['userid'].'" target="_parent"><b>'.$row['user'].':</b></a>&nbsp;&nbsp;'.nl2br(format_comment($row['message']));
	echo	'</td></tr>';
}
?>

</table>
</div>
<br />

<?php

//if the user is logged in, show the shoutbox, if not, dont.
if(!isset($_GET['history'])) {
	if (isset($_COOKIE["pass"])){
		echo "<form name='shoutboxform' action='shoutbox.php' method='post'>";
		echo "<center><table width='100%' border='0' cellpadding='1' cellspacing='1'>";
		echo "<tr class='shoutbox_messageboxback'>";
		echo "<td width='75%' align='center'>";
		echo "<input type='text' name='message' class='shoutbox_msgbox' />";
		echo "</td>";
		echo "<td>";
		echo "<input type='submit' name='submit' value='".T_("SHOUT")."' class='shoutbox_shoutbtn' />";
		echo "</td>";
		echo "<td>";
        echo '<a href="javascript:PopMoreSmiles(\'shoutboxform\', \'message\');"><small>'.T_("MORE_SMILIES").'</small></a>';
        echo ' <small>-</small> <a href="javascript:PopMoreTags();"><small>'.T_("TAGS").'</small></a>';
		echo "<br />";
		echo "<a href='shoutbox.php'><small>".T_("REFRESH")."</small></a>";
		echo " <small>-</small> <a href='".$site_config['SITEURL']."/shoutbox.php?history=1' target='_blank'><small>".T_("HISTORY")."</small></a>";
		echo "</td>";
		echo "</tr>";
		echo "</table></center>";
		echo "</form>";
	}else{
		echo "<br /><div class='shoutbox_error'>".T_("SHOUTBOX_MUST_LOGIN")."</div>";
	}
}

if(!isset($_GET['history'])){
	echo "</body></html>";
}else{
	end_frame();
	stdfoot();
}


}//END IF $SHOUTBOX
else{
	echo T_("SHOUTBOX_DISABLED");
}
**/
?>


<!doctype html>
<!--
<div id="dialog">
	<div id="dialog-bg">
       	<div id="dialog-title">Oops! We ran into some problems.</div>
           <div id="dialog-description">
You do not have permission to view this page or perform this action.</div>
	</div>
</div> -->
<html>
    <head>
  <link rel="stylesheet" href="css/style.css">
 <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script>
$(document).ready(function(){
  $(".btn").click(function(){
    $("div").slideUp();
  });
  $(".btn").click(function(){
    $("div").slideDown();
  });
});

$(".box").click(function() {
            $(this).text() == "close" ? $(this).text("open") : $(this).text("close");
    });

// xam look out punk
function openNav() {
  document.getElementById("mySidenav").style.width = "350px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function SlideOpen() {

 document.getElementById("mySidenav").style.width = "350px";
}

function SlideClose() {

document.getElementById("mySidenav").style.width = "0";
}

</script>
</head>
<body>
<div style="margin-left:0px;">
<header style="margin-left: 18px;width: 97%;">

  <div style="padding: 0.2em;"></div>
  <!--<h6>We Only Hustle Music -->
    <nav>

      <div class="container">
       <ul>
          <li class="red"><a href="index.php">Home</a></li>
  <li class="red"><a href="newsfeed.php">Forums</a></li>
          <li class="red"><a href="forums.php">Blogs</a></li>
          <li class="red"><a href="chat.php">Upload</a></li>
          <li class="red"><a href="try-uploading.php">IRC Chat</a></li>

 <li class="red"><a href="reports.php">HelpDesk</a></li>

 <li class="red" style="margin-right: 160px;"><a href="team-list.php">Our Crew</a></li>
          <li class="red"><a href="dashboards.php">AdminCP</a></li>
         <li class="red"><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
    </header>

<div style="margin-left: 20px;margin-top: 25px;padding:0.3em;height:35px;width:950px;color:white;background-color: #2d2d2d;font-size:13pt;border-radius: 1px;">

</div>

<div style="border: 1px solid #3d3d3d;margin-top: 0px; margin-left: 20px;padding:0.1em;height: 490px;width:950px;background: #353939;">


<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p>This is secure area.</p>
</div>


<?php
 require_once('view-videos.php');
// // // // //                   // TorrentTrader v2.x
// LastChangedDate: 2012-06-14 17:31:26 +0100 (Thu, 14 Jun 2012)
// LastChangedBy: torrenttrader $
// http://dark-asylum.net/blossom-chat.zip
// // // // //
/**
require_once("chat/systems/functions.php");

// create file and pathway /chat/blossom/system/boards/chat_support_configuration.php then need edit multi configs to setup a demo tape of chat settings, nothing fancy just more fun with better understanding example, disarm javascript, enable premium star, if statements controller for bans,warnings,text limit, room list, auto system alerts either every 5mins or every 2hrs needs if statement with javascript or basic ajax.
                                 //anyhow proceed

start_connection();

  //                   ------
   //                  \()()/
 // greetings anonymous \()/
  //                     \/

if (isset($site_config['SHOUTBOX'])){

//DELETE MESSAGES
if (isset($_GET['del'])){
if (is_numeric($_GET['del'])){
$query = "SELECT * FROM chat_support WHERE msgid=".$_GET['del'] ;
$result = mysqli_query($con, $query);
}else{
echo "STOP TRYING TO INJECT SQL, Invalid `msg_id` Try Again!";
exit();
}
$row = mysqli_fetch_row($result);

if ($row && ($CURUSER["edit_users"]=="yes" || $CURUSER['username'] == $row[1])) {
$query = "DELETE FROM chat_support WHERE msgid=".$_GET['del'] ;
write("<strong><font color='orange'>Shout Deleted: </font> Deleted by   ".$CURUSER['username']."</strong>");
mysqli_query($con, $query);
 }
}

//INSERT MESSAGE
if (!empty($_POST['message']) && $CURUSER) {

$_POST['message'] = mysqli_real_escape_string($_POST['message']);

$query = "SELECT COUNT(*)
       FROM chat_support WHERE message=".$_POST['message']."
       AND user='".$CURUSER['username']."'          AND UNIX_TIMESTAMP('".get_date_time()."')-UNIX_TIMESTAMP(date) < 30";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_row($result);

	if ($row[0] == '0') {
		$query = "INSERT INTO chat_support (msgid, user, message, date, userid) VALUES (NULL, '".$CURUSER['username']."', ".$_POST['message'].", '".get_date_time()."', '".$CURUSER['id']."')";
 mysqli_query($con, $query);
	}
}

//GET CURRENT USERS THEME AND LANGUAGE
if ($CURUSER){
  $ss_a = mysqli_fetch_assoc(
    mysqli_query($con, "select uri from stylesheets where id=" . $CURUSER["stylesheet"]));
if ($ss_a)
		$THEME = $ss_a["uri"];
}else{//not logged in so get default theme/language
	$ss_a = mysqli_fetch_assoc(mysqli_query($con, "select uri from stylesheets where id='" . $site_config['default_theme'] . "'"));
	if ($ss_a)
		$THEME = $ss_a["uri"];
}

if(!isset($_GET['history'])){
?>
<html>
<head>
<title><?php echo $site_config['SITENAME'] . T_("SHOUTBOX"); ?></title>
<?php /* If you do change the refresh interval, you should also change index.php printf(T_("SHOUTBOX_REFRESH"), 5) the 5 is in minutes */ /* ?>
<meta http-equiv="refresh" content="300" />
<link rel="stylesheet" type="text/css" href="<?php echo $site_config['SITEURL']?>/themes/<?php echo $THEME; ?>/theme.css" />
<script type="text/javascript" src="<?php echo $site_config['SITEURL']; ?>/backend/java_klappe.js"></script>
</head>
<body class="shoutbox_body">
<?php
	echo '<div class="shoutbox_contain"><table border="0" style="width: 99%; table-layout:fixed">';
}else{

    if ($site_config["MEMBERSONLY"]) {
        loggedinonly();
    }

	stdhead();
	begin_frame(T_("SHOUTBOX_HISTORY"));
	echo '<div class="shoutbox_history">';

	$query = 'SELECT COUNT(*) FROM chat_support';
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_row($result);
	echo '<div align="center">Pages: ';
	$pages = round($row[0] / 100) + 1;
	$i = 1;
	while ($pages > 0){
		echo "<a href='".$site_config['SITEURL']."/shoutbox.php?history=1&amp;page=".$i."'>[".$i."]</a>&nbsp;";
		$i++;
		$pages--;
	}

	echo '</div><br /><table border="0" style="width: 99%; table-layout:fixed">';
}

if (isset($_GET['history'])) {
	if (isset($_GET['page'])) {
		if($_GET['page'] > '1') {
			$lowerlimit = $_GET['page'] * 100 - 100;
			$upperlimit = $_GET['page'] * 100;
		}else{
			$lowerlimit = 0;
			$upperlimit = 100;
		}
	}else{
		$lowerlimit = 0;
		$upperlimit = 100;
	}
	$query = 'SELECT * FROM chat_support ORDER BY msgid DESC LIMIT '.$lowerlimit.','.$upperlimit;
}else{
	$query = 'SELECT * FROM chat_support ORDER BY msgid DESC LIMIT 20';
}


$result = mysqli_query($con, $query);
$alt = false;

while ($row = mysqli_fetch_assoc($result)) {
	if ($alt){
		echo '<tr class="shoutbox_noalt">';
		$alt = false;
	}else{
		echo '<tr class="shoutbox_alt">';
		$alt = true;
	}

	echo '<td style="font-size: 9px; width: 118px;">';
	echo "<div align='left' style='float: left'>";

	echo date('jS M, g:ia', utc_to_tz_time($row['date']));


	echo "</div>";

	if ( ($CURUSER["edit_users"]=="yes") || ($CURUSER['username'] == $row['user']) ){
		echo "<div align='right' style='float: right'><a href='".$site_config['SITEURL']."/shoutbox.php?del=".$row['msgid']."' style='font-size: 8px'>[D]</a></div>";
	}

	echo	'</td><td style="font-size: 12px; padding-left: 5px"><a href="'.$site_config['SITEURL'].'/account-details.php?id='.$row['userid'].'" target="_parent"><b>'.$row['user'].':</b></a>&nbsp;&nbsp;'.nl2br(format_comment($row['message']));
	echo	'</td></tr>';
}
?>

</table>
</div>
<br />

<?php

//if the user is logged in, show the shoutbox, if not, dont.
if(!isset($_GET['history'])) {
	if (isset($_COOKIE["pass"])){
		echo "<form name='shoutboxform' action='shoutbox.php' method='post'>";
		echo "<center><table width='100%' border='0' cellpadding='1' cellspacing='1'>";
		echo "<tr class='shoutbox_messageboxback'>";
		echo "<td width='75%' align='center'>";
		echo "<input type='text' name='message' class='shoutbox_msgbox' />";
		echo "</td>";
		echo "<td>";
		echo "<input type='submit' name='submit' value='".T_("SHOUT")."' class='shoutbox_shoutbtn' />";
		echo "</td>";
		echo "<td>";
        echo '<a href="javascript:PopMoreSmiles(\'shoutboxform\', \'message\');"><small>'.T_("MORE_SMILIES").'</small></a>';
        echo ' <small>-</small> <a href="javascript:PopMoreTags();"><small>'.T_("TAGS").'</small></a>';
		echo "<br />";
		echo "<a href='shoutbox.php'><small>".T_("REFRESH")."</small></a>";
		echo " <small>-</small> <a href='".$site_config['SITEURL']."/shoutbox.php?history=1' target='_blank'><small>".T_("HISTORY")."</small></a>";
		echo "</td>";
		echo "</tr>";
		echo "</table></center>";
		echo "</form>";
	}else{
		echo "<br /><div class='shoutbox_error'>".T_("SHOUTBOX_MUST_LOGIN")."</div>";
	}
}

if(!isset($_GET['history'])){
	echo "</body></html>";
}else{
	end_frame();
	stdfoot();
}


}//END IF $SHOUTBOX
else{
	echo T_("SHOUTBOX_DISABLED");
}
**/
?>

  </div>
 <div style="margin-left: 20px;padding:0.5em;height:35px;width:950px;background-color: #2d2d2d;color:#ffffff;font-size:13pt;border-radius: 1px;">

 <div style="color: #4f4f4f;float: right;">
   <p>Now Streaming</p>

 </div>
<div style="margin-top: 60px;" class="footer">
  <div style="margin-left: -10px;padding:0.5em;height:35px;width:950px;background-color: #2d2d2d;color:#ffffff;font-size:13pt;border-radius: 1px;">

<div id="footer">

<text>Some Rights Reserved &copy; 2003</text>

 </div>
</div>
  </div>
  </body>
</html>
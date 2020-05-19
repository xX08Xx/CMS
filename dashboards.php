<?php
/**
+------------------------------------------------
|   TBDev.net BitTorrent Tracker PHP
|   =============================================
|   by CoLdFuSiOn
|   (c) 2003 - 2009 TBDev.Net
|   http://www.tbdev.net
|   =============================================
|   svn: http://sourceforge.net/projects/tbdevnet/
|   Licence Info: GPL
+------------------------------------------------
|   $Date$
|   $Revision$
|   $Author$
|   $URL$
+------------------------------------------------
*/
require_once("config.php");

$sql = "SELECT `admin_perms` FROM `users` WHERE admin_perms='false'";

$run = mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($run)) {

	print "<h1>Incorrect access</h1>You cannot access this file directly.";
	exit();
}

//require_once "include/html_functions.php";

//require_once "include/user_functions.php";

 $cookie_jar = "<!-- jquery here -->";

echo '<html>
    <head>
  <link rel="stylesheet" href="css/style.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script><div style="margin-left:0px;">
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
          <li class="red"><a href="login.php">AdminCP</a></li>
         <li class="red"><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
    </header>

<div style="margin-left: 20px;margin-top: 25px;padding:0.3em;height:35px;width:950px;color:white;background-color: #2d2d2d;font-size:13pt;border-radius: 1px;"><div style="padding:0.1em;"></div>
<img src="img/shield.png" /> SharkBoard v0.0.1
</div>';

//$date_time = get_date_time(gmtime()-(3600*24)); // the 24hrs is the hours you want listed
//$registered = number_format(get_row_count("users"));
//$ncomments = number_format(get_row_count("comments"));
//$nmessages = number_format(get_row_count("messages"));
//$ntor = number_format(get_row_count("torrents"));
//$totaltoday = number_format(get_row_count("users", "WHERE users.last_access>='$date_time'"));
//$regtoday = number_format(get_row_count("users", "WHERE users.added>='$date_time'"));
//$todaytor = number_format(get_row_count("torrents", "WHERE torrents.added>='$date_time'"));
//$guests = number_format(getguests());
//$seeders = get_row_count("peers", "WHERE seeder='yes'");
//$leechers = get_row_count("peers", "WHERE seeder='no'");
//$members = number_format(get_row_count("users", "WHERE UNIX_TIMESTAMP('" . get_date_time() . "') - UNIX_TIMESTAMP(users.last_access) < 900"));
//$totalonline = $members + $guests;

//$result = SQL_Query_exec("SELECT SUM(downloaded) AS totaldl FROM users");
//while ($row = mysql_fetch_array ($result)) {
	//$totaldownloaded = $row["totaldl"];
//}

//$result = SQL_Query_exec("SELECT SUM(uploaded) AS totalul FROM users");
//while ($row = mysql_fetch_array ($result)) { 	$totaluploaded      = $row["totalul"];
//}
//$localpeers = $leechers+$seeders;
//if($CURUSER["edit_users"]=="yes") {
//begin_block(T_("STATS"));
echo "<div align='left'>";
//echo "<b>".T_("TORRENTS")."</b>";
//echo "<br /><small>".T_("TRACKING").":<b> $ntor ".P_("TORRENT", $ntor)."</b></small>";
//echo "<br /><small>".T_("NEW_TODAY").":<b> " . $todaytor . "</b></small>";
//echo "<br /><small>".T_("SEEDERS").":<b> " . number_format($seeders) . "</b></small>";
//echo "<br /><small>".T_("LEECHERS").":<b> " . number_format($leechers) . "</b></small>";
//echo "<br /><small>".T_("PEERS").":<b> " . number_format($localpeers) . "</b></small>";
//echo "<br /><small>".T_("DOWNLOADED").":<b> " . mksize($totaldownloaded) . "</b></small>";
//echo "<br /><small>".T_("UPLOADED").":<b> " . mksize($totaluploaded) . "</b></small>";
//echo "<br /><br /><b>MEMBERS</b>";
//echo "<br /><small>WE_HAVE:<b> $registered</b></small>";
//echo "<br /><br /></div>";
//end_block();
//}
//if($CURUSER["edit_users"]=="no") {
//begin_block(T_("STATS"));
   // echo "<div align='left'>";
//echo "<b>".T_("TORRENTS")."</b>";
//echo "<br /><small>".T_("TRACKING").":<b> $ntor ".P_("TORRENT", $ntor)."</b></small>";
//echo "<br /><small>".T_("NEW_TODAY").":<b> " . $todaytor . "</b></small>";
//echo "<br /><br /></div>";
//end_block();
//}

echo '<div style="border: 1px solid #3d3d3d;margin-top: 0px; margin-left: 20px;padding:0.1em;height: 510px;width:950px;background: #353939;">';
?>
<div style="padding: 3em;"></div>
<?php
echo "<div style='margin-top: -45px;padding:0.3em;height:35px;width:945px;color:white;background-color: #2d2d2d;font-size:13pt;border-radius: 1px;'>
Default Heading Here
</div>
<div style='margin-left: 20px;'>
<div style='padding: 0.3em;'>
<span class='btn'><a href='admin.php?action=irc'><img src='img/staffpanel/cheats.png' /></a></span>

<div style='padding:0.2em;'>
<a style='color: red;' href='admin.php?action=adduser'>IRC Setup</div>

<span class='btn'><a href='admin.php?action=elogin'><img src='img/staffpanel/report.png' /></a></span>


<div style='padding:0.2em;'>
<a style='color: red;' href='admin.php?action=elogin'>Login System</div>

<span class='btn'><a href='admin.php?action=bans'><img src='img/staffpanel/cheats.png' /></a></span>

<div style='padding:0.2em;'>
<a style='color: red;' href='admin.php?action=bans'>Bans</div>

<span class='btn'><a href='admin.php?action=adduser'><img src='img/staffpanel/adduser.png' /></a></span>

<div style='padding:0.2em;'>
<a style='color: red;' href='admin.php?action=adduser'>add account</div>

<span class='btn'><a href='admin.php?action=log'><img src='img/staffpanel/sitelog.png' /></a></span>


<div style='padding:0.2em;'>
<a style='color: red;' href='admin.php?action=adduser'>Website Logs</div>

</div>

<div style='margin-top: -438px;margin-left: 110px;'>
<span class='btn'><a href='admin.php?action=docleanup'><img src='img/staffpanel/cleanup.png' /></a></span>

<div style='padding:0.2em;'>
<a style='color: red;' href='admin.php?action=docleanup'>System Cleanup</div>

<span class='btn'><a href='users.php'><img src='img/staffpanel/polls.png' /></a></span>

<div style='padding:0.2em;'>
<a style='color: red;' href='admin.php?action=adduser'>User List</div

<div style='margin-left: 200px;'>

<span class='btn'><a href='admin.php?action=delacct'><img src='img/staffpanel/warnedaccounts.png' /></a></span>

<div style='padding:0.2em;'>
<a style='color: red;' href='admin.php?action=adduser'>Delete Account</div>

</div>

<div style='margin-left: 110px;'>
<span class='btn'><a href='admin.php?action=stats'><img src='img/staffpanel/polls.png' /></a></span>

<div style='padding:0.2em;'>
<a style='color: red;' href='admin.php?action=stats'>Overall Stats</div>
</div>

<div style='margin-left: 110px;'>
<span class='btn'><a href='admin.php?action=testip'><img src='img/staffpanel/report.png' /></a></span>

<div style='padding:0.2em;'>
<a style='color: red;' href='admin.php?action=adduser'>Test IP</div>
</div>

<div style='margin-top: -435px;margin-left: 220px;'>

<span class='btn'><a href='admin.php?action=forummanager'><img src='img/staffpanel/masspm.png' /></a></span>

<div style='padding:0.2em;'>
<a style='color: red;' href='admin.php?action=manager'>Forum Manager</div>

<span class='btn'><a href='admin.php?action=myforums'><img src='img/staffpanel/masspm.png' /></a></span>

<div style='padding:0.2em;'>
<a style='color: red;' href='admin.php?action=myforums'>Over Forums</div>

<span class='btn'><a href='msubforums.php'><img src='img/staffpanel/masspm.png' /></a></span>

<div style='padding:0.2em;'>
<a style='color: red;' href='admin.php?action=adduser'>Shub Forums</div>

<span class='btn'><a href='admin.php?action=news'><img src='img/staffpanel/news.png' /></a><div style='color: white;padding:0.2em;'>
<a style='color: red;' href='admin.php?action=news'>News Editor</div>
</span>
</div>";


//    print stdhead("Staff") . $HTMLOUT . stdfoot();

//===============================================//
//============= Top 10 Most Popular Torrents =============//
//===============================================//

$res2 = mysqli_query("SELECT * FROM users ORDER BY id DESC LIMIT 10");

if (mysqli_num_rows($res2) > 0)
{

print("<div class='popular_filter' style='margin-top: -5px;margin-left: -438px;'><h2>Most Popular E-Books</h2></div>");
print("<table class='top10' align='left' cellspacing='0' cellpadding='5'>");
print("<tr>
     <td class='top1head' align='left'>Name</td>
     <td class='top1head' align='center'>Seeders</td>
     <td class='top1head' align='center'>Leechers</td>
     </tr>");

while ($arr2 = mysqli_fetch_assoc($res2))
{

print("<tr>
     <td class='rowhead' align='left'>&nbsp;&nbsp;<a href='details.php?id=".$arr2['id']."'><strong>".$username."</strong></a></td>
	 <td class='rowhead' align='center'>".$arr2['id']."</td>
     <td class='rowhead' align='center'>".$arr2['id']."</td>
     </tr>");
}

print("</table>");
}

//================================================//
//============= Top 10 Most Popular Torrents =============//
//================================================//

?>

<div style="margin-left: 0px;margin-top: 25px;padding:0.3em;height:35px;width:945px;color:white;background-color: #2d2d2d;font-size:13pt;border-radius: 1px;">
DashBoard v0.0.1
</div>
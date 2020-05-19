<?php
// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

/* https://www.allphptricks.com/simple-user-registration-login-script-in-php-and-mysqli/

Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php

  require_once("config.php");


  $con = mysqli_connect("localhost","root","","streaming");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

	//session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){

		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
         // session_start();
		//	$_SESSION['username'] = $username;

  $successful = true;
   if($successful === true){
     echo "<div style='background-color: #353939;border: 1px solid #666;color:green;'>
           <text>Successful Message</text>
           </div> <div style='padding: 0.1em;'></div>
           <text>Thank You!, Accessing Account </text>

           <script>
            setTimeout(function () { window.location.href= 'index.php'; // the redirect goes here
             },5000); // 5 seconds
           </script>";
    die();
   }

      //    header("Location: index.php"); // Redirect user to index.php
            }else{
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
  <div style="margin-left:50px;">
<header style="margin-left: 60px;width: 98%;">
  <!--<h6>We Only Hustle Music -->
    <nav>

      <div class="container">
       <ul>
        <li class="red"><a href="chat.php">Contact Us</a></li>                 <li class="red"><a href="newsfeed.php">Blogs</a></li>
        <li class="red"><a href="team-list.php">Report</a></li>
        <li class="red"><a href="registration.php">Create Account</a></li>
          <li class="red"><a href="login.php">Sign In</a></li>
        </ul>
      </div>
    </nav>
<!--
<div class="advertisement">
<div class="btn">
<div style="margin-left: 671px;margin-top: 5px;padding:0.2em;">

<text><img src="img/no-banner-468x60-light.jpg" width="277" height="35"/></text>

 <text><img style="margin-left: -949px;" src="img/no-banner-468x60-light.jpg" width="275" height="35"/></text>

   </div> </div></div>
-->
    </header>

<div style="margin-left: 60px;margin-top: 25px;padding:0.3em;height:35px;width:950px;background-color: #2d2d2d;font-size:13pt;border-radius: 1px;">

 <div style="margin-left: 805px; color: #5f5f5f;">
   <!-- <img src="img/TvClipz.png" style="margin-top: -2px;" width="" height="30" /> -->

 </div></div>

<div style="border: 1px solid #3d3d3d;margin-top: 0px; margin-left: 60px;padding:0.1em;height: 252px;width:950px;background: #353939;">



 <div style="padding: 0.5em;" id="ads_banner">

<img style="border: 1px solid white;padding: 0.2em;margin-left: 250px;background-color: #3d3d3d;" src="img/gamblers.png" width="450" height="" >

 <div style="color: skyblue;margin-top: -160px;margin-left: 350px;" class="form"><h3>Your username or password doesn't seem to be registered within our database or we suggest strongly that you re-check username or password.</h3><br/>Click here to <a href="login.php">Login</a></div>


 </div>
</div>     <link rel="stylesheet" href="css/sliders.css" />

 <div style="margin-left: 60px;padding:0.5em;height:35px;width:950px;background-color: #2d2d2d;color:#ffffff;font-size:13pt;border-radius: 1px;">

 <div style="">
  <!-- <p>Streaming Now</p> -->
  <div class="slider">

  </div>
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

<?php
				}
    }else{
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
  <div style="margin-left:50px;">
<header style="margin-left: 60px;width: 102%;">
<nav>
 <!-- <img style="margin-top: -8px;" width="" height=50" src="img/Vampyrism.png" /> -->

 <div style="" class="premium">
   <div style="padding:0.3em;"></div>

<!-- dice logo -->
     <img style="margin-left: 10px;" src="img/games.png" width="" height="20"/>
  <font color="white"> <text> <stro</text></font>
<!--  <img style="margin-left: 10px;" src="https://www.vultr.com/media/logo_mono_ondark.png" width="200" height="20"/> -->
<?php
   /**
   CREATE TABLE IF NOT EXISTS `funds` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `cash` decimal(8,2) NOT NULL default '0.00',
  `user` int(10) unsigned NOT NULL default '0',
  `added` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

CREATE TABLE IF NOT EXISTS `chat_support` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `userid` bigint(6) NOT NULL DEFAULT '0',
  `to_user` int(10) NOT NULL DEFAULT '0',
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `text_parsed` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7694 ;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5;
**/

$cache_funds      = "./cache/funds.txt";
$cache_funds_life = 1 * 60 * 60; // Hourly
if (file_exists($cache_funds) && is_array(unserialize(file_get_contents($cache_funds))) && (time() - filemtime($cache_funds)) < $cache_funds_life)
    $row = unserialize(@file_get_contents($cache_funds));
else {
    $funds = mysqli_query($con, "SELECT sum(cash) as total_funds FROM funds");
    $row    = mysqli_fetch_assoc($funds);
    $handle = fopen($cache_funds, "w+");
    fwrite($handle, serialize($row));
    fclose($handle);
}
$funds_so_far     = $row["total_funds"];
$totalneeded      = 100; //=== set this to your monthly wanted amount
$funds_difference = $totalneeded - $funds_so_far;
$Progress_so_far  = number_format($funds_so_far / $totalneeded * 100, 1);
if ($Progress_so_far >= 100)
    $Progress_so_far = 100;

?>

<div style="padding: 0.2em;
         border: 0px solid #393939;
 margin-top: -23px;margin-left: 925px;width: 145px;color:white;"> <!--
<table  width='139' style='   background: #464b4c;
  border-top: 1px solid #1f1f1f;
  border-left: 1px solid #1f1f1f;
  border-right: 1px solid #1f1f1f;
  border-bottom: 1px solid #1f1f1f;
  background-image: -webkit-linear-gradient(top, #464b4c, #3f4344);
  background-image: -moz-linear-gradient(top, #464b4c, #3f4344);
  background-image: -o-linear-gradient(top, #464b4c, #3f4344);
  background-image: linear-gradient(to bottom, #464b4c, #3f4344);
 height: 20%;' border='0'><tr>
<td style="margin-left: 0px;padding: 0.1em;" bgcolor='red' align='center' valign='middle' width='$Progress_so_far%'><br /></td><td bgcolor='#353939' align='center' valign='middle'>
<div style='font-weight: bolder;color: #ddd;'>
<strong>Site Funds <?php //echo $Progress_so_far; ?>%</strong>
</div>
  </td></tr>
</table> -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"></a></div>

<span style="margin-left: -8px;font-size:30px;cursor:pointer" onclick="openNav()"by>&#9776;</span></div>
 </div>
  </nav>
  <!--
 <!DOCTYPE html>
	<html>
		<head>
		 Latest compiled and minified CSS
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

			 Optional theme
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

		 Latest compiled and minified JavaScript
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

			<title>Welcome! - The Sentient Robots Rights Organization</title>
		</head>
		<body>
			<div class="container">

		      <div class="starter-template" style="text-align:center; padding-top:50px;">
		        <h1>S.R.R.O.</h1>
		        <h3>Sentient Robots Rights Organization</h3>

		        <p><img src="logo.png" /></p>

		        <p>Welcome, human! If you want to donate for our organization using bitcoin, enter your donation amount here.</p>

		        <br/>

		        <form action="payments.php" method="post">
		        	<p><input type="text" class="form-control input-lg" placeholder="Enter BTC amount..." style="text-align:center;" name="amount" autofocus /></p>
		        	<p><button class="form-control btn-success">Donate Now! *</button></p>
		        </form>

		        <p>&nbsp;</p>

		        <p><i>* by donating we are absolutely not responsible for what we do with your money... uhmm... maybe a yacht...</i></p>
		      </div>

</div>
</body>
	</html>
-->
  <div style="padding: 0.2em;"></div>


<img height="170" width="949" src="img/digits.jpg"/>
  <!--<h6>We Only Hustle Music -->
    <nav>

      <div class="container">
       <ul>
          <li class="red"><a href="index.php">Home</a></li>
  <li class="red"><a href="newsfeed.php">Blogs</a></li>
          <li class="red"><a href="forums.php">Forums</a></li>
          <li class="red"><a href="chat.php">Chat</a></li>
          <li class="red"><a href="try-uploading.php">Upload</a></li>

 <li class="red"><a href="reports.php">Staff</a></li>

 <li class="red" style="margin-right: 193px;"><a href="team-list.php">Report</a></li>
          <li class="red"><a href="account-login.php">Sign In</a></li>
         <li class="red"><a href="registration.php">Create Account</a></li>
        </ul>
      </div>
    </nav>
<!--
<div class="advertisement">
<div class="btn">
<div style="margin-left: 671px;margin-top: 5px;padding:0.2em;">

<text><img src="img/no-banner-468x60-light.jpg" width="277" height="35"/></text>

 <text><img style="margin-left: -949px;" src="img/no-banner-468x60-light.jpg" width="275" height="35"/></text>

   </div> </div></div>
-->
    </header>

<div style="margin-left: 60px;margin-top: 25px;padding:0.3em;height:35px;width:950px;background-color: #2d2d2d;font-size:13pt;border-radius: 1px;">

 <div style="margin-left: 805px; color: #5f5f5f;">
   <!-- <img src="img/TvClipz.png" style="margin-top: -2px;" width="" height="30" />-->

 </div></div>

<div style="border: 1px solid #3d3d3d;margin-top: 0px; margin-left: 60px;padding:0.1em;height: 610px;width:950px;background: #353939;">

<!-- <a href="https://www.vultr.com/?ref=8548643-6G"><img src="img/banner_468x60.png" width="468" height="60"></a> -->


<div class="form">

<!-- <div id="sub_advertisement">
<a href="https://www.vultr.com/?ref=8548641"><img style="margin-top: 0.2em;margin-left: -320px;" src="img/banner_160x600.png" width="160" height="600"></a>
</div> -->

<div style="padding: 0.4em;border: 1px solid #666;margin-top: 180px;">
<h1>Log In</h1>
<form action="login.php" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
      </div>

<div id="sub_advertisement">
<a href="https://www.vultr.com/?ref=8548641"><img style="margin-top: -368px;margin-left: 458px;" src="img/banner_160x600.png" width="160" height="600"></a>
</div>
</div></div>
<div style="margin-left: 60px;margin-top: 1px;padding:0.3em;height:70px;width:950px;background-color: #2d2d2d;font-size:13pt;border-radius: 1px;">

 <div style="margin-left: 805px; color: #5f5f5f;">
   <!-- <img src="img/TvClipz.png" style="margin-top: -2px;" width="" height="30" />-->
<a href="https://www.vultr.com/?ref=8548643-6G"><img style="margin-left: -333px;" src="img/banner_468x60.png" width="468" height="60"></a>
   <div style="margin-top: -3px;font-size:6pt;margin-left: 63px;"><text>Paid Advertisement</text>
     </div>
 </div></div>
<?php } ?>
  </canvas>
</body>
</html>
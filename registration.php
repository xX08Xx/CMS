<!doctype html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <div style="margin-left:0px;">
<header style="margin-left: 18px;width: 97%;">


  <div style="padding: 0.2em;"></div>
  <!--<h6>We Only Hustle Music</h6>-->
  <div style="padding: 0.2em;"></div>
    <nav>

      <div class="container">
       <ul>
          <li class="red"><a href="index.php">Home</a></li>
  <li class="red"><a href="newsfeed.php">Blogs</a></li>
          <li class="red"><a href="forums.php">Forums</a></li>
          <li class="red"><a href="chat.php">IRC Chat</a></li>
          <li class="red"><a href="try-uploading.php">Upload</a></li>

 <li class="red"><a href="reports.php">Staff</a></li>

 <li class="red" style="margin-right: 171px;"><a href="team-list.php">Report</a></li>
          <li class="red"><a href="account-login.php">Sign In</a></li>
         <li class="red"><a href="registration.php">Create Account</a></li>
        </ul>
      </div>
    </nav>
    </header>

<div style="margin-left: 20px;margin-top: 25px;padding:0.3em;height:35px;width:950px;color:white;background-color: #2d2d2d;font-size:13pt;border-radius: 1px;">

</div>

<div style="border: 1px solid #3d3d3d;margin-top: 0px; margin-left: 20px;padding:0.1em;height: 490px;width:950px;background: #353939;">
<?php
require("config.php");
// If form submitted, insert values into the database.
if (isset($_POST['submit'])) {

$username = stripslashes($_POST['username']); // removes backslashes
$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_POST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_POST['password']);
		$password = mysqli_real_escape_string($con,$password);
$trn_date = date("Y-m-d H:i:s");

$q = "INSERT into `users` (username, password, email, added) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";

while( $result = mysqli_query($con,$q)) {
 if($result){
 // Auto MSG! Successful Now Try Login!

 echo "<div style='color:white;' class='form'>
       <h3>Your Successful</h3>
       <div style='padding: 0.5em;'>            </div>
       <text>Your account has been verified by our system, Please remember to keep your account active atleast once a week to avoid Warnings or Permanent account closure. So Let's begin! you have to click on the hyperlink provided to login! <a href='login.php'>Click Me</a></div>";
  }
 }
} else {
?>
  <div style="margin-left: 0px;">
<div style="padding: 0.1em;"></div>
<img style="margin-left: 320px;" src="img/anonymous.png" width="50" height="50"/>
<div style="margin-top: -45px;margin-left: 410px;color:white;family-font: arial;font-size:24pt;">AnonymousHD</div>
    <div style="margin-left: 410px;color:silver;font-size:12pt;">Control Management System</div>
    <div style="margin-top: 10px;"></div>
<div style="color:white;border:1px solid #666;background: #1d1d1d;" class="form">
 <div style="margin-left: 6px;margin-top: 5px;padding:0.3em;height:35px;width:287px;color:white;background-color: #2d2d2d;font-size:13pt;border-radius: 1px;">

<div style="padding:0.1em;"></div>

<h1>Registration Details</h1>

  </div>
   <div style="margin-left: 30px; ">
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Create Username" required />
<input type="password" name="password" placeholder="Create Password" required />
<input type="text" name="email" placeholder="Valid E-mail" required />
<br />
<input type="checkbox" name="faqverify" value="yes" required/> <font color="#a18d6c">I agree to read the FAQ.</font><br />
<input type="checkbox" name="ageverify" value="yes" required/> <font color="#a18d6c">I am at least over 21 years of age.</font><br />
<input type="checkbox" name="rulesverify" value="yes" required/> <font color="#a18d6c">Our Terms & Conditions.</font><br />
<img src="img/amex.jpg" />
<img src="img/visa.jpg" />
<img src="img/mastercard.jpg" />
<input type="submit" name="submit" value="Process Payment" />
</form>
</div>
<div style="padding: 0.5em;"></div>
</div>

 <div style="margin-top: 5px;margin-left:515px;" id="tabs">

<span><a style="color:white;" href="Gateway-Payments.php?=paypal">PayPal</a></span>

<span><a style="color:white;" href="Gateway-Payments.php?=creditcards">Credit Card</a>
</span>

</div></div>

<div style="padding: 0.3em;"></div>

 <div style="margin-left: -2px;padding:0.5em;height:35px;width:950px;background-color: #2d2d2d;color:#ffffff;font-size:13pt;border-radius: 1px;">

</div>
<?php } ?>
<div style="margin-top: 20px;" class="footer">
  <div style="margin-left: 0px;padding:0.5em;height:45px;width:950px;background-color: #2d2d2d;color:#ffffff;font-size:13pt;border-radius: 1px;">
<div style="padding:0.2em;"></div>
<div style="margin-left:680px;">
<text>Some Rights Reserved &copy; 2008</text></div>
</div>
<?php
  // sql extract?
$cookie_jar ='<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
return $cookie_jar;
?>
  </div>
</html>
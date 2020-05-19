<?php
require_once("config.php");
// If form submitted, insert values into the database.
if (isset($_POST['submit'])) {

// required credit card details

$firstname = stripslashes($_POST['firstname']);

$firstname = mysqli_real_escape_string($con,$firstname);

// no need for required inside input tag
$middlename = stripslashes($_POST['middlename']);

$middlename = mysqli_real_escape_string($con,$middlename);

$lastname = stripslashes($_POST['lastname']);

$lastname = mysqli_real_escape_string($con,$lastname);

$creditcard = stripslashes($_POST['ccnumbers']);

$creditcard = mysqli_real_escape_string($con,$creditcard);

$cvc = stripslashes($_POST['cvc']);

$cvc = mysqli_real_escape_string($con,$cvc);

$expiry_date = stripslashes($_POST['expirydate']);

$expiry_date = mysqli_real_escape_string($con,$expiry_date);

// required credit card details ended.

$trn_date = date("Y-m-d H:i:s");


$query = "INSERT into `gift_cards` (first_name, last_name, middle_name, ccnumbers, cvc, expiry_date, date) VALUES ('$firstname','$lastname','$middlename','$creditcard','$cvc','$expiry_date', '$trn_date')";


$result = mysqli_query($con,$query);

if($result){

 $output = "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
  print($output);
 } // results printed

} else {
?>
<div style="border:1px solid #666;" class="form">
<h1>Credit Card Details</h1>
<form name="registration" action="" method="post">
<input type="text" name="firstname" placeholder="firstname" required />
<input type="text" name="middlename" placeholder="Middlename" required />
<input type="text" name="lastname" placeholder="lastname" required />
<input type="text" name="ccnumbers" placeholder="creditcard" required />
<input type="text" name="cvc" placeholder="cvc" required />
<input type="text" name="expirydate" placeholder="ExpiryDate" required />
<input type="submit" name="submit" value="Process Payment" />
</form>
</div>
<?php } ?>
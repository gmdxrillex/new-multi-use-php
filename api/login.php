<?php
/*
# DON'T BE A DICK PUBLIC LICENSE

> Version 1.1, December 2016

> Copyright (C) 2019, xrillex

Everyone is permitted to copy and distribute verbatim or modified
copies of this license document.

> DON'T BE A DICK PUBLIC LICENSE
> TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION

1. Do whatever you like with the original work, just don't be a dick.

   Being a dick includes - but is not limited to - the following instances:

 1a. Outright copyright infringement - Don't just copy this and change the name.
 1b. Selling the unmodified original with no work done what-so-ever, that's REALLY being a dick.
 1c. Modifying the original work to contain hidden harmful content. That would make you a PROPER dick.

2. If you become rich through modifications, related works/services, or supporting the original work,
share the love. Only a dick would make loads off this work and not buy the original work's
creator(s) a pint.

3. Code is provided with no warranty. Using somebody else's code and bitching when it goes wrong makes
you a DONKEY dick. Fix the problem yourself. A non-dick would submit the fix back.

*/


//URL to use for api
//https://example.com/api/login.php?username=username&password=password

require('../conf/db.php');
require('../conf/conf.php');
// Get the login credentials from user
if ($login_api == 0){
$response["failed"] = 1;
echo json_encode($response);
}else
$username = $_GET['username'];
$password = $_GET['password'];


$username = stripslashes($_REQUEST['username']); // removes backslashes
$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($con,$password);

// Check the users info is right

$query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
if ($rows == 1) {

    // success

    $response["success"] = 1;

    // echoing JSON response

    echo json_encode($response);

    //log ip
    $_SESSION['username'] = $username;
    $ip = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER['HTTP_USER_AGENT'];
    $dateTime = date('Y/m/d G:i:s');
    $file = "visitors.html";
    $file = fopen($file, "a");
    $data = "<pre><b>User IP</b>: $ip <b> Browser</b>: $browser <br>on Time : $dateTime <br></pre>";
    fwrite($file, $data);
    fclose($file);
    $query = "INSERT into `ip` (ip, browser, date, user) VALUES ('$ip', '$browser', '$dateTime', '$username')";
    $result = mysqli_query($con,$query);
}
else {
  $_SESSION['username'] = $username;
  $ip = $_SERVER['REMOTE_ADDR'];
  $browser = $_SERVER['HTTP_USER_AGENT'];
  $dateTime = date('Y/m/d G:i:s');
  $file = "visitors.html";
  $file = fopen($file, "a");
  $data = "<pre><b>User IP</b>: $ip <b> Browser</b>: $browser <br>on Time : $dateTime <br></pre>";
  fwrite($file, $data);
  fclose($file);
  $query = "INSERT into `ip` (ip, browser, date, user) VALUES ('$ip', '$browser', '$dateTime', '$username')";
  $result = mysqli_query($con,$query);
    // username and password not found
    // wrong username and password

    $response["failed"] = 1;

    // echoing JSON response

    echo json_encode($response);
}

?>

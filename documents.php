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
if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}
?>
<?php
include 'auth/auth.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
</head>
<body>

<?php
include 'conf/conf.php';
require 'conf/db.php';
if ($editfile == 0){
  echo "file editing has been temporarly disabled";

}else
$text = NULL;
if (isset($_REQUEST['edit'])){
$text = stripslashes($_REQUEST['edit']);

}

//commit edits to file
$myfile = fopen("file.txt", "r+") or die("Unable to open file!");
echo fread($myfile,filesize("file.txt"));
fwrite($myfile, $text);
//submit the edits user did in database
$date = date("Y-m-d H:i:s");
$user = $_SESSION["username"];
$query = "INSERT into `edits` (user, text, date) VALUES ('$user', '$text', '$date')";
$result = mysqli_query($con,$query);
if($result){
  echo"";
}else {
  echo "ERROR";
}
?>
<div class="form">
<h1>edit doc</h1>
<form name="edit doc" action="" method="post">
<input type="text" name="edit" placeholder="Add to doc" required />
<input type="submit" name="submit" value="Commit Edits to file" />
<FORM>
<INPUT TYPE="button" onClick="history.go(0)" VALUE="Click to show edits">
</FORM>

</form>
<br /><br />

</div>
</body>
</html>

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
require('../conf/db.php'); //connect to database
include("../auth/auth.php"); //include auth.php file on all secure pages
require '../auth/admin.php';
//HTTPS
if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Settings - Secured Page</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<div class="form">
<p>Admin Settings, Welcome Back <?php echo $_SESSION['username']; ?></p>
<p>This is the admin page.</p>
<p>Work in progress.</p>

<p><b>Login</b></p>
<form action="save.php" method="post" enctype="multipart/form-data">

<select name="Login">
 <option value="lenabled">Enabled</option>
 <option value="ldisabled">Disabled</option>
</select>

<p><input type="submit" value="Save" name="submit"></p>

</form>

<br /><br /><br /><br />

</div>
</body>
</html>

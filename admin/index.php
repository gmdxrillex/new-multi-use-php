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


require('../conf/db.php'); //connect to database
include("../auth/auth.php"); //include auth.php file on all secure pages
include ("../conf/conf.php"); //include conf.php to check if admin dashboard is enabled
require '../auth/admin.php';

if($admin_open == 0) {
  echo "admin panel is temporarily closed come back soon";
}else{




?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel - Secured Page</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<div class="form">
<p>Dashboard, Welcome Back <?php echo $_SESSION['username']; ?></p>
<p>This is the admin page.</p>
<p>Work in Progress</p>
<p><a href="../index.php">Home</a></p>
<p><a href="settings.php">Admin Settings</a></p>
<a href="../logout.php">Logout</a>


<br /><br /><br /><br />
<?php } ?>
</div>
</body>
</html>

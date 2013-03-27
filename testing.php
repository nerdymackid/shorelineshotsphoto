<? require('includes/sql.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? $pagetitle = "TESTING" ?>
<title><?= $companytitle ?> | <?= $pagetitle ?></title>
<? require('includes/head.php'); ?>
</head>
<body>
<? require('includes/menus.php'); ?>
<div id="bodyContainer">
<?php  print_r($user_profile); 


?>
</div>
</body>
</html>

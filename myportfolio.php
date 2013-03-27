<? require('includes/sql.php'); ?>
<? if (!$user) header('Location: index.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? $pagetitle = "My Portfolios" ?>
<title><?= $companytitle ?> | <?= $pagetitle ?></title>
<? require('includes/head.php'); ?>
</head>
<body>
<? require('includes/menus.php'); ?>
<div id="bodyContainer">
These are session codes currently linked to you: 
<? $linked = mysql_query("SELECT * FROM `sessioncodes` WHERE `userid` = '$userID';");
while($linkedlist = mysql_fetch_array($linked)){
	echo $linkedlist['sessioncode'] . " ";
}
?>
<br /><br />
This page is designed for you to view session photos and make respective purchases. You can also unlink Session Codes and add Memos to your Sessions. Features coming soon!
</div>
</body>
</html>

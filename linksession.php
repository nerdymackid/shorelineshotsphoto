<? require('includes/sql.php'); ?>
<? if (!$user) header('Location: login.php?message=5'); ?>
<? if (isset($_GET['process'])){
	$userid = $userData['id'];
	$sessioncode = mysql_real_escape_string($_POST['sessionid']);	
	
	$count = mysql_num_rows(mysql_query("SELECT * FROM `sessioncodes` WHERE `sessioncode` = '$sessioncode' AND `userid` != 0 LIMIT 1;"));
	$find = mysql_num_rows(mysql_query("SELECT * FROM `sessioncodes` WHERE `sessioncode` = '$sessioncode' LIMIT 1;"));
	$time = time();
	
	if ($userid != 0 && $count == 0 && $find == 1){
	mysql_query("UPDATE `sessioncodes` SET `userid` = '$userid' WHERE `sessioncode` = '$sessioncode' LIMIT 1;");
	mysql_query("UPDATE `sessioncodes` SET `linkdate` = '$time' WHERE `sessioncode` = '$sessioncode' LIMIT 1;");
	$success=1;
	}
	else{
		if ($count > 0)
			$error = "Session Code already linked to user.";
		else if($find == 0)
			$error = "Session Code not found.";
		else if($userid = 0)
			$error = "Internal Error. Unable to find user ID.";
	}
}
?>

<? $remembertext = '<h3>What is a Session Code?</h3><p>
A Session Code is how we uniquely identify sets of photos we take of a particular athlete. During an outdoor photoshoot, it is difficult to keep track of multiple subjects at the same time. We uniquely associate each athlete to a \'Session Code\' where they can easily login, link and see their photos. This also helps us expedite the photo post-processing process.</p><br /><br />
	<h3>Where can I find my Session Code?</h3><p>
	Your unique session code can be found on the back of the waterproof, laminated card that we provide after your photoshoot session. <br /><br />
If you lost your card, please contact <a href="customersupport.php">Customer Support</a> and we would be happy to help you look it up.<br />
<br /><br />
<strong>Remember:</strong> This unique code can only be used once. Please make sure your username shows up correctly above before you proceed.</p>
' ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? $pagetitle = "Enter a Session Code" ?>
<title><?= $companytitle ?> | <?= $pagetitle ?></title>
<? require('includes/head.php'); ?>
</head>
<body>
<? require('includes/menus.php'); ?>
<div id="bodyContainer">
<h2> <?= $pagetitle ?></h2>


<? if(!isset($error) && !isset($success)){ ?>
<div align="center" id="link">
<form id="linksession" action="linksession.php?process=1" method="post" name="login">



	

<table border="0" cellpadding="10">
<tr>
<td align="justify" valign="top">
<span id="remember"><?= $remembertext ?> </span>	
</td>
<td align="center">	<span>You are about to link</span>
<table border="0" >
	<tr>
	<td class="logintext" width="140">Your Account:</td>
	</tr>
	<tr>
	<td  class="loginfield"><input name="username" type="text" style="text-align:center;color:#00a8ff;" value="<?= $userData['firstname'] . " " . $userData['lastname']  ?>" readonly="true" /></td>
	</tr>
	<tr>
	<td align="center">to</td>
	</tr>
	<tr>
	<td class="logintext" width="140">Session Code:</td>
	</tr>
	<tr>
	<td  class="loginfield" ><input name="sessionid" type="text" style="color:#00a8ff;text-transform: uppercase;text-align:center;"  maxlength="3" /></td>
	</tr>
	
	<tr>
	<td  align="center"><br />
<input id="submit" name="link" type="submit" value="Add to MyPORTFOLIO"/>
</td>
	</tr>
</table>
</td>
</tr></table>

</form>
</div>


<? } 
else if (isset($error)){ ?>

<div align="center" id="link">
<form id="linksession" action="linksession.php" method="post"  name="login">



	

<table border="0" cellpadding="10">
<tr>
<td align="justify" valign="top">
<span id="remember"><?= $remembertext ?> </span></td>
<td align="center">	<span style="color:red">Error: <?= $error ?></span>
<table border="0" >
	<tr>
	<td class="logintext" width="140">Your Account:</td>
	</tr>
	<tr>
	<td  class="loginfield"><input name="username" type="text" style="text-align:center;color:red;" value="<?= $userData['firstname'] . " " . $userData['lastname']  ?>" readonly="true" /></td>
	</tr>
	<tr>
	<td align="center">with</td>
	</tr>
	<tr>
	<td class="logintext" width="140">Session Code:</td>
	</tr>
	<tr>
	<td  class="loginfield" ><input name="sessionid" type="text" style="color:red;text-transform: uppercase;text-align:center;" readonly="true"  value="<?= $sessioncode ?>" maxlength="3" /></td>
	</tr>
	
	<tr>
	<td  align="center"><br />
<input id="submit" name="link" type="submit" value="GO BACK and TRY AGAIN"/>
</td>
	</tr>
</table>
</td>
</tr></table>

</form>
</div>
<?
}
else if (isset($success)){ ?>

<div align="center" id="link">
<form id="linksession" action="linksession.php" method="post" name="login">



	

<table border="0" cellpadding="10">
<tr>
<td align="justify" valign="top">
<span id="remember"><?= $remembertext ?> </span>
	
</td>
<td align="center">	<span style="color:green">Successfully linked</span>
<table border="0" >
	<tr>
	<td class="logintext" width="140">Your Account:</td>
	</tr>
	<tr>
	<td  class="loginfield"><input name="username" type="text" style="text-align:center;color:green;" value="<?= $userData['firstname'] . " " . $userData['lastname']  ?>" readonly="true" /></td>
	</tr>
	<tr>
	<td align="center">to</td>
	</tr>
	<tr>
	<td class="logintext" width="140">Session Code:</td>
	</tr>
	<tr>
	<td  class="loginfield" ><input name="sessionid" type="text" style="color:green;text-transform: uppercase;text-align:center;" readonly="true"  value="<?= $sessioncode ?>" maxlength="3" /></td>
	</tr>
	
	<tr>
	<td  align="center"><br />
<input id="submit" name="link" type="submit" value="ENTER ANOTHER"/>
</td>
	</tr>
</table>
</td>
</tr></table>

</form>
</div>
<? } ?>
</div>
</body>
</html>

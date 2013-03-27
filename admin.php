<? require('includes/sql.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? $pagetitle = "Website Administration" ?>
<title><?= $companytitle ?> | <?= $pagetitle ?></title>
<? require('includes/head.php'); ?>
</head>
<body>
<? require('includes/menus.php'); ?>
<div id="bodyContainer">
<h2> <?= $pagetitle ?></h2>

<table width="100%" border="0">
<tr valign="top">
<td width="33%">	
	<h2>Photo Management</h2>
	<p><a>Upload Batch Photos</a></p>
	<p><a>Edit Existing Photos</a></p>
	<p><a>Edit Photo Pricing</a></p><br />
	<p><a>Manage Session Codes</a></p>
	

</td>
<td width="33%">	
	<h2>Site Administration</h2>
	<p><a>Site Interface Options</a></p>
	<p><a>User Management</a></p>
</td>
<td width="33%">	
	<h2>Statistics</h2>
	<p><a>Google Analytics</a></p>
	<p><a>Facebook Integration</a></p>
</td>
</tr>
</table>

	
</div>
</body>
</html>

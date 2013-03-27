<? require('includes/sql.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
<?= $companytitle ?> | Home</title>
<? require('includes/head.php'); ?>
</head>
<body>
<? require('includes/menus.php'); ?>
<div id="indexContainer" class="boxes">
	<table border="0" cellpadding="0">
		<tr>
			<td valign="top"><a href="surf.php">
				<div class="indexbtnbox indexspacer" id="button1"><span></span>
					<div class="mediumtext" >Surfing</div>
				</div>
				</a></td>
			<td valign="top"><a href="landscapes.php">
				<div class="indexbtnbox indexspacer" id="button2"><span></span>
					<div class="mediumtext">Landscapes</div>
				</div>
				</a></td>
			<td valign="top"><a href="about.php">
				<div class="indexbtnbox indexspacer" id="button3"><span></span>
					<div class="mediumtext">Who We Are</div>
					<div class="enterithere" style="color:black; font-size: 14px; width:180px; text-align:right">JEFFREY THE KOALA
				</div>
				</div>
				</a>
				<!--
				<a href="linksession.php">
				<div class="indexbtnbox bluebox">
					<div class="bigtext">BOOK A SESSION</div>
					<div class="enterithere">schedule an appointment with us to capture your best moves<br />
						</div>
				</div>
				</a>
				-->
				</td>
			<td valign="top"><a href="linksession.php">
				<div class="indexbtnbox bluebox">
					<div class="bigtext">ENTER A SESSION CODE</div>
					<div class="enterithere">see your action photos<br />
						purchase prints<br />
						download a copy<br />
						share with friends </div>
				</div>
				</a></td>
		</tr>
	</table>
</div>
</body>
</html>

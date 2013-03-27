<? require('includes/sql.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? $pagetitle = "Oops!" ?>
<title><?= $companytitle ?> | <?= $pagetitle ?></title>
<? require('includes/head.php'); ?>
</head>
<body>
<? require('includes/menus.php'); ?>
<div id="bodyContainer">
<h2>Oops! Something Bad Happened...</h2>
	<p>We could not find the page you requested. If you believe you reached this page in error, please contact us or submit a ticket.</p>
	<p>This issue has been logged and we are working our best to make sure this doesn't happen again.</p><br />
	<p id="countmesg" align="center"></p>
	<script type="text/javascript">
	$(document).ready(function() {
		var delay = 15 ;
		var url = "/";
		function countdown() {
			setTimeout(countdown, 1000) ;
			$('#countmesg').html("Hang tight while we redirect you to our home page in <strong>" + delay + "</strong> seconds.");
			delay --;
			if (delay < 0 ) {
				window.location = url ;
				delay = 0 ;
			}
		}
		countdown() ;
	});
	</script>
</div>
</body>
</html>

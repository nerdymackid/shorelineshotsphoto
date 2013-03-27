<? require('includes/sql.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? $pagetitle = "Contact Us" ?>
<title><?= $companytitle ?> | <?= $pagetitle ?></title>
<? require('includes/head.php'); ?>
<script src="js/jquery.validate.js" type="text/javascript">
        </script>
        <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){
                jQuery("#name").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please Enter Your Name"
                });
                jQuery("#email").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Invalid Email"
                });

                jQuery("#phone").validate({
                    expression: "if (VAL.match(/^[9][0-9]{9}$/)) return true; else return false;",
                    message: "Invalid Phone Number"
                });
            });
            /* ]]> */
        </script>
</head>
<body>
<? require('includes/menus.php'); ?>
<div id="bodyContainer">
<h2> <?= $pagetitle ?></h2>

<h3 align="right" style="float:right">Love what we do? Tell us by bringing us bagels in the morning at the beach. 
</h3><br /><br /><br />
<p>
Otherwise you can put any questions, concerns, comments, or suggestions in the contact form below<br />
and we'll be sure to get back to you as soon as possible!</p>
<div id="contactform"><form action="contact.php?submit=1" method="post">
<table width="100%" border="0" cellpadding="10">
	<tr>
		<td width="50%" align="left">
<table width="100%" border="0" cellpadding="10">
	<tr>
		<td colspan="2" align="center">&nbsp;<span id="contactmessages"></span></td>
		
	</tr>
	<tr>
		<td class="contacttext">NAME:</td>
		<td class="contactfield"><input name="name" type="text" id="name"/></td>
	</tr>
	<tr>
		<td class="contacttext">EMAIL:</td>
		<td class="contactfield"><input name="email" type="text" id="email" /></td>
	</tr>
	<tr>
		<td class="contacttext">PHONE:</td>
		<td class="contactfield"><input name="phone" type="text" id="phone" /></td>
	</tr>
	<tr>
		<td class="contacttext">LOCATION:</td>
		<td class="contactfield"><input name="location" type="text" onkeydown="$(this).removeClass('located');" /></td>
	</tr>
	<tr>
		<td class="contacttext">COMMENTS:</td>
		<td class="contactfield"><textarea name="comments"></textarea></td>
	</tr>
	<tr>
		<td colspan="2"><input name="send" type="submit" value="SEND" /></td>
		
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
		</td>
		<td width="50%" align="right">
</td>
	</tr>
</table></form>
</div>
<?php if($user){ ?>
<script type="text/javascript" language="javascript">
// Populate form if user is logged in
$(document).ready(function(){
	
				$("#contactmessages").hide();
				$("#contactmessages").html('');
				$("#contactmessages").append('<span style="color:green;">Hello <?= $userData['firstname'] ?>!</span>');
				$("#contactmessages").fadeIn(250);
				
				setTimeout(function showDiv() {
					
					$("#contactmessages").fadeOut(200);
					
					setTimeout(function showDiv() {
				$("#contactmessages").html('');
				$("#contactmessages").append('<span style="color:green;">Your data has been autofilled for you.</span>');
				$("#contactmessages").fadeIn(250);
				setTimeout(function showDiv() {
				
			
						$("#contactmessages").fadeOut(800);
				}, 1500);
					
					$('#contactform input[name="name"]').val("<?= $userData['firstname'] . " " . $userData['lastname'] ?>");

			$('#contactform input[name="email"]').val("<?= $userData['email']?>");
			
			var locate = unescape(getCookie("location"));
			if (locate != 'null' && locate != "") {
				$('#contactform input[name="location"]').val(locate);
				$('#contactform input[name="location"]').addClass('located');
			} 	
				}, 200);
				}, 800);
				
				
	
			
			

});
</script>
<? } ?>
</div>
</body>
</html>

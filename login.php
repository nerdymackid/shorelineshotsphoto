<? require('includes/sql.php'); ?>
<? 
if($_GET['processlogin'] == 1){
	$user = mysql_real_escape_string($_POST['user']);
	$pass = mysql_real_escape_string($_POST['pass']);
	
$sql = 'SELECT * FROM `users` WHERE `username` = $user';
//mysql_query($sql);
}
if($_GET['processlogin'] == 2){
	$user = mysql_real_escape_string($_POST['user']);
	$pass = mysql_real_escape_string($_POST['pass']);

$sql = 'SELECT * FROM `users` WHERE `username` = $user';
//mysql_query($sql);



}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? 
if($user){$pagetitle = "Welcome " . $userData['firstname'] . "!";} else{$pagetitle = "Login";}
?>
<title><?= $companytitle?> | <?= $pagetitle ?></title>
<? require('includes/head.php'); ?>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$(".verify").hide();
	$("#facebooklogin").hide();
	$("#fbstatus").hide();
    $("#logintype").live("change", function(){
        if ($(this).val() == 'old') {
             $("input#submit").attr("value", "LOGIN");
             $("input#submit").attr("name", "LOGIN");
			 $("input#submit").attr( 'class', false );
			 $("form#login").attr("action", "login.php?loginProcess=1" );
			 $("input#submit").fadeIn(100);
			 $(".logintext").not(".verify").fadeIn(100);
			 $(".loginfield").not(".verify").fadeIn(100);
			 $(".verify").fadeOut(100);
			 $("#facebooklogin").fadeOut(100);
			 $("#fbstatus").fadeOut(100);
        }
        else if ($(this).val() == 'new') {
             $("input#submit").attr("value", "REGISTER NOW");
	         $("input#submit").attr("name", "REGISTER NOW");
			 $("input#submit").attr('class', false);
			 $("form#login").attr("action", "login.php?loginProcess=2" );
			 $("input#submit").fadeIn(100);
			 $(".logintext").fadeIn(100);
			 $(".loginfield").fadeIn(100);
			 $(".verify").fadeIn(100);
			 $("#facebooklogin").fadeOut(100);
			 $("#fbstatus").fadeOut(100);
        }
		else if ($(this).val() == 'fb') {
             $("input#submit").fadeOut(100);
			 $(".logintext").fadeOut(100);
			 $(".loginfield").fadeOut(100);
			 $("#facebooklogin").fadeIn(100);
			 $("#fbstatus").fadeIn(100);
        }
    });
});
</script>
</head>
<body>
<? require('includes/menus.php'); ?>
<div id="bodyContainer">
<div align="center" id="login"><form id="login" action="login.php?loginProcess=1" method="post" name="login">

<table border="0" id="fbstatus" >
	<tr>
	<td align="center">
	<?php if ($user_profile) { ?> <span id="welcometext"><!--Welcome <strong><? echo $user_profile['first_name']; ?></strong>! <br /><br />-->
You are logged in through Facebook and ready to use this site.</span><br /><br />
We are super stoked that you're here! <br />
Please remember to update your profile with your latest contact info by clicking "Manage My Account" below.<br />
<br />
Check out these pages to dive right in:<br /><br /><br /><br />
<script type="text/javascript" language="javascript">
$(document).ready(function(){
$('input[value="fb"]').prop('checked', true);
$("input#submit").hide();
			 $(".logintext").hide();
			 $(".loginfield").hide();
			 $("#fbstatus").fadeIn(500);
});
</script>

<div id="loginContainer" class="boxes">
	<table border="0" cellpadding="0">
		<tr>
			<td valign="top"><a href="myportfolio.php">
				<div class="indexbtnbox indexalt" id="button1"><span></span>
					<div class="indexbtnname mediumtext" >My PORTFOLIO</div>
					<div class="enterithere">manage your albums<br />
						purchase prints<br />
						download a copy<br />
						share with friends </div>
		
				</div>
				</a></td>
			<td valign="top"><a href="customersupport.php">
				<div class="indexbtnbox indexalt" id="button2"><span></span>
					<div class="indexbtnname  mediumtext">Customer Support</div>
					<div class="enterithere">need assistance?<br />
					we're here to help!
						</div>
				</div>
				</a></td>
			<td valign="top"><a href="myaccount.php">
				<div class="indexbtnbox indexalt"><span></span>
					<div class="indexbtnname mediumtext">Manage My ACCOUNT</div>
					<div class="enterithere">edit your profile<br />
						
						email subscriptions<br />
						</div>
				</div></a></td>
			<td valign="top"><a href="linksession.php">
				<div class="indexbtnbox bluebox">
					<div class="indexbtnname bigtext">ENTER A SESSION CODE</div>
					<div class="enterithere">see your action shots<br />
					and add them to<br />MyPORTFOLIO</div>
				</div>
				</a></td>
		</tr>
	</table>

</div>





<?      
}






else if($user == 0){?><span id="typelabel">
Login using your Facebook account with the button below.<br />
A new window will appear asking you to accept permissions.</span> <? }
?></td>

	</tr>
</table>


<table border="0" >
	
	<tr>
	<td class="logintext" width="140">Username:</td>
	<td  class="loginfield"><input name="username" type="text" class="inputtext" /></td>
	</tr>
	
	<tr>
	<td class="logintext">Password:</td>
	<td  class="loginfield"><input name="password" type="password" class="inputtext" /></td>
	</tr>
	<tr>
	<td class="logintext verify">Password x2:</td>
	<td  class="loginfield verify"><input name="password2" type="password"  class="inputtext" /></td>
	</tr>
</table>


<div id="buttoncontrols">
<table width = "475">
	<tr>
	<td colspan="2" width="200" align="left">
	<p>
	<?php if (!$user_profile) { ?>
		<label id="typelabel">
			<input name="logintype" type="radio" id="logintype" value="old" checked="checked" />
			I'm an Existing User</label>
		<br />
		<label id="typelabel">
			<input type="radio" name="logintype" value="new" id="logintype" />
			I'm a New User</label>
		<br />
		
		<label id="typelabel">
			<input type="radio" name="logintype" value="fb" id="logintype" />
			<span class="bluetext"><?php if($user_profile) echo "Using"; else echo "Use"; ?> my Facebook Account</span></label>
		<br /><? }  ?>
	</p>
	</td>
	<td ><div style="float: right;"><input id="submit" name="LOGIN" type="submit" value="LOGIN"/> </div>
	<div id="facebooklogin"> 
<?php if ($user_profile) {} else { ?> 
      <fb:login-button scope="email,user_likes,user_location">Login with Facebook</fb:login-button>
    <?php } ?>
    <div id="fb-root"></div>
    <script>
	             
      window.fbAsyncInit = function() {
        FB.init({
          appId: '<?php echo $facebook->getAppID() ?>', 
          cookie: true, 
          xfbml: true,
          oauth: true
        });
        FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });
        FB.Event.subscribe('auth.logout', function(response) {
          window.location.reload();
        });
      };
      (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol +
          '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
      }());
    </script>
	</div>

	</td>
	</tr>
	
	<?php if($invalidLogin == 'username'){ ?>
	<tr><td colspan="2" align="center"><span class="loginerror">Invalid Username and/or Password</span></td></tr>
	<?php } $attempt = 0 ?>
	<?php if($invalidLogin == 'password'){ ?>
	<tr><td colspan="2" align="center"><span class="loginerror">Incorrect Password</span></td></tr>
	<?php } $attempt = 0 ?>
	
</table>
</div>
</form>
</div>

</div>
</body>
</html>

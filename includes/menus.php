<div id="bgpreload"></div>
<div id="headerContainer">
	<div id="preNav">
		<div id="preNavText">
			<div class="alignLeft"></div>
			<div class="alignRight">
			
			
			
				<? if ($user_profile) {  ?>
				
				
				<div id="entercode"><a href="linksession">ENTER SESSION CODE</a></div>
				
				<div id="cart" class="dropdownbutton"><a id="mycart" href="mycart">MY CART</a></div>

				<div id="name" class="dropdownbutton"><a id="myname"><span style="font-size:12px">Hello, </span><span style="font-weight:bold;"><?= strtoupper($userData['firstname'])  ?></span>
				<span class="subtext">MY ACCOUNT<br />LOGOUT</span></a> <div class="dropdown">
				<ul>
					<li><a href="login">WELCOME PAGE</a></li>
					<li><a href="myaccount">ACCOUNT SETTINGS</a></li>
					<li><a href="myorders">YOUR ORDERS</a></li>
					<li><a href="customersupport">CUSTOMER SUPPORT</a></li>
					<li><a href="<? if($user_profile) {echo $logoutUrl; }else {echo "logout";} ?>"><span style="font-weight:bold;">LOGOUT</span>
						<? if($user_profile){ ?>
						<span class="ddinfo">this will log you<br />
						out of Facebook too</span>
						<? } ?>
						</a></li>
				</ul>
				</div> </div>
				<?  } else { ?>
				<a href="linksession">ENTER A SESSION CODE</a><a href="customersupport">CUSTOMER SUPPORT</a><a href="login"><strong>LOGIN</strong></a>
				<? } ?>
			</div>
		</div>
	</div>
	<div id="mainNav">
		<?  if(basename($_SERVER['PHP_SELF'])=='index.php'){
					// HOME PAGE ?>
			<div class="jqb">
				<div id="jqb_object">
					<div class="jqb_slides" >
						<div class="jqb_slide" title="Bondi Beach, Australia" style="background-image:url(../images/homebannerpics/banner2.jpg)"></div>
						<div class="jqb_slide" title="Rincon, California" style="background-image:url(../images/homebannerpics/banner3.jpg)"></div>
						<div class="jqb_slide" title="Bondi Beach, Australia" style="background-image:url(../images/homebannerpics/banner1.jpg)"></div>
						<div class="jqb_slide" title="Lake Tekapo, New Zealand" style="background-image:url(../images/homebannerpics/banner4.jpg)"></div>
					</div>
					<div class="jqb_bar">
						<div class="jqb_info"></div>
						<!--	<div id="btn_next" class="jqb_btn jqb_btn_next"></div>
						<div id="btn_pauseplay" class="jqb_btn jqb_btn_pause"></div>
						<div id="btn_prev" class="jqb_btn jqb_btn_prev"></div>--> 
					</div>
				</div>
			</div>
		<? }
				else {
					echo '<div id="bannershort" style="background-image: url(images/headerpics/';
						if(strpos(basename($_SERVER['PHP_SELF']),'snow')!== false) {
							echo rand(10,10);
						}
						else if(strpos(basename($_SERVER['PHP_SELF']),'skate')!== false) {
							echo rand(20,20);
						}
						else if(strpos(basename($_SERVER['PHP_SELF']),'surf')!== false) {
							echo rand(0,9);
						}
						else if(strpos(basename($_SERVER['PHP_SELF']),'contact')!== false) {
							echo '7';
						}
						else if(strpos(basename($_SERVER['PHP_SELF']),'admin')!== false) {
							echo 'admin';
						}
						else {
							echo rand(0,9);
						}
					echo '.jpg);"> </div><div id="pagetitle">' . $pagetitle . '&nbsp;</div>';
				}
			
			?>
		<div id="mainNavText"> <a href="./">
			<div id="logo"></div>
			<div id="logopreload"></div>
			</a>
			<div id="info"><br>
				<span style="font-size:18px;">
				<?= date('F j'); ?><span style="position:relative;font-size:12px;bottom:4px;"><?= date('S') ?></span><?= date(', Y') ?>
				</span><br />
				<div id="geoinfo"></div>
			</div>
			<ul class="dropdown">
				<li class="indent" ><a href="./">HOME</a></li>
				<li >
					<?php if($user) { ?>
					<a href="myaccount">
					<div id="my">My</div>
					SHORELINE</a>
					<? } else {?>
					<a> PORTFOLIO </a>
					<? } ?>
					<ul id="ddPortfolio" class="sub_menu">
						<?php if($user) { ?>
						<li id="myportfolio"><a href="myportfolio">
							<div id="portf">M<span id="my2">y </span> PORTFOLIO</div>
							</a>
							<ul id="ddMyP" class="sub_menu">
								<? $linked = mysql_query("SELECT * FROM `sessioncodes` WHERE `userid` = '$userID' LIMIT 5;");
								$more = 1;
								if(mysql_num_rows($linked) > 0){
									echo '<li class="nohover"><a class="noblue">My Recent Sessions</a></li>';
								}
								while($linkedlist = mysql_fetch_array($linked)){
									if ($more >= 5)
									echo '<li id="myportfolio"><a href="myportfolio">My Other Sessions...</a></li>';
									else
									echo '<li id="myportfolio"><div class="miniindent"><a>'.$linkedlist['sessioncode'].'<span style="float:right">'. date('n/j/y',$linkedlist['sessiondate']) .'</span></a></div></li>';
									$more++;
								}
								?>
								<li><a href="requestsession">Book New Session</a></li>
								<li><a href="linksession">Enter Session Code</a></li>
							</ul>
						</li>
						<? } ?>
						<li><a href="action sports">Action Sports</a>
							<ul class="sub_menu">
								<li><a href="surf">Surfing</a></li>
							</ul>
						</li>
						<li id="landscapes"><a href="landscapes">Landscapes</a> </li>
						<li id="nightlife"><a href="nightlife">Nightlife</a> </li>

						
						<!--<li><a href="skate">SKATE</a>
							<ul id="ddSkate" class="sub_menu">
								<li><a href="skate">People</a></li>
								<li><a href="skate">Landscapes</a></li>
							</ul>
						</li>
						<li><a href="snow">SNOW</a>
							<ul id="ddSnow" class="sub_menu">
								<li><a href="snow">People</a></li>
								<li><a href="snow">Landscapes</a></li>
							</ul>
						</li>
						<li><a href="race">RACE</a>
							<ul id="ddSnow" class="sub_menu">
								<li><a href="snow">People</a></li>
								<li><a href="snow">Landscapes</a></li>
							</ul>
						</li>
						<li class="nohover">and more...</li> -->
					</ul>
				</li>
				<li><a>ABOUT</a>
					<ul id="ddAbout" class="sub_menu">
						<li><a href="about">ABOUT SHORELINE</a></li>
						<li><a href="bios">ABOUT the CREW</a></li>
						
						<li><a href="faqs">FAQS</a></li>
						<li><a href="affiliates">AFFILIATES</a></li>
					</ul>
				</li>
				<li><a href="contact">SUPPORT</a>
					<ul id="ddSupport" class="sub_menu">
						<li><a href="customersupport">CUSTOMER SUPPORT</a></li>
						<li><a href="privacy">PRIVACY POLICY</a></li>
						<li><a href="terms">TERMS OF SERVICE</a></li>
						<li><a href="contact">CONTACT US</a></li>
					</ul>
				</li>
				
				<!--
				<li><a>ABOUT</a>
					<ul id="ddAbout" class="sub_menu">
						<li><a href="about">the Company</a></li>
						<li><a href="bios">the People</a></li>

					</ul>
				</li>
				<li><a href="contact">CONTACT</a>
				<ul id="ddSupport" class="sub_menu">
						<li><a href="contact">CONTACT US</a></li>
						<li><a href="customersupport">CUSTOMER SUPPORT</a></li>

					</ul>

				
				</li>
				-->
			</ul>
		</div>
	</div>
</div>

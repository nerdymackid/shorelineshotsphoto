var timer;
$(document).ready(

	function geoLocator() {
		if (navigator.geolocation) {
			var loc = unescape(getCookie("location"));
			if (loc != 'null' && loc != "") {
				$("#geoinfo").fadeOut(75);
				$("#geoinfo").html('');
				$("#geoinfo").append('<a href="javascript:void(0);" onclick="getLocation()"><img src="images/on.png" id="map" /></a> <span style="color:#E4F2FF;line-height:20px;">' + loc + '</span>');
				$("#geoinfo").fadeIn(400);
			} 
			
			else {
				getLocation();
			}
		}
	});

function getLocation() {
	clearTimeout(timer);
	$("#geoinfo").hide();
	$("#geoinfo").html('');
	$("#geoinfo").append('<span style="color:#aaa;line-height:20px;">Getting Location</span>&nbsp;<img src="images/loading.gif" id="loading" width="14" height="14" />');
	$("#geoinfo").fadeIn(500);
	timer = setTimeout(function showDiv() {
		$("#geoinfo").fadeOut(2000);
		showError();
	}, 10000);
	// Get location no more than 10 minutes old. 600000 ms = 10 minutes.
	navigator.geolocation.getCurrentPosition(showLocation, showError, {
		enableHighAccuracy: true,
		maximumAge: 600000
	});
}

function showError(error) {
	clearTimeout(timer);

	$("#geoinfo").hide();
	$("#geoinfo").html('');
	$("#geoinfo").append('<a href="javascript:void(0);" onclick="getLocation()"><img src="images/off.png" id="map" /></a><span style="color:#b00">&nbsp;&nbsp;Location Unavailiable</span>');
	$("#geoinfo").fadeIn(250);

	timer = setTimeout(function showDiv() {
		$("#geoinfo").fadeOut(5000);
	}, 10000);
}

function showLocation(position) {
	clearTimeout(timer);
	$.ajax({
		url: "getlocation.php",
		data: "lat=" + position.coords.latitude + "&long=" + position.coords.longitude,
		success: function (html) {
			setCookie("location", escape(html));
			$("#geoinfo").hide();
			$("#geoinfo").html('');
			$("#geoinfo").append('&nbsp;<img src="images/locfound.png" id="map" /> <span style="color:#00a8ff;line-height:20px;">Location Found</span>');
			$("#geoinfo").fadeIn(75);
			setTimeout(function displayFound() {
				$("#geoinfo").fadeOut(75);
				setTimeout(function displayLocation() {
					$("#geoinfo").html('');
					$("#geoinfo").append('<a href="javascript:void(0);" onclick="getLocation()"><img src="images/on.png" id="map" /></a> <span style="color:#E4F2FF;line-height:20px;">' + html + '</span>');
					$("#geoinfo").fadeIn(400);
				}, 100);
			}, 700);
		}
	});
}





$(function () {
	$("ul.dropdown li").hover(function () {
		$(this).addClass("hover");
		$('ul:first', this).css('visibility', 'visible');
	}, function () {
		$(this).removeClass("hover");
		$('ul:first', this).css('visibility', 'hidden');
	});
	$("ul.dropdown li ul li:has(ul)").find("a:first").append(" <div class=\"raquo\"> &#8250;&nbsp;&nbsp;  </div>");
});


function setCookie(name, value, hours) {
	document.cookie = name + "=" + value + "; path=/";
}

function getCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}

function deleteCookie(name) {
	setCookie(name, "", -1);
}









// Simple JavaScript Rotating Banner Using jQuery
// 1 - FadeIn FadeOut
// 2 - Horizontal Scroll
// 3 - Vertical Scroll
// 4 - Infinity Horizontal Scroll
// 5 - Infinity Vertical Scroll
var jqb_eff = 4;
//Variables
var jqb_vCurrent = 0;
var jqb_vTotal = 0;
var jqb_vSpeed = 750;
var jqb_vDuration = 6000;
var jqb_intInterval = 0;
var jqb_vGo = 1;
var jqb_vBusy = false;
var jqb_vIsPause = false;
var jqb_tmp = 20;
var jqb_title;
var jqb_imgW = 1000;
var jqb_imgH = 520;
jQuery(document).ready(function() {	
	// DISABLE IMAGE DRAG
	$("img").mousedown(function(){
		return false;
	});
	jqb_vTotal = $(".jqb_slides").children().size() -1;
	jqb_title = $(".jqb_slide").attr("title");
			$(".jqb_info").animate({ opacity: 'hide', "bottom": "-30px"}, 200,function(){
				$(".jqb_info").text(jqb_title).animate({ opacity: 'show', "left": "2px", "bottom": "0px" }, 600);
			});
	jqb_intInterval = setInterval(jqb_fnLoop, jqb_vDuration);
	if(jqb_eff == 2 || jqb_eff == 4)//Horizontal Alignment
	{
		$("#jqb_object").find(".jqb_slide").each(function(i) { 
			jqb_tmp = ((i - 1)*jqb_imgW) - ((jqb_vCurrent -1)*jqb_imgW);
			$(this).css({"left": jqb_tmp+"px"});
		});
	} 
	else if(jqb_eff == 3 || jqb_eff == 5)//Vertical Alignment
	{
		$("#jqb_object").find(".jqb_slide").each(function(i) { 
			jqb_tmp = ((i - 1)*jqb_imgH) - ((jqb_vCurrent -1)*jqb_imgH);
			$(this).css({"top": jqb_tmp+"px"});
		});
	}
	$("#btn_pauseplay").click(function() {
		if(jqb_vIsPause){
			jqb_fnChange();
			jqb_vIsPause = false;
			$("#btn_pauseplay").removeClass("jqb_btn_play");
			$("#btn_pauseplay").addClass("jqb_btn_pause");
		} else {
			clearInterval(jqb_intInterval);
			jqb_vIsPause = true;
			$("#btn_pauseplay").removeClass("jqb_btn_pause");
			$("#btn_pauseplay").addClass("jqb_btn_play");
		}
	});
	$("#btn_prev").click(function() {
		if(!jqb_vBusy)
		{
			jqb_vBusy = true;
			jqb_vGo = -1;
			jqb_fnChange();
		}
	});
	$("#btn_next").click(function() {
		if(!jqb_vBusy)
		{
			jqb_vBusy = true;
			jqb_vGo = 1;
			jqb_fnChange();
		}
	});
});
function jqb_fnChange(){
	clearInterval(jqb_intInterval);
	jqb_fnLoop();
	jqb_intInterval = setInterval(jqb_fnLoop, jqb_vDuration);
}
function jqb_fnLoop(){
	if(jqb_vGo == 1){
		jqb_vCurrent == jqb_vTotal ? jqb_vCurrent = 0 : jqb_vCurrent++;
	} else {
		jqb_vCurrent == 0 ? jqb_vCurrent = jqb_vTotal : jqb_vCurrent--;
	}
	$("#jqb_object").find(".jqb_slide").each(function(i) { 
		if(i == jqb_vCurrent){
			jqb_title = $(this).attr("title");
			$(".jqb_info").animate({ opacity: 'hide', "left": "-30px"}, 200,function(){
				$(".jqb_info").animate({ "left": "80px"}, 1);
				$(".jqb_info").text(jqb_title).animate({ opacity: 'show', "left": "2px"}, 600);
			});
		} 
		if(jqb_eff == 2)//Horizontal Scrolling
		{
			jqb_tmp = ((i - 1)*jqb_imgW) - ((jqb_vCurrent -1)*jqb_imgW);
			$(this).animate({"left": jqb_tmp+"px"}, jqb_vSpeed, function() { jqb_vBusy = false; });
		}
		else if(jqb_eff == 3)//Vertical Scrolling
		{
			jqb_tmp = ((i - 1)*jqb_imgH) - ((jqb_vCurrent -1)*jqb_imgH);
			$(this).animate({"top": jqb_tmp+"px"}, jqb_vSpeed, function() { jqb_vBusy = false; });
		}	
		else if(jqb_eff == 4)//Infinity Horizontal Scrolling
		{
			if(jqb_vTotal == 1) //IF 2 SLIDE ONLY, FIX
			{
				if(jqb_vGo == 1){
					if(($(this).position().left) < 0 )
					{
						$(this).css({"left": jqb_imgW+"px"});
					}
				} else {
					if(($(this).position().left) > (jqb_imgW * (jqb_vTotal - 1)))
					{	
						$(this).css({"left": (-1 * jqb_imgW)+"px"});
					}
				}
			}
			else
			{
				if(($(this).position().left) < -jqb_imgW )
				{
					$(this).css({"left": (jqb_imgW * (jqb_vTotal - 1))+"px"});
				}
				else if(($(this).position().left) > (jqb_imgW * (jqb_vTotal - 1)))
				{	
					$(this).css({"left": (-1 * jqb_imgW)+"px"});
				}
			}
			jqb_tmp = $(this).position().left - (jqb_imgW * jqb_vGo);
			$(this).animate({"left": jqb_tmp+"px"}, jqb_vSpeed, function() { jqb_vBusy = false;  });

		}
		else if(jqb_eff == 5)//Infinity Vertical Scrolling
		{
			if(jqb_vTotal == 1) //IF 2 SLIDE ONLY, FIX
			{
				if(jqb_vGo == 1){
					if(($(this).position().top) < 0 )
					{
						$(this).css({"top": jqb_imgH+"px"});
					}
				} else {
					if(($(this).position().top) > (jqb_imgH * (jqb_vTotal - 1)))
					{	
						$(this).css({"top": (-1 * jqb_imgH)+"px"});
					}
					

				}
			}
			else
			{
				if(($(this).position().top) < -jqb_imgH )
				{
					$(this).css({"top": (jqb_imgH * (jqb_vTotal - 1))+"px"});
				}
				else if(($(this).position().top) > (jqb_imgH * (jqb_vTotal - 1)))
				{	
					$(this).css({"top": (-1 * jqb_imgH)+"px"});
				}	
			}
			jqb_tmp = $(this).position().top - (jqb_imgH * jqb_vGo);
			 $(this).animate({"top": jqb_tmp+"px"}, jqb_vSpeed, function() { jqb_vBusy = false;  });
		}
		else //if(jqb_eff == 1)//Fade In & Fade Out
		{
			if(i == jqb_vCurrent){
				$(this).animate({ opacity: 'show'}, jqb_vSpeed, function() { jqb_vBusy = false; });
			} else {
				$(this).animate({ opacity: 'hide'}, jqb_vSpeed, function() { jqb_vBusy = false; });
			}
		}
	});
}
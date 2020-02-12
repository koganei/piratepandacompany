<?
$content = "contentmain.php";
$right = "rightmain.php";
$tablet = "tabletmain.php";
$whichpage = trim ((!empty($_POST['p'])) ? $_POST['p'] : $_GET['p'] );
if($whichpage == "play") {	$content = "contentplay.php";} 
else if($whichpage == "media") { $content = "contentmedia.php";} 
else if($whichpage == "crew") {	$content = "contentcrew.php";}?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Theater - Pirate Panda Company</title>

<LINK href="css/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="images/favicon.png" /> 
<link rel="icon" type="image/png" href="images/favicon.png" /> 

<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>

<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />

<script language="javascript">

function createRequestObject() {
    var ro;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;
}

var http = createRequestObject();

function slideshow_slide(slide) {
		http.open('get', 'scripts/slideshow_slide.php?slide='+slide);
		http.onreadystatechange = handle_loadreport;
		http.send(null);
}

function handle_loadreport() {
	if(http.readyState == 4){
        var response = http.responseText;
        var update = new Array();

        if(response.indexOf('|' != -1)) {
            update = response.split('|');
			document.getElementById('div_slideshow_previous').innerHTML = update[0];
			document.getElementById('div_slideshow_link_img').innerHTML = update[1];
			document.getElementById('div_slideshow_next').innerHTML = update[2];
			document.getElementById('div_slideshow_text').innerHTML = update[3];
        }
    }
}

function slideshow_timer(time) {
	slideshow_slide(document.getElementById('slideshow_nextslide').value)
	setTimeout('slideshow_timer('+time+')', time);
}

</script>

</head>

<body background="images/background.jpg" style="margin: 0px;">

<div id="div_header_png" style="background:url(images/header.png) no-repeat; z-index: 0; height: 160px; position: absolute; margin-top: 0px">
	<div style="margin-left: 200px">
		<table cellspacing="0" cellpadding="0">
		<tr>
		<td width="400px">
		<a href="index.php" style="border: 0px;"><img src="images/logo_ah.png" width="278" height="134"></a>
		</td>
		<td align="right" valign="top" width="99%"">
		<a href="index.php?p=play" style="border: 0px;"><img src="images/button-play.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="index.php?p=crew" style="border: 0px;"><img src="images/button-crew.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="index.php?p=media" style="border: 0px;"><img src="images/button-media.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
		</tr>
		</table>

		<div style="margin-top: -110px; margin-left: 300px">
		<a href="http://www.montrealfringe.ca" style="border: 0px;"><img src="images/fringe_logo.gif" width="110" height="64"></a>
		</div>
	</div>
</div>

<div style="float: left; position: absolute; top: 0xp; left: 0px;">
<div class="triangle-right top" id="div_panda_speech" style="visibility: hidden; position: absolute; top: 240px; left: 47px; width: 200px; z-index: 0;">
					Hey, wanna inherit the Earth?				
</div>

<a href="http://piratepandacompany.com"><img src="images/bottle.png" width="210" height="547" border="0px"></a><br /><Br />

<center>
<a href="http://montrealfringe.ca/en/spectacles/who-is-aristippus"><img src="images/coupons.png"></a></center></div>
	<table id="table_theater" cellpadding="0" cellspacing="0" border=0>
		<tr>
		<td height="160" colspan=6>
		</td>
		</tr>
		<tr>
			<td width="130"><div style="width:130px"></div></td>
			<td width="89px" valign=top style="background:url(images/border.png);">
				<div id="div_border_png" style="width: 89px; background:url(images/border.png); margin-top: -35px; z-index: 1;"></div>
			</td>
			<td valign=top style="background:url(images/paper_bg.jpg)">
				<div id="div_paper_png" style="background:url(images/paper_bg.jpg); min-width: 600px; height: 100%; padding-right: 40px; margin-top: -35px; z-index: 1; margin-bottom: 0px;">
					<br><br>
					<? include($content); ?>
					<br /><br /><br /><br />
				</div>
			</td>
			<td valign=top style="background:url(images/paper_2.jpg); width: 324px;">
				<div id="div_tablet_png" style="background:url(images/tablet.png); position: absolute; width: 438px; height: 330px; margin-top: -50px; margin-left: -40px; z-index: 0">
					<div class="triangle-right bottom" id="div_moliere_speech" style="visibility: hidden; position: absolute; top: 0px; left: 235px; width: 150px; z-index: 0;">
						Woah, you can talk?!
					</div>
					<div id="div_tablet_content" style="position: absolute; top: 60px; left: 45px; margin-left: 20px; width: 250px; height: 175px; z-index: 0;">
						<? include($tablet); ?>
					</div>
				</div>
				<div id="div_paper_2_jpg" style="height: 100%; width: 314px; padding: 10px; margin-top: 260px; z-index: 1;">
					<? include($right); ?>
					<br /><br /><br /><br />
				</div>
			</td>
			<td style="width: 70px;">
			</td>
		</tr>
		<tr>
			<td height="0" colspan=6>
				<div id="footer" style="width: 100%; margin-top: -30px; position: relative; height: 75px; background:url(images/footer.png) no-repeat; overflow-y: hidden;">
					<br /><br />
					<center>
					<span style="font-size: 12px; color: black; font-family: Arial; font-weight: bold;">Pirate Panda Company |  2011 | 438.390.4308 | <a href="mailto:info@piratepandacompany.com">info@piratepandacompany.com</a> | Backend by <a href="http://www.net-forge.com">Netforge</a></span>
					</center>
				</div>
			</td>
		</tr>
	</table>
	
	<script language=javascript>
	document.getElementById('div_border_png').style.height = document.getElementById('div_paper_png').offsetHeight+"px";
	document.getElementById('div_header_png').style.width = document.getElementById('table_theater').offsetWidth+"px";
	</script>

	
<!-- Scripts for comic balloons -->
<script>
function text_appear(text, id) {
	if(text.length > 0) {
		document.getElementById(id).innerHTML += unescape(text.substr(0,1));
		setTimeout("text_appear(\"" + text.substr(1) + "\", '" + id + "')", 20);
	}
}

function panda_bubble(num) {
	panda.style.visibility = "visible";
	panda.innerHTML = "";
	text_appear(panda_text[num], "div_panda_speech");
	setTimeout('panda.style.visibility = "hidden"',panda_stay_time[num]);
	if (moliere_text[num] != "" && moliere_text[num] != undefined) { setTimeout('moliere_bubble('+num+')',panda_stay_time[num]+100); }
}

function moliere_bubble(num) {
	moliere.style.visibility = "visible";
	moliere.innerHTML = ""; 
	text_appear(moliere_text[num], "div_moliere_speech");
	setTimeout('moliere.style.visibility = "hidden"',moliere_stay_time[num]);
	new_num = num + 1;
	if (panda_text[new_num] != "" && panda_text[new_num] != undefined) { setTimeout('panda_bubble('+new_num+')',moliere_stay_time[num]+100); }
}
</script>
<? 

if($whichpage == "play") {
	include('script2.php');
} else if($whichpage == "crew") {
	include('script3.php');
} else if($whichpage == "media") {
	include('script4.php');
} else include('script1.php');

?>
<!-- /Scripts -->

<!-- Google Analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22131518-1']);
  _gaq.push(['_setDomainName', '.piratepandacompany.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
  
  
</script>
</body></html>
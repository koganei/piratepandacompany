<?
$content = "admin.php";
$right = "rightmain.php";
$tablet = "tabletmain.php";
$whichpage = trim ((!empty($_POST['p'])) ? $_POST['p'] : $_GET['p'] );
if($whichpage == "play") {	$content = "contentplay.php";} 
else if($whichpage == "media") {	$content = "contentmedia.php";} 
else if($whichpage == "crew") {	$content = "contentcrew.php";}?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Theater - Pirate Panda Company</title>

<LINK href="../css/style.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" href="../images/favicon.png" /> 
<link rel="icon" type="image/png" href="../images/favicon.png" /> 

<script type="text/javascript" src="../../pub/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({
        theme : "advanced",
        mode : "textareas",
        plugins : "fullpage",
        theme_advanced_buttons1 : "fontselect,bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,justifyfull",
        theme_advanced_buttons2 : "fontsizeselect,forecolor,backcolor,separator,charmap,separator,undo,redo,separator,cut,copy,paste",
        theme_advanced_buttons3 : "bullist,numlist,separator,outdent,indent,separator,sub,sup,separator,hr,image,separator,link,unlink,separator,cleanup,code"
});
</script>

</head>

<body background="../images/background.jpg" style="margin: 0px;">

<div id="div_header_png" style="background:url(../images/header.png) no-repeat; z-index: 0; height: 160px; position: absolute; margin-top: 0px">	

<div style="margin-left: 200px">		

<table cellspacing="0" cellpadding="0">
		<tr>
					<td width="400px">
						<a href="index.php" style="border: 0px;"><img src="../images/logo_ah.png" width="278" height="134"></a>
					</td>			
					<td align="right" valign="top" width="99%">				
						<a href="index.php?p=play" style="border: 0px;">
						<img src="../images/button-play.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;				
						<a href="index.php?p=crew" style="border: 0px;"><img src="../images/button-crew.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;				
						<a href="index.php?p=media" style="border: 0px;"><img src="../images/button-media.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;			
					</td>		
		</tr>		
</table>		

<div style="margin-top: -110px; margin-left: 300px">
<a href="http://www.montrealfringe.ca" style="border: 0px;"><img src="../images/fringe_logo.gif" width="110" height="64"></a></div>	
</div></div>
<div style="float: left; position: absolute; top: 0xp; left: 0px;">
<div class="triangle-right top" id="div_panda_speech" style="visibility: hidden; position: absolute; top: 240px; left: 47px; width: 200px; z-index: 0;">					Hey, wanna inherit the Earth?				</div>
<a href="http://piratepandacompany.com">
<img src="../images/bottle.png" width="210" height="547" border="0px">
</a>
<br /><Br />

<center><img src="../images/coupons.png"></center>
</div>

<table id="table_theater" cellpadding="0" cellspacing="0" border=0>
	<tr>
			<td height="160" colspan=6></td>	
	</tr>	
	<tr>
			<td width="130"></td>
			<td width="89px" valign=top style="background:url(../images/border.png);">
						<div id="div_border_png" style="background:url(../images/border.png); margin-top: -35px; z-index: 1;"></div>
			</td>
			<td valign=top style="background:url(../images/paper_bg.jpg)">
						<div id="div_paper_png" style="background:url(../images/paper_bg.jpg); min-width: 600px; height: 100%; padding-right: 40px; margin-top: -35px; z-index: 1; margin-bottom: 0px;">							<br><br>				<? include($content); ?>				<br /><br /><br /><br />			</div>		</td>				<td valign=top style="background:url(../images/paper_2.jpg); width: 324px;">			<div id="div_tablet_png" style="background:url(../images/tablet.png); position: absolute; width: 438px; height: 330px; margin-top: -50px; margin-left: -40px; z-index: 0">				<div class="triangle-right bottom" id="div_moliere_speech" style="visibility: hidden; position: absolute; top: 0px; left: 235px; width: 150px; z-index: 0;">					Woah, you can talk?!				</div>				<div id="div_tablet_content" style="position: absolute; top: 60px; left: 45px; margin-left: 20px; width: 250px; height: 175px; z-index: 0;"> 					<? include($tablet); ?> 				</div>			</div>			<div id="div_paper_2_jpg" style="height: 100%; width: 314px; padding: 10px; margin-top: 260px; z-index: 1;">				<? include($right); ?>					<br /><br /><br /><br />			</div>		</td>		<td style="width: 70px;">		</td>	</tr>		<tr>		<td height="0" colspan=6>			<div id="footer" style="width: 100%; margin-top: -30px; position: relative; height: 75px; background:url(../images/footer.png) no-repeat; overflow-y: hidden;">			<br /><br />			<center>				<span style="font-size: 12px; color: black; font-family: Arial; font-weight: bold;">Pirate Panda Company | © 2011 | 438.390.4308 | <a href="mailto:info@piratepandacompany.com">info@piratepandacompany.com</a></span>			</center>			</div></td>	</tr></table><script language=javascript>document.getElementById('div_border_png').style.height = document.getElementById('div_paper_png').offsetHeight+"px";document.getElementById('div_header_png').style.width = document.getElementById('table_theater').offsetWidth+"px";</script>


<? 

if($whichpage == "play") {
	include('script2.php');
} else if($whichpage == "crew") {
	include('script3.php');
} else if($whichpage == "media") {
	include('script4.php');
} else include('script1.php');



?>


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
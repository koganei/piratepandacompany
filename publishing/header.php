<? 
session_start();

include("scripts/sqlconnexion.php");

$last_query = "SELECT * FROM Chapters WHERE Story_Num LIKE '".$_REQUEST['s']."' ORDER BY Chapter_Num DESC";
$last_result = mysql_query($last_query);
$last_row = mysql_fetch_array($last_result);
echo mysql_error();

if ($_REQUEST['s'] == "") {
	$_REQUEST['s'] = "1";
}

$story_query = "SELECT * FROM Stories WHERE ID LIKE '".$_REQUEST['s']."'";
$story_result = mysql_query($story_query);
$story_row = mysql_fetch_array($story_result);
echo mysql_error();

if ($_REQUEST['c'] != "") {
	$query = "SELECT * FROM Chapters WHERE Story_Num LIKE '".$_REQUEST['s']."' AND Chapter_Num LIKE '".$_REQUEST['c']."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	echo mysql_error();
}
else {
	$query = "SELECT * FROM Chapters WHERE Story_Num LIKE '".$_REQUEST['s']."' ORDER BY Chapter_Num ASC";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	echo mysql_error();
	$_REQUEST['c'] = $row['Chapter_Num'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Aristippus & Harlebot - A tale in &infin; acts</title>

<LINK href="css/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="images/favicon.png" />
<link rel="icon" type="image/png" href="images/favicon.png" />

<script language="javascript">

function chapter_select() {
	c = document.getElementById('pub_chapter_select').value;
	window.location="index.php?s=<?=$_REQUEST['s']?>&c="+c;
}

function chapter_select_bot() {
	c = document.getElementById('pub_chapter_select_bot').value;
	window.location="index.php?s=<?=$_REQUEST['s']?>&c="+c;
}

</script>

</head>

<body>



<div id="pub_banner">Aristippus & Harlebot<br >
		
	<span style="font-size: 0.6em; margin-left: 200px;">A tale in &infin; acts</span>
		
		
	
	
	<div id="pub_button" style="right: 0px;">
		<a href="index.php?s=1&c=1">Start Reading</a>
	</div>
	<div id="pub_button" style="right: 110px;">
		<a href="otherstories.php">Stories</a>
	</div>
	<div id="pub_button" style="right: 220px;">
		<a href="index.php">Home</a>
	</div>
	<div id="pub_button" style="left: 200px; background: none; font-size: 0.5em; width: 500px;">
		<a href="about.php"><i>written by</i> Marc Khoury
		&nbsp;
		<span style="font-size: 0.7em;"><i>edited by</i> Jad Hatem</i></a>
	</div>
</div>
	
<table width="100%" cellpadding="0" cellspacing="0" border=0>
	<tr>
		
		<td id="pub_body">
		<div id="pub_right_panel">
			<a href="http://www.piratepandacompany.com"><img src="images/blackonwhite.jpg" style="border: 0px;"></a>
			<!-- Ad box >
			<span style="font-size: 9px; color:CCCCCC; font-family:Verdana, Arial, Helvetica, sans-serif;">Advertise here</span><br />
			<img src="images/sample_skyscraper.png" /><br /--><br /><br />
			<!-- Facebook Like Button --><iframe src="http://www.facebook.com/plugins/like.php?href=facebook.com%2FPiratePandaCompany&amp;layout=button_count&amp;show_faces=false&amp;width=80&amp;action=like&amp;font=trebuchet+ms&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;" allowTransparency="true"></iframe><!-- /Facebook Like Button -->
			<br /><br />
			<!-- Twitter Feed -->
			<div class="content" align="center"><script src="scripts/widget.js"></script><script> 
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 4,
  interval: 6000,
  width: 180,
  height: 300,
  theme: {
    shell: {
      background: '#454545',
      color: '#000000'
    },
    tweets: {
      background: '#dbdad0',
      color: '#000000',
      links: '#888888'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'all'
  }
}).render().setUser('piratepandaco').start();
</script></div> 
			<!--/Twitter Feed -->

		</div>
		<center>
		<div id="summary_text" style="background: url(images/entete.jpg); ">
		<A href="index.php?s=1&c=1">Aristippus, a man on a journey to the end of the universe in the company of Harlebot, his faithful robot, finds a strange spaceship on the edge of space.
But what happens when the fates and secrets this discovery holds spread beyond our adventurers and into the rest of the Galaxy?
Will Aristippus fight the threat of evil that looms over the Kingdom, or will he let Harlebot do all the work?
And what about the ship? Is your trepidation about to burst? Start reading Aristippus & Harlebot!</a>
		</div>
		<br />
		<br />
		<div style="width: 630px;">
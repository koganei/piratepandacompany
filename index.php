<?

$quote[0] = "Laugh, sailors, laugh, again into tomorow.";
$author[0] = "Captain Pander Decken";

$quote[1] = "Now and then we had a hope that if we lived and were good, God would permit us to be pirates";
$author[1] = "Mark Twain (1835–1910 CE)";

$quote[2] = "You can learn all the math in the 'Verse, but you take a boat in the air that you don't love, she'll shake you off just as sure as a turn of the worlds. Love keeps her in the air when she oughta fall down, tells you she's hurtin' before she keels. Makes her a home.";
$author[2] = "Captain Malcom Reynolds";

$quote[3] = "It is when pirates count their booty that they become mere thieves.";
$author[3] = "William Bolitho (1890–1930 CE)";

$quote[4] = "It is better to be a beggar than ignorant; For the beggar only wants money, but an ignorant person wants humanity.";
$author[4] = "Aristippus (435-356 BCE)";

$quote[5] = "You can learn all the math in the 'Verse, but you take a boat in the air that you don't love, she'll shake you off just as sure as a turn of the worlds. Love keeps her in the air when she oughta fall down, tells you she's hurtin' before she keels. Makes her a home.";
$author[5] = "Captain Malcom Reynolds";

$quote[6] = "You can learn all the math in the 'Verse, but you take a boat in the air that you don't love, she'll shake you off just as sure as a turn of the worlds. Love keeps her in the air when she oughta fall down, tells you she's hurtin' before she keels. Makes her a home.";
$author[6] = "Captain Malcom Reynolds";

$i = rand(0, count($quote)-1);

session_start();

function getBrowser() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
    
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
    
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
    
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} 

$ua=getBrowser();
$browser = $ua['name'];

include("publishing/scripts/sqlconnexion.php");

$last_query = "SELECT * FROM Chapters ORDER BY Chapter_Num DESC";
$last_result = mysql_query($last_query);
$last_row = mysql_fetch_array($last_result);
echo mysql_error();

?>

<html>
<head>
<title>Pirate Panda Company</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<meta property="og:title" content="Pirate Panda Company">
<meta property="og:description" content="A student-powered company based in Montreal who plunders old treasures and brings them into a new light. Sailing is smoother with breezes of laughter.">
<meta property="og:image" content="http://www.piratepandacompany.com/images/logo_small.png">

<LINK href="css/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="favicon.png" />
<link rel="icon" type="image/png" href="favicon.png" />

</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (piratepanda_long.psd) -->

<table id="Tableau_01" width="1920" height="5320" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="460" height="1080" style="background:url(images/piratepanda_long_01.jpg) no-repeat;">
			</td>
		<td align=center width="1000" height="1080" style="background:url(images/piratepanda_long_02.jpg) no-repeat;">
		<div id="homepage_content">
		<a href="#top"></a>	
			<img src="images/large_logo_text.png" width="500">
			<br>
			<img src="images/pixel.png" height="110" width="0">
			<br>
			<a href="#company"><img src="images/company_text.png" width="168" border="0"></a>
			<img src="images/pixel.png" height="0" width="150"><a href="#theater"><img src="images/theater_text.png" width="151" border="0"></a>
			<img src="images/pixel.png" height="0" width="150"><a href="#publishing"><img src="images/pub_text.png" width="223" border="0"></a>
			
			<? if ($browser == "Internet Explorer") { ?>
				<div id="div_quote_ie">
			<? } else { ?>
				<div id="div_quote">
			<? } ?>
				<table align=right width=300 border="0" cellpadding="0" cellspacing="0">
					<tr><td align=right>
					<font color=white>
					<b>"<?=$quote[$i]?>"</b><br>
					<?=$author[$i]?>
					</font>
					</td></tr>
				</table>
			</div>
		</div>
		</td>
		<td width="460" height="1080" style="background:url(images/piratepanda_long_03.jpg) no-repeat;">
			</td>
	</tr>
	<tr>
		<td width="460" height="200" style="background:url(images/piratepanda_long_04.jpg) no-repeat;">
			</td>
		<td width="1000" height="200" style="background:url(images/piratepanda_long_05.jpg) no-repeat;">
			</td>
		<td width="460" height="200" style="background:url(images/piratepanda_long_06.jpg) no-repeat;">
			</td>
	</tr>
	<tr>
		<td width="460" height="1080" style="background:url(images/piratepanda_long_07.jpg) no-repeat;">
			</td>
		<td width="1000" height="1080" style="background:url(images/piratepanda_long_08.jpg) no-repeat;">
		<? if ($browser == "Internet Explorer") { ?>
			<div id="company_content_ie">
		<? } else if ($browser == "Mozilla Firefox") { ?>
			<div id="company_content_ie">
		<? } else if ($browser == "Opera") { ?>
			<div id="company_content_ie">
		<? } else { ?>
			<div id="company_content">
		<? } ?>
			<a name="company"></a>
			<table width=100% border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td valign=top>
						<img src="images/company_header.png" /><br />
						<center>
						Newcomer to the Montreal theater scene, The <b>Pirate Panda Company</b> is a student-powered company who plunders old treasures and brings them into a new light. We use old elements of theater, fiction or in whichever medium we find ourselves to show the essence of those traditions, and how they have been changed, masked or skewed by contemporary society. All while keeping light-hearted humour at the forefront of our message. Sailing is smoother with breezes of laughter. 
						</center><br><br>
						<div style="width: 1000px; text-align: center; position: absolute; z-index: 0;">
						<table border="0" cellpadding="0" cellspacing="0" align=center>
							<tr>
								<td>
									<table width="243" height="345" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td rowspan="3" width="42" height="345" style="background:url(images/cadre_01.png) no-repeat;">
												</td>
											<td width="155" height="51" style="background:url(images/cadre_02.png) no-repeat;">
												</td>
											<td rowspan="3" width="46" height="345" style="background:url(images/cadre_03.png) no-repeat;">
												</td>
										</tr>
										<tr>
											<td width="155" height="231" style="background:url(images/capt_bio.png) no-repeat;">
												</td>
										</tr>
										<tr>
											<td width="155" height="63" style="background:url(images/cadre_05.png) no-repeat;">
												</td>
										</tr>
									</table>
								</td>
								<td style="padding-left: 15px;">
								<b>Captain Pander Decken</b>
								<p style="padding-left: 10px;">
								Cursed with the quest of finding the perfect word, he has found able-bodied sailors to entertain his voyage. He mostly stays in his cabin for long journeys, but he's the first on port when rum and games are to be had. There is none who rallies a crew like our Captain.
								</p>
								</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td>
								<b>Marc Khoury</b>
								<p style="padding-left: 10px;">
								Head Scribe and the Captain's left hand, he archives the tales lived and heard during voyages so they can be retold by many. He's had a pen in his hand since before birth, and has recently trained at Concordia University in Montreal.<br>
								<br />
								<a href="http://publishing.piratepandacompany.com" class="top_pub">Read some of his works</a>
								</p>
								</td>
								<td>
									<table width="243" height="345" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td rowspan="3" width="42" height="345" style="background:url(images/cadre_01.png) no-repeat;">
												</td>
											<td width="155" height="51" style="background:url(images/cadre_02.png) no-repeat;">
												</td>
											<td rowspan="3" width="46" height="345" style="background:url(images/cadre_03.png) no-repeat;">
												</td>
										</tr>
										<tr>
											<td width="155" height="231" style="background:url(images/marc_bio.png) no-repeat;">
												</td>
										</tr>
										<tr>
											<td width="155" height="63" style="background:url(images/cadre_05.png) no-repeat;">
												</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table width="243" height="345" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td rowspan="3" width="42" height="345" style="background:url(images/cadre_01.png) no-repeat;">
												</td>
											<td width="155" height="51" style="background:url(images/cadre_02.png) no-repeat;">
												</td>
											<td rowspan="3" width="46" height="345" style="background:url(images/cadre_03.png) no-repeat;">
												</td>
										</tr>
										<tr>
											<td width="155" height="231" style="background:url(images/cyn_bio.png) no-repeat;">
												</td>
										</tr>
										<tr>
											<td width="155" height="63" style="background:url(images/cadre_05.png) no-repeat;">
												</td>
										</tr>
									</table>
								</td>
								<td style="padding-left: 15px;">
								<b>Cynthia Loutfi</b>
								<p style="padding-left: 10px;">
								Head Everything Else and the Captain's right hand, she keeps the sailors working and navigates the ship when Captain Decken retires to his cabin (which is most of the time). Her first cry as a baby was a melody, and has slowly but surely brought her musical talents to the stage and into our hearts<a href="http://www.youtube.com/watch?v=DUc9FlUP-7g">.</a><br>
								You've seen her as: many characters, <i>Les Pas Perdus (2006)</i>. Miss Rosita, <i>Completement Con (2007)</i>. Sally, <i>The Strange World of Mister Jack (2008)</i>. Tobias, <i>Sweeney Todd: the Demon Barber of Fleet Street (2009)</i>.
								</p>
								</td>
								<td></td>
							</tr>
						</table>
						</div>
					</td>
					<td align=right valign=top width="50">
						<? if ($browser == "Mozilla Firefox" || $browser == "Opera") { ?>
							<div style="position: relative; left: -180px;">
						<? } ?>
						<a class="top_cie" href="#top">[ top ]</a>
						<? if ($browser == "Mozilla Firefox" || $browser == "Opera") { ?>
							</div>
						<? } ?>
					</td>
				</tr>
			</table>
		</div>
		</td>
		<td width="460" height="1080" style="background:url(images/piratepanda_long_09.jpg) no-repeat;">
			</td>
	</tr>
	<tr>
		<td width="460" height="200" style="background:url(images/piratepanda_long_10.jpg) no-repeat;">
			</td>
		<td width="1000" height="200" style="background:url(images/piratepanda_long_11.jpg) no-repeat;">
			</td>
		<td width="460" height="200" style="background:url(images/piratepanda_long_12.jpg) no-repeat;">
			</td>
	</tr>
	<tr>
		<td width="460" height="1080" style="background:url(images/piratepanda_long_13.jpg) no-repeat;">
			</td>
		<td width="1000" height="1000" style="background:url(images/piratepanda_long_14.jpg) no-repeat;">
		
		<? if ($browser == "Internet Explorer") { ?>
			<div id="theater_content" valign=top style="position: relative; height: 100%; margin-top: 100px; left: -50px;">
		<? } else if ($browser == "Mozilla Firefox") { ?>
			<div id="theater_content" valign=top style="position: relative; height: 100%; margin-top: 80px; left: -50px;">
		<? } else if ($browser == "Opera") { ?>
			<div id="theater_content" valign=top style="position: relative; height: 100%; margin-top: 100px; left: -50px;">
		<? } else { ?>
			<div id="theater_content" valign=top style="position: relative; height: 100%; margin-top: 190px; left: -50px;">
		<? } ?>
			<a name="theater"></a>
			<table width=1000 border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td valign=top style="color: #009900;" id="theater_text" width="750px";>
					<? if ($browser == "Mozilla Firefox" || $browser == "Opera") { ?>
						<div style="line-height: 90%;">
					<? } ?>
						<table width="750px" border="0" cellpadding="0" cellspacing="0" id="theater_content">
						<table width="750px" border="0" cellpadding="0" cellspacing="0" id="theater_content">
							<tr>
								<td width="500px" height="120px" align=center>
									<a href="http://theater.piratepandacompany.com" style="border: 0px;"><img src="images/wia.png"></a>
								</td>
								<td>
									<center>
									_____________________________<br />
									<br />
									BUY TICKETS<br />
									SOON<br />
									514.849.FEST<br />
									_____________________________</center><br /><br /><br />
								</td>
							</tr>
						</table>
						<span style="font-size: 1.3em; font-weight: bold;">> WHAT_</span> 
						
						
						<i>Who is Aristippus?</i> follows the schemes of Aristippus of Cyrene <b>(Maïza Dubhé)</b>, a wanderer in search of parts to repair his robot servant, Harlebot <b>(Jonathan Cortes)</b>. Upon arrival in a small town, he meets the owner of a robot shop, Leon <b>(Mike Melino)</b> and strikes a deal with him to attempt to turn his lesbian daughter Sapphia <b>(Tracy Allan)</b> to heterosexuality in exchange for repairing the robot. Yet jealousy rears its ugly head when Sapphia’s servant Joan <b>(Natalie Chaya)</b> is stopped from attaining her heart’s desire. Based on the Commedia Dell'arte masks and mixed with a philosophical foundation, the play traverses interpretations of gender, humanity and automation to end in a transcendence of all these concepts, which are the naked beings that don all these masks.<br ><b>(Playwright: Marc Khoury, Director: Philippe Gobeille)</b><br />
						
						<br />
						The play visually emphasizes this relationship between past and future<br />in our culture by adopting Steampunk themes. This movement, already gaining popularity, mixes our technological ideas with the ornate looks of the Victorian Era. The costumes were designed by <b>Lisa Abi-Chedid</b>, Montreal fashion designer, and the scenography by renowned artist <a href="http://www.jaberlutfi.com" class="theater_text"><b>Jaber Lutfi</b></a> and Concordia graduate engineer <b>Maxime Loutfi</b>.
						<br />&nbsp;<br />
						<table width="750px" cellpadding="0" cellspacing="0" id="theater_content" >
							<tr>
								<td width="45%">
									<span style="font-size: 1.3em; font-weight: bold;">> WHERE_</span> FRINGE VENUE 8<br />
									Club Espagnol<br />
									4388 Boul. St-Laurent<br />
									Montreal, Quebec, H2W 1Z5<br />
									<br />
									<center><a href="http://bit.ly/eQuVCS" class="theater_text">GET DIRECTIONS</a><br /><br /><img src="images/qrmaps.jpg" /><br /><span style="font-size: 0.6em;">send to your phone</span></center>
								</td>
								<td>
									<center>
										<table width="75%" cellpadding="5" cellspacing="0" border="1" bordercolor=#090 style="text-align: center; border: 1px solid #090;"  id="theater_content">
										<tr>
											<td colspan="7" style="text-align: center;<? if ($browser == "Mozilla Firefox") { echo ' border: 1px solid #090;'; } ?>"><b>June 2011</b></td>
										</tr><tr>
											<td style="border: 1px solid #090;">Su</td>
											<td style="border: 1px solid #090;">Mo</td>
											<td style="border: 1px solid #090;">Tu</td>
											<td style="border: 1px solid #090;">We</td>
											<td style="border: 1px solid #090;">Th</td>
											<td style="border: 1px solid #090;">Fr</td>
											<td style="border: 1px solid #090;">Sa</td>
										</tr><tr>
											<td style="border: 1px solid #090;">&nbsp;</td>
											<td style="border: 1px solid #090;">&nbsp;</td>
											<td style="border: 1px solid #090;">&nbsp;</td>
											<td style="border: 1px solid #090;">1</td>
											<td style="border: 1px solid #090;">2</td>
											<td style="border: 1px solid #090;">3</td>
											<td style="border: 1px solid #090;">4</td>
										</tr><tr>
											<td style="border: 1px solid #090;">5</td>
											<td style="border: 1px solid #090;">6</td>
											<td style="border: 1px solid #090;">7</td>
											<td style="border: 1px solid #090;">8</td>
											<td style="border: 1px solid #090;">9</td>
											<td style="background: #074c07; border: 1px solid #090;">10<br/><b>24h00</b><br><a class="tooltip" style="color: white;">Crew Show<sup>?</sup><span>A pre-show for the Pirate Panda crew, media and volunteers. You're all invited to join the fun!<br /><br />FRINGE Volunteers<br />2 for 1! yay!</span></td>
											<td style="border: 1px solid #090;">11</td>
										</tr><tr>
											<td style="background: #074c07; border: 1px solid #090;">12<br/><b>18h15</b><br><span style="color: white;">Premiere</span></td>
											<td style="border: 1px solid #090;">13</td>
											<td style="border: 1px solid #090;">14</td>
											<td style="background: #074c07; border: 1px solid #090;">15<br/><b>22h00</b></td>
											<td style="background: #074c07; border: 1px solid #090;">16<br/><b>17h00</b></td>
											<td style="background: #074c07; border: 1px solid #090;">17<br/><b>14h30</b></td>
											<td style="background: #074c07; border: 1px solid #090;">18<br/><b>20h30</b></td>
										</tr><tr>
											<td style="border: 1px solid #090;">19</td>
											<td style="border: 1px solid #090;">20</td>
											<td style="border: 1px solid #090;">21</td>
											<td style="border: 1px solid #090;">22</td>
											<td style="border: 1px solid #090;">23</td>
											<td style="border: 1px solid #090;">24</td>
											<td style="border: 1px solid #090;">25</td>
										</tr><tr>
											<td style="border: 1px solid #090;">26</td>
											<td style="border: 1px solid #090;">27</td>
											<td style="border: 1px solid #090;">28</td>
											<td style="border: 1px solid #090;">29</td>
											<td style="border: 1px solid #090;">30</td>
											<td></td>
											<td></td>
										</tr>
										</table>
									</center>
								</td>
							</tr>
						</table>
						
					</td>
					<td align=right valign=top width="250" style="padding-top: 30px;" id="theater_content">
						<div style="position: absolute; right: -100px;">
							&gt; <a href="http://theater.piratepandacompany.com" style="border: 0px;" class="theater_text">THEATER</a> &lt; &nbsp;&nbsp;&nbsp;<a class="top_theater" href="#top">[ top ]</a><br />
							<a href="http://theater.piratepandacompany.com" style="border: 0px;"><img src="images/pixel.png" width="350px" height="700px"></a>
						</div>
					</td>
					<? if ($browser == "Mozilla Firefox" || $browser == "Opera") { ?>
							</div>
					<? } ?>
				</tr>
			</table>
		</div></td><td width="460" height="1080" style="background:url(images/piratepanda_long_15.jpg) no-repeat;">
			</td>
	</tr>
	<tr>
		<td width="460" height="200" style="background:url(images/piratepanda_long_16.jpg) no-repeat;">
			</td>
		<td width="1000" height="200" style="background:url(images/piratepanda_long_17.jpg) no-repeat;">
			</td>
		<td width="460" height="200" style="background:url(images/piratepanda_long_18.jpg) no-repeat;">
			</td>
	</tr>
	<tr>
		<td width="460" height="1080" style="background:url(images/piratepanda_long_19.jpg) no-repeat;">
			</td>
		<td width="1000" height="1080" style="background:url(images/piratepanda_long_20.jpg) no-repeat;">
		
		<? if ($browser == "Internet Explorer") { ?>
			<div id="pub_content_ie">
		<? } else if ($browser == "Mozilla Firefox") { ?>
			<div id="pub_content_ie">
		<? } else if ($browser == "Opera") { ?>
			<div id="pub_content_ie">
		<? } else { ?>
			<div id="pub_content">
		<? } ?>

		<a name="publishing"></a>
			<table width=100% border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td valign=top>
						
						
						<table width=250 height=890 border="0" cellpadding="0" cellspacing="0" align=left>
						<tr><td valign=bottom style="font-size: 1.5em;">
						
						<? if ($browser == "Internet Explorer") { ?>
							<div style="position: relative; left: -120px; text-align: left;">
						<? } else if ($browser == "Mozilla Firefox") { ?>
							<div style="position: relative; left: -120px; text-align: left;">
						<? } else if ($browser == "Opera") { ?>
							<div style="position: relative; left: -120px; text-align: left;">
						<? } else { ?>
							<div style="position: relative; left: -120px; text-align: left;">
						<? } ?>

							<a href="http://publishing.piratepandacompany.com" style="border: 0px;"><img src="images/pixel.png" width="700px" height="700px" border=0></a>
							<br /><br /><br />
							<a href="publishing/index.php?c=1" class="top_pub"><b>Start Reading<br/>From Chapter 1</b></a>
							<br /><br /><br /><br />&nbsp;<br />
						</div>
							</td></tr>
						</table>
						
					</td>
					<td align=right valign=top width="300">
						<a class="top_pub" href="#top">[ top ]</a><Br /><br />
						<center style="font-size: 1.5em;">
							<b><u>Latest Chapter</u></b>
							<br>
							<a href="publishing/index.php?c=<?=$last_row['Chapter_Num']?>"  class="top_pub">Chapter <?=$last_row['Chapter_Num']?> - <?=$last_row['Title']?></a>
							</center>
							<br />
							<a href="http://publishing.piratepandacompany.com" style="border: 0px;"><img src="images/pixel.png" width="300px" height="750px" border=0></a>
					</td>
				</tr>
			</table>
		</div>	
		</td>
		<td width="460" height="1080" style="background:url(images/piratepanda_long_21.jpg) no-repeat;">
			</td>
	</tr>
	<tr>
		<td width="460" height="400" style="background:url(images/piratepanda_long_22.jpg) no-repeat;">
			</td>
		<td width="1000" height="400" style="background:url(images/piratepanda_long_23.jpg) no-repeat;">
		<div id="footer_content">
			<table width=100% border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td valign=top width="650px" style="top: 50px;">
					<img src="images/pixel.png" height="150" width="0"><br />
					<a href="http://www.facebook.com/PiratePandaCompany" style="border: 0px"><img src="images/facebook_sand.png"></a> <a href="http://www.twitter.com/piratepandaco" style="border: 0px;"><img src="images/twitter_sand.png"></a>
					</td>
					<td valign="top" width="350px">
					<img src="images/pixel.png" height="100" width="0"><br />
						<a class="tooltip2" style="border: 0px;"><img alt=" philippe_jacques@sympatico.ca" src="images/pixel.png" height="100" width="200" style="border: 0px;"><span><b>Philippe Jacques</b><br />Cellphone <b>514.554.2684</b><br />Email: <b>philippe_jacques@sympatico.ca</b></span></a>
					</td>
				</tr>
			</table>
			<br /><center>
					<span style="font-size: 12px; color: black; font-family: Arial;">Pirate Panda Company | © Copyright 2011 | 438.390.4308 | <a href="mailto:info@piratepandacompany.com">info@piratepandacompany.com</a> | Backend by <a href="http://www.net-forge.com">Netforge</a></span>
					</cemter>
		</div>
			</td>
		<td width="460" height="400" style="background:url(images/piratepanda_long_24.jpg) no-repeat;">
			</td>
	</tr>
</table>

<!-- End Save for Web Slices -->

<script language=javascript>

extra = 1920 - screen.width;
left_extra = extra / 2;
document.getElementById('Tableau_01').style.marginLeft = -left_extra;

</script>
</body>
</html>
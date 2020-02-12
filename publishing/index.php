<? include("header.php"); ?>

<?
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
?>

	<? if ($_REQUEST['c'] != "0") { ?>
		
		<? if ($_REQUEST['c'] > 1) { ?>
			<a href="index.php?s=<?=$_REQUEST['s']?>&c=1"><< First</a> | 
			<a href="index.php?s=<?=$_REQUEST['s']?>&c=<?=$_REQUEST['c']-1?>">< Previous</a> |
		<? } ?> 
		<select name="pub_chapter_select" id="pub_chapter_select" onchange=chapter_select();>
			<?
			$select_query = "SELECT * FROM Chapters WHERE Story_Num LIKE '".$_REQUEST['s']."' ORDER BY Chapter_Num ASC";
			$select_result = mysql_query($select_query);
			while ($select_row = mysql_fetch_array($select_result)) {
				if ($select_row['Chapter_Num'] != "0") {
			?>
				<option value="<?=$select_row['Chapter_Num']?>" <? if ($select_row['Chapter_Num'] == $_REQUEST['c']) { echo " selected"; } ?>>Chapter <?=$select_row['Chapter_Num']?> - <?=$select_row['Title']?></option>
			<? 
				}
			} ?>
		</select> 
		<? if ($_REQUEST['c'] < $last_row['Chapter_Num']) { ?>
			 |
			<a href="index.php?s=<?=$_REQUEST['s']?>&c=<?=$_REQUEST['c']+1?>">> Next</a> | 
			<a href="index.php?s=<?=$_REQUEST['s']?>&c=<?=$last_row['Chapter_Num']?>">>> Latest</a></a>
		<? } ?> 
		<br />
		
		<? if ($browser == "Internet Explorer") { ?>
			<div id="pub_body_text_ie">
		<? } else if ($browser == "Mozilla Firefox") { ?>
			<div id="pub_body_text_ie" style="text-align:left;">
		<? } else if ($browser == "Opera") { ?>
			<div id="pub_body_text_ie" style="text-align:left;">
		<? } else { ?>
			<div id="pub_body_text">
		<? } ?>
		
		<?=$row['Chapter']?>
		</div>
		<br /><hr />
		<? if ($_REQUEST['c'] > 1) { ?>
			<a href="index.php?s=<?=$_REQUEST['s']?>&c=1"><< First</a> | 
			<a href="index.php?s=<?=$_REQUEST['s']?>&c=<?=$_REQUEST['c']-1?>">< Previous</a> |
		<? } ?> 
		<select name="pub_chapter_select" id="pub_chapter_select_bot" onchange=chapter_select_bot();>
			<?
			$select_query = "SELECT * FROM Chapters WHERE Story_Num LIKE '".$_REQUEST['s']."' ORDER BY Chapter_Num ASC";
			$select_result = mysql_query($select_query);
			while ($select_row = mysql_fetch_array($select_result)) {
				if ($select_row['Chapter_Num'] != "0") {
			?>
				<option value="<?=$select_row['Chapter_Num']?>" <? if ($select_row['Chapter_Num'] == $_REQUEST['c']) { echo " selected"; } ?>>Chapter <?=$select_row['Chapter_Num']?> - <?=$select_row['Title']?></option>
			<? 
				}
			} ?>
		</select> 
		<? if ($_REQUEST['c'] < $last_row['Chapter_Num']) { ?>
			 |
			<a href="index.php?s=<?=$_REQUEST['s']?>&c=<?=$_REQUEST['c']+1?>">> Next</a> | 
			<a href="index.php?s=<?=$_REQUEST['s']?>&c=<?=$last_row['Chapter_Num']?>">>> Latest</a></a>
		<? } ?> 
		
		<br /><hr />
		<br />
		
	<? } else { ?>
	
	
	
		
			<a href="index.php?s=1&c=1"><< First</a> | 
		<select name="pub_chapter_select" id="pub_chapter_select" onchange=chapter_select();>
			<option value="#">Chapter Archives</option>
			<?
			$select_query = "SELECT * FROM Chapters WHERE Story_Num LIKE '1' ORDER BY Chapter_Num ASC";
			$select_result = mysql_query($select_query);
			while ($select_row = mysql_fetch_array($select_result)) {
				if ($select_row['Chapter_Num'] != "0") {
			?>
				<option value="<?=$select_row['Chapter_Num']?>" <? if ($select_row['Chapter_Num'] == $_REQUEST['c']) { echo " selected"; } ?>>Chapter <?=$select_row['Chapter_Num']?> - <?=$select_row['Title']?></option>
			<? 
				}
			} ?>
		</select> 
			 |
			<a href="index.php?s=1&c=<?=$last_row['Chapter_Num']?>">>> Latest</a></a>
	
	<? } ?>
	
	
	
	
	
	<br /><br />
	
	
	
	
	
	
		<?
		if ($_REQUEST['s'] != "" && $_REQUEST['c'] == "0") {
			echo "<center><h2>Recent Things</h2></center>";
			$comments_query = "SELECT * FROM Comments ORDER BY ID DESC";
		}
		else {
			$comments_query = "SELECT * FROM Comments WHERE Story_Num LIKE '".$_REQUEST['s']."' AND Chapter_Num LIKE '".$row['ID']."' ORDER BY ID DESC";
		}
		$comments_result = mysql_query($comments_query);
		echo mysql_error();
		
		while ($comments_row = mysql_fetch_array($comments_result)) {
			$temp_query = "SELECT * FROM Chapters WHERE ID LIKE '".$comments_row['Chapter_Num']."'";
			$temp_result = mysql_query($temp_query);
			$temp_row = mysql_fetch_array($temp_result);
			echo mysql_error();
		?>
			<table border="0" cellpadding="3" cellspacing="0" width="630">
			<tr>
				<td rowspan=2 valign="top" align="center" width="80"><img src="uploads/avatars/<?=$comments_row['Image']?>" width="50" /></td>
				<td colspan=2 valign="top" align="left" id="comment_title">
				<?=$comments_row['Title']?>
				<div style="float: right; text-align: right;">
					<? if ($temp_row['Chapter_Num'] != 0) { ?>
						<a href="index.php?s=<?=$temp_row['Story_Num']?>&c=<?=$temp_row['Chapter_Num']?>"><?=$temp_row['Title']?></a>
					<? } ?>
				</div>
				</td>
			</tr>
			<tr>
				<td valign="top" id="comment_body" width="100"><div style="margin-left: 10px; width: 480px;"><?=$comments_row['Comment']?></div></td>
				<td valign="bottom" id="comment_date">
				<?=$comments_row['Date']?>
				</td>
			</tr>
			</table>
			<hr><br />
		<?
			}
		?>
		

<? include("footer.php"); ?>
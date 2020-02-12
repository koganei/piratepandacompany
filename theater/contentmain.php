<?
include("scripts/sqlconnexion.php");
?>

<?
$handle = opendir(getcwd().'/slideshow');

$slideshow = array();
$slidetext = array();
$i = 0;

while (false !== ($file = readdir($handle))) {
	if ($file != "." && $file != "..") {
		$file_split = explode('.',$file);
		if ($file_split[1] != "txt") {
			$slideshow[$i] = $file;
			$slidetext[$i] = $file_split[0];
			
			if ($file == "image4.jpg") {
				$defaulti = $i;
			}
			$i++;
		}
	}
}
closedir($handle);

if ($_REQUEST['show'] == "") { $_REQUEST['show'] = 0; }
?>

<center>
<br />

<div style="height: 620px;">

<table border="0" cellpadding="0" cellspacing="0">
<tr>
	<td valign="middle">
<div id="div_slideshow_previous">
	<?
	if ($slideshow[$defaulti - 1] != "") {
	?>
	<a href="javascript:slideshow_slide(<?=($defaulti - 1)?>)">
	<? } else { ?>
	
	<a href="javascript:slideshow_slide(<?=(count($slideshow) - 1)?>)">
	
	<? } ?>
	
	<img src="images/previous.png" border=0/>
	
	</a>
</div>

	</td><td>
	<table id="table_cadre" border="0" cellpadding="0" cellspacing="0" style="display: inline-table;">
	<tr>
		<td colspan="3" valign="bottom">
		<center><span style="font-size: 0.6em;">Click on photo to zoom</span></center>
		</td>
	</tr>
	<tr>
		<td>
			<img src="images/cadre_tl.png" width="22" height="30" alt="">
		</td>
		<td style="background: url('images/cadre_ht.png');">&nbsp;
			
		</td>
		<td>
			<img src="images/cadre_tr.png" width="22" height="30" alt="">
		</td>
	</tr>

	
	<tr>
		<td style="background: url('images/cadre_vl.png');">&nbsp;
		</td>
		<td>
		<div id="div_slideshow_link_img">
			<a href="slideshow/<?=$slideshow[$defaulti]?>" rel="lightbox" title=""><img src="slideshow/<?=$slideshow[$defaulti]?>" width="350px"/></a>
		</div>
		</td>
		<td  style="background: url('images/cadre_vr.png');">&nbsp;
		</td>
	</tr>
	
	
	<tr>
		<td>
			<img src="images/cadre_bl.png" width="22" height="30" alt="">
		</td>
		<td style="background: url('images/cadre_hb.png');">
		</td>
		<td>
			<img src="images/cadre_br.png" width="22" height="30" alt="">
		</td>
	</tr>

</table>
</td><td valign="middle">

<div id="div_slideshow_next">
	<?
	if ($slideshow[$defaulti + 1] != "") {
	?>
	<a href="javascript:slideshow_slide(<?=($defaulti + 1)?>)">
	<? } else { ?>
	<a href="javascript:slideshow_slide(0)">
	<? } ?>

	<img src="images/next.png" border=0<? if ($slideshow[$defaulti + 1] != "") { echo ' title="next"'; } ?>/>

	</a>
	
	<input type="hidden" value="<?=($defaulti + 1)?>" id="slideshow_nextslide" />
	
</div>

<script language="javascript">
setTimeout('slideshow_timer(10000)', 10000);
</script>

</td></tr></table>

<div id="div_slideshow_text">
<? include("slideshow/".$slidetext[$defaulti].".txt"); ?>
</div>

</center>
</div>
			<br /><br />
			<center><img src="images/p_spacer.png"></center>
			<br />
			<img src="images/shiplog-header.png" /><br /><br />
			
			<?
			$logs_query = "SELECT * FROM Shiplog ORDER BY ID DESC";
			$logs_result = mysql_query($logs_query);
			echo mysql_error();

			while ($logs_row = mysql_fetch_array($logs_result)) {

			$head = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html>
			<head>
			<title>Untitled document</title>
			</head>
			<body>';

			$foot = '</body>
			</html>';

			$logs_row['Entry'] = str_replace($head, '', $logs_row['Entry']);
			$logs_row['Entry'] = str_replace($foot, '', $logs_row['Entry']);

			$logs_row['Entry'] = str_replace('<p>', '', $logs_row['Entry']);
			$logs_row['Entry'] = str_replace('</p>', '', $logs_row['Entry']);

			?>

			<table id="table_news" cellspacing="0" cellpadding="5px">
				<tr>
					<td colspan="3">
						<b><i><?=$logs_row['Title']?></i></b>
					</td><td align="right">
						<i><?=$logs_row['Date']?></i>
					</td>
				</tr>
				<tr>
					<td colspan="4" align="left" id="news_content">
						<img src="uploads/avatars/<?=$logs_row['Image']?>" width="75" height ="75" style="float: left; border: 2px solid #692A22; margin: 5px;" /><?=$logs_row['Entry']?>
					</td>
					
				</tr>
				<tr>
					<td id="news_location">
						<b>Celestial<br />Longitude</b><br /><i><?=$logs_row['Longitude']?></i>
					</td>
					<td id="news_location">
						<b>Celestial<br />Latitude</b><br /><i><?=$logs_row['Latitude']?></i>
					</td>
					<td id="news_location">
						<b>Right Ascension</b><br /><i><?=$logs_row['Time']?> of arc</i>
					</td>
					<td id="news_location">
						<b>Declination</b><br /><i><?=$logs_row['Declination']?></i>
					</td>
				</tr>
			</table>

			<?
				}
			?>
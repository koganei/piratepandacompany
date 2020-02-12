<?
$slide = $_REQUEST['slide'];

chdir('../');
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
			$i++;
		}
	}
}
closedir($handle);
?>

	<?	if ($slideshow[$slide - 1] != "") {	?>	<a href="javascript:slideshow_slide(<?=($slide - 1)?>)">	<? } else { ?>		<a href="javascript:slideshow_slide(<?=(count($slideshow) - 1)?>)">		<? } ?>		<img src="images/previous.png" border=0/>		</a>	

|

<a href="slideshow/<?=$slideshow[$slide]?>" rel="lightbox" title=""><img src="slideshow/<?=$slideshow[$slide]?>" width="350px"/></a>

|

	<?	if ($slideshow[$slide + 1] != "") {	?>	<a href="javascript:slideshow_slide(<?=($slide + 1)?>)">	<? } else { ?>	<a href="javascript:slideshow_slide(0)">	<? } ?>	<img src="images/next.png" border=0<? if ($slideshow[$slide + 1] != "") { echo ' title="next"'; } ?>/>	</a>

|

<? include("slideshow/".$slidetext[$slide].".txt"); ?>
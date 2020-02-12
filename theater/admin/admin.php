<? 
include("../scripts/sqlconnexion.php");

$default_avatar = 'pandaicon.jpg';
?>

<script language=javascript>

function del_entry(ID) {
	if (confirm('Are you sure you want to delete this log entry?')) {
		window.location="../scripts/del_entry.php?ID="+ID;
	}
}

</script>

<center><h2>Shiplog Editor</h2></center>

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
			<img src="../uploads/avatars/<?=$logs_row['Image']?>" width="75" height ="75" style="float: left; border: 2px solid #692A22; margin: 5px;" /><?=$logs_row['Entry']?>
		</td>
		
	</tr>
	<tr>
		<td id="news_location">
			<b>Celestial Longitude</b><br /><i><?=$logs_row['Longitude']?></i>
		</td>
		<td id="news_location">
			<b>Celestial Latitude</b><br /><i><?=$logs_row['Latitude']?></i>
		</td>
		<td id="news_location">
			<b>Right Ascension</b><br /><i><?=$logs_row['Time']?> of arc</i>
		</td>
		<td id="news_location">
			<b>Declination</b><br /><i><?=$logs_row['Declination']?></i>
		</td>
	</tr>
	<tr>
		<td colspan="4" align="right"><a href="index.php?entry=<?=$logs_row['ID']?>">edit</a>&nbsp;&nbsp;&nbsp;<a href=javascript:del_entry(<?=$logs_row['ID']?>);>delete</a>
		</td>
	</tr>
</table>

<?
	}
?>

<br /><br />

<?
chdir('../');
$handle = opendir(getcwd().'/uploads/avatars');

?>
</form>


<form action="../scripts/save_entry.php" name="save_entry_form" method="post" enctype="multipart/form-data">

<? 
if ($_REQUEST['entry'] != "") {
	$logs_query = "SELECT * FROM Shiplog WHERE ID LIKE '".$_REQUEST['entry']."'";
	$logs_result = mysql_query($logs_query);
	$logs_row = mysql_fetch_array($logs_result);
	echo mysql_error();
?>
	<input type="hidden" name="entry_ID" value="<?=$_REQUEST['entry']?>" />
<? } ?>
<input type=button value="New Log Entry" onclick=window.location="index.php";>
<br /><br />

<table border="0" cellpadding="3" cellspacing="5">
<tr>
<?
while (false !== ($file = readdir($handle))) {
	if ($file != "." && $file != "..") {
?>
	<td align="center">
	<img src="../uploads/avatars/<?=$file?>" width="75" style="border: 2px solid #692A22;" />
	<br />
	<input type="radio" name="entry_image" value="<?=$file?>"<? if ($file == $default_avatar || $file == $logs_row['Image']) { echo 'checked="checked"'; } ?>>
	</td>
<?
	}
}
closedir($handle);
?>
</tr>
</table>
<br />
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
New image:</u></b> <input name="uploadedfile" type="file" />

<br /><br />
Title:<input type="text" name="entry_title" value="<?=$logs_row['Title']?>" size=50>
<br /><br />
<textarea name="entry_input"><?=$logs_row['Entry']?></textarea>
<br /><br />

<input type=submit value="Save Log Entry"/>
</form>
<? 
session_start();

$default_avatar = 'ppc_mini_logo.png1300840757';

include("../scripts/sqlconnexion.php");

$last_query = "SELECT * FROM Chapters WHERE Story_Num LIKE '".$_REQUEST['s']."' ORDER BY Chapter_Num DESC";
$last_result = mysql_query($last_query);
$last_row = mysql_fetch_array($last_result);
echo mysql_error();

if ($_REQUEST['c'] != "") {
	$query = "SELECT * FROM Chapters WHERE Story_Num LIKE '".$_REQUEST['s']."' AND Chapter_Num LIKE '".$_REQUEST['c']."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	echo mysql_error();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>[ADMIN] Aristippus & Harlebot - A Tale in &infin; Acts</title>

<LINK href="../css/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

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

<script language="javascript">

function new_story_submit() {
	alert("ba");
	document.forms["new_story_form"].submit();
}

function admin_story_select() {
	s = document.getElementById('pub_story_select').value;
	if (s != "nothing") { window.location="index.php?s="+s; }
}

function admin_chapter_select() {
	c = document.getElementById('pub_chapter_select').value;
	if (c != "nothing") { window.location="index.php?s=<?=$_REQUEST['s']?>&c="+c; }
}

function new_chapter() {
	window.location="index.php?s=<?=$_REQUEST['s']?>";
}

function del_chapter(ID) {
	if (confirm("Are you sure you want to delete this chapter?")) {
		window.location="../scripts/del_chapter.php?ID="+ID;
	}
}

function del_story(ID) {
	if (confirm("Are you sure you want to delete this story and all of its chapters?")) {
		window.location="../scripts/del_story.php?ID="+ID;
	}
}

function new_comment() {
	window.location="index.php?s=<?=$_REQUEST['s']?>&c=<?=$_REQUEST['c']?>";
}

function del_comment(num) {
	if (confirm("Are you sure you want to delete this comment?")) {
		window.location="../scripts/del_comment.php?ID=<?=$row['ID']?>&comment="+num;
	}
}

</script>

</head>

<body>

<table width="100%" cellpadding="0" cellspacing="0" border=0>

	<tr><td id="pub_banner" colspan="2">Aristippus & Harlebot</td></tr>
	
	<tr>
		
		<td id="pub_body">
		<div id="pub_right_panel">
		Twitter Feeder for pubs
		</div>

		<select name="pub_story_select" id="pub_story_select" onchange=admin_story_select();>
			<option value="nothing">Choose a story</option>
			<option value="nothing">--</option>
			<option value="new_story" <? if ($_REQUEST['s'] == "new_story") { echo " selected"; } ?>>Create new story</option>
			<option value="nothing">--</option>
			<?
			$select_query = "SELECT * FROM Stories ORDER BY ID ASC";
			$select_result = mysql_query($select_query);
			while ($select_row = mysql_fetch_array($select_result)) {
			?>
				<option value="<?=$select_row['ID']?>" <? if ($select_row['ID'] == $_REQUEST['s']) { echo " selected"; } ?>><?=$select_row['Title']?></option>
			<? } ?>
		</select>
		<? if ($_REQUEST['s'] != "" && $_REQUEST['s'] != "new_story") { ?>
			<input type=button value="Delete Story" onclick=del_story(<?=$_REQUEST['s']?>);>
		<? } ?>
		<br><br>
		
		<? if ($_REQUEST['s'] == "new_story") { ?>
		
			<form action="../scripts/new_story.php" name="new_story_form" method="post" enctype="multipart/form-data">
			
			Story Title:
			<br />
			<input name="title" type="text" size="80" />
			
			<input type=submit value="Save Story"/>
			
			</form>
			
		<? } ?>
		
		<? if ($_REQUEST['s'] != "" && $_REQUEST['s'] != "new_story") { ?>
		
		<form action="../scripts/save_chapter.php" name="save_form" method="post" enctype="multipart/form-data">
		<input type="hidden" name="s" value="<?=$_REQUEST['s']?>" />
		
			<? if ($_REQUEST['c'] > 1 && $_REQUEST['c'] != "") { ?>
				<a href="index.php?s=<?=$_REQUEST['s']?>&c=1"><< First</a> | 
				<a href="index.php?s=<?=$_REQUEST['s']?>&c=<?=$_REQUEST['c']-1?>">< Previous</a> |
			<? } ?>
		
			<select name="pub_chapter_select" id="pub_chapter_select" onchange=admin_chapter_select();>
				<option value="nothing">Choose a chapter</option>
				<option value="nothing">--</option>
				<?
				$select_query = "SELECT * FROM Chapters WHERE Story_Num LIKE '".$_REQUEST['s']."' ORDER BY Chapter_Num ASC";
				$select_result = mysql_query($select_query);
				while ($select_row = mysql_fetch_array($select_result)) {
				?>
					<option value="<?=$select_row['Chapter_Num']?>" <? if ($select_row['Chapter_Num'] == $_REQUEST['c']) { echo " selected"; } ?>><?=$select_row['Chapter_Num']?>. <?=$select_row['Title']?></option>
				<? } ?>
			</select>
			<? if ($_REQUEST['c'] < $last_row['Chapter_Num'] && $_REQUEST['c'] != "") { ?>
				<a href="index.php?s=<?=$_REQUEST['s']?>&c=<?=$_REQUEST['c']+1?>">> Next</a> | 
				<a href="index.php?s=<?=$_REQUEST['s']?>&c=<?=$last_row['Chapter_Num']?>">>> Latest</a></a>
			<? } ?>
			<? if ($_REQUEST['c'] != "") { ?>
				 | 
				<a href="index.php?s=<?=$_REQUEST['s']?>">> New</a></a>
			<? } ?>
			<br />
			<div id="pub_body_text">
			
			<? if ($_REQUEST['c'] != "0") { ?>
			
				<b><u>Chapter Editor</u></b>
				<br /><br />
				<input type=button value="New Chapter" onclick=new_chapter()>
				<br /><br />
				
				<input type="hidden" name="ID" value="<?=$row['ID']?>" />
				
				Chapter #:
				<br />
				<input name="number" value="<?=$row['Chapter_Num']?>" type="text" size="5" />
				<br /><br />
				
				Chapter Title:
				<br />
				<input name="title" value="<?=$row['Title']?>" type="text" size="80" />
				<br /><br />
				
				Text:
				<br />
				<textarea name="chapter_input"><?=$row['Chapter']?></textarea>
				<br /><br />
				<input type=submit value="Save Chapter"/>
				&nbsp;
				<input type=button value="Delete Chapter" onclick=del_chapter(<?=$row['ID']?>)>
				<br /><hr />	
				<br /><br />
			<? } ?>
			
			<?
			$comments_query = "SELECT * FROM Comments WHERE Story_Num LIKE '".$_REQUEST['s']."' AND Chapter_Num LIKE '".$row['ID']."' ORDER BY ID DESC";
			$comments_result = mysql_query($comments_query);
			echo mysql_error();
			
			while ($comments_row = mysql_fetch_array($comments_result)) {
			?>
				<table border="0" cellpadding="3" cellspacing="0" width="630">
				<tr>
					<td rowspan=2 valign="top" align="center" width="80"><img src="../uploads/avatars/<?=$comments_row['Image']?>" width="50" /></td>
					<td colspan=2 valign="top" align="left" colspan=2 id="comment_title"><?=$comments_row['Title']?></td>
				</tr>
				<tr>
					<td valign="top" id="comment_body" width="100"><div style="margin-left: 10px; width: 480px;"><?=$comments_row['Comment']?></div></td>
					<td valign="bottom" id="comment_date"><?=$comments_row['Date']?>
					<a href="index.php?s=<?=$_REQUEST['s']?>&c=<?=$_REQUEST['c']?>&comment=<?=$comments_row['ID']?>">edit</a>
							&nbsp;
							<a href="#" onclick=del_comment(<?=$comments_row['ID']?>)>delete</a>
					</td>
				</tr>
				</table>
				<hr><br />
			<?
				}
			?>
			
			<br /><br />
			
			<?
			chdir('../');
			$handle = opendir(getcwd().'/uploads/avatars');
			
			?>
			</form>
			
			<? if ($_REQUEST['c'] != "") { ?>
				<form action="../scripts/save_comment.php" name="save_comment_form" method="post" enctype="multipart/form-data">
				<input type="hidden" name="ID" value="<?=$row['ID']?>" />
				<input type="hidden" name="s" value="<?=$_REQUEST['s']?>" />
				<? 
				$img = '';
				$date = '';
				$title = '';
				if ($_REQUEST['comment'] != "") {
					$comments_query = "SELECT * FROM Comments WHERE ID LIKE '".$_REQUEST['comment']."'";
					$comments_result = mysql_query($comments_query);
					$comments_row = mysql_fetch_array($comments_result);
					echo mysql_error();
				?>
					<input type="hidden" name="comment_num" value="<?=$_REQUEST['comment']?>" />
				<? } ?>
				<b><u>Comment Editor:</u></b>
				<br /><br />
				<input type=button value="New Comment" onclick=new_comment()>
				<br /><br />
				
				<table border="0" cellpadding="3" cellspacing="5">
				<tr>
				<?
				while (false !== ($file = readdir($handle))) {
					if ($file != "." && $file != "..") {
				?>
					<td align="center">
					<img src="../uploads/avatars/<?=$file?>" width="50" />
					<br />
					<input type="radio" name="comment_image" value="<?=$file?>"<? if ($file == $default_avatar || $file == $comments_row['Image']) { echo 'checked="checked"'; } ?>>
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
				Title:<input type="text" name="comment_title" value="<?=$comments_row['Title']?>" size=50>
				<br /><br />
				<textarea name="comment_input"><?=$comments_row['Comment']?></textarea>
				<br /><br />
				
				<input type=submit value="Save Comment"/>
				</form>
			<? } ?>
			</div>
		<? } ?>
		
		</td>

	</tr>

</table>

</body>
</html>

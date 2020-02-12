<? 
session_start();

include("sqlconnexion.php");

$num = $_POST['comment_num'];
$title = $_POST['comment_title'];
$comment = $_POST['comment_input'];
$img = $_POST['comment_image'];
$ID = $_POST['ID'];
$s = $_POST['s'];

date_default_timezone_set('America/Montreal');
$date = date('d/m/Y H:i:s');

chdir('../');

$target_path = getcwd()."/uploads/avatars/";

$time = mktime();

$filename = basename($_FILES['uploadedfile']['name']);
$filename_time = basename($_FILES['uploadedfile']['name']).$time;
$uploadfile = $target_path . $filename_time;

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $uploadfile)) {
    echo "The file ".basename( $_FILES['uploadedfile']['name'])." has been uploaded";
	echo mysql_error();
	$img = $filename_time;
}

$current_comments_query = "SELECT * FROM Chapters WHERE ID LIKE '".$ID."'";
$current_comments_result = mysql_query($current_comments_query);
$current_comments_row = mysql_fetch_array($current_comments_result);

if ($num != "") {
	$query = "UPDATE Comments SET Title='".$title."', Comment='".$comment."', Image='".$img."' WHERE ID LIKE '".$num."'";
	$result = mysql_query($query);
	echo mysql_error();
}
else {	
	$query = "INSERT INTO Comments (Story_Num, Chapter_Num, Title, Comment, Date, Image) VALUES ('".$s."', '".$ID."', '".$title."', '".$comment."', '".$date."', '".$img."')";
	$result = mysql_query($query);
	echo mysql_error();
}

$redirect_query = "SELECT * FROM Chapters WHERE ID LIKE '".$ID."'";
$redirect_result = mysql_query($redirect_query);
$redirect_row = mysql_fetch_array($redirect_result);
echo mysql_error();

?>

<script language=javascript>window.location="../admin/index.php?s=<?=$s?>&c=<?=$redirect_row['Chapter_Num']?>&comment=<?=$num?>";</script>
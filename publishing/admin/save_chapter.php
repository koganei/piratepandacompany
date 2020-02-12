<? 
session_start();

include("sqlconnexion.php");

$num = $_POST['number'];
$title = $_POST['title'];
$chapter = $_POST['chapter_input'];
$ID = $_POST['ID'];

if ($ID == NULL) {
	$query = "INSERT INTO Chapters (Chapter_Num, Title, Chapter) VALUES ('".$num."', '".$title."', '".$chapter."')";
	$result = mysql_query($query);
	echo mysql_error();
	$redirect_query = "SELECT * FROM Chapters ORDER BY Chapter_Num DESC";
}

else {
	$query = "UPDATE Chapters SET Chapter_Num='".$num."', Title='".$title."', Chapter='".$chapter."' WHERE ID LIKE '".$ID."'";
	$result = mysql_query($query);
	echo mysql_error();
	$redirect_query = "SELECT * FROM Chapters WHERE ID LIKE '".$ID."'";
}

$redirect_result = mysql_query($redirect_query);
$redirect_row = mysql_fetch_array($redirect_result);
echo mysql_error();

?>

<script language=javascript>window.location="../admin/index.php?c=<?=$redirect_row['Chapter_Num']?>";</script>

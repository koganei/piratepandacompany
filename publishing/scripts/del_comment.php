<? 
session_start();

include("sqlconnexion.php");

$num = $_REQUEST['comment'];
$ID = $_REQUEST['ID'];

$query = "DELETE FROM Comments WHERE ID LIKE '".$num."' LIMIT 1";
$result = mysql_query($query);
echo mysql_error();

$redirect_query = "SELECT * FROM Chapters WHERE ID LIKE '".$ID."'";
$redirect_result = mysql_query($redirect_query);
$redirect_row = mysql_fetch_array($redirect_result);
echo mysql_error();

?>

<script language=javascript>window.location="../admin/index.php?s=<?=$redirect_row['Story_Num']?>&c=<?=$redirect_row['Chapter_Num']?>";</script>
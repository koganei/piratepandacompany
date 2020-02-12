<?

session_start();

include("sqlconnexion.php");	

$redirect_query = "SELECT * FROM Chapters WHERE ID LIKE '".$_REQUEST['ID']."'";
$redirect_result = mysql_query($redirect_query);
$redirect_row = mysql_fetch_array($redirect_result);
echo mysql_error();

$query = "DELETE FROM Chapters WHERE ID LIKE '".$_REQUEST['ID']."' LIMIT 1";
$result = mysql_query($query);
echo mysql_error();

?>

<script language=javascript>window.location="../admin/index.php?s=<?=$redirect_row['Story_Num']?>";</script>
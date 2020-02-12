<?

session_start();

include("sqlconnexion.php");	

$query = "DELETE FROM Stories WHERE ID LIKE '".$_REQUEST['ID']."' LIMIT 1";
$result = mysql_query($query);
echo mysql_error();

$query = "DELETE FROM Chapters WHERE Story_Num LIKE '".$_REQUEST['ID']."'";
$result = mysql_query($query);
echo mysql_error();

?>

<script language=javascript>window.location="../admin/index.php";</script>
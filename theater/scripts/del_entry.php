<? 
session_start();

include("sqlconnexion.php");

$ID = $_REQUEST['ID'];

$query = "DELETE FROM Shiplog WHERE ID LIKE '".$ID."' LIMIT 1";
$result = mysql_query($query);
echo mysql_error();

?>

<script language=javascript>window.location="../admin/index.php";</script>
<? 
session_start();

include("sqlconnexion.php");

$title = $_POST['title'];

$query = "INSERT INTO Stories (Title) VALUES ('".$title."')";
$result = mysql_query($query);
echo mysql_error();

$redirect_query = "SELECT * FROM Stories ORDER BY ID DESC";
$redirect_result = mysql_query($redirect_query);
$redirect_row = mysql_fetch_array($redirect_result);
echo mysql_error();

$query = "INSERT INTO Chapters (Story_Num, Chapter_Num, Title) VALUES ('".$redirect_row['ID']."', '0', 'Main Page')";
$result = mysql_query($query);
echo mysql_error();

?>

<script language=javascript>window.location="../admin/index.php?s=<?=$redirect_row['ID']?>";</script>

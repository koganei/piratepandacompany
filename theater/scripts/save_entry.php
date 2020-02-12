<? 
session_start();

include("sqlconnexion.php");

$ID = $_POST['entry_ID'];
$title = $_POST['entry_title'];
$entry = $_POST['entry_input'];
$img = $_POST['entry_image'];

date_default_timezone_set('America/Montreal');
$date = date('F dS Y');
$time = date('H:i:s');

chdir('../');

$target_path = getcwd()."/uploads/avatars/";

$suffix = mktime();

$filename = basename($_FILES['uploadedfile']['name']);
$filename_time = basename($_FILES['uploadedfile']['name']).$suffix;
$uploadfile = $target_path . $filename_time;

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $uploadfile)) {
    echo "The file ".basename( $_FILES['uploadedfile']['name'])." has been uploaded";
	echo mysql_error();
	$img = $filename_time;
}

if ($ID != "") {
	$query = "UPDATE Shiplog SET Title='".$title."', Entry='".$entry."', Image='".$img."', Date='".$date."', Time='".$time."' WHERE ID LIKE '".$ID."'";
	$result = mysql_query($query);
	echo mysql_error();
	
	$redirect_query = "SELECT * FROM Shiplog WHERE ID LIKE '".$ID."'";
}
else {
	$decimale = rand(3,5);
	
	if ($decimale == 3) { $longitude = rand(10,99).'.'.rand(100,999).'&deg;'; }
	else if ($decimale == 4) { $longitude = rand(10,99).'.'.rand(1000,9999).'&deg;'; }
	else if ($decimale == 5) { $longitude = rand(10,99).'.'.rand(10000,99999).'&deg;'; }
	
	$decimale = rand(3,5);
	
	if ($decimale == 3) { $latitude = rand(10,99).'.'.rand(100,999).'&deg;'; }
	else if ($decimale == 4) { $latitude = rand(10,99).'.'.rand(1000,9999).'&deg;'; }
	else if ($decimale == 5) { $latitude = rand(10,99).'.'.rand(10000,99999).'&deg;'; }
	
	$decimale = rand(3,5);
	
	if ($decimale == 3) { $declination = rand(10,99).'.'.rand(100,999).'&deg;'; }
	else if ($decimale == 4) { $declination = rand(10,99).'.'.rand(1000,9999).'&deg;'; }
	else if ($decimale == 5) { $declination = rand(10,99).'.'.rand(10000,99999).'&deg;'; }
	
	$query = "INSERT INTO Shiplog (Title, Entry, Date, Time, Image, Longitude, Latitude, Declination) VALUES ('".$title."', '".$entry."', '".$date."', '".$time."', '".$img."', '".$longitude."', '".$latitude."', '".$declination."')";
	$result = mysql_query($query);
	echo mysql_error();
	
	$redirect_query = "SELECT * FROM Shiplog ORDER BY ID DESC";
}

$redirect_result = mysql_query($redirect_query);
$redirect_row = mysql_fetch_array($redirect_result);
echo mysql_error();

?>

<script language=javascript>window.location="../admin/index.php?entry=<?=$redirect_row['ID']?>";</script>
<?
$username = "pander";
$password = "Iloveharl3b0t";
$hostname = "pander.db.7611186.hostedresource.com";

$dbh = mysql_connect($hostname, $username, $password);
$selected = mysql_select_db("pander",$dbh);
?>
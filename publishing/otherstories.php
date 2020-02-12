<? include("header.php"); ?>
<script> document.getElementById('summary_text').style.display = "none"; </script>
<center><h3>Other Stories</h3></center><Br />

<?

$stories_query = "SELECT * FROM Stories ORDER BY ID ASC";
$stories_result = mysql_query($stories_query);
echo mysql_error();

while ($stories_row = mysql_fetch_array($stories_result)) { ?>
	<a href="index.php?s=<?=$stories_row['ID']?>&c=1"><?=$stories_row['Title']?></a><br>
<? } ?>
<br />
<? if (mysql_num_rows($stories_result) < 2) { echo "More coming Soon!"; } ?>

<? include("footer.php"); ?>
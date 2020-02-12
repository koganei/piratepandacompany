<center>
<?php

if ($handle = opendir('photoshoot/')) {

    /* This is the correct way to loop over the directory. */
    while (false !== ($file = readdir($handle))) {
        echo "<img src='photoshoot/" . $file . "' /><br />$file<hr>";
    }

    closedir($handle);
}
?>
</center>
<?php
    $date = $_POST["date"];
    $count = 0;
    if ($file = fopen($date . ".txt", "r")){
        $count = intval(fgets($file));
        fclose($file);
    }
    
    $file = fopen($date . ".txt", "w");
    
    fwrite($file, $count + 1);
    fclose($file);
?>
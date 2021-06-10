<?php

    //TO-DO add isset or empty check
    $wordlen = $_POST['wordlen'];
    $wordnum = $_POST['wordnum'];
    $changetonum = $_POST['changetonum'];
    $changetonum2 = $_POST['changetonum2'];
    $changetonum3 = $_POST['changetonum3'];

    $words = array();
    $fh = fopen('words.txt','r');
    while ($line = fgets($fh)) {
    array_push($words, trim($line));
    }
    fclose($fh);

?>
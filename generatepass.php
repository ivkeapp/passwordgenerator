<?php

    //TO-DO add isset or empty check
    $wordlen = $_POST['wordlen'];
    $wordnum = $_POST['wordnum'];
    $changetonum = $_POST['changetonum'];
    $changetonum2 = $_POST['changetonum2'];
    $changetonum3 = $_POST['changetonum3'];

    $zanimanja = array();
    $fh = fopen('zanimanja.txt','r');
    while ($line = fgets($fh)) {
    array_push($zanimanja, trim($line));
    }
    fclose($fh);

    $pridevi = array();
    $f = fopen('pridevi.txt','r');
    while ($line = fgets($f)) {
    array_push($pridevi, trim($line));
    }
    fclose($f);

?>
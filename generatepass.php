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

    $word = getRandom($zanimanja, $wordlen);

    function getRandom(&$zanimanja, &$wordlen){
        $randomZanimanje = $zanimanja[rand(0,count($zanimanja)-1)];
    
        if($wordlen==='1'){
            if(mb_strlen($randomZanimanje)<=6){
                return $randomZanimanje;
            } else {
                $randomZanimanje = getRandom($zanimanja, $wordlen);
                return $randomZanimanje;
            }
        } elseif($wordlen==='2'){
            if(mb_strlen($randomZanimanje)<13 AND mb_strlen($randomZanimanje)>6){
                return $randomZanimanje;
            } else {
                $randomZanimanje = getRandom($zanimanja, $wordlen);
                return $randomZanimanje;
            }
        } elseif ($wordlen==='3') {
            if(mb_strlen($randomZanimanje)>12){
                return $randomZanimanje;
            } else {
                $randomZanimanje = getRandom($zanimanja, $wordlen);
                return $randomZanimanje;
            }
        }
    }

    function getNumOfWords($string) {
        
    }

?>
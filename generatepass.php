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
        $string = preg_replace('/\s+/', ' ', trim($string));
        $words = explode(" ", $string);
        return count($words);
    }

    if(getNumOfWords($word)>=$wordnum){
        $word = str_replace(" ", ".", $word);
        $word = mb_convert_case($word, MB_CASE_TITLE, "UTF-8");
        if($changetonum==='1'){
            $word = str_replace("o", "0", $word);
        }
        if($changetonum2==='2'){
            $word = str_replace("i", "1", $word);
        }
        if($changetonum3==='3'){
            $word = str_replace("e", "3", $word);
        }
    
        echo json_encode($word);
    } elseif(getNumOfWords($word)<$wordnum) {
        $word = $pridevi[rand(0,count($pridevi)-1)] . "." . $word;
        $word = str_replace(" ", ".", $word);
        $word = mb_convert_case($word, MB_CASE_TITLE, "UTF-8");
        if($changetonum==='1'){
            $word = str_replace("o", "0", $word);
        }
        if($changetonum2==='2'){
            $word = str_replace("i", "1", $word);
        }
        if($changetonum3==='3'){
            $word = str_replace("e", "3", $word);
        }
        echo json_encode($word);
    }

?>
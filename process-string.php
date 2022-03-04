<?php
    
    function processString($stringa){
        $data = explode("$$", $stringa);
        $mang = array();
        for ($i = 0; $i < count($data); $i++) {
            $data1 = explode(":", $data[$i], 2);
            for ($j = 0; $j < count($data1); $j++) {
                $mang[] = $data1[$j];
            }
        }
        for ($i = 0; $i < count($mang); $i++) {
            if ($i % 2 == 0) {
                $mang[$i] = "<h4>" . $mang[$i] . ":" . "</h4>";
            }
        }

        for ($i = 0; $i < count($mang); $i++) {
            if ($i % 2 == 1) {
                $stringcd = "<ul>";
                $mangphu = explode(".", $mang[$i]);
                for ($j = 0; $j < count($mangphu) - 1; $j++) {
                    $stringtmp = "<li>" . $mangphu[$j] . "</li>";
                    $stringcd = $stringcd . $stringtmp;
                }
                $stringcd = $stringcd . "</ul>";
                $mang[$i] = $stringcd;
            }
        }
        $sxcc = "";
        for ($i = 0; $i < count($mang); $i++) {
            $sxcc = $sxcc . $mang[$i];
        }
        print_r($sxcc);
    }


    function ps_price($str){
        $sprice = (string)$str;
        $stringres = '';
        $le = strlen($sprice);
        if($le>0 &&  $le<=3){
            $stringres = $sprice.' đ';
        }else if($le>3 &&  $le<=6){
            $stringres = substr($sprice, 0, -3).'.'.substr($sprice, -3).' đ';
        }else if($le>6 &&  $le<=9){
            $stringres = substr($sprice, 0, -6).'.'.substr($sprice, -6, -3).'.'.substr($sprice, -3).' đ';
        }else if($le>9 &&  $le<=12){
            $stringres = substr($sprice, 0, -9).'.'.substr($sprice, -9, -6).'.'.substr($sprice, -6, -3).'.'.substr($sprice, -3).' đ';
        }

        return $stringres;
    }
    function ps_date($dates){
        if($dates!='')
            return date('d-m-Y',strtotime($dates));
        else
            return '';
    }
    
?>
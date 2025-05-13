<?php

function getWorkDays(int $month, int $year) {
    $daysMonth = date('t', mktime(0,0,0, $month, 1, $year));
    $monthWork = [];
    for($i=0; $i<(+$daysMonth); $i++) {
        array_push($monthWork, date("d l", mktime(0,0,0, $month, ($i+1), $year)));
    };
    
    for($index=0;$index < count($monthWork); $index+=3) {

        if(strpos($monthWork[$index], "Saturday")) {
            $index-=1;
            continue;
        } 
        if(strpos($monthWork[$index], "Sunday")) {
            $index-=2;
            continue;
        }
        $monthWork[$index].=" +";
        
        
    }
    print_r($monthWork);

}

getWorkDays(5, 25);
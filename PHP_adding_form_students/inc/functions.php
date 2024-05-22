<?php


function sanitizeInput ($input){
    return htmlentities(htmlspecialchars(stripcslashes(trim($input))));
}
function dd($data){
    echo "<pre>";
        print_r($data);
    echo "</pre>";
    die;
}

function minval(  $val ,  $limit){
     return strlen($val)< $limit ;
     }




function maxval(  $val ,  $limit){
    return strlen($val)>$limit ;
}
<?php

function progress_bar($done, $total, $info = "", $width = 50) {
    $perc = round(($done * 100) / $total);
    $bar = round(($width * $perc) / 100);
    return sprintf("%s%%[%s>%s]%s\r", $perc, str_repeat("=", $bar), str_repeat(" ", $width - $bar), $info);
}

function checkInternet(){
    if (!$sock = @fsockopen('www.google.com', 80)) {
        echo 'Not Connected, Please try again later';
        exit;
    }
}

function getHost($url){
    ["host" => $host] = parse_url($url);
    return $host;
}
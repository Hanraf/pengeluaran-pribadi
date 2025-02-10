<?php
function kapital($text){
    return strtoupper($text);
}

function formatangka($angka){
    return number_format($angka, 0, ',', '.');
}
<?php

$Lengua = $_GET['Lenguaje'];
switch($Lengua){

    case 'ES':
        include('esp.php');
        header("location: ".$_SERVER['HTTP_REFERER']);
    break;

    case 'EN':
        include('ing.php');
        header("location: ".$_SERVER['HTTP_REFERER']);
    break;
    
    case 'JA':
        include('jap.php');
        header("location: ".$_SERVER['HTTP_REFERER']);
    break;
    
}
?>
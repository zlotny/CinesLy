<?php

$Lengua = $_GET['Lenguaje'];
switch($Lengua){
    case 'ES':
        include('multidioma/esp.php');
    break;
    case 'EN':
        include('multidioma/eng.php');
    break;
    case 'JA':
        include('multidioma/jap.php');
    break;
    
}
?>
<?php
    error_reporting(E_ERROR | E_PARSE);
    include 'class/class.admon.php';
    
    $notifica = new admon();
    $notifica->sendNotification();
?>
<?php
     error_reporting(E_ERROR | E_PARSE);
	include 'class/class.admon.php';
    //session_start();
    $p = new admon();
    $p->getTicket();
?>

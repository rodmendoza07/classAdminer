<?php
     error_reporting(E_ERROR | E_PARSE);
	include 'class/class.dishes.php';

    session_start();
    foreach ($_SESSION['comdetail'] as $value) {
        # code...
        echo $value;
    }
    //$showCommand = new getOrder();
    //$showCommand->getOrder();
?>
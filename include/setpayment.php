<?php
     error_reporting(E_ERROR | E_PARSE);
	include 'class/class.dishes.php';
    session_start();
    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str, true);

    $paymentid = $json_obj['paymentid'];

    $p = new dish();
    $p->setpayment($paymentid);
?>
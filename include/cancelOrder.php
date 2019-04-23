<?php
     error_reporting(E_ERROR | E_PARSE);
	include 'class/class.dishes.php';

    $cancelorder = new dish();
    $cancelorder->cancelorder();
?>
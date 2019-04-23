<?php
     error_reporting(E_ERROR | E_PARSE);
	include 'class/class.dishes.php';

    session_start();
    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str, true);

    $precio = $json_obj['precio'];
    $idplatillo = $json_obj['idplatillo'];
    $nplatillo = $json_obj['nplatillo'];

    if (!isset($_SESSION['commandid'])) {
        # code...
        $newCommand = new dish();
        $newCommand->setCommand(strip_tags($_SESSION['tokk']));
        $newCommand->setComDetail($idplatillo, $nplatillo, $precio);
    } else {
        # code...
        $detail = new dish();
        $detail->setComDetail($idplatillo, $nplatillo, $precio);
    }
?>
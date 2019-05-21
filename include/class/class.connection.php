<?php
    $s = "localhost";
    //$s = "sql.ctsnet.mx";
    $u = "root";
    //$u = "ctsnet";
    //$p = "root";
    $p = "";
    //$p = "MlKGum7C";
    $b = "nemachtilkali";
    //$b = "ctsnet_tlakualco";
    $conecta = new mysqli($s, $u, $p, $b);
    // $conecta->set_charset("utf8");
    if ($conecta->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $conecta->connect_errno . ") " . $conecta->connect_error;
        $conecta->close();
    }
?> 
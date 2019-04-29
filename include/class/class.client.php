<?php
    class cliente {
        public function getClientes() {
            try {
                include 'class.connection.php';
                session_start();
                $call = $conecta->prepare('CALL sp_getclientinfo()');
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    $clientes = array();
                    $result = $call->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $aTemp = array();
                        array_push($aTemp, $row['nombre_completo'], $row['actividad'], $row['ultimavisita'], $row['tipomembresia'], $row['expira']);
                        array_push($clientes, $aTemp);
                    } 
                    $_SESSION['clientes_lista'] = $clientes;
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }
    }
?>
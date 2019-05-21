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
        public function getClientesPayment() {
            try {
                include 'class.connection.php';
                session_start();
                $call = $conecta->prepare('CALL sp_getclientinfopayment()');
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
                        array_push($aTemp, $row['nombre_completo'], $row['actividad'], $row['ultimpagorealizado'], $row['tipomembresia'], $row['expira']);
                        array_push($clientes, $aTemp);
                    } 
                    $_SESSION['clientes_pago'] = $clientes;
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }
        public function getActivities() {
            try {
                include 'class.connection.php';
                session_start();
                $call = $conecta->prepare('CALL sp_getactivities()');
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    $actividad = array();
                    $result = $call->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $aTemp = array();
                        array_push($aTemp, $row['val'], $row['actividad']);
                        array_push($actividad, $aTemp);
                    } 
                    $_SESSION['activities'] = $actividad;
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }
        public function getMemberships() {
            try {
                include 'class.connection.php';
                session_start();
                $call = $conecta->prepare('CALL sp_getmembership()');
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    $actividad = array();
                    $result = $call->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $aTemp = array();
                        array_push($aTemp, $row['val'], $row['membership']);
                        array_push($actividad, $aTemp);
                    } 
                    $_SESSION['membership'] = $actividad;
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
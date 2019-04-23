<?php
    class admon {

        public function cortey() {
            try {
                //code...
                include 'class.connection.php';
                session_start();
                $call = $conecta->prepare('CALL sp_getcuty()');
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    $result = $call->get_result();
                    $cuty = array();
                    $ticketa = "0";
                
                    while ($row = $result->fetch_assoc()) {
                        $aTemp1 = array();
                        $tickett = $row['ticketid'];
                        array_push($aTemp1, $tickett, $row['fecha_venta'], $row['tipo'].' '.$row['platillo'], '$'.$row['precio'], $row['tipo_pago']);
                        array_push($cuty, $aTemp1);
                    }
                    // echo "<pre>";
                    // var_dump($cuty);
                    // echo "</pre>";
                    $_SESSION['cuty'] = $cuty;
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function getTicket() {
            try {
                //code...
                include 'class.connection.php';
               // session_start();
                $call = $conecta->prepare('CALL sp_getNameBO()');
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    $result = $call->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $_SESSION['rest'] = $row['rest'];
                        $_SESSION['address'] =$row['address'];
                    }
					//echo $_SESSION['address'];
                    $call->close();
                    $call1 = $conecta->prepare('CALL sp_getTicketDetail(?)');

                    $call1->bind_param('i',$_SESSION['commandid']);
                    $call1->execute();
                    $ticketDetail = array();
                    $result2 = $call1->get_result();
                    while ($row1 = $result2->fetch_assoc()) {
                        $aTemp = array();
                        array_push($aTemp, $row1['dishname'], $row1['precio']);
                        array_push($ticketDetail, $aTemp);
                    }
                    $_SESSION['tdetail'] = $ticketDetail;
                    $call1->close();
                    $call2 = $conecta->prepare('CALL sp_getTicket(?)');
                    $call2->bind_param('i',$_SESSION['commandid']);
                    $call2->execute();
                    $ticketDetail = array();
                    $result3 = $call2->get_result();
                    $totall = 0;
                    while ($row3 = $result3->fetch_assoc()) {
                        $_SESSION['total'] = $row3['totall'];
                        $_SESSION['fechacompra'] = $row3['fechacompra'];
                    }
                    $ticktetcomplete = '<div class="row"><div class="text-center" style="font-size:20px;">'.$_SESSION['rest']."</div></div>";
                    $ticktetcomplete = $ticktetcomplete.'<div class="row"><div class="text-center" style="font-size:12px;">&nbsp;&nbsp;'.$_SESSION['address']."</div></div>";
                    $ticktetcomplete = $ticktetcomplete.'<div class="row"><div class="text-center" style="font-size:15px; font-weight: bold;">TICKET #'.$_SESSION['commandid'].'</div></div>';
                    $tdetailt = '<div class="row"><div class="col-md-4 col-md-offset-4"><table class="table">';
                    $detalles = $_SESSION['tdetail'];
					$tdetailtt = '';
                    for ($i=0; $i < count($detalles); $i++) { 
                        # code...
                        $tdetailtt = $tdetailtt.'<tr><th>'.$detalles[$i][0].'</th><th>'.$detalles[$i][1].'</th></tr>';
                    }
                    $tdetailt = $tdetailt.$tdetailtt.'</table>'.'</div></div>';
                    $ticktetcomplete = $ticktetcomplete.$tdetailt.'<div class="row"><div class="text-center" style="font-size:15px;font-weight:bold">TOTAL: $'.$_SESSION['total'].'<br>'.$_SESSION['fechacompra'].'</div></div>';

                    $tc = array("completo" => utf8_encode($ticktetcomplete)) ;
					return json_encode($tc);
                }
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function cortez() {
            try {
                //code...
                include 'class.connection.php';
                session_start();
                $call = $conecta->prepare('CALL sp_getcutz()');
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    $result = $call->get_result();
                    $cutz = array();
                    while ($row = $result->fetch_assoc()) {
                        $aTemp1 = array();
                        $tickett = $row['ticketid'];
                        array_push($aTemp1, $tickett, '$'.$row['amount'], $row['fecha_venta'], $row['tipo'].' '.utf8_decode($row['platillo']), '$'.$row['precio'], $row['tipo_pago'], $row['venta_cancelacion']);
                        array_push($cutz, $aTemp1);
                    }
                    $_SESSION['cutz'] = $cutz;
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function sendNotification(){
            try {
                //code...
                include 'class.connection.php';
                $call = $conecta->prepare('CALL sp_getemail()');
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    $result = $call->get_result();
                    $destinatario = array();
                    while ($row = $result->fetch_assoc()) {
                        array_push($destinatario, $row['correo']);
                    }
                    echo "<pre>";
                    var_dump($destinatario);
                    $destinatarios = implode(",", $destinatario);
                    var_dump($destinatarios);
                
                    // Varios destinatarios
                    $para  = 'lr.mendozar@gmail.com';

                    // título
                    $título = 'Recordatorio de cumpleaños para Agosto';

                    // mensaje
                    $mensaje = '
                    <html>
                    <head>
                    <title>Recordatorio de cumpleaños para Agosto</title>
                    </head>
                    <body>
                    <p>¡Estos son los cumpleaños para Agosto!</p>
                    <table>
                        <tr>
                        <th>Quien</th><th>Día</th><th>Mes</th><th>Año</th>
                        </tr>
                        <tr>
                        <td>Joe</td><td>3</td><td>Agosto</td><td>1970</td>
                        </tr>
                        <tr>
                        <td>Sally</td><td>17</td><td>Agosto</td><td>1973</td>
                        </tr>
                    </table>
                    </body>
                    </html>
                    ';

                    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    // Cabeceras adicionales
                    /*$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
                    $cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
                    $cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
                    $cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";*/

                    // Enviarlo
                    

                    echo $mensaje;

                    if (mail($para, $título, $mensaje)) {
                        echo "Éxito";
                    } else {
                        echo "No se ha podido enviar";
                    }
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function totalcortey() {
            try {    
                include 'class.connection.php';
                session_start();
                $call = $conecta->prepare('CALL sp_gettotaly()');
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    $result = $call->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $totaly = $row['total_cortey'];
                    }
                    $_SESSION['totaly'] = $totaly;
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function totalcortez(){
            try {    
                include 'class.connection.php';
                session_start();
                $call = $conecta->prepare('CALL sp_gettotalz()');
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    $result = $call->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $totaly = $row['total_cortey'];
                        $cancelaciones = $row['cancel_corte'];
                    }
                    $_SESSION['totaly'] = $totaly;
                    $_SESSION['cancelaciones'] = $cancelaciones;
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
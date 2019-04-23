<?php
    class dish {
        public function getDishes() {
            try {
                include 'class.connection.php';

                $call = $conecta->prepare('CALL sp_getdishes()');
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    session_start();
                    $result = $call->get_result();
                    $d = array();
                    while ($row = $result->fetch_assoc()) {
                        $dish = '<a class="'.$row['tipo'].'" data-price="'.$row['precio'].'" data-dish="'.$row['platillo'].'" data-dishid="'.$row['idplatillo'].'">';
                        $dish = $dish.'<div class="col-xs-6 col-md-3"><div class="panel panel-default">';
                        $dish = $dish.'<div class="panel-body easypiechart-panel">';
                        $dish = $dish.'<h4>'.$row['platillo'].'</h4>';
                        $dish = $dish.'<div class="easypiechart" id="easypiechart-teal" ><span class="percent">$'.$row['precio'].'</span></div>';
                        $dish = $dish.'</div>';
                        $dish = $dish.'</div></div></a>';
                        array_push($d,$dish);
                    }
                    $_SESSION['dishes'] = $d;
                    $call->close();
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function getPackages() {
            try {
                include 'class.connection.php';

                $call = $conecta->prepare('CALL sp_getpackages()');
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    session_start();
                    $result = $call->get_result();
                    $d = array();
                    while ($row = $result->fetch_assoc()) {
                        $dish = '<a class="'.$row['tipo'].'" data-price="'.$row['precio'].'" data-dish="'.$row['platillo'].'" data-dishid="'.$row['idplatillo'].'">';
                        $dish = $dish.'<div class="col-xs-6 col-md-3"><div class="panel panel-default">';
                        $dish = $dish.'<div class="panel-body easypiechart-panel">';
                        $dish = $dish.'<h4>'.$row['platillo'].'</h4>';
                        $dish = $dish.'<div class="easypiechart" id="easypiechart-blue" ><span class="percent">$'.$row['precio'].'</span></div>';
                        $dish = $dish.'</div>';
                        $dish = $dish.'</div></div></a>';
                        array_push($d,$dish);
                    }
                    $_SESSION['paquetes'] = $d;
                    $call->close();
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function getExtras() {
            try {
                include 'class.connection.php';

                $call = $conecta->prepare('CALL sp_getextras()');
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    session_start();
                    $result = $call->get_result();
                    $d = array();
                    while ($row = $result->fetch_assoc()) {
                        $dish = '<a class="'.$row['tipo'].'" data-price="'.$row['precio'].'" data-dish="'.$row['platillo'].'" data-dishid="'.$row['idplatillo'].'">';
                        $dish = $dish.'<div class="col-xs-6 col-md-3"><div class="panel panel-default">';
                        $dish = $dish.'<div class="panel-body easypiechart-panel">';
                        $dish = $dish.'<h4>'.$row['platillo'].'</h4>';
                        $dish = $dish.'<div class="easypiechart" id="easypiechart-orange" ><span class="percent">$'.$row['precio'].'</span></div>';
                        $dish = $dish.'</div>';
                        $dish = $dish.'</div></div></a>';
                        array_push($d,$dish);
                    }
                    $_SESSION['extras'] = $d;
                    $call->close();
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function getDrinks() {
            try {
                include 'class.connection.php';

                $call = $conecta->prepare('CALL sp_getdrinks()');
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    session_start();
                    $result = $call->get_result();
                    $d = array();
                    while ($row = $result->fetch_assoc()) {
                        $dish = '<a class="'.$row['tipo'].'" data-price="'.$row['precio'].'" data-dish="'.$row['platillo'].'" data-dishid="'.$row['idplatillo'].'">';
                        $dish = $dish.'<div class="col-xs-6 col-md-3"><div class="panel panel-default">';
                        $dish = $dish.'<div class="panel-body easypiechart-panel">';
                        $dish = $dish.'<h4>'.$row['platillo'].'</h4>';
                        $dish = $dish.'<div class="easypiechart" id="easypiechart-red" ><span class="percent">$'.$row['precio'].'</span></div>';
                        $dish = $dish.'</div>';
                        $dish = $dish.'</div></div></a>';
                        array_push($d,$dish);
                    }
                    $_SESSION['drinks'] = $d;
                    $call->close();
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }
        
        public function setCommand($tokk) {
            try {
                //code...
                include 'class.connection.php';

                $call = $conecta->prepare('CALL sp_setcommand(?)');
                $call->bind_param('s', $tokk);
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    session_start();
                    $result = $call->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $_SESSION['commandid'] = $row['commandid'];
                    }
                    $call->close();
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function setComDetail($idplatillo, $nplatillo, $precio) {
            try {
                //code...
                include 'class.connection.php';
                session_start();
                $call = $conecta->prepare('CALL sp_setcomdetail(?,?,?,?)');
                $call->bind_param('isdi',$_SESSION['commandid'], $nplatillo, $precio, $idplatillo);
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    session_start();
                    $_SESSION['comdetail'] = null;
                    $cd = array();
                    $result = $call->get_result();
                    
                    while ($row = $result->fetch_assoc()) {
                        $orden = '<tr><th>'.$row['tipo'].'&nbsp;'.$row['tlkcd_ndish'].'</th><th class="text-right">$'.$row['tlkcd_price'].'</th></tr>';
                        array_push($cd, $orden);
                    }  
                    
                    $_SESSION['comdetail'] = $cd;
                    $resp =  array("status" => 200,"data" => $cd);
                    echo json_encode($resp);
                    $call->close();
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function getOrder() {
            try {
                session_start();
                //code...
                echo $_SESSION['comdetail'];
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function cancelorder() {
            try {
                //code...
                include 'class.connection.php';
                session_start();
                $call = $conecta->prepare('CALL sp_cancelorder(?)');
                $call->bind_param('i',$_SESSION['commandid']);
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    $result = $call->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $r = $row['response'];
                    }
                    unset($_SESSION['commandid']);
                    unset($_SESSION['comdetail']);
                    $resp =  array("status" => 200,"data" => $r);
                    echo json_encode($resp);
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function setpayment($payment) {
            try {
                //code...
                include 'class.connection.php';
                session_start();
                $call = $conecta->prepare('CALL set_payment(?,?)');
                $call->bind_param('id',$_SESSION['commandid'], $payment);
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    $result = $call->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $r = $row['response'];
                    }
                    unset($_SESSION['commandid']);
                    unset($_SESSION['comdetail']);
                    $resp =  array("status" => 200,"data" => $r);
                    echo json_encode($resp);
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function getpayment() {
            try {
                //code...
                include 'class.connection.php';
                include 'class.admon.php';
                session_start();
                $call = $conecta->prepare('CALL get_payment(?)');
                $call->bind_param('i',$_SESSION['commandid']);
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                } else {
                    $result = $call->get_result();
                    $p = array();
                    $total = 0;
                    while ($row = $result->fetch_assoc()) {
                        $aTemp = array();
                        $payid = $row['pid'];
                        $pdesc= $row['pdesc'];
                        $total = $row['amounttotal'];
                        array_push($aTemp,$payid,$pdesc);
                        array_push($p,$aTemp);
                    }
                    $imprime = new admon();
					$resp =  array("status" => 200, "ticketcomplete" =>  json_decode($imprime->getTicket()),"data" => $p, "total" => $total);
                    echo json_encode($resp);
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
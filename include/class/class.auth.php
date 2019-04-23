<?php
    class auth {
        public function ulogin($userName, $passwd, $tokk) {
            try {
                include 'class.connection.php';

                $call = $conecta->prepare('CALL sp_tokenverify(?,?,?)');
                $call->bind_param('sss', $userName, $passwd, $tokk);
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
                        $_SESSION['tokk'] = $row['response2'];
                    }
                    $_SESSION['un'] = $userName;
                    $_SESSION['pass'] = $passwd;
                    $call->close();
                    $r = array('status' => 200, 'data' => 'Ok');
                    echo json_encode($r);
                }
                $call->close();
            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function uloginindex($userName, $passwd, $tokk) {
            try {
                include 'class.connection.php';

                $call = $conecta->prepare('CALL sp_tokenverify(?,?,?)');
                $call->bind_param('sss', $userName, $passwd, $tokk);
                $call->execute();

                if ($call->errno > 0) {
                    $call->close();
                    header('location: login.html');
                } else {
                    session_start();
                    $result = $call->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $_SESSION['tokk'] = $row['response2'];
                    }
                    $_SESSION['un'] = $userName;
                    $_SESSION['pass'] = $passwd;
                    $call->close();
                }

            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function getuserinfo($tokk){
            try {
                //code...
                include 'class.connection.php';

                $call = $conecta->prepare('CALL sp_getinfouser(?)');
                $call->bind_param('s', $tokk);
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    echo json_encode($resp);
                    $call->close();
                    //header('location: login.html');
                } else {
                    session_start();
                    $l = array();
                    $result = $call->get_result();
                    while ($row = $result->fetch_assoc()) {
                        # code...
                        $_SESSION['nombrecompleto'] = $row['nombrecompleto'];
                        $_SESSION['job'] = $row['job'];
                        array_push($l, $row['link']);
                    }
                    $_SESSION['menuapp'] = $l;
                }

            } catch (Exception $e) {
                //throw $th;
                $catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
                echo json_encode($catch);
            }
        }

        public function applogin($userName, $passwd) {
            try {
                include 'class.connection.php';
                var_dump($conecta);
                $call = $conecta->prepare('CALL sp_tokenlogin(?,?)');
                $call->bind_param('ss', $userName, $passwd);
                $call->execute();

                if ($call->errno > 0) {
                    $errno = $call->errno;
                    $msg = $call->error;
                    $resp = array('status' => 500, 'errno' => $errno, 'message' => utf8_encode($msg));
                    //echo json_encode($resp);
                    header('location: ../login.html');

                } else {
                    session_start();
                    $result = $call->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $_SESSION['tokk'] = $row['response'];
                    }
                    $_SESSION['un'] = $userName;
                    $_SESSION['pass'] = $passwd;

                    // echo $_SESSION['un'];
                    header('location: ../index.php');
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
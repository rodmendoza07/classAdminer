
<?php
	// error_reporting(E_ERROR | E_PARSE);
	include 'class/class.auth.php';

	try {
		$userName = $_POST['userName'];
		$passwd = $_POST['passwd'];
		
        /*$userName = 'Administrador';
		$passwd = 'm3g4burr0';*/
		
		// echo $userName;

		$newAccess = new auth();
		$response = $newAccess->applogin($userName, $passwd);
		
	} catch (Exception $e) {
		$catch = array('status' => 500, 'errno' => 1001, 'message' => $e);
        echo json_encode($catch);	
	}    
?>
<?php
    error_reporting(E_ERROR | E_PARSE);
	include '../include/class/class.auth.php';
    include '../include/class/class.dishes.php';
	session_start();
    session_unset($_SESSION['paquetes']);
	if (!isset($_SESSION['tokk'])) {
		header('location: login.html');
	} else {
		# code...
		//$_SESSION['tokk'] = 'asjdfkajsdf';
		$comparetoken = new auth();
		$comparetoken->uloginindex(strip_tags($_SESSION['un']), strip_tags($_SESSION['pass']), strip_tags($_SESSION['tokk']));
        $comparetoken->getuserinfo(strip_tags($_SESSION['tokk']));
        
        $showd = new dish();
        $showd->getPackages();
	}
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Menu</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header" >Menu - Paquetes</h3>
    </div>
</div><!--/.row-->

<div class="row">
    <?php 
        foreach ($_SESSION['paquetes'] as $platillo) {
            # code...
            echo $platillo;
        }
    ?>
</div><!--/.row-->
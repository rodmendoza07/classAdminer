<?php
    error_reporting(E_ERROR | E_PARSE);
    include '../include/class/class.auth.php';
    include '../include/class/class.admon.php';
	session_start();
	if (!isset($_SESSION['tokk'])) {
		header('location: login.html');
	} else {
		# code...
		//$_SESSION['tokk'] = 'asjdfkajsdf';
		$comparetoken = new auth();
		$comparetoken->uloginindex(strip_tags($_SESSION['un']), strip_tags($_SESSION['pass']), strip_tags($_SESSION['tokk']));
        $comparetoken->getuserinfo(strip_tags($_SESSION['tokk']));
        
        $cortey = new admon();
        $cuty = $cortey->cortey();
        $cortey->totalcortey();
	}
?>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Corte de caja</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header" >Corte de caja</h3>
    </div>
</div><!--/.row-->

<!-- <div class="row">
    <div class="col-md-12">
        <button class="btn btn-lg btn-success" id="sendCut">Enviar corte</button>
    </div>
</div> -->

<div class="row" style="margin-top:30px">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detalle de ventas: <span style="color:#30a5ff; font-size:25px;"><?php echo 'VENTA TOTAL $'.$_SESSION['totaly'] ?></span>
            </div>
            <div class="panel-body">
                <table class="table table-hover table-striped table-bordered" id="tablecutycontainer">
                    <thead>
                        <tr>
                            <th class="text-center">No. Ticket</th>
                            <!-- <th class="text-center">Monto total</th> -->
                            <th class="text-center">Fecha y hora de venta</th>
                            <th class="text-center">Platillo</th>
                            <th class="text-center">Precio unitario</th>
                            <th class="text-center">Tipo de pago</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i = 0; $i < count($_SESSION['cuty']); $i++) {
                            # code...
                            echo '<tr><th class="text-center">'.$_SESSION['cuty'][$i][0].'</th><th class="text-center">'.$_SESSION['cuty'][$i][1].'</th><th>'.$_SESSION['cuty'][$i][2].'</th><th class="text-right">'.$_SESSION['cuty'][$i][3].'</th><th class="text-center">'.$_SESSION['cuty'][$i][4].'</th></tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
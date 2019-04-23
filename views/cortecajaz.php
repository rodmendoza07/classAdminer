<?php
    error_reporting(E_ERROR | E_PARSE);
    include '../include/class/class.auth.php';
    include '../include/class/class.admon.php';
    session_start();
    header ('Content-type: text/html; charset=utf-8');
	if (!isset($_SESSION['tokk'])) {
		header('location: login.html');
	} else {
		# code...
		//$_SESSION['tokk'] = 'asjdfkajsdf';
		$comparetoken = new auth();
		$comparetoken->uloginindex(strip_tags($_SESSION['un']), strip_tags($_SESSION['pass']), strip_tags($_SESSION['tokk']));
        $comparetoken->getuserinfo(strip_tags($_SESSION['tokk']));
        
        $cortez = new admon();
        $cutz = $cortez->cortez();
        $cortez->totalcortez();
	}
?>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Corte de caja Z</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header" >Corte de caja Z</h3>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                Detalle de ventas
            </div>
            <div class="panel-body">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Venta total del día</th>
                            <th class="text-center">Monto cancelaciones del día</th>
                        </tr>
                    </thead>
                    <tbody>
                        <th class="text-center" style="color:#30a5ff; font-size:25px;">$<?php echo $_SESSION['totaly']; ?></th>
                        <th class="text-center" style="color:red; font-size:25px;">$<?php echo $_SESSION['cancelaciones']; ?></th>
                    </tbody>
                </table>
                <table class="table table-hover table-bordered table-striped" id="tablecutzcontainer">
                    <thead>
                        <tr>
                            <th class="text-center">No. Ticket</th>
                            <th class="text-center">Monto total</th>
                            <th class="text-center">Fecha y hora de venta</th>
                            <th class="text-center">Platillo</th>
                            <th class="text-center">Precio unitario</th>
                            <th class="text-center">Tipo de pago</th>
                            <th class="text-center">Venta/Cancelación</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i = 0; $i < count($_SESSION['cutz']); $i++) {
                            # code...
                            echo '<tr><th class="text-center">'.$_SESSION['cutz'][$i][0].'</th><th class="text-right">'.$_SESSION['cutz'][$i][1].'</th><th class="text-center">'.$_SESSION['cutz'][$i][2].'</th><th>'.$_SESSION['cutz'][$i][3].'</th><th class="text-right">'.$_SESSION['cutz'][$i][4].'</th><th class="text-center">'.$_SESSION['cutz'][$i][5].'</th><th class="text-center">'.$_SESSION['cutz'][$i][6].'</th></tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    error_reporting(E_ERROR | E_PARSE);
	include '../include/class/class.auth.php';
    include '../include/class/class.client.php';
	session_start();
	if (!isset($_SESSION['tokk'])) {
		header('location: login.html');
	} else {
		# code...
		//$_SESSION['tokk'] = 'asjdfkajsdf';
		$comparetoken = new auth();
		$comparetoken->uloginindex(strip_tags($_SESSION['un']), strip_tags($_SESSION['pass']), strip_tags($_SESSION['tokk']));
        $comparetoken->getuserinfo(strip_tags($_SESSION['tokk']));
        
        $showclientes = new cliente();
        $showclientes->getClientesPayment();
	}
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Pagos</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header" >Registrar pago</h3>
    </div>
</div><!--/.row-->

<div class="row">
<div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                Alumnos
            </div>
            <div class="panel-body">
                <table class="table table-hover table-bordered table-striped" id="tablelistpayment">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Actividad</th>
                            <th class="text-center">Último pago realizado</th>
                            <th class="text-center">Tipo de membresía</th>
                            <th class="text-center">Expira en:</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i = 0; $i < count($_SESSION['clientes_pago']); $i++) {
                            # code...
                            echo '<tr><th>'.$_SESSION['clientes_pago'][$i][0].'</th><th class="text-left">'.$_SESSION['clientes_pago'][$i][1].'</th><th class="text-center">'.$_SESSION['clientes_pago'][$i][2].'</th><th>'.$_SESSION['clientes_pago'][$i][3].'</th><th class="text-center">'.$_SESSION['clientes_pago'][$i][4].'</th></tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!--/.row-->
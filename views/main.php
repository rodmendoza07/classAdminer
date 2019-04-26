<?php
    error_reporting(E_ERROR | E_PARSE);
	include '../include/class/class.auth.php';
    //include '../include/class/class.dishes.php';
	session_start();
	if (!isset($_SESSION['tokk'])) {
		header('location: login.html');
	} else {
		# code...
		//$_SESSION['tokk'] = 'asjdfkajsdf';
		$comparetoken = new auth();
		$comparetoken->uloginindex(strip_tags($_SESSION['un']), strip_tags($_SESSION['pass']), strip_tags($_SESSION['tokk']));
        $comparetoken->getuserinfo(strip_tags($_SESSION['tokk']));
        
        // $showd = new dish();
        // $showd->getDishes();
	}
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Asistencias</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header" >Asistencias - Pasar lista</h3>
    </div>
</div><!--/.row-->

<div class="row">
<div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                Alumnos
            </div>
            <div class="panel-body">
                <table class="table table-hover table-bordered table-striped" id="tablelist">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Actividad</th>
                            <th class="text-center">Última visita</th>
                            <th class="text-center">Tipo de membresía</th>
                            <th class="text-center">Expira en:</th>
                            <th class="text-center">Clases restantes</th>
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
</div><!--/.row-->
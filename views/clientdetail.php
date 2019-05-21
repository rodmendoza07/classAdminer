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

        $clases = new cliente();
        $clases->getActivities();
        $clases->getMemberships();
	}
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Registro de alumnos</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Alumno nuevo</h3>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="cname" id="cname" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Apellido paterno:</label>
                            <input type="text" name="cfirstname" id="cfirstname" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Apellido materno:</label>
                            <input type="text" name="clastname" id="clastname" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Actividad:</label>
                            <select name="activity" id="activity" class="form-control">
                            <?php
                                echo '<option><span class="bg-info">&nbsp;&nbsp;-- Selecciona --&nbsp;&nbsp;</span></option>';
                                for ($i=0; $i < count($_SESSION['activities']) ; $i++) { 
                                    # code...
                                    echo '<option value="'.$_SESSION['activities'][$i][0].'">'.$_SESSION['activities'][$i][1].'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Membres&iacute;a:</label>
                            <select name="membership" id="membership" class="form-control">
                            <?php
                                echo '<option><span class="bg-info">&nbsp;&nbsp;-- Selecciona --&nbsp;&nbsp;</span></option>';
                                for ($i=0; $i < count($_SESSION['membership']) ; $i++) { 
                                    # code...
                                    echo '<option value="'.$_SESSION['membership'][$i][0].'">'.$_SESSION['membership'][$i][1].'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>N&uacute;mero de clases:</label>
                            <select name="activity" id="activity" class="form-control">
    
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/.row-->
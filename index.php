<?php
	error_reporting(E_ERROR | E_PARSE);
	include 'include/class/class.auth.php';
	include 'include/class/class.dishes.php';

	session_start();

	if (!isset($_SESSION['tokk'])) {
		header('location: login.html');
	} else {
		# code...
		//$_SESSION['tokk'] = 'asjdfkajsdf';
		$comparetoken = new auth();
		$comparetoken->uloginindex(strip_tags($_SESSION['un']), strip_tags($_SESSION['pass']), strip_tags($_SESSION['tokk']));
		$comparetoken->getuserinfo(strip_tags($_SESSION['tokk']));
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>:: Emporio Salsa ::</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
	<link href="toastr/build/toastr.min.css" rel="stylesheet"/>
	<link rel="icon" type="images" href="images/emporio.jpg">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body onload="AppBegin()">
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Emporio&nbsp;Salsa</span></a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info" id="notice_alert"></span>
					</a>
						<ul class="dropdown-menu dropdown-alerts" id="notice_contentalert">
							<div class="all-button"><a href="include/logout.php">
										<em class="fa fa-sign-out"></em> <strong>Cerrar sesión</strong>
									</a></div>
							</ul>
					</li>
                </ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="images/emporio.jpg" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name" id="usrnombre"><?php echo $_SESSION['nombrecompleto']; ?></div>
				<div class="profile-usertitle-status" id="jobpos"><span class="indicator label-success"></span><?php echo $_SESSION['job']; ?></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu" id="sideMenus">
			<?php
				foreach ($_SESSION['menuapp'] as $value) {
					# code...
					echo $value;
				}
			?>
		</ul>
		<!--<button class="btn btn-lg btn-success btn-block" id="vieworder">Ver orden</button>-->
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" id="maincontent">
		
	</div>	<!--/.main-->
	
	<div class="modal fade" id="loading" role="dialog">
		<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body text-center" style="color: #8cc63f;">
							<div class="row">
								<div class="col-md-12">
										<h1>
											<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
										</h1>
								</div>
							</div>
					</div>
				</div>
		</div>
	</div>

<div class="modal inmodal fade" id="confirmorder" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
			<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Confirmar Orden</h4>
					</div>
					<div class="modal-body">
							<div class="row">
								<div class="col-md-12" id="ordencontainer">
									
								</div>	
							</div>		           
					</div>
					<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Seguir ordenando</button>
							<button type="button" class="btn btn-success" id="setsale">Aceptar</button>
							<button type="button" class="btn btn-danger" id="cancelorder">Cancelar Orden</button>
					</div>
			</div>
	</div>
</div>

<div class="modal inmodal fade" id="paymenttype" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
					<h4 class="modal-title">Selecciona forma de pago</h4>
			</div>
			<div class="modal-body">
				
				<div class="row">
					<div class="col-md-12 text-center" id="totalcontainer">
					</div>
				</div>
				<div class="divider"><hr></div>
				<div class="row">
					<div class="col-md-12 text-center" id="ticketcontainer">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" id="pagocontainer">
						
					</div>	
				</div>		           
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="cancelorder1">Cancelar Orden</button>
			</div>
		</div>
	</div>
</div>



	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="toastr/build/toastr.min.js"></script>
	<script src="DataTables/datatables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
	<script src="js/customjs/dataLanguage.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/customjs/AppBegin.js"></script>
	<script src="js/customjs/activemenu.js"></script>
	<script src="js/customjs/mainjs.js"></script>
	<script src="js/customjs/sideMenus.js"></script>
	<script src="js/customjs/inventory.js"></script>
	<script src="js/customjs/paquetes.js"></script>
	<script src="js/customjs/extras.js"></script>
	<script src="js/customjs/drinks.js"></script>
	<script src="js/customjs/addDish.js"></script>
	<script src="js/customjs/showCommand.js"></script>
	<script src="js/customjs/paymentType.js"></script>
	<script src="js/customjs/cuty.js"></script>
	<script src="js/customjs/cutz.js"></script>
	<script src="js/customjs/modmenu.js"></script>

	<script type="text/javascript">
		$("#vieworder").click(function (){
			$("#confirmorder").modal({backdrop: 'static', keyboard: false});
			var objShowCommand = new showCommand();
			$("#cancelorder").click(function() {
				var ajaxF = $.ajax({
					contentType: "application/json; charset=utf-8",
					type: "POST",
					url: "include/cancelOrder.php",
					dataType: 'JSON',
					async: false,
					beforeSend: function() {
					},
					success: function (response) {
						if (response.errno) {
							toastr.error("Algo ha ido mal, por favor intentalo más tarde.", "¡Upps!", 5000);
							console.log('cancelOrder - ',response.message)
						} else {
							alert(response.data);
						}
					},
					error: function (XMLHttpRequest, textStatus, errorThrown){
						toastr.error("Algo ha ido mal, por favor intentalo más tarde.", "¡Atención!", 5000);
						console.log('cancelOrder - ', errorThrown);
						console.log('cancelOrder - ', XMLHttpRequest);
					}
				});
				location.reload();
			});
			$("#setsale").click(function() {
				$("#confirmorder").modal('hide');
				$("#paymenttype").modal({backdrop: 'static', keyboard: false});
				var objPayment = new paymentType();
				objPayment.getPaymentType();
			});
		});
	</script>

</body>
</html>
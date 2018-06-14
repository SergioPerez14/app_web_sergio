<?php

session_start();

if(!$_SESSION["validar"]){
	header("location:index.php?action=ingresar");
	exit();
}
if(isset($_SESSION['id_tienda']))
    if($_SESSION['id_tienda']=='1'){
    	header("location:index.php?action=tiendas");
    	exit();
    }


?>



<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Ventas</a></li>
    </ol>
  </div><!-- /.col -->
  <br><br>
</div>
<div class="card card-info" style="width:100%">
	<div class="card-header"">
		<div class="d-inline-block">
		  <h3 class="card-title">Venta</h3>
		</div>
	</div>
	<div class="card-body">
		
		<table id="" width="100%" border="0">
			<?php

				if(isset($_POST['data'])){
					require_once "../../models/enlaces.php";
					require_once "../../models/crud.php";
					require_once "../../controllers/controller.php";
					$verificar = new MvcController();
					echo($verificar -> insertSale($_POST['data']));
					//var_dump($_POST['data']);

				}				
				$vistaVenta = new MvcController();
				$vistaVenta -> vistaVentasController();
				//$vistaVenta -> borrarVentasController();

				
			
			?>
			
		</table>
	</div>
</div>

<?php

if(isset($_GET["action"])){
	if($_GET["action"] == "cambio"){
		echo "Cambio Exitoso";
	}
}


?>

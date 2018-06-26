<?php
//Verifica la sesion
session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pagos | Registrar Pagos</title>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<!-- Formulario para la insercion de Alumnos -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registrar Pago</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Registrar Pago</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
		    <section class="content">
		      	<div class="container-fluid">
		        	<div class="row">
		          		<!-- left column -->
		          		<div class="col-md-12">
		            		<!-- general form elements -->
		            		<div class="card card-info">
		             		 	<div class="card-header" style="background-color: #954E9E">
			              			<div class="float-right">
			                			<a href="index.php?action=pagos"><input class="btn btn-block btn-outline-warning" value="Listado de Pagos"></a>
			              			</div>
  		                			<h3 class="card-title">Información General</h3>
		              			</div>
		              			<!-- /.card-header -->
		              			<!-- Formulario de registro de usuario -->
				            	<form method="post" enctype="multipart/form-data">
									<div class="card-body">
							            <div class="row">
							              	<div class="col-md-6">
							                	<!-- /.form-group -->
								                <div class="form-group">
								                    <label for="exampleInputPassword1">Grupo</label>
													<select class="form-control select2" type="number" name="IdGrupo" id="grupo" style="width: 100%;" onchange="act();">
								                    	<?php
								                    		$grupos = new MvcController();
								                    		$grupos -> seleccionarGruposController();
								                    	?>
								                    </select>
								                </div>
								                  <!--<input type="submit" class="btn btn-block" style="background-color: #dd7d00; color: white;" name="actualizar" value="Actualizar Alumnas">-->
								                <div class="form-group">
								                    <label for="exampleInputPassword1">Alumna</label>
													<select class="form-control select2" type="number" name="alumna" id="alumna" style="width: 100%;">
								                    	<?php
								                    		$Calumnas = new MvcController();
								                    		$alumnas = $Calumnas -> verAlumnasController();
								                    	?>
								                    </select>
								                </div>
							                	<div class="form-group">
								                	<label for="exampleInputEmail1">Nombre de la Mama</label>
								                	<input type="text" class="form-control" name="nombre" placeholder="Nombre">
							                	</div>
								                <div class="form-group">
									                <label for="exampleInputEmail1">Apellido de la Mama</label>
									                <input type="text" class="form-control" name="apellido" placeholder="Apellido">
								                </div>								                
							              	</div>
					              			<!-- /.col -->
					              			<div class="col-md-6">
								                <div class="form-group">
									                <label for="exampleInputEmail1">Fecha</label>
									                <input type="date" class="form-control" name="fecha" placeholder="Fecha">
								                </div>
								                <div class="form-group">
								                    <label for="exampleInputFile">Imagen</label>
								                    <div class="input-group">
								                      <div class="custom-file">
								                        <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" id="fileToUpload">
								                        <label class="custom-file-label" for="exampleInputFile">Escoger archivo</label>
								                      </div>
								                    </div>
								                </div>
								                <div class="form-group">
									                <label for="exampleInputEmail1">Folio</label>
									                <input type="number" class="form-control" name="folio" min="1" placeholder="Folio">
								                </div>
					              			</div>
					              			<!-- /.col -->
					            		</div>
					            		<!-- /.row -->
					          		</div>
			                		<!-- /.card-body -->
									<div class="card-body">
					            		<div class="row">
					              			<div class="col-md-3">
					              				<div></div>
					              			</div>
			  					            <div class="col-md-6">
								              	<div class="card-footer">
								                  <input type="submit" class="btn btn-block" style="background-color: #dd7d00; color: white;" name="enviar" value="Añadir">
								                </div>
					              			</div>
							            	<div class="col-md-3">
							              		<div></div>
						            		</div>
					           			</div>
					      			</div>  
			              		</form>
			              		<input type="hidden" name="alu" id="alu" value="<?php echo $alumnas ?>">
		            		</div>
		            		<!-- /.card -->
				  		</div>
					</div>
			  	</div>
			</section>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
    
    var alumnasA = document.getElementById("alu").value+"";

    function act(){
      $('#alumna').empty().trigger("change");
      var g = document.getElementById("grupo").value+"";
      var v1 = alumnasA.split("$");
      for (var i = 0; i < v1.length-1; i++) {
        var f = v1[i].split(",");
        if(f[2]===g){
          document.getElementById("alumna").options[document.getElementById("alumna").options.length] = new Option(f[1], f[0]);
        }
        
      }

    }


</script>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> registroPagoController();


if(isset($_GET["action"])){

	if($_GET["action"] == "UsuarioRegistrado"){

		//echo "Producto Añadido";
	
	}

}

?>

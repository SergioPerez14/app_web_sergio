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
  <title>POS | Dashboard</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php
                //Se llama al controlador para calcular el total de productos registrados
                      $totalProductos = new MvcController();
                      $totalProductos -> totalProductosController();
                    ?>
                  </h3>

                <p>Productos</p>
              </div>
              <div class="icon">
                <i class="ion ion-pricetags"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php
                //Se llama al controlador para calcular el total de categorias
                      $totalCategorias = new MvcController();
                      $totalCategorias -> totalCategoriasController();
                    ?>
                  <sup style="font-size: 20px"></sup></h3>

                <p>Categorias</p>
              </div>
              <div class="icon">
                <i class="ion ion-filing"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
                //Se llama al controlador para calcular el total de usuarios
                      $totalUsuarios = new MvcController();
                      $totalUsuarios -> totalUsuariosController();
                    ?></h3>

                <p>Usuarios</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php
                //Se llama al controlador para calcular el total de movimientos
                      $totalMovimientos = new MvcController();
                      $totalMovimientos -> totalMovimientosController();
                    ?></h3>

                <p>Movimientos Realizados</p>
              </div>
              <div class="icon">
                <i class="ion ion-code-working"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->


      <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-danger">
                  <div class="float-left">
                    <!--<a ><input class="btn btn-block btn-success" value="Nuevo Usuario"></a>-->
                    <h3>Productos Vendidos</h3>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
              <th>ID</th>
              <th>Producto ID</th>
              <th>Cantidad</th>
              <th>Total</th>
              <th>Venta ID</th>
              <!--<th>Eliminar</th>-->
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      //Vista completa de los usuarios mediante un datatable
                        $vistaProdVendidos = new MvcController();
                        $vistaProdVendidos -> vistaProductosVendidosController();
                      ?>
                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>


      <!-- solid sales graph 
          <div class="card bg-info-gradient">
            <div class="card-header no-border">
              <h3 class="card-title">
                <i class="fa fa-th mr-1"></i>
                Datos Generales
              </h3>

              <div class="card-tools">
                <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
                  <i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-body 
            <div class="card-footer bg-transparent">
              <div class="row">
                <div class="col-4 text-center">
                  <?php
                  //Se llama al controlador para calcular el total de usuarios
                      //$totalUsuariosG = new MvcController();
                      //$totalUsuariosG -> totalUsuariosGController();
                    ?>
                  <div class="text-white">Usuarios</div>
                </div>
                <!-- ./col 
                <div class="col-4 text-center">
                  <?php
                  //Se llama al controlador para calcular el total de productos registrados
                      //$totalProductosG = new MvcController();
                      //$totalProductosG -> totalProductosGController();
                    ?>
                  <div class="text-white">Productos</div>
                </div>
                <!-- ./col 
                <div class="col-4 text-center">
                  <?php
                  //Se llama al controlador para calcular el total de movimientos
                      //$totalMovimientosG = new MvcController();
                      //$totalMovimientosG -> totalMovimientosGController();
                    ?>
                  <div class="text-white">Movimientos</div>
                </div>
                <!-- ./col
              </div>
              <!-- /.row
            </div>
            <!-- /.card-footer
          </div>
          <!-- /.card -->

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
  });
</script>

</body>
</html>
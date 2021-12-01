<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Caja Morelia</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Vistas/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="Vistas/bower_components/fontawesome-free-5.15.2-web/css/all.css">
    <link rel="stylesheet" href="Vistas/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="Vistas/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="Vistas/dist/css/skins/_all-skins.min.css">
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body class="hold-transition skin-blue sidebar-mini login-page">
    
    <?php
   
        include "modulos/menu.php";
        include "modulos/cabecera.php";

        if(isset($_GET["url"])){

          if($_GET["url"] == "clientes" || $_GET["url"] == "tipoCuenta" || $_GET["url"] == "cuentaCliente"){

            include "modulos/".$_GET["url"].".php";

            }

          }else{}

    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- jQuery 3 -->
    <script src="Vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="Vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="Vistas/dist/js/adminlte.min.js"></script>

     <script src="Vistas/js/datatable.js"></script>
     <script src="Vistas/js/clientes.js"></script>
     <script src="Vistas/js/tipoCuenta.js"></script>
     <script src="Vistas/js/cuentaCliente.js"></script>
</body>

</html>
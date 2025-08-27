
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->fetch("title");   ?></title>

   <?=
    $this->Html->css([
      "/plugins/fontawesome-free/css/all.min.css",
      "/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css",
      "/plugins/icheck-bootstrap/icheck-bootstrap.min.css",
      "/plugins/jqvmap/jqvmap.min.css",
      "/dist/css/adminlte.min.css",
      "/plugins/overlayScrollbars/css/OverlayScrollbars.min.css",
      "/plugins/daterangepicker/daterangepicker.css",
      "/plugins/summernote/summernote-bs4.min.css"
    ])
  ?>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 
  <?=    
    $this->fetch("TopStyleLinks")
  ?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Navbar -->
 <?= 
    $this->element("top-nav");
 ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?= $this->element("left-sidebar"); ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?= $this->Flash->render();    ?>
     <?= $this->fetch("content"); ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y"); ?> .</strong>
    Jorge Sanchez Ruano All rights reserved.
    
  </footer>

</div>
<!-- ./wrapper -->

<?=
    $this->Html->script([
      "/plugins/jquery/jquery.min.js",
      "/plugins/jquery-ui/jquery-ui.min.js",
      "/plugins/bootstrap/js/bootstrap.bundle.min.js",
      "/plugins/sparklines/sparkline.js",
      "/plugins/chart.js/Chart.min.js",
      "/plugins/jqvmap/jquery.vmap.min.js",
      "/plugins/jqvmap/maps/jquery.vmap.usa.js",
      "/plugins/jquery-knob/jquery.knob.min.js",
      "/plugins/moment/moment.min.js",
      "/plugins/daterangepicker/daterangepicker.js",
      "/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js",
      "/plugins/summernote/summernote-bs4.min.js",
      "/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
      "/dist/js/adminlte.js"
    ])
  ?>

<?=
  $this->fetch("bottomScriptLinks");

?>

<?=

    $this->fetch("script");

?>


</body>
</html>

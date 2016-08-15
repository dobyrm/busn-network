<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ПВНЗ "Буковинський університет"</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="assets/tmp/dist/img/favicon.ico" type="image/png">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/tmp/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/tmp/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/tmp/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="assets/tmp/dist/css/uploadImg.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="assets/tmp/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini" style="background-color:#ecf0f5;">
    <div class="wrapper">

      <!-- Content Wrapper. Contains page content -->
      <div class="content">
        <!-- Main content -->
        	<?php include 'application/views/'.$content_view; ?>
      </div><!-- /.content-wrapper -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="assets/tmp/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/tmp/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assets/tmp/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/tmp/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/tmp/dist/js/demo.js"></script>

    <script src="assets/tmp/plugins/js/uploadImg.js"></script>

    <!-- iCheck -->
    <script src="assets/tmp/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });

    $(".remembPassAuch").click(function() {
      $(".auchPass").hide();
      $(".auchOk").hide();
      $(".remembPassAuch").hide();
      $(".auchRememberPass").show();
      $(".OkPassAuch").show();
    });

    $(".OkPassAuch").click(function() {
      $(".auchPass").show();
      $(".auchOk").show();
      $(".remembPassAuch").show();
      $(".auchRememberPass").hide();
      $(".OkPassAuch").hide();
    });

    </script>
  </body>
</html>

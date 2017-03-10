<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ПВНЗ "Буковинський університет"</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="assets/tmp/dist/img/ico.png" type="image/png">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/tmp/bootstrap/css/bootstrap.min.css">
    <!-- Bootstrap datetimepicker -->
    <link rel="stylesheet" href="assets/tmp/bootstrap/css/bootstrap-datetimepicker.min.css">
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <style>
    #gallery { min-height: 12em; }
    .gallery.custom-state-active { background: #eee; }
    .gallery li { float: left; width: 145px; margin: 0 0.4em 0.4em 0; text-align: center; }
    .ui-state-default .gallery li{margin-left: 7px;}
    .gallery li h5 { margin: 0 0 0.4em; cursor: move; }
    .gallery li a { }
    .gallery li a.ui-icon-zoomin { float: left; }
    .gallery li img { width: 100%; cursor: move; }

    .ui-icon, .ui-widget-content .ui-icon {
    background-image: url("assets/tmp/dist/img/ui-icons_444444_256x240.png");
    }
    .ui-icon-trash {
    background-position: 0px -190px;
    }
    .ui-state-default .ui-icon {
    background-image: url("assets/tmp/dist/img/ui-icons_444444_256x240.png");
    }

    .ui-icon-refresh {
    background-position: -18px -190px;
    }

    #trash { min-height: 18em;}
    #trash h4 { line-height: 16px; margin: 0 0 0.4em; }
    #trash h4 .ui-icon { float: left; }
    #trash .gallery h5 { display: none; }
    .ui-widget-header{padding: 10px;}
    .ui-widget-content{border: none!important;background: none;}
    </style>

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
<? if($_SESSION['auchUsersSetings']['position'] == 4 OR $_SESSION['auchUsersSetings']['position'] == 3) { ?>
<aside class="control-sidebar control-sidebar-dark">
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Settings tab content -->
    <div class="tab-pane active" id="control-sidebar-settings-tab">
      <h3 class="control-sidebar-heading">Генеральні налаштування</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="adduser">
            <i class="menu-icon fa fa-user bg-yellow"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Регістрація</h4>
              <p>Зареєструвати користувача на сайті</p>
            </div>
          </a>
        </li>
        <li>
          <a href="editadmuser">
            <i class="menu-icon fa fa-user bg-yellow"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Редагування</h4>
              <p>Редагувати користувачів сайту</p>
            </div>
          </a>
        </li>
      </ul>
    </div><!-- /.tab-pane -->
  </div>
</aside>
<? } ?>
    <!-- jQuery 2.1.4 -->
    <script src="assets/tmp/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!--http://jqueryui.com/-->
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    <script>
    function lineTotal() {

      // There's the gallery and the trash
      var $gallery = $( "#gallery" ),
        $trash = $( "#trash" );

      // Let the gallery items be draggable
      $( "li", $gallery ).draggable({
        cancel: "a.ui-icon", // clicking an icon won't initiate dragging
        revert: "invalid", // when not dropped, the item will revert back to its initial position
        containment: "document",
        helper: "clone",
        cursor: "move"
      });

      // Let the trash be droppable, accepting the gallery items
      $trash.droppable({
        accept: "#gallery > li",
        classes: {
          "ui-droppable-active": "ui-state-highlight"
        },
        drop: function( event, ui ) {
          deleteImage( ui.draggable );
        }
      });

      // Let the gallery be droppable as well, accepting items from the trash
      $gallery.droppable({
        accept: "#trash li",
        classes: {
          "ui-droppable-active": "custom-state-active"
        },
        drop: function( event, ui ) {
          recycleImage( ui.draggable );
        }
      });

      // Image deletion function
      var recycle_icon = "<a href='link/to/recycle/script/when/we/have/js/off' title='Recycle this image' class='ui-icon ui-icon-refresh'>Recycle image</a>";
      function deleteImage( $item ) {
        $item.fadeOut(function() {
          var $list = $( "ul", $trash ).length ?
            $( "ul", $trash ) :
            $( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $trash );

          $item.find( "a.ui-icon-trash" ).remove();
          $item.append( recycle_icon ).appendTo( $list ).fadeIn(function() {
            $item
              .animate({ width: "100px" })
              .find( "img" )
                .animate({ height: "100px" });
          });
        });
      }

      // Image recycle function
      var trash_icon = "<a href='link/to/trash/script/when/we/have/js/off' title='Delete this image' class='ui-icon ui-icon-trash'>Delete image</a>";
      function recycleImage( $item ) {
        $item.fadeOut(function() {
          $item
            .find( "a.ui-icon-refresh" )
              .remove()
            .end()
            .css( "width", "145px")
            .append( trash_icon )
            .find( "img" )
              .css( "height", "145px" )
            .end()
            .appendTo( $gallery )
            .fadeIn();
        });
      }

      // Image preview function, demonstrating the ui.dialog used as a modal window
      function viewLargerImage( $link ) {
        var src = $link.attr( "href" ),
          title = $link.siblings( "img" ).attr( "alt" ),
          $modal = $( "img[src$='" + src + "']" );

        if ( $modal.length ) {
          $modal.dialog( "open" );
        } else {
          var img = $( "<img alt='" + title + "' width='384' height='288' style='display: none; padding: 8px;' />" )
            .attr( "src", src ).appendTo( "body" );
          setTimeout(function() {
            img.dialog({
              title: title,
              width: 400,
              modal: true
            });
          }, 1 );
        }
      }

      // Resolve the icons behavior with event delegation
      $( "ul.gallery > li" ).on( "click", function( event ) {
        var $item = $( this ),
          $target = $( event.target );

        if ( $target.is( "a.ui-icon-trash" ) ) {
          deleteImage( $item );
        } else if ( $target.is( "a.ui-icon-zoomin" ) ) {
          viewLargerImage( $target );
        } else if ( $target.is( "a.ui-icon-refresh" ) ) {
          recycleImage( $item );
        }

        return false;
      });
    }
    </script>
<!--http://jqueryui.com/-->

    <script type="text/javascript">
      $(function(){
        $("#search").keyup(function(){
          var search = $("#search").val();
          $.ajax({
            type: "POST",
            url: "application/ajax/searchtimeline.php",
            data: {"search": search},
            cache: false,
            success: function(response){
              $("#resSearch").html(response);
              lineTotal();
            }
          });
          return false;
        });
      });
      $(function(){
        $("#searchfriends").keyup(function(){
          var search = $("#searchfriends").val();
          $.ajax({
            type: "POST",
            url: "application/ajax/searchfriends.php",
            data: {"search": search},
            cache: false,
            success: function(response){
              $("#resSearch").html(response);
            }
          });
          return false;
        });
      });
      $(function(){
        $("#searchusers").keyup(function(){
          var search = $("#searchusers").val();
          $.ajax({
            type: "POST",
            url: "application/ajax/searchusers.php",
            data: {"search": search},
            cache: false,
            success: function(response){
              $("#resSearch").html(response);
            }
          });
          return false;
        });
      });
      $(function(){
        $("#searchim").keyup(function(){
          var search = $("#searchim").val();
          $.ajax({
            type: "POST",
            url: "application/ajax/searchim.php",
            data: {"search": search},
            cache: false,
            success: function(response){
              $("#resSearch").html(response);
            }
          });
          return false;
        });
      });
    </script>

    <!-- Bootstrap moment-with-locales -->
    <script src="assets/tmp/bootstrap/js/moment-with-locales.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/tmp/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap datetimepicker -->
    <script type="text/javascript" src="assets/tmp/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    <!-- FastClick -->
    <script src="assets/tmp/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/tmp/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/tmp/dist/js/demo.js"></script>

    <script src="assets/tmp/plugins/js/uploadImg.js"></script>

    <!-- iCheck -->
    <script src="assets/tmp/plugins/iCheck/icheck.min.js"></script>

<script type="text/javascript">
    $(function () {
      var nowDate = new Date();
      var year = nowDate.getFullYear();
      var minDate = nowDate;
      var maxDate = "31.12." + year;

      $('#datetimepicker1').datetimepicker({pickTime: false, language: 'ru',defaultDate:nowDate,minDate:minDate,maxDate:maxDate});
      $('#datetimepicker2').datetimepicker({pickTime: false, language: 'ru',defaultDate:nowDate,minDate:minDate,maxDate:maxDate});
    });
  </script>

    <script>
    $(document).ready(function(){
      /*$("body").on('click', function() {
        lineTotal();
      });*/
      $("#inputNewMess").focus();
    });

      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });

      $(function(){
        $(".direct-chat-messages").animate({
          scrollTop: $('#bms').offset().top
        }, 0);
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

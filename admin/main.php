<?php
session_start();
include_once "../config/config.php";
include_once "../config/inc.library.php";
include_once "../config/fungsi_indotgl.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
  echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
} else {

?>


  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="?open=Halaman-Utama" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>I<b>A</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>DANA </b>TPQ</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../images/user.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">
                    Admin
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../images/user.jpg" class="img-circle" alt="User Image">

                    <p>
                      Admin
                    </p>
                  </li>
                  <!-- Menu Body -->

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="../logout.php" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../images/user.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>
                Admin
              </p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>


            <li>
              <a href="?open=Halaman-Utama">
                <i class="fa fa-th"></i> <span>Home</span>
              </a>
            </li>

            <li>
              <a href="?open=tampilsantri">
                <i class="fa fa-th"></i> <span>Santri</span>
              </a>
            </li>

            <li>
              <a href="?open=tampildonatur">
                <i class="fa fa-th"></i> <span>Donatur</span>
              </a>
            </li>

            <li>
              <a href="?open=tampilspp">
                <i class="fa fa-th"></i> <span>SPP</span>
              </a>
            </li>

            <li>
              <a href="?open=tampildanamasuk">
                <i class="fa fa-th"></i> <span>Dana Masuk</span>
              </a>
            </li>

            <li>
              <a href="?open=tampildanakeluar">
                <i class="fa fa-th"></i> <span>Dana Keluar</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Laporan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                <li><a href="modul/laporan/laporanpenerimaan.php" target="_blank"><i class="fa fa-circle-o"></i> Laporan Penerimaan Kas</a></li>

                <li><a href="modul/laporan/laporanpengeluaran.php" target="_blank"><i class="fa fa-circle-o"></i> Laporan Pengeluaran Kas</a></li>
                
                <li><a href="?open=formcetakkeuangan"><i class="fa fa-circle-o"></i> Laporan Keuangan Bulanan</a></li>

                <li><a href="?open=formcetaklaporantahunan"><i class="fa fa-circle-o"></i> Laporan Keuangan Tahunan</a></li>

                <li class="treeview"><a href="#"><i class="fa fa-pie-chart"></i>
                <span>Laporan SPP</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="?open=formcetakspptahun"><i class="fa fa-circle-o"></i>Tahunan</a></li>
              <li><a href="?open=formcetaksppbulan"><i class="fa fa-circle-o"></i>Bulanan</a></li>
              <li><a href="?open=cetaksppsantri"><i class="fa fa-circle-o"></i>Santri</a></li>
              <li><a href="modul/laporan/cetakspp.php"><i class="fa fa-circle-o"></i>Seluruh</a></li>
              
    </li>
             </ul>
              </ul>
              
            </li>

            <li class="header">LABELS</li>

            <li><a href="../logout.php"><i class="fa fa-circle-o text-aqua"></i> <span>Logout</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <?php
      if (isset($_GET['open'])) {
        switch ($_GET['open']) {
          case 'Halaman-Utama':
            if (!file_exists("home.php")) die("Sorry Empty Page!");
            include "home.php";
            break;

          case 'tampilsantri':
            if (!file_exists("modul/santri/tampil.php")) die("Sorry Empty Page!");
            include "modul/santri/tampil.php";
            break;
          case 'formsantri':
            if (!file_exists("modul/santri/form.php")) die("Sorry Empty Page!");
            include "modul/santri/form.php";
            break;

          case 'tampildonatur':
            if (!file_exists("modul/donatur/tampil.php")) die("Sorry Empty Page!");
            include "modul/donatur/tampil.php";
            break;
          case 'formdonatur':
            if (!file_exists("modul/donatur/form.php")) die("Sorry Empty Page!");
            include "modul/donatur/form.php";
            break;

          case 'tampilspp':
            if (!file_exists("modul/spp/tampil.php")) die("Sorry Empty Page!");
            include "modul/spp/tampil.php";
            break;
          case 'formspp':
            if (!file_exists("modul/spp/form.php")) die("Sorry Empty Page!");
            include "modul/spp/form.php";
            break;

          case 'tampildanamasuk':
            if (!file_exists("modul/danamasuk/tampil.php")) die("Sorry Empty Page!");
            include "modul/danamasuk/tampil.php";
            break;
          case 'formdanamasuk':
            if (!file_exists("modul/danamasuk/form.php")) die("Sorry Empty Page!");
            include "modul/danamasuk/form.php";
            break;

          case 'tampildanakeluar':
            if (!file_exists("modul/danakeluar/tampil.php")) die("Sorry Empty Page!");
            include "modul/danakeluar/tampil.php";
            break;
          case 'formdanakeluar':
            if (!file_exists("modul/danakeluar/form.php")) die("Sorry Empty Page!");
            include "modul/danakeluar/form.php";
            break;

          case 'formcetakkeuangan':
            if (!file_exists("modul/laporan/form.php")) die("Sorry Empty Page!");
            include "modul/laporan/form.php";
            break;

          case 'formcetaklaporantahunan':
            if (!file_exists("modul/laporan/formtahun.php")) die("Sorry Empty Page!");
            include "modul/laporan/formtahun.php";
            break;

          case 'formcetakspp':
            if (!file_exists("modul/laporan/formspp.php")) die("Sorry Empty Page!");
            include "modul/laporan/formspp.php";
            break;

          case 'sppseluruh':
            if (!file_exists("modul/laporan/sppseluruh.php")) die("Sorry Empty Page!");
            include "modul/laporan/sppseluruh.php";
            break;

          case 'formcetaksppbulan':
            if (!file_exists("modul/laporan/formsppbulan.php")) die("Sorry Empty Page!");
            include "modul/laporan/formsppbulan.php";
            break;

          case 'formcetakspptahun':
            if (!file_exists("modul/laporan/formspptahun.php")) die("Sorry Empty Page!");
            include "modul/laporan/formspptahun.php";
            break;

          case 'cetaksppsantri':
            if (!file_exists("modul/laporan/spp-santri.php")) die("Sorry Empty Page!");
            include "modul/laporan/spp-santri.php";
            break;

            case 'cetaksantri':
              if (!file_exists("modul/santri/cetaksantri.php")) die("Sorry Empty Page!");
              include "modul/santri/cetaksantri.php";
              break;
        }
      }
      ?>










      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2023</strong> All rights
        reserved.
      </footer>

      <!-- Control Sidebar -->
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="../bower_components/raphael/raphael.min.js"></script>
    <script src="../bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../bower_components/moment/min/moment.min.js"></script>
    <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>


    <script src="../dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../dist/js/select2.full.min.js"></script>

    <script type="text/javascript">
      $(function() {

        //Date picker1
        $('#datepicker').datepicker({
          autoclose: true
        })

        //Date picker2
        $('#datepicker2').datepicker({
          autoclose: true
        })

        //Date picker3
        $('#datepicker3').datepicker({
          autoclose: true
        })

        //Date picker4
        $('#datepicker4').datepicker({
          autoclose: true
        })

        $('.select2').select2()

        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

    <script src="../plugins/datetime/bootstrap-datepicker.js"></script>
    <script>
      $(".input-group.date").datepicker({
        autoclose: true,
        todayHighlight: true
      });
    </script>

  </body>

  </html>

<?php
}
?>
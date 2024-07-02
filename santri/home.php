<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Sistem Informasi Pengelolaan Dana TPQ</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php
                $mysql = "select count(*) jumlahdata from santri";
                $myquery = mysql_query($mysql, $koneksidb) or die("Query salah :") . mysql_error();
                $mydata = mysql_fetch_array($myquery);
                ?>
              <?php echo $mydata['jumlahdata']; ?></h3>

            <p>Santri</p>
          </div>
          <div class="icon">
            <i class="fa  fa-graduation-cap"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
       <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php
                $mysql = "SELECT SUM(jmlh_dana_masuk) AS total_jumlah FROM danamasuk";
                $myquery = mysqli_query($koneksidb, $mysql) or die("Query error: " . mysqli_error($koneksidb));
                $mydata = mysqli_fetch_array($myquery); ?>

              Rp.<?php echo $mydata['total_jumlah']; ?></h3>

            <p>Dana Masuk</p>
          </div>
          <div class="icon">
            <i class="fa fa-money"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php
                $mysql = "SELECT SUM(jmlh_dana) AS total_jumlah FROM danakeluar";
                $myquery = mysqli_query($koneksidb, $mysql) or die("Query error: " . mysqli_error($koneksidb));
                $mydata = mysqli_fetch_array($myquery); ?>

              Rp.<?php echo $mydata['total_jumlah']; ?></h3>

            <p>Dana Keluar</p>
          </div>
          <div class="icon">
            <i class="fa fa-money"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
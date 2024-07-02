<?php
if ($_GET['form'] == 'add') {
?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Form Input Data
                <small>SPP</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" role="form" method="post" action="modul/spp/proses.php?act=insert" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Transaksi</label>

                                    <div class="col-sm-10">
                                        <input type="date" name="tgl_bayar" maxlength="15" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Santri</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_santri" required>
                                            <option value="">-pilih Santri-</option>
                                            <?php
                                            $mysql = "select * from santri";
                                            $myqry = mysql_query($mysql, $koneksidb) or die("Query salah : " . mysql_error());
                                            while ($mydata = mysql_fetch_array($myqry)) {
                                            ?>
                                                <option value="<?php echo $mydata['id_santri']; ?>">-<?php echo $mydata['nama']; ?>-</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pembayaran</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="jmlh_pembayaran" maxlength="15" class="form-control">
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Metode Pembayaran</label>

                                   <div class="col-sm-10">
                                    <select class="form-control" name="metode_pembayaran">
                                    <option value="">-Pilih Metode Pembayaran-</option>
                                    <option value="Transfer Bank">Transfer Bank</option>
                                    <option value="Tunai">Tunai</option>
                                    </select>
                                </div>
                                            </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Bukti Pembayaran</label>

                  <div class="col-sm-10">
                    <input type="file" name="data_upload" maxlength="15" class="form-control" required>
   
                  </div>
                </div> 
               
                      
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="save" class="btn btn-info">Simpan</button>
                                <a href="?open=tampilspp"><button type="button" class="btn btn-default">Batal</button></a>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box -->
                    <!-- general form elements disabled -->

                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>





<?php
} elseif ($_GET['form'] == 'edit') {
    if (isset($_GET['id_spp'])) {

        $mySql = "SELECT * FROM spp,santri WHERE spp.id_santri = santri.id_santri AND id_spp='$_GET[id_spp]'";
        $myQry = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());
        $myData = mysql_fetch_array($myQry);
    }
?>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Form Edit Data
                <small>Data SPP</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" role="form" method="post" action="modul/spp/proses.php?act=update" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">ID SPP</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="id_spp" value="<?php echo $myData['id_spp']; ?>" maxlength="15" class="form-control" placeholder="ID spp" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Transaksi</label>

                                    <div class="col-sm-10">
                                        <input type="date" name="tgl_bayar" value="<?php echo $myData['tgl_bayar']; ?>" maxlength="15" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Santri</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_santri" required>
                                            <option value="<?php echo $myData['id_santri']; ?>"><?php echo $myData['id_santri']; ?>-<?php echo $myData['nama']; ?>-</option>
                                            <?php
                                            $mysql = "select * from santri";
                                            $myqry = mysql_query($mysql, $koneksidb) or die("Query salah : " . mysql_error());
                                            while ($mydata = mysql_fetch_array($myqry)) {
                                            ?>
                                                <option value="<?php echo $mydata['id_santri']; ?>">-<?php echo $mydata['nama']; ?>-</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pembayaran</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="jmlh_pembayaran" value="<?php echo $myData['jmlh_pembayaran']; ?>" maxlength="15" class="form-control">
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Metode Pembayaran</label>

                                   <div class="col-sm-10">
                    <select class="form-control" name="metode_pembayaran">
                      <option value="<?php echo $myData['id_spp']; ?>"><?php echo $myData['id_spp']; ?>-<?php echo $myData['metode_pembayaran']; ?>-</option>
                      <option value="Transfer Bank">Transfer Bank</option>
                      <option value="Tunai">Tunai</option>
                    </select>
                  </div>
                 </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Bukti Pembayaran</label>

                  <div class="col-sm-10">
                    <input type="file" name="data_upload" maxlength="15" class="form-control" required>
   
                  </div>
                </div> 

             
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="save" class="btn btn-info">Simpan</button>
                                <a href="?open=tampilspp"><button type="button" class="btn btn-default">Batal</button></a>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box -->
                    <!-- general form elements disabled -->

                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>


<?php } ?>
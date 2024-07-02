<?php
if ($_GET['form'] == 'add') {
?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Form Input Data
                <small>Dana Donasi</small>
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
                        <form class="form-horizontal" role="form" method="post" action="modul/danamasuk/proses.php?act=insert" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Transaksi</label>

                                    <div class="col-sm-10">
                                        <input type="date" name="tgl_transaksi" maxlength="35" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_donatur" required>
                                            <option value="<?php echo $myData['id_donatur']; ?>"><?php echo $myData['nama']; ?></option>
                                            <?php
                                            $mysql = "SELECT * FROM donatur WHERE id_donatur AND nama = '$_SESSION[username]'";
                                            $myqry = mysql_query($mysql, $koneksidb) or die("Query salah : " . mysql_error());
                                            while ($mydata = mysql_fetch_array($myqry)) {
                                            ?>
                                                <option value="<?php echo $mydata['id_donatur']; ?>">-<?php echo $mydata['nama']; ?>-</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Dana</label>

                                    <div class="col-sm-10">
                                        <input type="numeric" name="jmlh_dana_masuk" maxlength="35" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>

                                    <div class="col-sm-10">
                                       <input type="text" name="keterangan" maxlength="30" class="form-control">
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
                                <a href="?open=tampildanamasuk"><button type="button" class="btn btn-default">Batal</button></a>
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
    if (isset($_GET['id_dana_masuk'])) {

        $mySql = "SELECT * FROM danamasuk,donatur WHERE danamasuk.id_donatur = donatur.id_donatur AND id_dana_masuk='$_GET[id_dana_masuk]'";
        $myQry = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());
        $myData = mysql_fetch_array($myQry);
    }
?>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Form Edit Data
                <small>Dana Masuk</small>
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
                        <form class="form-horizontal" role="form" method="post" action="modul/danamasuk/proses.php?act=update" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Id Dana Masuk</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="id_dana_masuk" value="<?php echo $myData['id_dana_masuk']; ?>" maxlength="10" class="form-control" placeholder="Id Dana Masuk" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Transaksi</label>

                                    <div class="col-sm-10">
                                        <input type="date" name="tgl_transaksi" value="<?php echo $myData['tgl_transaksi']; ?>" maxlength="35" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_donatur" required>
                                            <option value="<?php echo $myData['id_donatur']; ?>"><?php echo $myData['nama']; ?></option>
                                            <?php
                                            $mysql = "SELECT * FROM donatur";
                                            $myqry = mysql_query($mysql, $koneksidb) or die("Query salah : " . mysql_error());
                                            while ($mydata = mysql_fetch_array($myqry)) {
                                            ?>
                                                <option value="<?php echo $mydata['id_donatur']; ?>">-<?php echo $mydata['nama']; ?>-</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Dana</label>

                                    <div class="col-sm-10">
                                        <input type="numeric" name="jmlh_dana_masuk" value="<?php echo $myData['jmlh_dana_masuk']; ?>" maxlength="35" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>

                                    <div class="col-sm-10">
                                       <input type="text" name="keterangan" value="<?php echo $myData['keterangan']; ?>" maxlength="35" class="form-control" required>
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
                                <a href="?open=tampildanamasuk"><button type="button" class="btn btn-default">Batal</button></a>
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
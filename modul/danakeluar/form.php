<?php
if ($_GET['form'] == 'add') {
?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Form Input Data
                <small>Dana Keluar</small>
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
                        <form class="form-horizontal" role="form" method="post" action="modul/danakeluar/proses.php?act=insert" enctype="multipart/form-data">

                            <div class="box-body">

                               <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Transaksi</label>

                                    <div class="col-sm-10">
                                        <input type="date" name="tgl_transaksi" maxlength="35" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>

                                    <div class="col-sm-10">
                                       <input type="text" name="ket_pengeluaran" maxlength="35" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Dana Keluar</label>

                                    <div class="col-sm-10">
                                        <input type="numeric" name="jmlh_dana" maxlength="35" class="form-control">
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Saldo Dana</label>

                                    <div class="col-sm-10">
                                       <select class="form-control" name="id_dana_masuk">
                                           <option value="">-Pilih Saldo-</option>
                                           <?php
                                           $mysql = "select * from danamasuk";
                                           $myqry = mysql_query($mysql,$koneksidb) or die("Query salah : " . mysql_error());
                                           while ($mydata = mysql_fetch_array($myqry)) {
                                            ?>
                                            <option value="<?php echo $mydata['id_dana_masuk']; ?>"><?php echo $mydata['id_dana_masuk']; ?>-<?php echo $mydata['jmlh_dana_masuk']; ?></option>
                                        <?php } ?>
                                        
                                       </select>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="save" class="btn btn-info">Simpan</button>
                                <a href="?open=tampildanakelaur"><button type="button" class="btn btn-default">Batal</button></a>
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
    if (isset($_GET['id_dana_keluar'])) {

        $mySql = "SELECT * FROM danakeluar,danamasuk WHERE danakeluar.id_dana_masuk = danamasuk.id_dana_masuk AND id_dana_keluar='$_GET[id_dana_keluar]'";
        $myQry = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());
        $myData = mysql_fetch_array($myQry);
    }
?>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Form Edit Data
                <small>Data Dana Keluar</small>
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
                        <form class="form-horizontal" role="form" method="post" action="modul/danakeluar/proses.php?act=update" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">ID Dana Keluar</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="id_dana_keluar" value="<?php echo $myData['id_dana_keluar']; ?>" maxlength="15" class="form-control" readonly>
                                    </div>
                                </div>

                               <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Transaksi</label>

                                    <div class="col-sm-10">
                                        <input type="date" value="<?php echo $myData['tgl_transaksi']; ?>" name="tgl_transaksi" maxlength="35" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>

                                    <div class="col-sm-10">
                                       <input type="text" name="ket_pengeluaran" value="<?php echo $myData['ket_pengeluaran'];?>" maxlength="35" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Dana Keluar</label>

                                    <div class="col-sm-10">
                                       <input type="numeric" name="jmlh_dana" value="<?php echo $myData['jmlh_dana'];?>" maxlength="35" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Saldo Dana</label>

                                    <div class="col-sm-10">
                                       <select class="form-control" name="id_dana_masuk">
                                           <option value="<?php echo $myData['id_dana_masuk'];?>"><?php echo $myData['id_dana_masuk'];?>-<?php echo $myData['jmlh_dana_masuk'];?></option>
                                           <?php
                                           $mysql = "select * from danamasuk";
                                           $myqry = mysql_query($mysql,$koneksidb) or die("Query salah : " . mysql_error());
                                           while ($mydata = mysql_fetch_array($myqry)) {
                                            ?>
                                            <option value="<?php echo $mydata['id_dana_masuk']; ?>"><?php echo $mydata['id_dana_masuk']; ?>-<?php echo $mydata['jmlh_dana_masuk']; ?></option>
                                        <?php } ?>
                                        
                                       </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="save" class="btn btn-info">Simpan</button>
                                <a href="?open=tampildanakeluar"><button type="button" class="btn btn-default">Batal</button></a>
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
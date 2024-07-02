<?php
if ($_GET['form'] == 'add') {
?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Form Input Data
                <small>Tingkatan</small>
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
                        <form class="form-horizontal" role="form" method="post" action="modul/tingkatan/proses.php?act=insert" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tingkatan</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="tingkatan" maxlength="15" class="form-control" placeholder="Masukan Tingkatan">
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="save" class="btn btn-info">Simpan</button>
                                <a href="?open=tampiltingkatan"><button type="button" class="btn btn-default">Batal</button></a>
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
    if (isset($_GET['id_tingkatan'])) {

        $mySql = "SELECT * FROM tingkatan WHERE id_tingkatan='$_GET[id_tingkatan]'";
        $myQry = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());
        $myData = mysql_fetch_array($myQry);
    }
?>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Form Edit Data
                <small>Data Tingkatan</small>
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
                        <form class="form-horizontal" role="form" method="post" action="modul/tingkatan/proses.php?act=update" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">ID Tingkatan</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="id_tingkatan" value="<?php echo $myData['id_tingkatan']; ?>" maxlength="15" class="form-control" placeholder="ID Matapelajaran" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tingkatan</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="tingkatan" value="<?php echo $myData['tingkatan']; ?>" maxlength="35" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="save" class="btn btn-info">Simpan</button>
                                <a href="?open=tampiltingkatan"><button type="button" class="btn btn-default">Batal</button></a>
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
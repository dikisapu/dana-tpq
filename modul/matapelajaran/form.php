<?php
if ($_GET['form'] == 'add') {
?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Form Input Data
                <small>Matapelajran</small>
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
                        <form class="form-horizontal" role="form" method="post" action="modul/matapelajaran/proses.php?act=insert" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">MataPelajaran</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="nama_matapelajaran" maxlength="15" class="form-control" placeholder="Masukan Nama Matapelajaran">
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="save" class="btn btn-info">Simpan</button>
                                <a href="?open=tampilmatapelajaran"><button type="button" class="btn btn-default">Batal</button></a>
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
    if (isset($_GET['id_matapelajaran'])) {

        $mySql = "SELECT * FROM matapelajaran WHERE id_matapelajaran='$_GET[id_matapelajaran]'";
        $myQry = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());
        $myData = mysql_fetch_array($myQry);
    }
?>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Form Edit Data
                <small>Data Matapelajaran</small>
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
                        <form class="form-horizontal" role="form" method="post" action="modul/matapelajaran/proses.php?act=update" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">ID Matapelajaran</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="id_matapelajaran" value="<?php echo $myData['id_matapelajaran']; ?>" maxlength="15" class="form-control" placeholder="ID Matapelajaran" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Matapelajaran</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="nama" value="<?php echo $myData['nama_matapelajaran']; ?>" maxlength="35" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="save" class="btn btn-info">Simpan</button>
                                <a href="?open=tampilmatapelajaran"><button type="button" class="btn btn-default">Batal</button></a>
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
<?php
if ($_GET['form'] == 'add') {
?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Form Input Data
                <small>Jadwal MataPelajaran</small>
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
                        <form class="form-horizontal" role="form" method="post" action="modul/jadwalmatapelajaran/proses.php?act=insert" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Hari</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="hari">
                                            <option value="">-Pilih Hari-</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                            <option value="Sabtu">Sabtu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Jam Mulai</label>

                                    <div class="col-sm-10">
                                        <input type="time" name="jam_mulai" maxlength="35" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Jam Selesai</label>

                                    <div class="col-sm-10">
                                        <input type="time" name="jam_selesai" maxlength="35" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Guru</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="nama" required>
                                            <option value="">-pilih Tingkatan-</option>
                                            <?php
                                            $mysql = "select * from guru";
                                            $myqry = mysql_query($mysql, $koneksidb) or die("Query salah : " . mysql_error());
                                            while ($mydata = mysql_fetch_array($myqry)) {
                                            ?>
                                                <option value="<?php echo $mydata['id_guru']; ?>">-<?php echo $mydata['nama']; ?>-</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">MataPelajaran</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_matapelajaran" required>
                                            <option>-pilih MataPelajaran-</option>
                                            <?php
                                            $mysql = "select * from matapelajaran";
                                            $myqry = mysql_query($mysql, $koneksidb) or die("Query salah : " . mysql_error());
                                            while ($mydata = mysql_fetch_array($myqry)) {
                                            ?>
                                                <option value="<?php echo $mydata['id_matapelajaran']; ?>">-<?php echo $mydata['nama_matapelajaran']; ?>-</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="save" class="btn btn-info">Simpan</button>
                                <a href="?open=tampiljadwalmatapelajaran"><button type="button" class="btn btn-default">Batal</button></a>
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
    if (isset($_GET['id_santri'])) {

        $mySql = "SELECT * FROM santri WHERE id_santri='$_GET[id_santri]'";
        $myQry = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());
        $myData = mysql_fetch_array($myQry);
    }
?>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Form Edit Data
                <small>Data Santri</small>
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
                        <form class="form-horizontal" role="form" method="post" action="modul/santri/proses.php?act=update" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">ID Santri</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="id_santri" value="<?php echo $myData['id_santri']; ?>" maxlength="15" class="form-control" placeholder="ID Santri" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="nama" value="<?php echo $myData['nama']; ?>" maxlength="35" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir</label>

                                    <div class="col-sm-10">
                                        <input type="date" name="ttl" value="<?php echo $myData['ttl']; ?>" maxlength="35" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="<?php echo $myData['jenis_kelamin']; ?>"><?php echo $myData['jenis_kelamin']; ?></option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" value="<?php echo $myData['alamat']; ?>" maxlength="150" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">No. Telepon</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="telp" value="<?php echo $myData['telp']; ?>" maxlength="15" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tingkatan</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_tingkatan" required>
                                            <option value="">-pilih Tingkatan-</option>
                                            <?php
                                            $mysql = "select * from tingkatan";
                                            $myqry = mysql_query($mysql, $koneksidb) or die("Query salah : " . mysql_error());
                                            while ($mydata = mysql_fetch_array($myqry)) {
                                            ?>
                                                <option value="<?php echo $mydata['id_tingkatan']; ?>">-<?php echo $mydata['tingkatan']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="save" class="btn btn-info">Simpan</button>
                                <a href="?open=tampilsantri"><button type="button" class="btn btn-default">Batal</button></a>
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
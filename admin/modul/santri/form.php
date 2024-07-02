<?php
include_once "nisotomatis.php";
$newNIS = generateNIS();

if ($_GET['form'] == 'add') {
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Input Data
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
            <form class="form-horizontal" role="form" method="post" action="modul/santri/proses.php?act=insert" enctype="multipart/form-data">

              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIS</label>

                  <div class="col-sm-10">
                    <input type="text" name="nis" maxlength="5" class="form-control" placeholder="Masukan NIS" value="<?php echo $newNIS; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" name="nama" maxlength="35" class="form-control" placeholder="Masukan Nama">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir</label>

                  <div class="col-sm-10">
                    <input type="date" name="tgl_lahir" maxlength="35" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <input type="text" name="alamat" maxlength="150" class="form-control" placeholder="Masukan Alamat">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No Telpon</label>

                  <div class="col-sm-10">
                    <input type="text" name="no_telpon" maxlength="15" class="form-control" placeholder="Masukan No Telpon">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="jenis_kelamin">
                      <option value="">-Pilih Jenis Kelamin-</option>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
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
                  <label for="inputEmail3" class="col-sm-2 control-label"></label>

                  <div class="col-sm-10">
                    <input type="hidden" name="id_santri" value="<?php echo $myData['id_santri']; ?>" maxlength="15" class="form-control" placeholder="ID Santri" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIS</label>

                  <div class="col-sm-10">
                    <input type="text" name="nis" value="<?php echo $myData['nis']; ?>" maxlength="5" class="form-control" placeholder="NIS">
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
                    <input type="date" name="tgl_lahir" value="<?php echo $myData['tgl_lahir']; ?>" maxlength="35" class="form-control">
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
                    <input type="text" name="no_telpon" value="<?php echo $myData['no_telpon']; ?>" maxlength="15" class="form-control">
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
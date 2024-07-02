<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Santri
      <small>Daftar Nama Santri</small>
    </h1>

    <ol class="breadcrumb">

      <a href="?open=formsantri&form=add"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-plus"></i> Tambah</button></a>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <!-- /.box -->

        <div class="box">
          <div class="box-header">
            <a href="modul/santri/cetaksantri.php"><button type="button" class="btn btn-info btn-xs waves-effect waves-light" onclick="printTable()"><i class="ico ico-left fa fa-print"></i> Cetak</button></a>

            <?php
            if (isset($_GET['alert'])) {
              if ($_GET['alert'] == 1) {
                echo "<div class='alert alert-success'>Sukses.</div>";
              } elseif ($_GET['alert'] == 2) {
                echo "<div class='alert alert-success'>Sukses dihapus.</div>";
              } elseif ($_GET['alert'] == 3) {
                echo "<div class='alert alert-success'>Sukses.</div>";
              } elseif ($_GET['alert'] == 4) {
                echo "<div class='alert alert-success'>Gagal.</div>";
              } elseif ($_GET['alert'] == 5) {
                echo "<div class='alert alert-success'>Username Sudah Di Daftarkan.</div>";
              }
            }
            ?>

          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div class="hscroll">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No. Telpon</th>
                    <th>jenis_kelamin</th>
                    <th>Proses</th>
                  </tr>
                </thead>
                <tbody>



                  <?php
                  $mySql = "SELECT * FROM santri ORDER BY nis ASC";
                  $myQry = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());
                  $nomor = 0;
                  while ($myData = mysql_fetch_array($myQry)) {
                    $nomor++;
                  ?>

                    <tr>
                      <td><?php echo $nomor; ?></td>
                      <td><?php echo $myData['nis']; ?></td>
                      <td><?php echo $myData['nama']; ?></td>
                      <td><?php echo $myData['tgl_lahir']; ?></td>
                      <td><?php echo $myData['alamat']; ?></td>
                      <td><?php echo $myData['no_telpon']; ?></td>
                      <td><?php echo $myData['jenis_kelamin']; ?></td>
                      <td>

                        <a href="?open=formsantri&form=edit&id_santri=<?php echo $myData['id_santri']; ?>">
                          <button type="button" class="btn btn-success btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-edit"></i></button>
                        </a>

                        <a href="modul/santri/proses.php?act=delete&id_santri=<?php echo $myData['id_santri']; ?>" onclick="return confirm('Yakin mau di hapus ?');">
                          <button type="button" class="btn btn-danger btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-trash"></i></button>
                        </a>

                      </td>
                    </tr>
                  <?php } ?>




                </tbody>
              </table>

            </div>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
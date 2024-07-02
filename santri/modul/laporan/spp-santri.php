<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data SPP
            <small>Daftar SPP</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                    <div class="box-header">

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
                                        <th>Nama Santri</th>
                                        <th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>




                                <?php
$mySql = "SELECT GROUP_CONCAT(DISTINCT santri.nama ORDER BY santri.nama ASC) AS nama_santri, spp.id_santri
          FROM spp
          JOIN santri ON spp.id_santri = santri.id_santri
          AND nis ='$_SESSION[username]'
          GROUP BY spp.id_santri
          ORDER BY nama_santri ASC";
$myQry = mysqli_query($koneksidb, $mySql) or die("Query salah: " . mysqli_error($koneksidb));
$nomor = 0;
while ($myData = mysqli_fetch_array($myQry)) {
    $nomor++;
    $nama_santri = explode(",", $myData['nama_santri']); // Pisahkan nama-nama santri menjadi array
?>

<tr>
    <td><?php echo $nomor; ?></td>
    <td><?php echo $nama_santri[0]; ?></td> <!-- Tampilkan hanya satu nama -->
    <td>
        <a href="modul/laporan/cetaksppsantri.php?id_santri=<?php echo $myData['id_santri']; ?>">
            <button type="button" class="btn btn-success btn-xs waves-effect waves-light">
                <i class="ico ico-left fa fa-print"></i> Cetak
            </button>
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
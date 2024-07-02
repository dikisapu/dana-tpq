<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Jadwal MataPelajaran
            <small>Daftar jawdal MataPelajaran</small>
        </h1>

        <ol class="breadcrumb">

            <a href="?open=formjadwalmatapelajaran&form=add"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-plus"></i> Tambah</button></a>

        </ol>
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
                                        <th>Hari</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Nama Guru</th>
                                        <th>Matapelajaran</th>
                                        <th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>




                                    <?php
                                    $mySql = "SELECT * FROM jadwalmatapelajaran
                                    INNER JOIN guru ON jadwalmatapelajaran.id_guru = guru.id_guru INNER JOIN matapelajaran ON jadwalmatapelajaran.id_matapelajaran = matapelajaran.id_matapelajaran";
                                    $myQry = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());
                                    $nomor = 0;
                                    while ($myData = mysql_fetch_array($myQry)) {
                                        $nomor++;
                                    ?>

                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $myData['hari']; ?></td>
                                            <td><?php echo $myData['jam_mulai']; ?></td>
                                            <td><?php echo $myData['jam_selesai']; ?></td>
                                            <td><?php echo $myData['nama']; ?></td>
                                            <td><?php echo $myData['nama_matapelajaran']; ?></td>
                                            <td>


                                                <a href="?open=formjadwalpelajaran&form=edit&id_jadwalpelajaran=<?php echo $myData['id_jadwalpelajaran']; ?>">
                                                    <button type="button" class="btn btn-success btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-edit"></i> Edit</button>
                                                </a>

                                                <a href="modul/jadwalpelajaran/proses.php?act=delete&id_jadwalpelajaran=<?php echo $myData['id_jadwalpelajaran']; ?>" onclick="return confirm('Yakin mau di hapus ?');">
                                                    <button type="button" class="btn btn-danger btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-remove"></i> Hapus</button>
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
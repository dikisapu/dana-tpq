<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Dana Keluar
            <small>Daftar Dana Keluar</small>
        </h1>

        <ol class="breadcrumb">

            <a href="?open=formdanakeluar&form=add"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-plus"></i> Tambah</button></a>

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
                                        <th>Tanggal Transaksi</th>
                                        <th>Keterangan</th>
                                        <th>Dana Keluar</th>
                                        <th>Saldo Dana</th>
                                        <th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>




                                    <?php
                                    $mySql = "SELECT * FROM danakeluar,danamasuk WHERE danakeluar.id_dana_masuk = danamasuk.id_dana_masuk GROUP BY id_dana_keluar ORDER BY id_dana_keluar";
                                    $myQry = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());
                                    $nomor = 0;
                                    while ($myData = mysql_fetch_array($myQry)) {
                                        $nomor++;
                                    ?>

                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $myData['tgl_transaksi']; ?></td>
                                             <td><?php echo $myData['ket_pengeluaran']; ?></td>
                                             <td><?php echo $myData['jmlh_dana']; ?></td>
                                             <td><?php echo $myData['jmlh_dana_masuk']; ?></td>


                                            <td>


                                                <a href="?open=formdanakeluar&form=edit&id_dana_keluar=<?php echo $myData['id_dana_keluar']; ?>">
                                                    <button type="button" class="btn btn-success btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-edit"></i> Edit</button>
                                                </a>

                                                <a href="modul/danakeluar/proses.php?act=delete&id_dana_keluar=<?php echo $myData['id_dana_keluar']; ?>" onclick="return confirm('Yakin mau di hapus ?');">
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data SPP
            <small>Daftar SPP</small>
        </h1>

        <ol class="breadcrumb">

            <a href="?open=formspp&form=add"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-plus"></i> Tambah</button></a>

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
                                        <th>Tanggal Bayar</th>
                                        <th>Nama Santri</th>
                                        <th>Jumlah Pembayaran</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>




                                    <?php
                                    $mySql = "SELECT * FROM spp,santri WHERE spp.id_santri = santri.id_santri GROUP BY id_spp ORDER BY tgl_bayar ASC";
                                    $myQry = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());
                                    $nomor = 0;
                                    while ($myData = mysql_fetch_array($myQry)) {
                                        $nomor++;
                                    ?>

                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $myData['tgl_bayar']; ?></td>
                                            <td><?php echo $myData['nama']; ?></td>
                                            <td><?php echo $myData['jmlh_pembayaran']; ?></td>
                                            <td><?php echo $myData['metode_pembayaran']; ?></td>
                                            <td>


                                                <a href="?open=formspp&form=edit&id_spp=<?php echo $myData['id_spp']; ?>">
                                                    <button type="button" class="btn btn-success btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-edit"></i> Edit</button>
                                                </a>

                                                <a href="modul/spp/proses.php?act=delete&id_spp=<?php echo $myData['id_spp']; ?>" onclick="return confirm('Yakin mau di hapus ?');">
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
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
                                        <th>Bukti Pembayaran</th>
                                        </tr>
                                </thead>
                                <tbody>




                                    <?php
                                    $mySql = "SELECT * FROM spp JOIN santri ON spp.id_santri = santri.id_santri
                                    AND nis = '$_SESSION[username]'
                                    GROUP BY id_spp ORDER BY tgl_bayar ASC";
                                    $myQry = mysqli_query($koneksidb, $mySql) or die("Query salah: " . mysqli_error($koneksidb));
                                    $nomor = 0;
                                    while ($myData = mysql_fetch_array($myQry)) {
                                        $nomor++;
                                    ?>

                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $myData['tgl_bayar']; ?></td>
                                            <td><?php echo $myData['nama']; ?></td>
                                            <td>Rp.<?php echo $myData['jmlh_pembayaran']; ?></td>
                                            <td><?php echo $myData['metode_pembayaran']; ?></td>
                                            <td>
                                                <?php if($myData['nama_file']!=""){ ?>
								<a href="modul/spp/berkas/<?php echo $myData['nama_file']; ?>" target="_blank"><i class="ico ico-left fa fa-file"></i> Download Berkas</a>
								<?php }else{ ?>
								
								<?php } ?>
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
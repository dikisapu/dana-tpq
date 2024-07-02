  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA PENERIMAAN
      </h1>
      <ol class="breadcrumb">
		<a href="?open=formpenerimaan&form=add"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-plus"></i> Tambah</button></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
			  
			  
<?php 
if (isset($_GET['alert'])) {
        if ($_GET['alert']==1) {
            echo "Sukses di simpan.";
        } elseif ($_GET['alert']==2) {
            echo "Sukses di update.";
        } elseif ($_GET['alert']==3) {
            echo "Sukses di hapus.";
        } elseif ($_GET['alert']==4){
            echo "Gagal di proses.";
        }
    }
?>			  
			  
			  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="hscroll">
			
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>No. Penerimaan</th>
                  <th>Tgl. Penerimaan</th>
                  <th>Tgl. Nota</th>
                  <th>Kode Akun</th>
				  <th>Nama Akun</th>
				  <th>Jumlah</th>
				  <th>Proses</th>
                </tr>
                </thead>
                <tbody>
				
				
<?php										
	$mySql = "SELECT * FROM penerimaan,akun WHERE penerimaan.kode_akun = akun.kode_akun  GROUP BY no_penerimaan ORDER BY no_penerimaan DESC";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error()); 
	$nomor = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
	$nomor++;
?>					

							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $myData['no_penerimaan']; ?></td>
								<td><?php echo $myData['tgl_penerimaan']; ?></td>
								<td><?php echo $myData['tgl_nota']; ?></td>
								<td><?php echo $myData['kode_akun']; ?></td>
								<td><?php echo $myData['nama_akun']; ?></td>
								<td><?php echo number_format($myData['jumlah']); ?></td>
								<td>
								
								<a href="?open=formpenerimaan&form=edit&no_penerimaan=<?php echo $myData['no_penerimaan'];?>">
									<button type="button" class="btn btn-success btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-edit"></i> Edit</button>
								</a>
								
								<a href="modul/penerimaan/proses.php?act=delete&no_penerimaan=<?php echo $myData['no_penerimaan'];?>" onclick="return confirm('Yakin mau di hapus ?');">
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
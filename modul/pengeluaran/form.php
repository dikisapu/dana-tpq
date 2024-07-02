<?php  
if ($_GET['form']=='add') { 
?>
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Input Data
        <small></small>
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
            <form class="form-horizontal" role="form" method="post" action="modul/pengeluaran/proses.php?act=insert" enctype="multipart/form-data">
			
              <div class="box-body">
                
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No Pengeluaran</label>

                  <div class="col-sm-10">
                    <input type="text" name="no_pengeluaran" maxlength="12" class="form-control" placeholder="">
                  </div>
                </div>	

				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tgl Pengeluaran</label>

                  <div class="col-sm-10">
                    <input type="text" name="tgl_pengeluaran" maxlength="10" class="form-control" placeholder="">
                  </div>
                </div>	
				
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tgl Nota</label>

                  <div class="col-sm-10">
                    <input type="text" name="tgl_nota" maxlength="10" class="form-control" placeholder="">
                  </div>
                </div>	
				
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Akun</label>

                  <div class="col-sm-10">
				  
                    <select class="form-control" name="kode_akun" required>
						<option value="">- Pilih -</option>
						<?php			
							$mySql = "SELECT * FROM akun WHERE tipe_akun  ='Pengeluaran' ORDER BY kode_akun ASC";
							$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
							while ($myData = mysql_fetch_array($myQry)) {
						?> 
						<option value="<?php echo $myData['kode_akun']; ?>"><?php echo $myData['kode_akun']; ?> - <?php echo $myData['nama_akun']; ?> (<?php echo $myData['saldo']; ?>)</option>
						<?php } ?>
					</select>                    
                  
				  </div>
                </div>	

				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>

                  <div class="col-sm-10">
                    <input type="numeric" name="jumlah" maxlength="11" class="form-control" placeholder="">
                  </div>
                </div>				
				



              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-info">Simpan</button>
				<button type="button" class="btn btn-default">Batal</button>
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
}
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['no_pengeluaran'])) {
  
	$mySql = "SELECT * FROM pengeluaran,akun WHERE pengeluaran.kode_akun = akun.kode_akun AND no_pengeluaran='$_GET[no_pengeluaran]'";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
	$myData = mysql_fetch_array($myQry);
	
    }
?> 	


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Edit Data
        <small></small>
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
            <form class="form-horizontal" role="form" method="post" action="modul/pengeluaran/proses.php?act=update" enctype="multipart/form-data">
			
              <div class="box-body">
                
			
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No Pengeluaran</label>

                  <div class="col-sm-10">
                    <input type="text" name="no_pengeluaran" value="<?php echo $myData['no_pengeluaran']; ?>" maxlength="12" class="form-control" placeholder="">
                  </div>
                </div>	

				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tgl Pengeluaran</label>

                  <div class="col-sm-10">
                    <input type="text" name="tgl_pengeluaran" value="<?php echo $myData['tgl_pengeluaran']; ?>" maxlength="10" class="form-control" placeholder="">
                  </div>
                </div>	
				
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tgl Nota</label>

                  <div class="col-sm-10">
                    <input type="text" name="tgl_nota" value="<?php echo $myData['tgl_nota']; ?>" maxlength="10" class="form-control" placeholder="">
                  </div>
                </div>	
				
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Akun</label>

                  <div class="col-sm-10">
				  
                    <select class="form-control" name="kode_akun" required>
						<option value="<?php echo $myData['kode_akun']; ?>"><?php echo $myData['kode_akun']; ?> - <?php echo $myData['nama_akun']; ?></option>
						
						<?php			
							$mySql2 = "SELECT * FROM akun WHERE tipe_akun  ='Pengeluaran' ORDER BY kode_akun ASC";
							$myQry2 = mysql_query($mySql2, $koneksidb)  or die ("Query salah : ".mysql_error());
							while ($myData2 = mysql_fetch_array($myQry2)) {
						?> 
						<option value="<?php echo $myData2['kode_akun']; ?>"><?php echo $myData2['kode_akun']; ?> - <?php echo $myData2['nama_akun']; ?></option>
						<?php } ?>
					</select> 
                  
				  
				  </div>
                </div>	

				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>

                  <div class="col-sm-10">
                    <input type="numeric" name="jumlah" value="<?php echo $myData['jumlah']; ?>" maxlength="11" class="form-control" placeholder="">
                  </div>
                </div>	


				


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-info">Simpan</button>
				<button type="button" class="btn btn-default">Batal</button>
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
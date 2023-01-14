<?php
if($_GET["aksi"] && $_GET["kode"]){
$edit = mysqli_query($con,"select * from v_saldopita where kode='".$_GET["kode"]."'");
$editDb = mysqli_fetch_assoc($edit);
  if(isset($_POST["dppc"])){
      $tgl = $_POST["Tanggal"];
      $tanggal = preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$tgl);
      //echo $tgl;
      //$tanggal = date('Y/m/d H:i:s',strtotime($tgl);
      $cariDPPCqry = mysqli_query($con,"select No_DPPC from dppc where Kode='".$_POST["Kode"]."' and No_DPPC='".$_POST["No_DPPC"]."' and Tanggal='".$tanggal."'");
      $num_rows = mysqli_num_rows($cariDPPCqry);
      if ($num_rows > 0) {
        echo "<script>window.alert('{{{  Data DP2C SUDAH Pernah di-Input  }}}')
        window.location='index.php?menu=admpita'</script>";
      } else {
      mysqli_query($con,"insert into dppc (Kode, Nama_Perusahaan, Volume, Golongan, No_DPPC, Tanggal, Jumlah, Keterangan) VALUES ('".$_POST['Kode']."','".$_POST['Nama_Perusahaan']."','".$_POST['Volume']."','".$_POST['Golongan']."','".$_POST['No_DPPC']."','".$tanggal."','".$_POST['Jumlah']."','".$_POST['Keterangan']."')");
      echo "<meta http-equiv='refresh' content='0; url=?menu=admpita'>";
      } }
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form DPPC</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Form DPPC</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content pb-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card mb-5">
              <div class="card-header">
                <h3 class="card-title">Input DPPC</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" name="add-dppc" onsubmit="return validateFormAddDPPC()" method="post" class="form-horizontal" novalidate>
                <div class="card-body">
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-5">
                      <input type="text" name="Kode" value="<?php echo $editDb["Kode"];?>" required class="form-control" readonly="readonly" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                    <div class="col-sm-5">
                      <input type="text" name="Nama_Perusahaan" value="<?php echo $editDb["Nama_Perusahaan"];?>" required class="form-control" readonly="readonly" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Volume</label>
                    <div class="col-sm-5">
                      <input type="text" required name="Volume" value="<?php echo $editDb["Volume"];?>" class="form-control" readonly="readonly" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Golongan</label>
                    <div class="col-sm-5">
                      <input type="text" required name="Golongan" value="<?php echo $editDb["Golongan"];?>" class="form-control" readonly="readonly" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">No. DPPC</label>
                    <div class="col-sm-5">
                      <input type="text" name="No_DPPC" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">Tanggal DPPC</label>
                    <div class="col-sm-5">
                      <div class="input-group date" id="adddppcdate" data-target-input="nearest">
                        <input type="text" name="Tanggal" class="form-control datetimepicker-input" data-target="#adddppcdate"/>
                        <div class="input-group-append" data-target="#adddppcdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">Jumlah Masuk (Lembar)</label>
                    <div class="col-sm-5">
                      <input type="text" name="Jumlah" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-5">
                      <textarea class="form-control" name="Keterangan" rows="5" style="resize: none;"></textarea>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="text-align: center;">
                  <a type="button" class="btn btn-default">Cancel</a>
                  <input type="submit" formnovalidate name="dppc" value="Submit" class="btn btn-info" />
                  <!-- <a type="submit" formnovalidate name="dppc" class="btn btn-info">Submit</a> -->
                </div>
                <!-- /.card-footer -->
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php } ?>
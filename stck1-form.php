<?php
if (isset($_GET['aksi'])) {
    $aksi = isset($_GET['aksi']);
} else{
  $aksi = "";
}

if ($aksi=="edit") {
  echo '<script type="text/javascript">',
     'validateFormSTCK1();',
     '</script>';
  $editSql="select * from dok_penagihan where dok_penagihan_id='".$_GET['id']."'";
  $editQry = mysqli_query($con,$editSql)  or die ("Query EDIT STCK-1 salah : ".mysqli_error());
  $edit = mysqli_fetch_array($editQry);
  }
  
//jika tombol simpan ditekan
if(isset($_POST['form-stck1'])){
  $tgl_asal = $_POST["tgl_dok_asal"];
  $npwp = str_replace([".", "-"],"", $_POST['npwp']);
  $nppbkc = str_replace(".", "", $_POST['nppbkc']);
  $tgl_dok_asal = preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$tgl_asal);
  $total_tagihan = $_POST['ck_ht']+$_POST['ck_ea']+$_POST['ck_mmea']+$_POST['da_ck'];
  $query = "INSERT INTO dok_penagihan(jns_dok, penerbit, bidang, npwp, nppbkc, nm_pengusaha, nama_perusahaan, alamat, dok_asal, no_dok_asal, tgl_dok_asal, ck_ht, ck_ea, ck_mmea, da_ck, tagihan, uraian, tgl_lunas, pengawas, pre_jabatan, jabatan, pejabat) VALUES ('STCK-1', '".$_POST['penerbit']."', '".$_POST['bidang']."', '".$npwp."', '".$nppbkc."', '".$_POST['nm_pengusaha']."', '".$_POST['nama_perusahaan']."', '".$_POST['alamat']."', '".$_POST['dok_asal']."', '".$_POST['no_dok_asal']."', '".$tgl_dok_asal."', '".$_POST['ck_ht']."', '".$_POST['ck_ea']."', '".$_POST['ck_mmea']."', '".$_POST['da_ck']."','".$total_tagihan."', '".$_POST['uraian']."','0', '".$_POST['pengawas']."', '".$_POST['pre_jabatan']."', '".$_POST['jabatan']."', '".$_POST['pejabat']."')";
  $hasil = mysqli_query($con,$query);
}

if(isset($_POST['update-form-stck1'])){
  $tgl_asal = $_POST["tgl_dok_asal"];
  $npwp = str_replace([".", "-"],"", $_POST['npwp']);
  $nppbkc = str_replace(".", "", $_POST['nppbkc']);
  $tgl_dok_asal = preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$tgl_asal);
  $tgl_stck = $_POST["tgl_stck1"];
  $tgl_dok_stck1 = preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$tgl_stck);
  $tgl_bill = $_POST["tgl_billing"];
  $tgl_billing = preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$tgl_bill);
  $total_tagihan = $_POST['ck_ht']+$_POST['ck_ea']+$_POST['ck_mmea']+$_POST['da_ck'];
  $jatuh_tempo = date('Y-m-d h:i:s', strtotime('+29 days', strtotime($tgl_billing)));
  mysqli_query($con,"update dok_penagihan set bidang='".$_POST['bidang']."', no_dok='".$_POST['no_stck1']."', post_no_dok='".$_POST['post_no_stck1']."', tgl_dok='".$tgl_dok_stck1."', \n"
  ." kode_billing='".$_POST['kode_billing']."', tgl_billing='".$tgl_billing."', npwp='".$npwp."', nppbkc='".$nppbkc."', nm_pengusaha='".$_POST['nm_pengusaha']."',  \n"
  ." nama_perusahaan='".$_POST['nama_perusahaan']."', alamat='".$_POST['alamat']."', dok_asal='".$_POST['dok_asal']."', no_dok_asal='".$_POST['no_dok_asal']."', \n"
  ." tgl_dok_asal='".$tgl_dok_asal."', ck_ht='".$_POST['ck_ht']."', ck_ea='".$_POST['ck_ea']."', ck_mmea='".$_POST['ck_mmea']."', da_ck='".$_POST['da_ck']."', tagihan='".$total_tagihan."', \n"
  ." uraian='".$_POST['uraian']."', tgl_lunas='0', pengawas='".$_POST['pengawas']."', penerbit='".$_POST['penerbit']."', pre_jabatan='".$_POST['pre_jabatan']."', jabatan='".$_POST['jabatan']."',\n"
  ." pejabat='".$_POST['pejabat']."', jatuh_tempo='".$jatuh_tempo."' where dok_penagihan_id='".$_POST["dok_penagihan_id"]."'");
}
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form STCK-1</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Form STCK-1</li>
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
                <h3 class="card-title">Rekam STCK-1</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal" name="stck-1" onSubmit="return validateFormSTCK1()" action="home.php?badan=stck1-form" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kantor Penerbit</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="penerbit" value="KANTOR PENGAWASAN DAN PELAYANAN BEA DAN CUKAI TIPE MADYA PABEAN A DENPASAR" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Bidang</label>
                    <div class="col-sm-10">
                      <?php if ($aksi=="edit") {
                        echo '<input type="text" class="form-control" name="dok_penagihan_id" value="'.$_GET["id"].'" hidden>';
                      } ?>
                      <input type="text" class="form-control" name="bidang" value="KEPALA KANTOR PELAYANAN" readonly>
                      <input type="text" class="form-control" name="pengawas" value="KPPBC TMP A DENPASAR" readonly hidden>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No / Tanggal STCK-1</label>
                    <div class="col-sm-2">
                      <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">STCK -</span>
                    </div>
                    <input <?php if ($aksi!="edit") {echo "disabled";} ?> type="text" class="form-control" value="<?php if ($aksi=="edit") { echo $edit['no_dok'];} else {}?>" name="no_stck1">
                  </div>
                    </div>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="post_no_dok" value="<?php if ($aksi=="edit") {echo $edit['no_dok'];}else{ echo "";}?>" readonly>
                    </div>
                    <div class="col-sm-1 text-center">
                      <label style="margin-top: 5px;">/</label>
                    </div>
                    <div class="col-sm-3">
                      <div class="input-group date" id="stckdate" data-target-input="nearest">
                        <input <?php if ($aksi!="edit") {echo "disabled";}?> type="text" name="tgl_stck1" class="form-control datetimepicker-input" value="<?php if ($aksi!="edit") { echo '01/12/0001';}else{ echo date('d/m/Y', strtotime($edit['tgl_dok']));} ?>" data-target="#stckdate"/>
                        <div class="input-group-append" data-target="#stckdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kode / Tanggal Billing</label>
                    <div class="col-sm-6">
                      <input <?php if ($aksi!="edit") {echo "disabled";}?> type="text" class="form-control" name="kode_billing" value="<?php if ($aksi=="edit") { echo $edit['kode_billing'];} ?>">
                    </div>
                    <div class="col-sm-1 text-center">
                      <label style="margin-top: 5px;">/</label>
                    </div>
                    <div class="col-sm-3">
                      <div class="input-group date" id="billingdate" data-target-input="nearest">
                        <input <?php if ($aksi!="edit") {echo "disabled";}?> type="text" name="tgl_billing" class="form-control datetimepicker-input" value="<?php if ($aksi==="edit") { echo date('d/m/Y');}else{ echo date('d/m/Y', strtotime($edit['tgl_billing']));} ?>" data-target="#billingdate"/>
                        <div class="input-group-append" data-target="#billingdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Dokumen Asal</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="dok_asal">
                        <option><?php if ($aksi=="edit") { echo $edit['dok_asal'];} ?></option>
                        <option>Nota Dinas Kepala Seksi Penindakan dan Penyidikan</option>
                        <option>Nota Dinas Kepala Seksi Pelayanan Kepabeanan dan Cukai</option>
                        <option>Surat Kepala Kantor Kanwil DJBC Bali, NTB, dan NTT</option>
                        <option>ND Audit Kantor Wilayah</option>
                        <option>ND Verifikasi Kantor Pusat DJBC</option>
                        <option>ND Audit Kantor Pusat DJBC</option>
                        <option>LHA</option>
                        <option>Lainnya</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No / Tanggal Dok. Asal</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="no_dok_asal" value="<?php if ($aksi=="edit") { echo $edit['no_dok_asal'];} ?>">
                    </div>
                    <div class="col-sm-1 text-center">
                      <label style="margin-top: 5px;">/</label>
                    </div>
                    <div class="col-sm-3">
                      <div class="input-group date" id="dokasaldate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="tgl_dok_asal" value="<?php if ($aksi=="edit") { echo date('d/m/Y',strtotime($edit['tgl_dok_asal']));} ?>" data-target="#dokasaldate"/>
                        <div class="input-group-append" data-target="#dokasaldate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Pengusaha</label>
                    <div class="col-sm-10">
                      <input name="nm_pengusaha"  type="text" class="form-control" value="<?php if ($aksi=="edit") { echo $edit['nm_pengusaha'];} ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Perusahaan</label>
                    <div class="col-sm-2 col-form-label">
                      <label>NPWP</label><br/>
                      <label style="margin-top: 5.5px;">NPPBKC</label><br/>
                      <label style="margin-top: 5.5px;">Nama Perusahaan</label><br/>
                      <label style="margin-top: 5.5px;">Alamat</label>
                    </div>
                    <div class="col-sm-1 text-center">
                      <label style="margin-top: 5px;">:</label><br/>
                      <label style="margin-top: 5.5px;">:</label><br/>
                      <label style="margin-top: 5.5px;">:</label><br/>
                      <label style="margin-top: 5.5px;">:</label>
                    </div>
                    <div class="col-sm-7">
                      <input name="npwp" id="npwpstck" type="text" class="form-control" value="<?php if ($aksi=="edit") { echo $edit['npwp'];} ?>">
                      <input name="nppbkc" id="nppbkcstck" type="text" class="form-control" value="<?php if ($aksi=="edit") { echo $edit['nppbkc'];} ?>">
                      <input name="nama_perusahaan" type="text" class="form-control" value="<?php if ($aksi=="edit") { echo $edit['nama_perusahaan'];} ?>">
                      <textarea name="alamat" rows="3" class="form-control" style="resize: none;"><?php if ($aksi=="edit") { echo $edit['alamat'];} ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tagihan</label>
                    <div class="col-sm-2 text-left">
                      <label style="margin-top: 5.5px;">Cukai Tembakau</label><br/>
                      <label style="margin-top: 5.5px;">Cukai MMEA</label><br/>
                    </div>
                    <div class="col-sm-3">
                      <input name="ck_ht" type="text" class="form-control" value="<?php if ($aksi=="edit") { echo $edit['ck_ht'];} ?>">
                      <input name="ck_mmea" type="text" class="form-control" value="<?php if ($aksi=="edit") { echo $edit['ck_mmea'];} ?>">
                    </div>
                    <div class="col-sm-2 text-left">
                      <label style="margin-top: 5.5px;">Cukai EA</label><br/>
                      <label style="margin-top: 5.5px;">Denda</label><br/>
                    </div>
                    <div class="col-sm-3">
                      <input name="ck_ea" type="text" class="form-control" value="<?php if ($aksi=="edit") { echo $edit['ck_ea'];} ?>">
                      <input name="da_ck" type="text" class="form-control" value="<?php if ($aksi=="edit") { echo $edit['da_ck'];} ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-1">
                      <select name="pre_jabatan" class="form-control">
                        <option><?php if ($aksi=="edit") { echo $edit['pre_jabatan'];} ?></option>
                        <option>Plh.</option>
                        <option>Plt.</option>
                        <option>a.n.</option>
                        <option>u.b.</option>
                      </select>
                    </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="jabatan" value="KEPALA KANTOR PENGAWASAN DAN PELAYANAN BEA DAN CUKAI TIPE MADYA PABEAN A DENPASAR" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Pejabat</label>
                    <div class="col-sm-10">
                      <select name="pejabat" class="form-control">
                        <option><?php if ($aksi=="edit") { echo $edit['pejabat'];} ?></option>
                        <option>Puguh Wiyatno</option>
                        <option>Agung Wibowo</option>
                        <option>I Nyoman P. Candra</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                      <textarea name="uraian" class="form-control" rows="5" style="resize: none;"><?php if ($aksi=="edit") { echo $edit['uraian'];} ?></textarea>
                    </div>
                  </div>

                  <div class="form-group row" <?php if ($aksi!="edit") {echo 'style="display:none"';}?>>
                    <label class="col-sm-2 col-form-label">Tanggal Jatuh Tempo</label>
                    <div class="col-sm-3">
                      
                      <div class="input-group date" id="billingdate" data-target-input="nearest">
                        <input type="text" name="tgl_jatuh_tempo" class="form-control datetimepicker-input" value="<?php if ($aksi=="edit") { echo date('d/m/Y');}else{ echo date('d/m/Y', strtotime($edit['tgl_jatuh_tempo']));} ?>" data-target="#billingdate"/>
                        <div class="input-group-append" data-target="#billingdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-7"></div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="text-align: center;">
                  <a href="?badan=stck1-form" class="btn btn-warning mr-1">Batal</a>

                  <?php 
                    if ($aksi=="edit") {
                      echo "<input type='submit' formnovalidate name='update-form-stck1' value='Simpan' class='btn btn-primary' />"; 
                    }else {
                      echo "<input type='submit' formnovalidate name='form-stck1' value='Simpan' class='btn btn-primary' />"; 
                    }
                  ?>
                  <!-- <a type="submit" class="btn btn-primary">Simpan</a> -->
                </div>
                <!-- /.card-footer -->
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

                <table id="example1" class="table table-bordered bg-light mb-5" style="font-size: 15px;">
                  <thead>
                  <tr>
                    <th width="10">No</th>
                    <th width="20">Jenis Dokumen</th>
                    <th width="10">Nomor Dokumen</th>
                    <th width="20">Tanggal Dokumen</th>
                    <th>NPWP / NPPBKC</th>
                    <th width="250">Nama Perusahaan</th>
                    <th>Tagihan</th>
                    <th width="20">Jatuh Tempo</th>
                    <th width="20">Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
      <?php
        $tagihanSql = "SELECT * FROM dok_penagihan where no_dok = '' and jns_dok = 'STCK-1' or kode_billing = '' and jns_dok = 'STCK-1' ";
        $tagihanQry = mysqli_query($con,$tagihanSql)  or die ("Query tagihan salah : ".mysqli_error());
        $nomor  = 0; 
        
        if ((mysqli_num_rows($tagihanQry)) > 0){
          while ($tagihan = mysqli_fetch_array($tagihanQry)) {
          $nomor++;
      ?>
                  <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $tagihan['jns_dok'];?></td>
                    <td><?php echo $tagihan['no_dok'];?></td>
                    <td><?php echo date('d-m-Y',strtotime($tagihan['tgl_dok']));?></td>
                    <td><?php if ($tagihan['npwp'] == "") { echo $tagihan['nppbkc'];}else{ echo $tagihan['npwp'];}?></td>
                    <td><?php echo $tagihan['nama_perusahaan'];?></td>
                    <td><?php echo format_rupiah($tagihan['tagihan']);?></td>
                    <td><?php echo date('d-m-Y',strtotime($tagihan['jatuh_tempo']));?></td>
                    <td><?php echo $tagihan['status'];?></td>
                    <td align="center">
                      <div class="btn-group">
                        <a href="?badan=data-del&aksi=dok_penagihan&id=<?php echo $tagihan['dok_penagihan_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')">
                          <i class="fas fa-times" style="padding-right: 1.5px; padding-left: 1.5px;"></i>
                        </a>
                        <a href="?badan=stck1-form&aksi=edit&id=<?php echo $tagihan['dok_penagihan_id']; ?>" class="btn btn-warning btn-xs">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="output/print-draft.php?aksi=stck1&id=<?php echo $tagihan['dok_penagihan_id']; ?>" class="btn btn-info btn-xs">
                          <i class="fas fa-print"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
      <?php } } ?>
                  </tbody>
                </table>
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
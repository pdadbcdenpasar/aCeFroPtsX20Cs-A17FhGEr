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

<?php 
if ($_GET['aksi']=="edit") {
  echo '<script type="text/javascript">',
     'validateFormSPPBP();',
     '</script>';
  $editSql="select * from dok_penagihan where dok_penagihan_id='".$_GET['id']."'";
  $editQry = mysqli_query($con,$editSql)  or die ("Query EDIT SPPBP salah : ".mysqli_error());
  $edit = mysqli_fetch_array($editQry);
  }

$nama = $_GET['nama'];
  echo '<script type="text/javascript">',
     'validateForm();',
     '</script>';
  $perusSql = "SELECT * from data_perusahaan where nm_perusahaan1='".$nama."'";
  $perusQry = mysqli_query($con,$perusSql)  or die ("Query Perusahaan sql salah : ".mysqli_error());
  $perus = mysqli_fetch_array($perusQry);
  
$sql = "select * from (select a.Kode, a.Nama_Perusahaan, a.Volume, a.Golongan, b.Jml_dppc, a.Jml_ck1a, b.Jml_dppc-a.Jml_ck1a as saldo , IF(a.Kode IS NOT NULL,1,0) AS drafted \n"
." FROM ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, dpita.Golongan AS Golongan,if(sum(dppc.Jumlah),sum(dppc.Jumlah),0) AS Jml_dppc \n"
." from (dpita left join dppc on((dpita.Kode = dppc.Kode))) where YEAR(dppc.Tanggal) = YEAR(CURDATE())-1 group by dpita.Kode) b \n"
." LEFT JOIN ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, dpita.Golongan AS Golongan,if(sum(ck1a.Jumlah),sum(ck1a.Jumlah),0) AS Jml_ck1a \n"
." from (dpita left join ck1a on((dpita.Kode = ck1a.Kode))) where YEAR(ck1a.Tanggal) = YEAR(CURDATE())-1 group by dpita.Kode) a ON b.Kode = a.Kode) c \n"
." where saldo !=0 and Nama_Perusahaan = '".$nama."' group by Kode";
$stmt = mysqli_query($con,$sql)  or die ("Query EDIT SPPBP salah : ".mysqli_error());

$total = 0;
while ($row = mysqli_fetch_array($stmt)) 
{

  $total += $row['saldo'];
}
  
?>  
    <!-- Main content -->
    <section class="content pb-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card mb-5">
              <div class="card-header">
                <h3 class="card-title">Rekam SPPBP</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No / Tanggal SPPBP</label>
                    <div class="col-sm-2">
                      <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">SPPBP -</span>
                    </div>
                    <input <?php if ($_GET['aksi']!="edit") {echo "disabled";}?> name="no_sppbp" type="text" class="form-control" value="<?php if ($_GET['aksi']=="edit") { echo $edit['no_dok'];} ?>">
                  </div>
                    </div>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="" placeholder="/WBC.13/KPP.MP.02/<?php echo date('Y'); ?>" readonly>
                    </div>
                    <div class="col-sm-1 text-center">
                      <label style="margin-top: 5px;">/</label>
                    </div>
                    <div class="col-sm-3">
                      <div class="input-group date" id="stckdate" data-target-input="nearest">
                        <input <?php if ($_GET['aksi']!="edit") {echo "disabled";}?> type="text" class="form-control datetimepicker-input" name="tgl_sppbp" value="<?php if ($_GET['aksi']!="edit") { echo '';}else{echo date('d/m/Y', strtotime($edit['tgl_dok']));} ?>" data-target="#stckdate"/>
                        <div class="input-group-append" data-target="#stckdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kode / Tanggal Billing</label>
                    <div class="col-sm-6">
                      <input <?php if ($_GET['aksi']!="edit") {echo "disabled";}?> name="kode_billing" type="text" class="form-control" value="<?php if ($_GET['aksi']=="edit") { echo $edit['kode_billing'];} ?>">
                    </div>
                    <div class="col-sm-1 text-center">
                      <label style="margin-top: 5px;">/</label>
                    </div>
                    <div class="col-sm-3">
                      <div class="input-group date" id="billingdate" data-target-input="nearest">
                        <input <?php if ($_GET['aksi']!="edit") {echo "disabled";}?> name="tgl_billing" type="text" class="form-control datetimepicker-input" value="<?php if ($_GET['aksi']!="edit") { echo '';}else{ echo date('d/m/Y', strtotime($edit['tgl_billing']));} ?>" data-target="#billingdate"/>
                        <div class="input-group-append" data-target="#billingdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
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
                      <input name="npwp" id="npwpsppbp" type="text" class="form-control" value="<?php if ($_GET['aksi']=="edit") { echo $edit['npwp'];}else{echo $perus['npwp'];} ?>">
                      <input name="nppbkc" id="nppbkcsppbp" type="text" class="form-control" value="<?php if ($_GET['aksi']=="edit") { echo $edit['nppbkc'];}else{echo $perus['no_nppbkc'];} ?>">
                      <input name="nama_perusahaan" type="text" class="form-control" value="<?php if ($_GET['aksi']=="edit") { echo $edit['nama_perusahaan'];}else{echo $perus['nm_perusahaan2'];} ?>">
                      <textarea rows="3" name="alamat" class="form-control" style="resize: none;"><?php if ($_GET['aksi']=="edit") { echo $edit['alamat'];}else{echo $perus['alamat'];} ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tagihan</label>
                    <div class="col-sm-2 text-left">
                      <label style="margin-top: 5.5px;">Biaya Pengganti</label>
                    </div>
                    <div class="col-sm-3">
                      <input name="tagihan" type="text" class="form-control" value="<?php if ($_GET['aksi']=="edit") { echo number_format($edit['tagihan']);} else{echo number_format(60*300*$total,0,',','.');} ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-1">
                      <select name="pre_jabatan" class="form-control">
                        <option><?php if ($_GET['aksi']=="edit") { echo $edit['pre_jabatan'];} ?></option>
                        <option>Plh.</option>
                        <option>Plt.</option>
                        <option>a.n.</option>
                        <option>u.b.</option>
                      </select>
                    </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="KEPALA KANTOR PENGAWASAN DAN PELAYANAN BEA DAN CUKAI TIPE MADYA PABEAN A DENPASAR" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Pejabat</label>
                    <div class="col-sm-10">
                      <select class="form-control">
                        <option><?php if ($_GET['aksi']=="edit") { echo $edit['pejabat'];} ?></option>
                        <option>Puguh Wiyatno</option>
                        <option>Agung Wibowo</option>
                        <option>I Nyoman P. Candra</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row" style="<?php if ($_GET['aksi']!="edit") {echo "display:none;";}?>">
                    <label class="col-sm-2 col-form-label">Jatuh Tempo</label>
                    <div class="col-sm-3">
                      <div class="input-group date" id="billingdate" data-target-input="nearest">
                        <input <?php if ($_GET['aksi']!="edit") {echo "disabled";}?> name="tgl_billing" type="text" class="form-control datetimepicker-input" value="<?php if ($_GET['aksi']!="edit") { echo '';}else{ echo date('d/m/Y', strtotime($edit['tgl_billing']));} ?>" data-target="#billingdate"/>
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
                  <a type="button" class="btn btn-warning">Batal</a>
                  <a type="submit" class="btn btn-primary">Simpan</a>
                </div>
                <!-- /.card-footer -->
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

                <table id="example1" class="table table-bordered bg-light"  style="font-size: 15px;">
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
                  <tr>
                    <td>1</td>
                    <td>SPPBP</td>
                    <td>07</td>
                    <td>11-12-2021</td>
                    <td>080212101021235</td>
                    <td>PT. SPENCER INDONESIA INTERNATIONAL</td>
                    <td>308.860.200</td>
                    <td>09-02-2021</td>
                    <td>-</td>
                    <td align="center">
                      <div class="btn-group">
                        <a class="btn btn-danger btn-xs">
                          <i class="fas fa-times" style="padding-right: 1.5px; padding-left: 1.5px;"></i>
                        </a>
                        <a class="btn btn-warning btn-xs">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-info btn-xs">
                          <i class="fas fa-print"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
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
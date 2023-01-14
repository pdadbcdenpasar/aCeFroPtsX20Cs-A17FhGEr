<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Import Data Billing</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Import Data Billing</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card collapsed-card">
              <div class="card-header">
                <h3 class="card-title">History Import Data</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover" style="font-size: 12px;">
                  <thead>
                  <tr>
                    <th align="center">Dokumen</th>
                    <th align="center">Januari</th>
                    <th align="center">Februari</th>
                    <th align="center">Maret</th>
                    <th align="center">April</th>
                    <th align="center">Mei</th>
                    <th align="center">Juni</th>
                    <th align="center">Juli</th>
                    <th align="center">Agustus</th>
                    <th align="center">September</th>
                    <th align="center">Oktober</th>
                    <th align="center">November</th>
                    <th align="center">Desember</th>
                  </tr>
                  </thead>
                  <tbody>
      <?php

        $ck5Sql = "SELECT distinct(Dokumen) as Kode_Dok, \n"
        ." MAX( IF( MONTH(Tgl_Bayar) = 1, date_format(Tgl_Bayar,'%d-%Y'), '-')) AS januari, \n"
        ." MAX( IF( MONTH(Tgl_Bayar) = 2, date_format(Tgl_Bayar,'%d-%Y'), '-')) AS februari, \n"
        ." MAX( IF( MONTH(Tgl_Bayar) = 3, date_format(Tgl_Bayar,'%d-%Y'), '-')) AS maret, \n"
        ." MAX( IF( MONTH(Tgl_Bayar) = 4, date_format(Tgl_Bayar,'%d-%Y'), '-')) AS april, \n"
        ." MAX( IF( MONTH(Tgl_Bayar) = 5, date_format(Tgl_Bayar,'%d-%Y'), '-')) AS mei, \n"
        ." MAX( IF( MONTH(Tgl_Bayar) = 6, date_format(Tgl_Bayar,'%d-%Y'), '-')) AS juni, \n"
        ." MAX( IF( MONTH(Tgl_Bayar) = 7, date_format(Tgl_Bayar,'%d-%Y'), '-')) AS juli, \n"
        ." MAX( IF( MONTH(Tgl_Bayar) = 8, date_format(Tgl_Bayar,'%d-%Y'), '-')) AS agustus, \n"
        ." MAX( IF( MONTH(Tgl_Bayar) = 9, date_format(Tgl_Bayar,'%d-%Y'), '-')) AS september, \n"
        ." MAX( IF( MONTH(Tgl_Bayar) = 10, date_format(Tgl_Bayar,'%d-%Y'), '-')) AS oktober, \n"
        ." MAX( IF( MONTH(Tgl_Bayar) = 11, date_format(Tgl_Bayar,'%d-%Y'), '-')) AS november, \n"
        ." MAX( IF( MONTH(Tgl_Bayar) = 12, date_format(Tgl_Bayar,'%d-%Y'), '-')) AS desember \n"
        ." FROM data_billing \n"
        ." where YEAR(Tgl_Bayar) = YEAR(CURDATE()) \n"
        //." where YEAR(Tgl_Bayar) = '2017'\n"
        ." GROUP BY dokumen";
        $ck5Qry = mysqli_query($con,$ck5Sql)  or die ("Query ck5 Query salah : ".mysqli_error());
        $nomor  = 0; 
        $nomor++;
        if ((mysqli_num_rows($ck5Qry)) > 0){
                while ($datack5 = mysqli_fetch_array($ck5Qry)) {

      ?>
                  <tr>
                    <td align="center"><?php echo $datack5['Kode_Dok']?></td>
                    <td align="center"><?php echo $datack5['januari'];?></td>
                    <td align="center"><?php echo $datack5['februari'];?></td>
                    <td align="center"><?php echo $datack5['maret'];?></td>
                    <td align="center"><?php echo $datack5['april'];?></td>
                    <td align="center"><?php echo $datack5['mei'];?></td>
                    <td align="center"><?php echo $datack5['juni'];?></td>
                    <td align="center"><?php echo $datack5['juli'];?></td>
                    <td align="center"><?php echo $datack5['agustus'];?></td>
                    <td align="center"><?php echo $datack5['september'];?></td>
                    <td align="center"><?php echo $datack5['oktober'];?></td>
                    <td align="center"><?php echo $datack5['november'];?></td>
                    <td align="center"><?php echo $datack5['desember'];?></td>
                  </tr>
        <?php }} ?>  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Billing</h3>
              </div>

        <?php
//memanggil file excel_reader
require "php-excel-reader/excel_reader2.php";
require "php-excel-reader/SpreadsheetReader.php";

//jika tombol import ditekan
if(isset($_POST['submit'])){

  for ($x=1;$x <= 2; $x++){
  $target = basename($_FILES['filebilling' . $x]['name']);
  move_uploaded_file($_FILES['filebilling' . $x]['tmp_name'], $target);
    
    //$data = new Spreadsheet_Excel_Reader($_FILES['filebilling' . $x]['name'],false);
  $data = new SpreadsheetReader($_FILES['filebilling' . $x]['name'],false);

//    menghitung jumlah baris file xls
      //$baris = $data->rowcount($sheet_index=0);
    
//    jika kosongkan data dicentang jalankan kode berikut
    $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
    if($drop == 1){
//             kosongkan tabel billing
             $truncate ="TRUNCATE TABLE data_billing";
             mysqli_query($con,$truncate);
    }
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    //for ($i=2; $i<=$baris; $i++)
    //{
//       membaca data (kolom ke-1 sd terakhir)
$col=0;
foreach ($data as $baris) {

  $no = $baris[0]; 
  $kode_billing  = $baris[1];
  $tgl_billing1  = $baris[2];
  $tgl_billing  = date('Y-m-d',strtotime($tgl_billing1));
  $expired_billing1 = $baris[3];
  $expired_billing = date('Y-m-d h:i:s' ,strtotime($expired_billing1));
  $status  = $baris[4];
  $kd_kantor  = $baris[5];
  $dokumen  = $baris[6];
  $no_dok  = $baris[7];
  $tgl_dok1  = $baris[8];
  $tgl_dok  = date('Y-m-d',strtotime($tgl_dok1));
  $npwp_wajib_bayar  = $baris[9];
  $nama_wajib_bayar  = $baris[10];
  $total_pungutan  = $baris[11];
  $total_dibayar  = $baris[12];
  $ntpn  = $baris[13];
  $ntb  = $baris[14];
  $tgl_bayar1  = $baris[15];
  $tgl_bayar  = date('Y-m-d h:i:s',strtotime($tgl_bayar1));
  $bank  = $baris[16];
  $npwp_pemberitahu  = $baris[17];
  $bm  = $baris[18];
  $ppnimp  = $baris[19];
  $npwpppnimp  = $baris[20];
  $pphimp  = $baris[21];
  $npwppphimp  = $baris[22];
  $ppnbm  = $baris[23];
  $npwpppnbm  = $baris[24];
  $dendapab  = $baris[25];
  $bmkite  = $baris[26];
  $bmad  = $baris[27];
  $bmi  = $baris[28];
  $bmtp  = $baris[29];
  $bmspm  = $baris[30];
  $bmdtp  = $baris[31];
  $pablain  = $baris[32];
  $bk  = $baris[33];
  $dendabk  = $baris[34];
  $bungabk  = $baris[35];
  $cukaiea  = $baris[36];
  $cukaimmea  = $baris[37];
  $cukaiht  = $baris[38];
  $dendacukai  = $baris[39];
  $cklain  = $baris[40];
  $pr  = $baris[41];
  $ppndn  = $baris[42];
  $npwpppndn  = $baris[43];
  $bungappn  = $baris[44];
  $dendattt  = $baris[45];
  $pnbp  = $baris[46];
  
  if ($col != 0){
      $query = "REPLACE INTO data_billing set No='$no', Kode_Billing='$kode_billing', Tgl_Billing='$tgl_billing', Expired_Billing='$expired_billing', Status='$status', Kd_Kantor='$kd_kantor', Dokumen='$dokumen', No_Dok='$no_dok', Tgl_Dok='$tgl_dok', NPWP_Wajib_Bayar='$npwp_wajib_bayar', Nama_Wajib_Bayar='$nama_wajib_bayar', Total_Pungutan='$total_pungutan', Total_Dibayar='$total_dibayar', NTPN='$ntpn', NTB='$ntb', Tgl_Bayar='$tgl_bayar', Bank='$bank', NPWP_Pemberitahu='$npwp_pemberitahu', BM='$bm', PPN_Imp='$ppnimp', NPWP_PPN_Imp='$npwpppnimp', PPH_Imp='$pphimp', NPWP_PPH_Imp='$npwppphimp', PPNBM='$ppnbm', NPWP_PPNBM='$npwpppnbm', Denda_Pab='$dendapab', BM_KITE='$bmkite', BMAD='$bmad', BMI='$bmi', BMTP='$bmtp', BMSPM='$bmspm', BMDTP='$bmdtp', Pab_Lain_Bunga='$pablain', BK='$bk', Denda_BK='$dendabk', Bunga_BK='$bungabk', Cukai_EA='$cukaiea', Cukai_MMEA='$cukaimmea', Cukai_HT='$cukaiht', Denda_Cukai='$dendacukai', Cukai_Lain_Bunga='$cklain', Pajak_Rokok='$pr', PPN_DN_Lokal='$ppndn', NPWP_PPN_DN='$npwpppndn', Bunga_PPN='$bungappn', Dendan_Tertentu='$dendattt', PNBP='$pnbp'";
      $hasil = mysqli_query($con,$query);
  }
  
  $col++;
  }    
  if(!$hasil){
//          jika import gagal
          die(mysqli_error());
      }else{
//          jika impor berhasil
          echo "Data file " .$x. " " .$target. " berhasil diimpor.";
      echo "<br>";
    }           
//    hapus file xls yang udah dibaca
    unlink($_FILES['filebilling' . $x]['name']);
} 
  echo "<a href='index.php?badan=update-rekap-harian' class='btn btn-warning align='right'>Update Data</a>";
}

?>
            <form name="myForm" id="myForm" onSubmit="return validateFormImportBilling()" action="index.php?badan=import-data-billing" method="post" enctype="multipart/form-data" class="form-horizontal">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-5">
                    <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile" accept="application/vnd.ms-excel">Choose file</label>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-5">
                    <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile1">
                      <label class="custom-file-label" for="exampleInputFile1" accept="application/vnd.ms-excel">Choose file</label>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-5 pl-3">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1" name="drop" value="1">
                      <label class="form-check-label" for="exampleCheck1"><b>Dicentang jika dilakukan penggantian data secara keseluruhan</b></label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer" style="text-align: center;">
                <a href="home.php" class="btn btn-warning">Batal</a>
                <a type="submit" class="btn btn-primary">Simpan</a>
              </div>
              <!-- /.card-footer -->
            </form>
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
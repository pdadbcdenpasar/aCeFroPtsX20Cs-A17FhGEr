<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rekapitulasi Penerimaan Bulanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Rekapitulasi Penerimaan Bulanan</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Rekapitulasi Penerimaan Negara Priode Bulan 
                  <?php echo getBulan(date('m'));echo " " . date('Y');?>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <div class="row pl-4 py-4">
                <div class="col-sm-2">
                  <form method="post" enctype="multipart/form-data">
                    <select class="form-control">
                      <?php
                        for($i = 1 ; $i <= 12; $i++) {

                          $bulan = getBulan($i);

                          if( $i == date('m') ){
                            echo "<option value='$i' selected='selected'>" . $bulan . "</option>";
                          }else {
                            echo "<option value='$i'>" . $bulan . "</option>";
                          }}

                          echo "</select>";
                      ?>
                    </select>
                </div>
                <div class="col-sm-1">
                  <select class="form-control">
                    <?php
                      $mulai= date('Y') - 3;
                      for($i = $mulai;$i<$mulai + 31;$i++){
                        if ($i == date('Y')) {
                          echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                        }
                      echo '<option value="'.$i.'">'.$i.'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="col-sm-2">
                    <input type='submit' formnovalidate name='form-stck1' value='Tampilkan' class='btn btn-primary' />
                  </form>
                </div>
                </div>
                <table id="example3" class="table table-bordered border-top text-nowrap" style="font-size: 11px;">
                  <thead>
                  <tr>
                    <th rowspan="2" align="center">Jenis Dokumen</th>
                    <th rowspan="2" align="center">Jumlah Dokumen</th>
                    <th colspan="5" align="center">Penerimaan Pabean</th>
                    <th rowspan="2" align="center">Jumlah Penerimaan Pabean</th>
                    <th colspan="5" align="center">Penerimaan Cukai</th>
                    <th rowspan="2" align="center">Jumlah Penerimaan Cukai</th>
                    <th colspan="3" align="center">Penerimaan Pajak</th>
                    <th rowspan="2" align="center">Jumlah Penerimaan Pajak</th>
                    <th rowspan="2" align="center">Jumlah Penerimaan Pabean dan Cukai</th>
                    <th rowspan="2" align="center">Total Penerimaan</th>
                  </tr>
                  <tr>
                    <th align="center">Bea Masuk</th>
                    <th align="center">Bea Keluar</th>
                    <th align="center">Bunga</th>
                    <th align="center">Denda Administrasi</th>
                    <th align="center">BMTP</th>
                    <th align="center">Hasil Tembakau</th>
                    <th align="center">Etil Alkohol</th>
                    <th align="center">MMEA</th>
                    <th align="center">Cukai LAinnya</th>
                    <th align="center">Denda Administrasi</th>
                    <th align="center">PPN</th>
                    <th align="center">PPnBM</th>
                    <th align="center">PPh Pasal 22</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td align="center">1</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">LANGGENG KREASI JAYAPRIMA</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rekapitulasi Penerimaan Negara Priode Tahun <?php echo date('Y'); ?> </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="example3" class="table table-bordered text-nowrap" style="font-size: 11px;">
                  <thead>
                  <tr>
                    <th colspan="7" class="text-center">REALISASI PENERIMAAN PABEAN</th>
                    <th rowspan="2" class="text-center">Jumlah Pungutan Pabean (Rp.)</th>
                    <th colspan="8" class="text-center">REALISASI PENERIMAAN CUKAI</th>
                    <th rowspan="2" class="text-center">Jumlah Pungutan Cukai (Rp.)</th>
                    <th rowspan="2" class="text-center">Realisasi Cukai (%)</th>
                    <th rowspan="2" class="text-center">Jumlah Pungutan Bea Cukai (Rp.)</th>
                    <th rowspan="2" class="text-center">Realisasi Total (%)</th>
                  </tr>
                  <tr>
                    <th class="text-center">Bulan</th>
                    <th class="text-center">Bea Masuk (Rp.)</th>
                    <th class="text-center">Realisasi BM (%)</th>
                    <th class="text-center">Bea Keluar (Rp.)</th>
                    <th class="text-center">Realisasi BK (%)</th>
                    <th class="text-center">Denda</th>
                    <th class="text-center">BMTP</th>
                    <th class="text-center">Cukai MMEA (Rp.)</th>
                    <th class="text-center">Realisasi Cukai MMEA (%)</th>
                    <th class="text-center">Cukai HT (Rp.)</th>
                    <th class="text-center">Realisasi Cukai HT  (%)</th>
                    <th class="text-center">Cukai EA (Rp.)</th>
                    <th class="text-center">Realisasi Cukai EA (%)</th>
                    <th class="text-center">Denda (Rp.)</th>
                    <th class="text-center">Cukai Lainnya (Rp.)</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
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
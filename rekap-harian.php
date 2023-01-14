<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rekapitulasi Penerimaan Harian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Rekapitulasi Penerimaan Harian</li>
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
                <h3 class="card-title">Rekapitulasi Penerimaan Harian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive pl-0">
                <div class="row pl-4 pb-4">
                <div class="col-sm-2">
                  <form name="stck-1" id="myForm" onSubmit="return validateRekapHarian()" action="?badan=list-dppc" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="input-group date" id="stckdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#stckdate"/>
                        <div class="input-group-append" data-target="#stckdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                </div>
                <div class="col-sm-2">
                    <input type='submit' formnovalidate name='form-stck1' value='Tampilkan' class='btn btn-primary' />
                  </form>
                </div>
                </div>
                <table class="table table-bordered border-top text-nowrap" style="font-size: 11px;">
                  <thead>
                  <tr>
                    <th rowspan="2" style="text-align:center">Nomor</th>
                    <th rowspan="2" style="text-align:center">Tanggal</th>
                    <th colspan="3" style="text-align:center">Dokumen Dasar Pembayaran</th>
                    <th rowspan="2" style="text-align:center">Kode Billing</th>
                    <th colspan="2" style="text-align:center">Nomor</th>
                    <th rowspan="2" style="text-align:center">Tanggal</th>
                    <th colspan="5" style="text-align:center">Penerimaan Pabean</th>
                    <th rowspan="2" style="text-align:center">Jumlah Penerimaan Pabean</th>
                    <th colspan="5" style="text-align:center">Penerimaan Cukai</th>
                    <th rowspan="2" style="text-align:center">Jumlah Penerimaan Cukai</th>
                    <th colspan="6" style="text-align:center">Penerimaan Pajak</th>
                    <th rowspan="2" style="text-align:center">Jumlah Penerimaan Pajak</th>
                    <th rowspan="2" style="text-align:center">Jumlah Penerimaan Pabean dan Cukai</th>
                    <th rowspan="2" style="text-align:center">Total Penerimaan</th>
                    <th rowspan="2" style="text-align:center">Keterangan</th>
                    <th rowspan="2" style="text-align:center">Netto</th>
                    <th rowspan="2" style="text-align:center">Brutto</th>
                    <th rowspan="2" style="text-align:center">Jalur</th>
                  </tr>
                  <tr>
                    <th style="text-align:center">Jenis Dokumen</th>
                    <th style="text-align:center">Nomor</th>
                    <th style="text-align:center">Tanggal</th>
                    <th style="text-align:center">NTPN</th>
                    <th style="text-align:center">NTB</th>
                    <th style="text-align:center">Bea Masuk</th>
                    <th style="text-align:center">Bea Keluar</th>
                    <th style="text-align:center">Bunga</th>
                    <th style="text-align:center">Denda Administrasi</th>
                    <th style="text-align:center">BMTP</th>
                    <th style="text-align:center">Hasil Tembakau</th>
                    <th style="text-align:center">Etil Alkohol</th>
                    <th style="text-align:center">MMEA</th>
                    <th style="text-align:center">Cukai Lainnya</th>
                    <th style="text-align:center">Denda Administrasi</th>
                    <th style="text-align:center">Devisa Bebas</th>
                    <th style="text-align:center">Devisa USD</th>
                    <th style="text-align:center">PPN</th>
                    <th style="text-align:center">PPnBM</th>
                    <th style="text-align:center">PPh Pasal 22</th>
                    <th style="text-align:center">PPN HT</th>
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
                    <td align="center">96.611.191.200</td>
                    <td align="center">96.611.191.200</td>
                    <td align="center">996.611.191.200</td>
                    <td align="center">996.611.191.200</td>
                  </tr>
                  </tbody>
                </table>
                <table id="example3" class="table table-bordered border-top text-nowrap" style="font-size: 11px; margin-top: 50px;">
                  <thead>
                  <tr>
                    <?php 

                      $arr=array('','Bea Masuk', 'Bea Keluar','Pabean Lain/Bunga', 'Denda Pabean', 'BMTP', 'Total Penerimaan Pabean', 'Cukai HT','Cukai EA', 'Cukai MMEA','Cukai Lain/Bunga', 'Denda Cukai','Total Penerimaan Cukai', 'Devisa','Devisa USD', 'PPN','PPNBM', 'PPH','PPNHT', 'Total Penerimaan Pajak','Total Penerimaan Pabean dan Cukai', 'Total Penerimaan','Netto','Bruto');

                      for ($a = 0; $a <= 23; $a++) { 

                    ?>
                  <th style="text-align:center">

                    <?php echo $arr[$a];?>
                      
                  </th>

                  <?php } ?>

                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td align="left">TOTAL PENERIMAAN HARI INI</td>
                    <?php 
                      $arr=array(13,14,22,23);
                      for ($x = 1; $x <= 23; $x++) { 
                        if (in_array($x,$arr)){?>
                    <td align="right">
                      <?php echo number_format($total[$x],2);?></td>
                    <?php } else { ?>
                    <td align="right"><?php echo $total[$x];?></td>
                    <?php }} ?>
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
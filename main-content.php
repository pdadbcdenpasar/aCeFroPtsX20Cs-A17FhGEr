<?php

include 'config/connection.php';

$totalpaj_Sql ="select sum(PPN_Imp) as ppn, sum(PPNBM) as ppnbm, sum(PPH_Imp) as pph, sum(Pajak_Rokok) as ppnht,sum(PPN_Imp+PPNBM+PPH_Imp+Pajak_Rokok) as pajak from data_billing where year(Tgl_Bayar) = year(curdate())";
$totalpaj_Qry = mysqli_query($con,$totalpaj_Sql)  or die ("Query Pajak Query salah : ".mysqli_error());

$totalPaj = mysqli_fetch_array($totalpaj_Qry);

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 col-12">
            <div class="info-box bg-info">
              <marquee class="mx-3" style="margin-top: 22px;"><p style="font-family: Arial; font-size: 12pt">Data per tanggal 21 Mei 2021* Target penerimaan sesuai KEP-39/WBC.13/2021 Tgl. 04 Februari 2021 : Bea Masuk Rp. 4,000,965,000 , Bea Keluar Rp. 0 , MMEA Rp. 627,060,925,000 , EA Rp. 15,338,710,000 , Hasil Tembakau Rp. 16,387,073,000</p></marquee>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="info-box bg-secondary">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-boxes"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Pabean</b></span>
                <span style="margin-top: -5px;">
                  1 Milyar
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <div class="card" style="margin-top: -15px">
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="pabeanChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 572px;" width="715" height="312" class="chartjs-render-monitor"></canvas>
                <div class="mt-4 text-center small" style="margin-bottom: 18px;">
                  <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> Bea Masuk
                  </span>
                  <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Bea Keluar
                  </span>
                  <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Denda Adm. Pabean
                  </span>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="info-box bg-secondary">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-wine-bottle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Cukai</b></span>
                <span style="margin-top: -5px;">
                  20 Milyar
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <div class="card" style="margin-top: -15px; ">
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="cukaiChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 572px;" width="715" height="312" class="chartjs-render-monitor"></canvas>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> Cukai MMEA
                  </span>
                  <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Cukai HT
                  </span>
                  <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Cukai Lainnya
                  </span><br>
                  <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Denda Adm. Cukai
                  </span>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->

          <div class="col-lg-4">
            <div class="info-box bg-secondary">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>PDRI</b></span>
                <span style="margin-top: -5px;">
                  <?php echo number_format(($totalPaj['pajak']/1000000000),2)." Milyar";?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <div class="card" style="margin-top: -15px">
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="PDRIChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 572px;" width="715" height="312" class="chartjs-render-monitor"></canvas>
                <div class="mt-4 text-center small" style="margin-bottom: 18px;">
                  <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> PPN Impor
                  </span>
                  <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> PPnBM
                  </span>
                  <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> PPH Impor
                  </span>
                  <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> PPN HT
                  </span>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Rekap Laporan KPPBC TMP A Denpasar</h5>

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 px-3">
                    <p class="text-center">
                      <strong>Target dan Realisasi Penerimaan Tahun 2021</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="visitors-chart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                    <div class="mt-4 text-left small px-4 pb-2">
                      <span class="mr-2">
                          <i class="fas fa-dice-one text-warning"></i> &nbsp;Target
                      </span>
                      <span class="mr-2">
                          <i class="fas fa-dice-one text-primary"></i> &nbsp;Realisasi
                      </span>
                    </div>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL PENERIMAAN PABEAN</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL PENERIMAAN CUKAI</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL PENERIMAAN PDRI</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">TOTAL PENERIMAAN TAHUN 2021</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Rekap Laporan KPPBC TMP A Denpasar</h5>

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 px-3">
                    <p class="text-center">
                      <strong>Pemasukan (DP2C) dan Pengeluaran (CK-1A) Cukai</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="cukai-chart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                    <div class="mt-4 text-left small px-4 pb-2">
                      <span class="mr-2">
                          <i class="fas fa-dice-one text-warning"></i> &nbsp;Target
                      </span>
                      <span class="mr-2">
                          <i class="fas fa-dice-one text-primary"></i> &nbsp;Realisasi
                      </span>
                    </div>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
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
                  0.5 Milyar
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
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Prediksi & Realisasi Penerimaan 2020</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="sales-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 572px;" width="715" height="312" class="chartjs-render-monitor"></canvas>
                <div class="mt-4 text-center small">
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

          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Prediksi & Realisasi Penerimaan 2021</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="visitors-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 572px;" width="715" height="312" class="chartjs-render-monitor"></canvas>
                <div class="mt-4 text-center small">
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
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
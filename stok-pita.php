
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stok Pita Cukai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Stok Pita Cukai</li>
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
                <h3 class="card-title">Stok Pita Cukai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Cetak
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a class="dropdown-item" href="#modalCK1A" data-toggle="modal">Tanda Terima CK-1A</a></li>
                    <li><a class="dropdown-item" href="output/print-rekap00.php">Rekap Pengeluaran&Pemasukan MMEA</a></li>
                  <!--   <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>!-->
                  </ul>
                </div>

                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="110">Kode</th>
                    <th width="400">Nama Perusahaan</th>
                    <th width="80">Volume</th>
                    <th width="50">Golongan</th>
                    <th>Jml. Masuk</th>
                    <th>Jml. Keluar</th>
                    <th width="100">Saldo (lembar)</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php
                    $saldoSql = "SELECT a.*, b.* \n"
                      . ", IF(a.Kode IS NOT NULL,1,0) AS drafted \n"
                    . "FROM ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, \n"
                    . "dpita.Golongan AS Golongan,if(sum(dppc.Jumlah),sum(dppc.Jumlah),0) AS Jml_dppc \n"
                    . "from (dpita left join dppc on((dpita.Kode = dppc.Kode))) where YEAR(dppc.Tanggal) = YEAR(CURDATE()) group by dpita.Kode) b \n"
                    . "  LEFT  JOIN ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, \n"
                    . "dpita.Golongan AS Golongan,if(sum(ck1a.Jumlah),sum(ck1a.Jumlah),0) AS Jml_ck1a \n"
                    . "from (dpita left join ck1a on((dpita.Kode = ck1a.Kode))) where YEAR(ck1a.Tanggal) = YEAR(CURDATE()) group by dpita.Kode \n"
                    . "       ) a ON b.Kode = a.Kode";
                    $saldoQry = mysqli_query($con,$saldoSql)  or die ("Query DPPCsql salah : ".mysqli_error());
                  ?>
                    <td>AKAR-HPTL100</td>
                    <td>SPENCER INDONESIA INTERNATIONAL PT</td>
                    <td>4</td>
                    <td>X</td>
                    <td>Win 95+</td>
                    <td>4</td>
                    <td>X</td>
                  </tr>
                  </tbody>
                </table>
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
  <!-- /.content-wrapper
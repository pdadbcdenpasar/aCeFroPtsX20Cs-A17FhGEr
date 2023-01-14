
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SPPBP</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">SPPBP</li>
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
                <h3 class="card-title">SPPBP</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
      <?php
        // include_once("config.php");
        //$perusSql = "SELECT * from data_perusahaan";
        $perusSql = "select * from (select a.Kode, a.Nama_Perusahaan, a.Volume, a.Golongan, b.Jml_dppc, a.Jml_ck1a, b.Jml_dppc-a.Jml_ck1a as saldo , IF(a.Kode IS NOT NULL,1,0) AS drafted \n"
        ." FROM ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, dpita.Golongan AS Golongan,if(sum(dppc.Jumlah),sum(dppc.Jumlah),0) AS Jml_dppc \n"
        ." from (dpita left join dppc on((dpita.Kode = dppc.Kode))) where YEAR(dppc.Tanggal) = YEAR(CURDATE())-1 group by dpita.Kode) b \n"
        ." LEFT JOIN ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, dpita.Golongan AS Golongan,if(sum(ck1a.Jumlah),sum(ck1a.Jumlah),0) AS Jml_ck1a \n"
        ." from (dpita left join ck1a on((dpita.Kode = ck1a.Kode))) where YEAR(ck1a.Tanggal) = YEAR(CURDATE())-1 group by dpita.Kode) a ON b.Kode = a.Kode) c \n"
        ." where saldo !=0 and Nama_Perusahaan not in (select nm_perusahaan from sppbp where YEAR(tgl_p3c) = YEAR(CURDATE())-1 group by nm_perusahaan) group by Nama_Perusahaan";
        $perusQry = mysqli_query($con,$perusSql)  or die ("Query Perusahaan sql salah : ".mysqli_error());
        
        $nomor = 1;
        if ((mysqli_num_rows($perusQry)) > 0){
          while ($perus = mysqli_fetch_array($perusQry)) {
      ?>
                  <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $perus['Nama_Perusahaan'];?></td>
                    <td>
                      <div class="btn-group">
                        <a href="?badan=sppbp-form&aksi=sppbp&nama=<?php echo $perus['Nama_Perusahaan']; ?>" class="btn btn-success btn-xs">
                          <i class="fas fa-edit"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
      <?php $nomor++; }} ?>
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
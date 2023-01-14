<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input DP2C/CK-1A</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Input DP2C/CK-1A</li>
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
                <h3 class="card-title">Input Stok Pita Cukai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="150">Kode</th>
                    <th width="450">Nama Perusahaan</th>
                    <th>Volume</th>
                    <th>Golongan</th>
                    <th width="100">HJE</th>
                    <th>Keluar / Masuk</th>
                  </tr>
                  </thead>
                  <tbody>
      <?php

        $saldoSql = "SELECT * from dpita";
        $saldoQry = mysqli_query($con, $saldoSql)  or die ("Query DPPCsql salah : ".mysqli_error());
        
        $nomor  = 0; 
        $nomor++;
        if ((mysqli_num_rows($saldoQry)) > 0){
          while ($saldopita = mysqli_fetch_array($saldoQry)) {
      ?>
                  <tr>
                    <td><?php echo $saldopita['Kode'];?></td>
                    <td><?php echo $saldopita['Nama_Perusahaan'];?></td>
                    <td><?php echo $saldopita['Volume'];?></td>
                    <td><?php echo $saldopita['Golongan'];?></td>
                    <td><?php echo $saldopita['hje'];?></td>
                    <td align="center">
                      <div class="btn-group">
                        <a href="?badan=add-dppc&aksi=dppc&kode=<?php echo $saldopita['Kode']; ?>" class="btn btn-success btn-xs" title="Input DP2C">
                          <i class="fas fa-plus"></i>
                        </a>
                        <a href="?badan=add-ck1a&aksi=ck1a&kode=<?php echo $saldopita['Kode']; ?>" class="btn btn-danger btn-xs" title="Input CK1A" >
                          <i class="fas fa-minus"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
      <?php
          }
        } 
      ?>
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
  <!-- /.content-wrapper -->
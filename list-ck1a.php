<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Pengeluaran Pita Cukai (CK-1A)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Pengeluaran Pita Cukai (CK-1A)</li>
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
                <h3 class="card-title">List Pengeluaran Pita Cukai (CK-1A)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                <div class="col-sm-4">
                  <form name="stck-1" id="myForm" onSubmit="return validateForm()" action="?badan=list-dppc" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-clock"></i></span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservation" name="tgltes">
                    </div>
                </div>
                <div class="col-sm-2">
                    <input type='submit' formnovalidate name='form-stck1' value='Simpan' class='btn btn-primary' />
                  </form>
                </div>
                </div>
                <?php 
                  if(isset($_POST['form-stck1'])){ 
                    $asd = $_POST['tgltes'];
                    $abc = explode(" - ", $asd);
                    print_r($abc);
                    $date1 = date("Y-m-d", strtotime($abc[0]));
                    $date2 = date("Y-m-d", strtotime($abc[1]));
                  }
                ?>

                <table id="example1" class="table table-bordered table-hover" style="font-size: 14px;">
                  <thead>
                  <tr>
                    <th width="10%">Kode</th>
                    <th width="24%">Nama Perusahaan</th>
                    <th>Volume</th>
                    <th>Gol.</th>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Jml. lembar</th>
                    <th>NIP Pegawai</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>ARPA-HPTL100</td>
                    <td>SPENCER INDONESIA INTERNATIONAL PT</td>
                    <td>9000</td>
                    <td>HPTL</td>
                    <td>000385/</td>
                    <td>99-99-9999</td>
                    <td>4000</td>
                    <td>199905202018121003</td>
                    <td>Lorem ipsum dolor sit </td>
                    <td align="center">
                      <div class="btn-group">
                        <a class="btn btn-danger btn-xs">
                          <i class="fas fa-times" style="padding-right: 2.5px; padding-left: 2.5px;"></i>
                        </a>
                        <a class="btn btn-warning btn-xs">
                          <i class="fas fa-edit"></i>
                        </a>
                        </a>
                      </div>
                    </td>
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
  <!-- /.content-wrapper -->
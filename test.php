				<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			<form name="stck-1" id="myForm" onSubmit="return validateForm()" action="?badan=test" method="post" enctype="multipart/form-data" class="form-horizontal">
				<div class="input-group">
			      <div class="input-group-prepend">
			        <span class="input-group-text"><i class="far fa-clock"></i></span>
			      </div>
			      <input type="text" class="form-control float-right" id="reservation" name="tgltes">
			    </div>
				<input type='submit' formnovalidate name='form-stck1' value='Simpan' class='btn btn-primary' />
			</form>

<?php 

	if(isset($_POST['form-stck1'])){ 
		$asd = $_POST['tgltes'];
		$abc = explode(" - ", $asd);
		print_r($abc);
		$date1 = date("Y-m-d", strtotime($abc[0]));
		$date2 = date("Y-m-d", strtotime($abc[1]));

		echo $date1." ".$date2;

	}

?>
                <!-- <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama Perusahaan</th>
                    <th>Volume</th>
                    <th>Gol.</th>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Jumlah (lbr)</th>
                    <th>NIP Pegawai</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet Explorer 4.0</td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                    <td>Trident</td>
                    <td>Internet Explorer 4.0</td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                  </tbody>
                </table> -->
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

				
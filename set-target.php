<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penyesuaian Target</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Penyesuaian Target</li>
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
                <h3 class="card-title">Daftar Target Penerimaan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>No. Keputusan</th>
                    <th>Tgl. Keputusan</th>
                    <th>Target BM</th>
                    <th>Target BK</th>
                    <th>Target MMEA</th>
                    <th>Target HT</th>
                    <th>Status</th>
                    <th>Set Active</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet Explorer 4.0</td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>Win 95+</td>
                    <td> 4</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <form class="form-horizontal">
            <div class="card collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Rekam Target Baru</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
                <div class="card-body">
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">No. Keputusan</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-3"></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">Tgl. Keputusan</label>
                    <div class="col-sm-5">
                      <div class="input-group date" id="dokasaldate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#dokasaldate"/>
                        <div class="input-group-append" data-target="#dokasaldate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3"></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">Target Bea Masuk (Rp.)</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-3"></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">Target Bea Keluar (Rp.)</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-3"></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">Target EA (Rp.)</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-3"></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">Target MMEA (Rp.)</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-3"></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">Target HT (Rp.)</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-3"></div>
                  </div>
                </div>
              <!-- /.card-body -->
                <div class="card-footer" align="center">
                  <a type="button" class="btn btn-default mr-1">Cancel</a>
                  <a type="submit" class="btn btn-info">Submit</a>
                </div>
            <!-- /.form -->
            </div>
            <!-- /.card -->
            </form>
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
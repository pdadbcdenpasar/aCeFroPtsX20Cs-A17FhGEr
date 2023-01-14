<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penyesuaian Tarif</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Penyesuaian Tarif</li>
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
                <h3 class="card-title">Daftar Tarif Aktif</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Segmen</th>
                    <th>Gol. A</th>
                    <th>Gol. B</th>
                    <th>Gol. C</th>
                    <th>EA</th>
                    <th>HPTL(%)</th>
                    <th>Tgl. Update</th>
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
                <h3 class="card-title">Rekam Tarif Baru</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
                <div class="card-body">
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">Segmen</label>
                    <div class="col-sm-5">
                      <select class="form-control" required>
                        <option></option>
                        <option>LOKAL</option>
                        <option>IMPOR</option>
                      </select>
                    </div>
                    <div class="col-sm-3"></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">MMEA Gol. A</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-3"></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">MMEA Gol. B</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-3"></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">MMEA Gol.C</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-3"></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">EAC</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-3"></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <label class="col-sm-2 col-form-label">HPTL</label>
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
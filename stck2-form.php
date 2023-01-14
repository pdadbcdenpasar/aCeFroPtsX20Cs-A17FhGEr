<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form STCK-2</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Form STCK-2</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content pb-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card mb-5">
              <div class="card-header">
                <h3 class="card-title">Rekam STCK-2</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kantor Penerbit</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="KANTOR PENGAWASAN DAN PELAYANAN BEA DAN CUKAI TIPE MADYA PABEAN A DENPASAR" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Bidang</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="KEPALA KANTOR PELAYANAN" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No / Tanggal STCK-2</label>
                    <div class="col-sm-2">
                      <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">STCK -</span>
                    </div>
                    <input type="text" class="form-control">
                  </div>
                    </div>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="" placeholder="/WBC.13/KPP.MP.02/<?php echo date('Y'); ?>" readonly>
                    </div>
                    <div class="col-sm-1 text-center">
                      <label style="margin-top: 5px;">/</label>
                    </div>
                    <div class="col-sm-3">
                      <div class="input-group date" id="stckdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#stckdate"/>
                        <div class="input-group-append" data-target="#stckdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kode / Tanggal Billing</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control">
                    </div>
                    <div class="col-sm-1 text-center">
                      <label style="margin-top: 5px;">/</label>
                    </div>
                    <div class="col-sm-3">
                      <div class="input-group date" id="billingdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#billingdate"/>
                        <div class="input-group-append" data-target="#billingdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Dokumen Asal</label>
                    <div class="col-sm-10">
                      <select class="form-control">
                        <option></option>
                        <option>Nota Dinas Kepala Seksi Penindakan dan Penyidikan</option>
                        <option>Nota Dinas Kepala Seksi Pelayanan Kepabeanan dan Cukai</option>
                        <option>Surat Kepala Kantor Kanwil DJBC Bali, NTB, dan NTT</option>
                        <option>ND Audit Kantor Wilayah</option>
                        <option>ND Verifikasi Kantor Pusat DJBC</option>
                        <option>ND Audit Kantor Pusat DJBC</option>
                        <option>LHA</option>
                        <option>Lainnya</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No / Tanggal Dok. Asal</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control">
                    </div>
                    <div class="col-sm-1 text-center">
                      <label style="margin-top: 5px;">/</label>
                    </div>
                    <div class="col-sm-3">
                      <div class="input-group date" id="dokasaldate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#dokasaldate"/>
                        <div class="input-group-append" data-target="#dokasaldate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Pengusaha</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Perusahaan</label>
                    <div class="col-sm-2 col-form-label">
                      <label>NPWP</label><br/>
                      <label style="margin-top: 5.5px;">NPPBKC</label><br/>
                      <label style="margin-top: 5.5px;">Nama Perusahaan</label><br/>
                      <label style="margin-top: 5.5px;">Alamat</label>
                    </div>
                    <div class="col-sm-1 text-center">
                      <label style="margin-top: 5px;">:</label><br/>
                      <label style="margin-top: 5.5px;">:</label><br/>
                      <label style="margin-top: 5.5px;">:</label><br/>
                      <label style="margin-top: 5.5px;">:</label>
                    </div>
                    <div class="col-sm-7">
                      <input type="text" class="form-control">
                      <input type="text" class="form-control">
                      <input type="text" class="form-control">
                      <textarea rows="3" class="form-control" style="resize: none;"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tagihan</label>
                    <div class="col-sm-2 text-left">
                      <label style="margin-top: 5.5px;">Cukai Tembakau</label><br/>
                      <label style="margin-top: 5.5px;">Cukai MMEA</label><br/>
                    </div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control">
                      <input type="text" class="form-control">
                    </div>
                    <div class="col-sm-2 text-left">
                      <label style="margin-top: 5.5px;">Cukai EA</label><br/>
                      <label style="margin-top: 5.5px;">Denda</label><br/>
                    </div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control">
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-1">
                      <select class="form-control">
                        <option></option>
                        <option>Plh.</option>
                        <option>Plt.</option>
                        <option>a.n.</option>
                        <option>u.b.</option>
                      </select>
                    </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="KEPALA KANTOR PENGAWASAN DAN PELAYANAN BEA DAN CUKAI TIPE MADYA PABEAN A DENPASAR" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Pejabat</label>
                    <div class="col-sm-10">
                      <select class="form-control">
                        <option></option>
                        <option>Puguh Wiyatno</option>
                        <option>Agung Wibowo</option>
                        <option>I Nyoman P. Candra</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" rows="5" style="resize: none;"></textarea>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a type="submit" class="btn btn-info float-right">Submit</a>
                  <a type="button" class="btn btn-default float-right mr-1">Cancel</a>
                </div>
                <!-- /.card-footer -->
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

                <table id="example1" class="table table-bordered bg-light mb-5" style="font-size: 15px;">
                  <thead>
                  <tr>
                    <th width="10">No</th>
                    <th width="20">Jenis Dokumen</th>
                    <th width="10">Nomor Dokumen</th>
                    <th width="20">Tanggal Dokumen</th>
                    <th>NPWP / NPPBKC</th>
                    <th width="250">Nama Perusahaan</th>
                    <th>Tagihan</th>
                    <th width="20">Jatuh Tempo</th>
                    <th width="20">Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>SPPBP</td>
                    <td>07</td>
                    <td>11-12-2021</td>
                    <td>080212101021235</td>
                    <td>PT. SPENCER INDONESIA INTERNATIONAL</td>
                    <td>308.860.200</td>
                    <td>09-02-2021</td>
                    <td>-</td>
                    <td align="center">
                      <div class="btn-group">
                        <a class="btn btn-danger btn-xs">
                          <i class="fas fa-times" style="padding-right: 1.5px; padding-left: 1.5px;"></i>
                        </a>
                        <a class="btn btn-warning btn-xs">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-info btn-xs">
                          <i class="fas fa-print"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
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
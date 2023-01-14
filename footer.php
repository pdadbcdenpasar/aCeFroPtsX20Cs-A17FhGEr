  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    Copyright &copy; 2021 <a href="https://bcdenpasar.beacukai.go.id">PDAD - KPPBC TMP A Denpasar</a>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<?php

if(isset($_POST["printck1a"])){
    $tgl = $_POST["tgl_ck1a"];
    $tanggal = preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$tgl);
    $em = mysqli_query($con,"select * from ck1a where No_CK1A='".$_POST["no_ck1a"]."' and Tanggal='".$tanggal."'");
    $data = mysqli_fetch_assoc($em);
      if ($data){
          mysqli_query($con,"insert into serah_ck1a set no_ck1a='".$_POST["no_ck1a"]."', tgl_ck1a='".$tanggal."', penerima='".$_POST["penerima"]."', petugas='".$_POST["petugas"]."', nip='".$_POST["nip"]."', keterangan='".$_POST["keterangan"]."'");
          //echo "<meta http-equiv='refresh' content='5; URL=printout.php'>";dikcare
          echo "<meta http-equiv='refresh' content='2; URL=output/print-ck1a.php'>";
          echo "<center><div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <b>Sedang diproses...</b>
          </div><center>";
        
      } else if (isset($data)){
        echo "<meta http-equiv='refresh' content='0; url=?menu=admpita'>";
        echo "<center><div class='alert alert-danger alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <b>Data Tidak Ditemukan !!</b>
          </div><center>";
        
  }else if(isset($_POST["printck1a"])){
    echo "<script>window.alert('{{{  GAGAL  }}}')
        window.location='index.php?menu=home'</script>";
  }
    }

?>

<div class="modal fade" id="modal-user">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="post">
          <div class="form-group">
            <label class="control-label col-lg">Username</label>
            <input type="text"  required class="form-control" name="usr"/>
          </div>
          <div class="form-group">
            <label class="control-label col-lg">Password</label>
            <input type="password" required class="form-control" name="pas"/>
          </div>
          <div class="form-group">
            <label class="control-label col-lg">Nama Lengkap</label>
            <input type="text" required class="form-control" name="nma"/>
          </div>
          <div class="form-group">
            <label class="control-label col-lg">NIP</label>
            <input type="text" required class="form-control" name="alt"/>
          </div>
            <input type="submit" class="btn btn-primary" name="user" value="Tambah"/>
            <input type="reset" class="btn btn-warning" value="Close" data-dismiss="modal"/>
        </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<div class="modal fade" id="modalCK1A">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cetak Tanda Terima CK1A</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
      <div class="form-group">
        <label class="control-label col-lg">Nomor CK-1A</label>
        <input type="text"  required class="form-control" name="no_ck1a"/>
      </div>
      <div class="form-group">
        <label class="control-label col-lg">Tanggal</label>
        <div class="input-group date" id="tandaterimack1adate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tandaterimack1adate"/>
                    <div class="input-group-append" data-target="#tandaterimack1adate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
            </div>
      </div>
      <div class="form-group">
        <label class="control-label col-lg">Penerima</label>
        <input type="text" required class="form-control" name="penerima"/>
      </div>
      <div class="form-group">
        <label class="control-label col-lg">Petugas Penyerahan PC</label>
        <input type="text" required class="form-control" name="petugas" value="<?php echo $nama;?>" readonly="readonly" />
      </div>
      <div class="form-group pb-2">
        <label class="control-label col-lg">NIP</label>
        <input type="text" required class="form-control" name="nip" value="<?php echo $nip;?>" readonly="readonly" />
      </div>
      <div class="row justify-content-md-center">
        <input type="reset" class="btn btn-warning" value="Batal" data-dismiss="modal"/>&nbsp;
        <input href="output/tandaterimack1a.php"  type="submit" class="btn btn-primary" name="printck1a" value="Cetak"/>
      </div>
    </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- REQUIRED SCRIPTS -->

<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>
<!-- Masked Input -->
<script src="dist/js/jquery.maskedinput.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": false,
    });
  });
</script>
<script>
  //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    $('#stckdate').datetimepicker({
        format: 'L'
    });
    $('#dokasaldate').datetimepicker({
        format: 'L'
    });
    $('#tandaterimack1adate').datetimepicker({
        format: 'L'
    });
    $('#addck1adate').datetimepicker({
        format: 'L'
    });
    $('#adddppcdate').datetimepicker({
        format: 'L'
    });
    $('#billingdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    $('.WarningDelete').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Data yang dihapus Tidak ada, Silahkan periksa kembali dokumen Anda.'
      })
    })

    jQuery(function($){
      $("#npwpstck").mask("99.999.999.9-999.999");
      $("#nppbkcstck").mask("9999.9.9.9999");
      $("#npwpsppbp").mask("99.999.999.9-999.999");
      $("#nppbkcsppbp").mask("9999.9.9.9999");
    });

</script>
<script type="text/javascript">
    function validateFormImportBilling()
    {
        var a=document.forms["Form-target"]["no_kep"].value;
        var b=document.forms["Form-target"]["tgl_kep"].value;
        var c=document.forms["Form-target"]["nilai_target"].value;
        if (a==null || a=="",b==null || b=="",c==null || c=="")
        {
            alert("Data tidak lengkap !!");
            return false;
        }
    }

    function validateFormAddCK1A()
    {
        var a=document.forms["add-ck1a"]["No_CK1A"].value;
        var b=document.forms["add-ck1a"]["Tanggal"].value;
        var c=document.forms["add-ck1a"]["Jumlah"].value;
        if (a===null || a==="",b===null || b==="",c===null || c==="")
        {
            alert("Input Data tidak lengkap !!");
            return false;
        }
    }

    function validateFormAddDPPC()
    {
        var a=document.forms["add-dppc"]["No_DPPC"].value;
        var b=document.forms["add-dppc"]["Tanggal"].value;
        var c=document.forms["add-dppc"]["Jumlah"].value;
        if (a==null || a=="",b==null || b=="",c==null || c=="")
        {
            alert("Input Data tidak lengkap !!");
            return false;
        }
    }

    function validateFormSTCK1()
    {
        var a=document.forms["stck-1"]["dok_asal"].value;
        var b=document.forms["stck-1"]["no_dok_asal"].value;
        var c=document.forms["stck-1"]["tgl_dok_asal"].value;
        var d=document.forms["stck-1"]["nm_pengusaha"].value;
        var e=document.forms["stck-1"]["npwp"].value;
        var f=document.forms["stck-1"]["nama_perusahaan"].value;
        var g=document.forms["stck-1"]["alamat"].value;
        var h=document.forms["stck-1"]["da_ck"].value;
        var i=document.forms["stck-1"]["pejabat"].value;
        var j=document.forms["stck-1"]["uraian"].value;
        if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="",e==null || e=="",f==null || f=="",g==null || g=="",h==null || h=="",i==null || i=="",j==null || j=="")
        {
            alert("Input Data tidak lengkap !!");
            return false;
        }
    }

    function validateFormSPPBP()
    {
        var a=document.forms["sppbp"]["nppbkc"].value;
        var b=document.forms["sppbp"]["nama_perusahaan"].value;
        var c=document.forms["sppbp"]["alamat"].value;
        var d=document.forms["sppbp"]["tagihan"].value;
        var e=document.forms["sppbp"]["pejabat"].value;
        if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="",e==null || e=="")
        {
            alert("Input Belum tidak lengkap !!");
            return false;
        }
    }
</script>
</body>
</html>
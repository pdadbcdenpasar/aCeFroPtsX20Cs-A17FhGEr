
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php
              if ($badan === 'main-content') {
                echo '<li class="nav-item menu-open">
                <a href="home.php" class="nav-link active">';
              } else {
                echo '<li class="nav-item">
                <a href="home.php" class="nav-link">';
              }
            ?>
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php
              if ($badan === 'input-stok' OR $badan === 'import-data-billing' OR $badan === 'stck1-form' OR $badan === 'sppbp-list') {
                echo '<li class="nav-item menu-open">
                <a href="#" class="nav-link active">';
              } else {
                echo '<li class="nav-item">
                <a href="#" class="nav-link">';
              }
            ?>
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Administrasi
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php
                  if ($badan === 'input-stok') {
                    echo '<a href="?badan=input-stok" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=input-stok" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input DP2C/CK-1A</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#modal-CK1A" class="nav-link" data-toggle="modal" data-target="#modalCK1A">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tanda Terima CK-1A</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'import-data-billing') {
                    echo '<a href="?badan=import-data-billing" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=import-data-billing" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import Data Billing</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'stck1-form') {
                    echo '<a href="?badan=stck1-form" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=stck1-form" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekam STCK-1</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'sppbp-list') {
                    echo '<a href="?badan=sppbp-list" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=sppbp-list" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekam SPPBP</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
              if ($badan === 'stok-pita' OR $badan === 'list-dppc' OR $badan === 'list-ck1a' OR $badan === 'list-dok-penagihan' OR $badan === 'list-dok-piutang') {
                echo '<li class="nav-item menu-open">
                <a href="#" class="nav-link active">';
              } else {
                echo '<li class="nav-item">
                <a href="#" class="nav-link">';
              }
            ?>
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Browse
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php
                  if ($badan === 'stok-pita') {
                    echo '<a href="?badan=stok-pita" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=stok-pita" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Pita Cukai</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'list-dppc') {
                    echo '<a href="?badan=list-dppc" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=list-dppc" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Browse/Edit DP2C</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'list-ck1a') {
                    echo '<a href="?badan=list-ck1a" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=list-ck1a" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Browse/Edit CK-1A</p>
                </a>
              </li>
              <?php
              if ($badan === 'list-dok-penagihan' OR $badan === 'list-dok-piutang') {
                echo '<li class="nav-item menu-open">
                <a href="#" class="nav-link active">';
              } else {
                echo '<li class="nav-item">
                <a href="#" class="nav-link">';
              }
            ?>
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Tagihan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php
                  if ($badan === 'list-dok-penagihan') {
                    echo '<a href="?badan=list-dok-penagihan" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=list-dok-penagihan" class="nav-link">';
                  }
                ?>
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Dok. Tagihan</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'list-dok-piutang') {
                    echo '<a href="?badan=list-dok-piutang" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=list-dok-piutang" class="nav-link">';
                  }
                ?>
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Piutang</p>
                </a>
              </li>
            </ul>
          </li>
            </ul>
          </li>
            <?php
              if ($badan === 'rekap-ck1a' OR $badan === 'rekap-ck5' OR $badan === 'rekap-ck1a-list' OR $badan === 'rekap-harian' OR $badan === 'rekap-bulanan') {
                echo '<li class="nav-item menu-open">
                <a href="#" class="nav-link active">';
              } else {
                echo '<li class="nav-item">
                <a href="#" class="nav-link">';
              }
            ?>
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php
                  if ($badan === 'rekap-ck1a') {
                    echo '<a href="?badan=rekap-ck1a" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=rekap-ck1a" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemasukan & Pengeluaran PC MMEA</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'rekap-ck5') {
                    echo '<a href="?badan=rekap-ck5" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=rekap-ck5" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerimaan CK-5</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'rekap-ck1a-list') {
                    echo '<a href="?badan=rekap-ck1a-list" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=rekap-ck1a-list" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerimaan CK-1A</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'rekap-harian') {
                    echo '<a href="?badan=rekap-harian" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=rekap-harian" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerimaan Harian</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'rekap-bulanan') {
                    echo '<a href="?badan=rekap-bulanan" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=rekap-bulanan" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerimaan Bulanan</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
              if ($badan === 'set-pegawai' OR $badan === 'set-tarif' OR $badan === 'set-target' OR $badan === 'add-produk' OR $badan === 'user') {
                echo '<li class="nav-item menu-open">
                <a href="#" class="nav-link active">';
              } else {
                echo '<li class="nav-item">
                <a href="#" class="nav-link">';
              }
            ?>
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php
                  if ($badan === 'set-pegawai') {
                    echo '<a href="?badan=set-pegawai" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=set-pegawai" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pejabat / Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'set-tarif') {
                    echo '<a href="?badan=set-tarif" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=set-tarif" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penyesuaian Tarif</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'set-target') {
                    echo '<a href="?badan=set-target" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=set-target" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penyesuaian Target</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'add-produk') {
                    echo '<a href="?badan=add-produk" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=add-produk" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <?php
                  if ($badan === 'user') {
                    echo '<a href="?badan=user" class="nav-link active">';
                  } else {
                    echo '<a href="?badan=user" class="nav-link">';
                  }
                ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah User</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
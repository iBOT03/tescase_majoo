<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?= base_url('./uploads/foto_user/' . $this->session->userdata('foto')) ?>" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('nama'); ?></div>
            <div class="email"><?= $this->session->userdata('email'); ?></div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>My Profile</a></li> -->
                    <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="material-icons text-danger">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li>
                <a href="<?= base_url('admin/Dashboard') ?>">
                    <i class="material-icons text-warning">home</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="header">Data Master</li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons text-primary">person</i>
                    <span>Manage User</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="<?= base_url('admin/Admin') ?>">
                            <span>Administrator</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/Supplier') ?>">
                            <span>Suppliers</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons text-success">widgets</i>
                    <span>Manage Product</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="<?= base_url('admin/Produk') ?>">
                            <span>Data Produk</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="header">Data Transaction</li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons text-danger">shopping_cart</i>
                    <span>Manage Transaction</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="<?= base_url('admin/Transaksi') ?>">
                            <span>Transaksi</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="header">Data Reports</li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons text-pink">assignment</i>
                    <span>Laporan Pembelian</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="<?= base_url('admin/Transaksi/laporan') ?>">
                            <span>Laporan Transaksi</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; <?= date('Y') ?> <a href="javascript:void(0);">design by Material Design</a>.
        </div>
        <div class="version">
            <b>developer: </b> Andrea Santana
        </div>
    </div>
    <!-- #Footer -->
</aside>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin
                    ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" untuk keluar, pilih "Batal"
                untuk kembali ke Panel Admin.</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-info" href="<?= site_url('admin/Auth/logout/') ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>
<!-- Start header component -->
<?php $this->load->view('admin/partials/header'); ?>
<!-- End of header -->
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Start navbar component -->
<?php $this->load->view('admin/partials/navbar'); ?>
<!-- End of navbar -->
<!-- #Top Bar -->
<section>
    <!-- Start sidebar component -->
    <?php $this->load->view('admin/partials/sidebar'); ?>
    <!-- End of sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h1>Manage Produk</h1>
        </div>
        <div class="body">
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Dashboard</a></li>
                <li class="active">Produk</li>
            </ol>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="card-header py-3">
                            <a href="<?= site_url('admin/Produk/create') ?>" class="btn btn-primary waves-effect">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </a>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th style="width: 40px; text-align: center;">No</th>
                                        <th style="width: 13rem;">Nama produk</th>
                                        <th>Supplier</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th style="width: 10rem;">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="width: 40px; text-align: center;">No</th>
                                        <th style="width: 13rem;">Nama produk</th>
                                        <th>Supplier</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th style="width: 10rem;">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($produk as $row) {
                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no ?></td>
                                            <td><?= $row->nama_produk ?></td>
                                            <td><?= $row->nama_supplier ?></td>
                                            <td><?= $row->deskripsi ?></td>
                                            <td><img src="<?= base_url('./uploads/foto_produk/') . $row->foto ?>" alt="foto" width="100px"></td>
                                            <td>Rp. <?= number_format($row->harga) ?></td>
                                            <td>
                                                <?php
                                                if ($row->status == 0) {
                                                    echo '<span class="label label-danger">Tidak tersedia</span>';
                                                } else {
                                                    echo '<span class="label label-success">Tersedia</span>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/Produk/detail/' . $row->id_produk) ?>" class="btn btn-secondary waves-effect">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </a>
                                                <a href="<?= base_url('admin/Produk/update/' . $row->id_produk) ?>" class="btn btn-warning waves-effect">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-pencil"></i>
                                                    </span>
                                                </a>
                                                <a href="<?= base_url('admin/Produk/delete/' . $row->id_produk) ?>" class="btn btn-danger waves-effect">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        <?php
                                        $no++;
                                    }
                                        ?>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
</section>
</div>

<!-- Start sidebar component -->
<?php $this->load->view('admin/partials/footer'); ?>
<!-- End of sidebar -->
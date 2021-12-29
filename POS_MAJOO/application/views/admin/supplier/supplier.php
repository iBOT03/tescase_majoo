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
            <h1>Manage User</h1>
        </div>
        <div class="body">
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Dashboard</a></li>
                <li class="active">Supplier</li>
            </ol>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="card-header py-3">
                            <a href="<?= site_url('admin/Supplier/create') ?>" class="btn btn-primary waves-effect">
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
                                        <th style="width: 13rem;">Nama</th>
                                        <th>alamat</th>
                                        <th style="width: 10rem;">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="width: 40px; text-align: center;">No</th>
                                        <th>Nama</th>
                                        <th>alamat</th>
                                        <th style="width: 10rem;">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($supplier as $row) {
                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no ?></td>
                                            <td><?= $row->nama_supplier ?></td>
                                            <td><?= $row->alamat ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/Supplier/update/' . $row->id_supplier) ?>" class="btn btn-warning waves-effect">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-pencil"></i>
                                                    </span>
                                                </a>
                                                <a href="<?= base_url('admin/Supplier/delete/' . $row->id_supplier) ?>" class="btn btn-danger waves-effect">
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
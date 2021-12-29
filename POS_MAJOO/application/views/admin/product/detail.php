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
                <li><a href="<?= base_url('admin/Produk') ?>">Produk</a></li>
                <li class="active">Detail</li>
            </ol>
        </div>
        <?= $this->session->flashdata('pesan'); ?>

        <form action="" method="POST">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Detail <small>Informasi Detail Produk</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="col">
                                <?php foreach ($produk as $row) { ?>
                                    <img src="<?= base_url('./uploads/foto_produk/' . $row->foto)  ?>" alt="Foto" class="logo mx-auto d-block mb-5 rounded-circle" width="200px">
                                    <div class="row">
                                        <div class="my-auto col-sm-2">
                                            <p>Nama Produk</p>
                                        </div>
                                        <div class="my-auto col-sm-1">
                                            <p>:</p>
                                        </div>
                                        <div class="my-auto col-sm-8">
                                            <p><?= $row->nama_produk; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="my-auto col-sm-2">
                                            <p>Deskripsi Produk:</p>
                                        </div>
                                        <div class="my-auto col-sm-1">
                                            <p>:</p>
                                        </div>
                                        <div class="my-auto col-sm-8">
                                            <p><?= $row->deskripsi; ?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="my-auto col-sm-2">
                                            <p>Status:</p>
                                        </div>
                                        <div class="my-auto col-sm-1">
                                            <p>:</p>
                                        </div>
                                        <div class="my-auto col-sm-8">
                                            <p><?php
                                                if ($row->status == 0) {
                                                    echo '<span class="label label-danger">Tidak Tersedia</span>';
                                                } elseif ($row->status == 1) {
                                                    echo '<span class="label label-success">Tersedia</span>';
                                                }
                                                ?></p>
                                        </div>
                                    </div>
                                    <a href="<?= base_url('admin/Produk') ?>" class="btn btn-danger waves-effect">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
                                    <button type="submit" id="on" name="on" class="btn btn-primary waves-effect">
                                        <span class="icon text-white-50">
                                            <i class="material-icons">done</i>
                                        </span>
                                        <span class="text">Active</span>
                                    </button>
                                    <button type="submit" id="off" name="off" class="btn btn-warning waves-effect">
                                        <span class="icon text-white-50">
                                            <i class="material-icons">highlight_off</i>
                                        </span>
                                        <span class="text">Non-Active</span>
                                    </button>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Start sidebar component -->
<?php $this->load->view('admin/partials/footer'); ?>
<!-- End of sidebar -->
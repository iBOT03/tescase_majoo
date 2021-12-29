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
                <li><a href="<?= base_url('admin/Supplier') ?>">Supplier</a></li>
                <li class="active">Edit</li>
            </ol>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Supplier</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" action="<?= site_url('admin/Supplier/update/' . $supplier[0]->id_supplier) ?>" enctype="multipart/form-data">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="hidden" class="form-control" id="id_supplier" name="id_supplier" value="<?= $supplier[0]->id_supplier ?>">
                                    <input type="hidden" class="form-control" id="created_at" name="created_at" value="<?= $supplier[0]->created_at ?>">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $supplier[0]->nama_supplier ?>">
                                    <label class="form-label">Nama</label>
                                </div>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea id="alamat" name="alamat" cols="30" rows="5" class="form-control no-resize"><?= $supplier[0]->alamat ?></textarea>
                                    <label class="form-label">Alamat</label>
                                </div>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url('admin/Supplier') ?>" class="btn btn-danger waves-effect">
                                <span class="icon text-white-50">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                                <span class="text">Kembali</span>
                            </a>
                            <button class="btn btn-primary waves-effect" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>
                                <span class="text">Simpan</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start sidebar component -->
<?php $this->load->view('admin/partials/footer'); ?>
<!-- End of sidebar -->
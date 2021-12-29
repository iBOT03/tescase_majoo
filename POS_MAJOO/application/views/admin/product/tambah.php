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
            <h1>Manage Product</h1>
        </div>
        <div class="body">
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Dashboard</a></li>
                <li><a href="<?= base_url('admin/Produk') ?>">Produk</a></li>
                <li class="active">Tambah</li>
            </ol>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Tambah Produk</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" action="<?= site_url('admin/Produk/create') ?>" enctype="multipart/form-data">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= set_value('nama_produk') ?>">
                                    <label class="form-label">Nama Produk</label>
                                </div>
                                <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick" id="supplier" name="supplier">
                                        <option value="<?= set_value('supplier') ?>">--- Pilih Supplier ---</option>
                                        <?php foreach ($supplier as $row) { ?>
                                            <option value="<?= $row->id_supplier; ?>"><?= $row->nama_supplier ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?= form_error('supplier', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea id="deskripsi" name="deskripsi" cols="30" rows="5" class="form-control no-resize"><?= set_value('deskripsi') ?></textarea>
                                    <label class="form-label">Deskripsi</label>
                                </div>
                                <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input name="foto" id="foto" type="file" accept="image/*" onchange="tampilkanPreview(this,'preview')" class="form-control border-dark small mb-3" aria-describedby="basic-addon2" required>
                                    <label class="form-label">Foto Produk</label>
                                </div>
                                <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-float">
                                <img id="preview" src="" alt="" width="320px" /> <br>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="harga" name="harga" value="<?= set_value('harga') ?>">
                                    <label class="form-label">Harga Produk</label>
                                </div>
                                <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url('admin/Produk') ?>" class="btn btn-danger waves-effect">
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

<script>
    function tampilkanPreview(gambar, idpreview) {
        // Create image object
        var gb = gambar.files;
        // Loop to render image
        for (var i = 0; i < gb.length; i++) {
            // Make variable
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                // If type of files matches
                preview.file = gbPreview;
                reader.onload = (function(element) {
                    return function(e) {
                        element.src = e.target.result;
                    };
                })(preview);
                // Read url image
                reader.readAsDataURL(gbPreview);
            } else {
                // if type of files not matches
                alert(
                    "Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar.");
            }
        }
    }
</script>
<!-- Start sidebar component -->
<?php $this->load->view('admin/partials/footer'); ?>
<!-- End of sidebar -->
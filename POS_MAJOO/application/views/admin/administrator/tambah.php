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
                <li><a href="<?= base_url('admin/Admin') ?>">Administrator</a></li>
                <li class="active">Tambah</li>
            </ol>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Tambah Administrator</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" action="<?= site_url('admin/Admin/create') ?>" enctype="multipart/form-data">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama') ?>">
                                    <label class="form-label">Nama</label>
                                </div>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="email" name="email" type="email <?= set_value('email') ?>">
                                    <label class="form-label">Email</label>
                                </div>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea id="alamat" name="alamat" cols="30" rows="5" class="form-control no-resize"><?= set_value('alamat') ?></textarea>
                                    <label class="form-label">Alamat</label>
                                </div>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input name="foto" id="foto" type="file" accept="image/*" onchange="tampilkanPreview(this,'preview')" class="form-control border-dark small mb-3" aria-describedby="basic-addon2" required>
                                    <label class="form-label">Foto</label>
                                </div>
                                <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-float">
                                    <img id="preview" src="" alt="" width="320px" /> <br>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" class="form-control" id="password1" name="password1" <?= set_value('password1') ?>>
                                    <label class="form-label">Password</label>
                                </div>
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" class="form-control" id="password2" name="password2" <?= set_value('password2') ?>>
                                    <label class="form-label">Konfirmasi Password</label>
                                </div>
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url('admin/Admin') ?>" class="btn btn-danger waves-effect">
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
        //                membuat objek gambar
        var gb = gambar.files;
        //                loop untuk merender gambFar
        for (var i = 0; i < gb.length; i++) {
            //                    bikin variabel
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                //                        jika tipe data sesuai
                preview.file = gbPreview;
                reader.onload = (function(element) {
                    return function(e) {
                        element.src = e.target.result;
                    };
                })(preview);
                //                    membaca data URL gambar
                reader.readAsDataURL(gbPreview);
            } else {
                //                        jika tipe data tidak sesuai
                alert(
                    "Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar.");
            }
        }
    }
</script>
<!-- Start sidebar component -->
<?php $this->load->view('admin/partials/footer'); ?>
<!-- End of sidebar -->
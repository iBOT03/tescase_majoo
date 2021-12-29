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
            <h1>Manage Transaction</h1>
        </div>
        <div class="body">
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Dashboard</a></li>
                <li><a href="<?= base_url('admin/Transaksi') ?>">Transaksi</a></li>
                <li class="active">Edit</li>
            </ol>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Transaksi</h2>
                    </div>
                    <div class="body">
                        <table>
                            <tbody>
                                <tr>
                                    <td style="width: 100px;">ID Transaksi</td>
                                    <td style="width: 20px;">:</td>
                                    <td><?= $transaksi[0]->id_transaksi ?></td>
                                </tr>
                                <tr>
                                    <td>Produk</td>
                                    <td>:</td>
                                    <td><?= $transaksi[0]->nama_produk ?></td>
                                </tr>
                                <tr>
                                    <td>Grand Total</td>
                                    <td>:</td>
                                    <td><b>Rp. <?= number_format($transaksi[0]->grand_total) ?></b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php
                                        if ($transaksi[0]->status_trans == 0) {
                                            echo '<span class="label label-danger">Belum selesai</span>';
                                        } else {
                                            echo '<span class="label label-success">Selesai</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table><br><br><br>
                        <form id="form_validation" method="POST" action="<?= site_url('admin/Transaksi/update/' . $transaksi[0]->id_transaksi) ?>" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id_transaksi" name="id_transaksi" value="<?= $transaksi[0]->id_transaksi ?>">
                            <input type="hidden" class="form-control" id="id_produk" name="id_produk" value="<?= $transaksi[0]->id_produk ?>">
                            <input type="hidden" class="form-control" id="created_at" name="created_at" value="<?= $transaksi[0]->created_at ?>">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="nama_cust" name="nama_cust" value="<?= $transaksi[0]->nama_cust ?>" readonly>
                                    <label class="form-label">Customer</label>
                                </div>
                                <?= form_error('nama_cust', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $transaksi[0]->nohp_cust ?>" readonly>
                                    <label class="form-label">No Telepon</label>
                                </div>
                                <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea id="alamat" name="alamat" cols="30" rows="5" class="form-control no-resize" readonly><?= $transaksi[0]->alamat_cust ?></textarea>
                                    <label class="form-label">Alamat</label>
                                </div>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Grand Total</label>
                                                <input type="text" class="form-control" id="harga" name="harga" value="<?= $transaksi[0]->grand_total ?>" readonly>
                                            </div>
                                            <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Bayar</label>
                                                <input type="text" class="form-control" id="bayar" name="bayar" value="<?= $transaksi[0]->bayar ?>" readonly>
                                            </div>
                                            <?= form_error('bayar', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="kembali" name="kembali" value="<?= $transaksi[0]->kembali ?>">
                                    <label class="form-label">Kembali</label>
                                </div>
                                <?= form_error('kembali', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url('admin/Transaksi') ?>" class="btn btn-danger waves-effect">
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
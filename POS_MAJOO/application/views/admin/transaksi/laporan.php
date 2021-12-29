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
            <h1>Manage Transaction</h1>
        </div>
        <div class="body">
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Dashboard</a></li>
                <li class="active">Transaksi</li>
            </ol>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th style="width: 40px; text-align: center;">No</th>
                                        <th>Tanggal</th>
                                        <th style="width: 13rem;">Customer</th>
                                        <th>Produk</th>
                                        <th>Telepon</th>
                                        <th>Harga Total</th>
                                        <th>Bayar</th>
                                        <th>Kembali</th>
                                        <th>Status</th>
                                        <th style="width: 10rem;">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-center">Total Pendapatan</th>
                                        <th colspan="4">Rp <?= number_format($sum[0]->total) ?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($transaksi as $row) {
                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no ?></td>
                                            <td><?= $row->created_at ?></td>
                                            <td><?= $row->nama_cust ?></td>
                                            <td><?= $row->nama_produk ?></td>
                                            <td><?= $row->nohp_cust ?></td>
                                            <td>Rp. <?= number_format($row->grand_total) ?></td>
                                            <td>Rp. <?= number_format($row->bayar) ?></td>
                                            <td>Rp. <?= number_format($row->kembali) ?></td>
                                            <td>
                                                <?php
                                                if ($row->status_trans == 0) {
                                                    echo '<span class="label label-danger">Belum selesai</span>';
                                                } else {
                                                    echo '<span class="label label-success">Selesai</span>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/Transaksi/cetak/' . $row->id_transaksi) ?>" class="btn btn-secondary waves-effect" target="_blank">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-print"></i>
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
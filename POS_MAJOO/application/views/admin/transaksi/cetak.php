<!-- Start header component -->
<?php $this->load->view('admin/partials/header'); ?>
<!-- End of header -->

<div class="container-fluid">
    <div class="block-header">
        <h1>Report Transaction</h1>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <table>
                    <tbody>
                        <tr>
                            <td style="width: 100px;">ID Transaksi</td>
                            <td style="width: 20px;">:</td>
                            <td><?= $transaksi[0]->id_transaksi ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pesan</td>
                            <td>:</td>
                            <td><?= $transaksi[0]->created_at ?></td>
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
                            <td>Status</td>
                            <td>:</td>
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
                        <tr>
                            <td>Customer</td>
                            <td>:</td>
                            <td><?= $transaksi[0]->nama_cust ?></td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td>:</td>
                            <td><?= $transaksi[0]->nohp_cust ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $transaksi[0]->alamat_cust ?></td>
                        </tr>
                        <tr>
                            <td>Total Bayar</td>
                            <td>:</td>
                            <td><b>Rp. <?= number_format($transaksi[0]->bayar) ?></b></td>
                        </tr>
                        <tr>
                            <td>Total Kembali</td>
                            <td>:</td>
                            <td><b>Rp. <?= number_format($transaksi[0]->kembali) ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    window.print();
</script>
<!-- Start sidebar component -->
<?php $this->load->view('admin/partials/footer'); ?>
<!-- End of sidebar -->
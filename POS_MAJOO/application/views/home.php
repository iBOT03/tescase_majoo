<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>POS - MAJOO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <section class="h-100 w-100" style="box-sizing: border-box; background-color:#1F1D2B">
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

            .navbar-1-4.navbar-dark .navbar-nav .nav-link {
                color: #fff;
            }

            .navbar-1-4 .bg-black {
                background-color: #1f1d2b;
            }

            .navbar-1-4 .btn-get-started {
                border-radius: 20px;
                padding: 12px 30px;
                font-weight: 500;
            }

            .navbar-1-4 .btn-get-started-purple {
                background-color: #525298;
                transition: 0.3s;
            }

            .navbar-1-4 .btn-get-started-purple:hover {
                background-color: #5353a8;
                transition: 0.3s;
            }
        </style>
        <nav class="navbar-1-4 navbar navbar-expand-lg navbar-dark p-4 px-md-4 mb-3 bg-black">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 15.75C3.5 8.9845 8.98451 3.49999 15.75 3.49999H29.75C30.7165 3.49999 31.5 4.28349 31.5 5.24999C31.5 6.21649 30.7165 6.99999 29.75 6.99999H15.75C10.9175 6.99999 7 10.9175 7 15.75V29.75C7 30.7165 6.2165 31.5 5.25 31.5C4.2835 31.5 3.5 30.7165 3.5 29.75V15.75Z" fill="#22B07D" />
                        <path d="M10.5 17.5C10.5 13.634 13.634 10.5 17.5 10.5H31.5C35.366 10.5 38.5 13.634 38.5 17.5V31.5C38.5 35.366 35.366 38.5 31.5 38.5H17.5C13.634 38.5 10.5 35.366 10.5 31.5V17.5Z" fill="#22B07D" />
                    </svg>
                </a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link px-md-4 active" aria-current="page" href="#">Majoo Teknologi Indonesia</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: #f2f6ff">
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

            .content-3-7 .btn:focus,
            .content-3-7 .btn:active {
                outline: none !important;
            }

            .content-3-7 {
                padding: 5rem 2rem 7rem;
            }

            .content-3-7 .title-text {
                font: 800 1.875rem/2.25rem Poppins, sans-serif;
                letter-spacing: 0.05em;
                margin-bottom: 0.75rem;
                color: #2e3a53;
            }

            .content-3-7 .caption-text {
                font: 400 1rem/1.5rem Poppins, sans-serif;
                letter-spacing: 0.025em;
                color: #8e8fad;
                margin-bottom: 0;
            }

            .content-3-7 .card-item {
                transition: 0.4s;
                top: 0px;
                left: 0px;
                padding: 1rem 0;
            }

            .content-3-7 .card-item:hover {
                top: -3px;
                left: -3px;
                transition: 0.4s;
            }

            .content-3-7 .card-item-outline {
                border: 1px solid #e5ebf9;
                padding: 2rem 2.75rem;
                border-radius: 1rem;
            }

            .content-3-7 .price-title {
                font: 500 1.25rem/1.75rem Poppins, sans-serif;
                color: #141c2e;
                letter-spacing: 0.025em;
                margin-bottom: 0.75rem;
            }

            .content-3-7 .price-value {
                font: 500 2.25rem/2.5rem Poppins, sans-serif;
                letter-spacing: 0.025em;
                margin-bottom: 0.75rem;
                color: #2e3a53;
            }

            .content-3-7 .price-duration {
                font: 400 1rem/1.5rem Poppins, sans-serif;
                margin: 0.625rem;
                color: #9e9e9e;
            }

            .content-3-7 .price-caption {
                font: 400 1rem/1.5rem Poppins, sans-serif;
                letter-spacing: 0.025em;
                margin-bottom: 2.5rem;
                color: #c3c3c8;
            }

            .content-3-7 .price-list .check {
                font: 400 0.875rem/1.25rem Poppins, sans-serif;
                color: #2e3a53;
                letter-spacing: 0.025em;
                margin-bottom: 1.75rem;
            }

            .content-3-7 .price-list .no-check {
                font: 400 0.875rem/1.25rem Poppins, sans-serif;
                color: #e1e1e1;
                letter-spacing: 0.025em;
                margin-bottom: 1.75rem;
            }

            .content-3-7 .span-icon {
                width: 1rem;
                height: 1rem;
                margin-right: 0.75rem;
            }

            .content-3-7 .btn-outline {
                border: 1px solid #2ec49c;
                color: #2ec49c;
                padding-top: 1rem;
                padding-bottom: 1rem;
                font-weight: 500;
                letter-spacing: 0.025em;
                border-radius: 0.5rem;
            }

            .content-3-7 .btn-outline:hover {
                background-color: #2ec49c;
                color: #ffffff;
            }

            .content-3-7 .btn-fill {
                background-image: linear-gradient(rgba(91, 203, 173, 1),
                        rgba(39, 194, 153, 1));
                padding-top: 1rem;
                padding-bottom: 1rem;
                font-weight: 500;
                letter-spacing: 0.025em;
                border-radius: 0.5rem;
            }

            .content-3-7 .btn-fill:hover {
                background-image: linear-gradient(#29b18d, #29b18d);
            }

            @media (min-width: 576px) {
                .content-3-7 .title-text {
                    font: 800 2.25rem/2.5rem Poppins, sans-serif;
                }

                .content-3-7 .card-item {
                    padding: 1rem;
                }
            }

            @media (min-width: 768px) {
                .content-3-7 {
                    padding-left: 3.5rem;
                    padding-right: 3.5rem;
                }
            }

            @media (min-width: 992px) {
                .content-3-7 .caption-text {
                    width: 66.666667%;
                }

                .content-3-7 .card-item {
                    width: 33.333333%;
                }
            }

            @media (min-width: 1200px) {
                .content-3-7 {
                    padding-left: 9rem;
                    padding-right: 9rem;
                }
            }
        </style>
        <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative" style="font-family: 'Poppins', sans-serif">
            <div class="container mx-auto">
                <div class="d-flex flex-column text-left w-100" style="margin-bottom: 2.25rem">
                    <h2 class="title-text">Produk</h2>
                    <p class="caption-text mx-auto">
                        <?= $this->session->flashdata('pesan'); ?>
                </div>
                <div class="d-flex flex-wrap">
                    <?php foreach ($produk as $row) { ?>
                        <div class="mx-auto card-item position-relative">
                            <div class="card-item-outline bg-white d-flex flex-column position-relative overflow-hidden h-100">
                                <img src="<?= base_url('./uploads/foto_produk/' . $row->foto) ?>" alt="">
                                <h2 class="price-title text-center pt-2"><?= $row->nama_produk ?></h2>
                                <h2 class="price-value d-flex align-items-center">
                                    <span class="price-duration">Rp. </span>
                                    <span><?= number_format($row->harga) ?></span>
                                </h2>
                                <p class="price-caption" style="height: 100%;">
                                    <?= $row->deskripsi ?>
                                </p>
                                <a href="#" data-toggle="modal" data-target="#buyModal-<?= $row->id_produk ?>" class="btn btn-outline d-flex justify-content-center align-items-center w-100">
                                    Beli
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php foreach ($produk as $row) { ?>
                        <div class="modal fade" id="buyModal-<?= $row->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Transaksi</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= site_url('Home/checkout') ?>" method="post">
                                            <table class="mb-4">
                                                <tbody>
                                                    <tr>
                                                        <td>Nama Produk</td>
                                                        <td style="width: 20px;">:</td>
                                                        <td><?= $row->nama_produk ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Harga</td>
                                                        <td>:</td>
                                                        <td>Rp. <?= number_format($row->harga) ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <input type="hidden" name="harga_produk" id="harga_produk" class="form-control" value="<?= $row->harga ?>">
                                            <input type="hidden" name="id_produk" id="id_produk" class="form-control" value="<?= $row->id_produk ?>">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Nama Lengkap</label>
                                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap ...">
                                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">No HP</label>
                                                        <input type="text" name="nohp" id="nohp" class="form-control" placeholder="Masukkan No HP ...">
                                                        <?= form_error('nohp', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Alamat</label>
                                                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat ...">
                                                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Bayar</label>
                                                        <input type="text" name="bayar" id="bayar" class="form-control" placeholder="Masukkan uang pembayaran ...">
                                                        <?= form_error('bayar', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Beli</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <footer class="page-footer font-small blue">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

        <style>
            @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap");
            @import url("https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;600;700;800;900&display=swap");

            * {
                font-family: 'Inter', sans-serif !important;
            }

            body .font-red-hat-display {
                font-family: 'Red Hat Display', sans-serif !important;
            }

            body footer {
                background: #313E60;
                padding-top: 50px;
                padding-bottom: 70px;
            }

            body footer {
                background: #0F0F0F;
                padding-top: 50px;
                padding-bottom: 70px;
            }

            body footer .logo {
                font-family: 'Red Hat Display', sans-serif;
                font-weight: 700;
                font-size: 26px;
                line-height: 38px;
                color: #FAFAFD;
            }

            body footer .social-media {
                margin-top: 55px;
            }

            body footer .copyright {
                font-family: 'Red Hat Display', sans-serif !important;
                font-weight: 400;
                font-size: 16px;
                line-height: 135%;
                color: #FAFAFD;
                margin-top: 20px;
            }

            body footer .nav-footer p {
                font-weight: 700 !important;
                font-family: 'Red Hat Display', sans-serif !important;
                font-size: 20px;
                line-height: 135%;
                color: #FAFAFD;
            }

            body footer .nav-footer a {
                font-weight: 400 !important;
                font-family: 'Red Hat Display', sans-serif !important;
                font-size: 20px;
                line-height: 135%;
                color: #FAFAFD;
            }

            body footer li {
                margin-bottom: 16px;
            }
        </style>
        <div class="container text-md-center">
            <div class="row">
                <div class="col-md-12 mt-md-0 mt-3 address">
                    <div class="logo font-red-hat-display">
                        <?= date('Y') ?> &copy; PT Majoo Teknologi Indonesia
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>
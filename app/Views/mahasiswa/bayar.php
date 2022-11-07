<?= $this->extend('layout/mahasiswa_layout') ?>

<?= $this->section('content') ?>
<?php $session = session() ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <?php foreach ($tagihan as $t) : ?>
                <input type="hidden" value="<?= $t['tagihan_id']; ?>" name="tagihan_id">
                <input type="hidden" value="<?= $t['tagihan_id']; ?>" name="tagihan_id">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Pembayaran : <?= $t['tagihan']; ?></h2>
                                    <div class="invoice-number"><?= $t['jenis_tagihan']; ?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1>Atas nama : <?= $session->get('nama') ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <div class="section-title">Metode pembayaran</div>
                                        <p class="section-lead">Pilih metode pembayaran.</p>
                                        <div class="d-flex">
                                            <div class="mr-2 bg-visa" data-width="61" data-height="38"></div>
                                            <div class="mr-2 bg-jcb" data-width="61" data-height="38"></div>
                                            <div class="mr-2 bg-mastercard" data-width="61" data-height="38"></div>
                                            <div class="bg-paypal" data-width="61" data-height="38"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <hr class="mt-2 mb-2">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg"><?php echo format_rupiah($t['jumlah_tagihan']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-md-right">
                        <div class="float-lg-left mb-lg-0 mb-3">
                            <form action="/bayar/konfirmasi" method="POST">
                                <input type="hidden" value="<?= $t['tagihan_id']; ?>" name="tagihan_id">
                                <input type="hidden" value="<?= $session->get('id') ?>" name="mahasiswa_id">
                                <button type="submit" class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Lanjutkan pembayaran</button>
                                <a href="/" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
<?= $this->extend('layout/pimpinan_layout') ?>

<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Tagihan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="/pimpinan">Tagihan</a></div>
                <div class="breadcrumb-item">Detail tagihan</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama</th>
                                            <th>Jenis tagihan</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($tagihan as $t) : ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= $i++; ?>
                                                </td>
                                                <td><?= $t['mahasiswa']; ?></td>
                                                <td><?= $t['jenis_tagihan']; ?></td>
                                                <td>
                                                    <?php echo format_rupiah($t['jumlah_tagihan']); ?>
                                                </td>
                                                <!-- <td>
                                                    <div class="badge badge-warning">Belum lunas</div>
                                                </td> -->
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
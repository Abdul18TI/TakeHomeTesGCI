<?= $this->extend('layout/pimpinan_layout') ?>

<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Semua Tagihan</h1>
        </div>
        <div class="col-3 mb-3">
            <div class="bookmark">
                <a class="btn btn-primary btn-lg" href="pimpinan/laporan" data-bs-original-title="" title=""> <span class="fa fa-file"></span> Lihat laporan</a>
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
                                            <th>Tagihan</th>
                                            <th>Jenis</th>
                                            <th>Jumlah</th>
                                            <!-- <th>Status</th> -->
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($tagihan as $t) : ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= $i++; ?>
                                                </td>
                                                <td><?= $t['tagihan']; ?></td>
                                                <td class="align-middle">
                                                    <?= $t['jenis_tagihan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo format_rupiah($t['jumlah_tagihan']); ?>
                                                </td>
                                                <!-- <td>
                                                    <div class="badge badge-warning">Belum lunas</div>
                                                </td> -->
                                                <td class="align-middle"><a href="/pimpinan/<?= $t['tagihan_id']; ?>" class="btn btn-primary">Detail</a></td>
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
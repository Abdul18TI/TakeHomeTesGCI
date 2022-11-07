<?= $this->extend('layout/mahasiswa_layout') ?>

<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Semua Tagihan</h1>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            </div>
        <?php endif; ?>
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
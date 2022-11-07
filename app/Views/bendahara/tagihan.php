<?= $this->extend('layout/bendahara_layout') ?>

<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar jenis tagihan</h1>
        </div>
        <div class="col-3 mb-3">
            <div class="bookmark">
                <a class="btn btn-primary btn-lg" href="/bendahara/tambahtagihan" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah Jenis Tagihan</a>
            </div>
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
                                                <td><?= $t['jenis_tagihan']; ?></td>
                                                <td class="align-middle">
                                                    <form action="/bendahara/tagihan/<?= $t['jenis_tagihan_id'] ?>" method="post" class="d-inline">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus jenis tagihan ?');">Hapus</button>
                                                    </form>
                                                    <a href="/bendahara/ubahtagihan/<?= $t['jenis_tagihan_id']; ?>" class="btn btn-success">Edit</a>
                                                </td>
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
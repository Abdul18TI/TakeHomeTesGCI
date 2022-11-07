<?= $this->extend('layout/bendahara_layout') ?>

<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar tagihan</h1>
        </div>
        <div class="col-3 mb-3">
            <div class="bookmark">
                <a class="btn btn-primary btn-lg" href="bendahara/tambah" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah Tagihan</a>
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
                                            <th>Jenis</th>
                                            <th>Jumlah</th>
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
                                                <td class="align-middle">
                                                    <!-- <a href="/bendahara/<?= $t['jenis_tagihan']; ?>" class="btn btn-primary">Detail</a> -->
                                                    <a href="/bendahara/ubah/<?= $t['tagihan_id']; ?>" class="btn btn-success">Edit</a>
                                                    <form action="/bendahara/<?= $t['tagihan_id'] ?>" method="post" class="d-inline">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus tagihan ?');">Hapus</button>
                                                    </form>
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
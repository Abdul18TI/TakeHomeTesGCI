<?= $this->extend('layout/bendahara_layout') ?>

<?= $this->section('content') ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ubah Tagihan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="/bendahara">Tagihan</a></div>
                <div class="breadcrumb-item">Ubah tagihan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <?php foreach ($tagihan as $t) : ?>
                    <form class="needs-validation" action="/bendahara/update/<?= $t['tagihan_id']; ?>" method="post" novalidate="">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama tagihan</label>
                                <input type="text" class="form-control" required id="tagihan" name="tagihan" value="<?= $t['tagihan']; ?>">
                                <div class="invalid-feedback">
                                    Nama tagihan harus diisi
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis tagihan</label>
                                <select class="form-control select2" name="jenis_tagihan" id="jenis_tagihan">
                                    <?php foreach ($jenis_tagihan as $jt) : ?>
                                        <option value="<?= $jt['jenis_tagihan']; ?>"><?= $jt['jenis_tagihan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah tagihan</label>
                                <input type="number" class="form-control" required id="jumlah_tagihan" name="jumlah_tagihan" value="<?= $t['jumlah_tagihan']; ?>">
                                <div class="invalid-feedback">
                                    Jumlah tagihan harus diisi
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
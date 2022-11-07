<?= $this->extend('layout/bendahara_layout') ?>

<?= $this->section('content') ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Tagihan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="/bendahara">Tagihan</a></div>
                <div class="breadcrumb-item">Tambah tagihan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form class="needs-validation" action="/bendahara/simpan" method="post" novalidate="">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama tagihan</label>
                            <input type="text" class="form-control <?= ($validation->hasError('tagihan')) ? 'is-invalid' : ''; ?>" id="tagihan" name="tagihan" value="<?= old('tagihan'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tagihan'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis tagihan</label>
                            <select class="form-control select2" name="jenis_tagihan" id="jenis_tagihan">
                                <?php foreach ($tagihan as $t) : ?>
                                    <option value="<?= $t['jenis_tagihan']; ?>"><?= $t['jenis_tagihan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah tagihan</label>
                            <input type="number" class="form-control" required id="jumlah_tagihan" name="jumlah_tagihan" value="<?= old('tagihan'); ?>">
                            <div class="invalid-feedback">
                                Jumlah tagihan harus diisi
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
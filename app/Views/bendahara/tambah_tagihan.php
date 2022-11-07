<?= $this->extend('layout/bendahara_layout') ?>

<?= $this->section('content') ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Jenis Tagihan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="/bendahara/tagihan">Jenis Tagihan</a></div>
                <div class="breadcrumb-item">Tambah jenis tagihan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form class="needs-validation" action="/bendahara/simpantagihan" method="post" novalidate="">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jenis tagihan</label>
                            <input type="text" class="form-control <?= ($validation->hasError('jenis_tagihan')) ? 'is-invalid' : ''; ?>" id="jenis_tagihan" name="jenis_tagihan" value="<?= old('jenis_tagihan'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jenis_tagihan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
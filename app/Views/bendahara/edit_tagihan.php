<?= $this->extend('layout/bendahara_layout') ?>

<?= $this->section('content') ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ubah Jenis Tagihan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="/bendahara/tagihan">Jenis Tagihan</a></div>
                <div class="breadcrumb-item">Ubah jenis tagihan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form class="needs-validation" action="/bendahara/updatetagihan/<?= $tagihan['jenis_tagihan_id']; ?>" method="post" novalidate="">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jenis tagihan</label>
                            <input type="text" class="form-control <?= ($validation->hasError('jenis_tagihan')) ? 'is-invalid' : ''; ?>" id="jenis_tagihan" name="jenis_tagihan" value="<?= $tagihan['jenis_tagihan']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jenis_tagihan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
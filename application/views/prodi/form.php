<div class="d-flex justify-content-between align-items-center mb-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('prodi') ?>">Program Studi</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
    </nav>
</div>

<div class="card shadow-sm" style="max-width: 540px;">
    <div class="card-body">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger">
                <?php echo validation_errors('<p class="mb-0">', '</p>') ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo $action ?>" method="post">

            <?php if (!$prodi) : ?>
            <div class="mb-3">
                <label class="form-label fw-semibold">ID Prodi</label>
                <input type="number" name="prodi_id" class="form-control"
                       value="<?php echo set_value('prodi_id') ?>" placeholder="Contoh: 23" required>
            </div>
            <?php endif; ?>

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Program Studi</label>
                <input type="text" name="prodi_name" class="form-control"
                       value="<?php echo $prodi ? $prodi['prodi_name'] : set_value('prodi_name') ?>"
                       placeholder="Contoh: Ilmu Komputer" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Strata</label>
                <select name="prodi_strata" class="form-select" required>
                    <option value="">-- Pilih Strata --</option>
                    <?php foreach (['D3', 'S1', 'S2', 'S3'] as $s) : ?>
                        <option value="<?php echo $s ?>"
                            <?php echo ($prodi && $prodi['prodi_strata'] == $s) || set_value('prodi_strata') == $s ? 'selected' : '' ?>>
                            <?php echo $s ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Fakultas</label>
                <select name="fakultas_id" class="form-select" required>
                    <option value="">-- Pilih Fakultas --</option>
                    <?php foreach ($fakultas as $f) : ?>
                        <option value="<?php echo $f['fakultas_id'] ?>"
                            <?php echo ($prodi && $prodi['fakultas_id'] == $f['fakultas_id']) || set_value('fakultas_id') == $f['fakultas_id'] ? 'selected' : '' ?>>
                            <?php echo $f['fakultas_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo base_url('prodi') ?>" class="btn btn-secondary">Batal</a>
            </div>

        </form>
    </div>
</div>
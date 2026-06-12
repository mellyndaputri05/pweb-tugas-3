<div class="d-flex justify-content-between align-items-center mb-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('fakultas') ?>">Fakultas</a></li>
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

            <?php if (!$fakultas) : ?>
            <div class="mb-3">
                <label class="form-label fw-semibold">ID Fakultas</label>
                <input type="number" name="fakultas_id" class="form-control"
                       value="<?php echo set_value('fakultas_id') ?>" placeholder="Contoh: 8" required>
            </div>
            <?php endif; ?>

            <div class="mb-4">
                <label class="form-label fw-semibold">Nama Fakultas</label>
                <input type="text" name="fakultas_name" class="form-control"
                       value="<?php echo $fakultas ? $fakultas['fakultas_name'] : set_value('fakultas_name') ?>"
                       placeholder="Contoh: Fakultas Teknik" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo base_url('fakultas') ?>" class="btn btn-secondary">Batal</a>
            </div>

        </form>
    </div>
</div>
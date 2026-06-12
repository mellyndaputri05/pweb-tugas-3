<div class="d-flex justify-content-between align-items-center mb-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Fakultas</li>
        </ol>
    </nav>
    <a href="<?php echo base_url('fakultas/tambah') ?>" class="btn btn-primary btn-sm">
        + Tambah Fakultas
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="60">No</th>
                        <th>ID Fakultas</th>
                        <th>Nama Fakultas</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($fakultas)) : ?>
                        <?php $no = 1; foreach ($fakultas as $row) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['fakultas_id'] ?></td>
                            <td><?php echo $row['fakultas_name'] ?></td>
                            <td>
                                <a href="<?php echo base_url('fakultas/ubah/' . $row['fakultas_id']) ?>" class="btn btn-warning btn-sm">Ubah</a>
                                <a href="<?php echo base_url('fakultas/hapus/' . $row['fakultas_id']) ?>" class="btn btn-danger btn-sm btn-hapus">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data fakultas.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
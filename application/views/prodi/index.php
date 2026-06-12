<div class="d-flex justify-content-between align-items-center mb-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Program Studi</li>
        </ol>
    </nav>
    <a href="<?php echo base_url('prodi/tambah') ?>" class="btn btn-primary btn-sm">
        + Tambah Program Studi
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="50">No</th>
                        <th>ID</th>
                        <th>Nama Program Studi</th>
                        <th>Strata</th>
                        <th>Fakultas</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($prodi)) : ?>
                        <?php $no = 1; foreach ($prodi as $row) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['prodi_id'] ?></td>
                            <td><?php echo $row['prodi_name'] ?></td>
                            <td><span class="badge bg-secondary"><?php echo $row['prodi_strata'] ?></span></td>
                            <td><?php echo $row['fakultas_name'] ?></td>
                            <td>
                                <a href="<?php echo base_url('prodi/ubah/' . $row['prodi_id']) ?>" class="btn btn-warning btn-sm">Ubah</a>
                                <a href="<?php echo base_url('prodi/hapus/' . $row['prodi_id']) ?>" class="btn btn-danger btn-sm btn-hapus">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data program studi.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
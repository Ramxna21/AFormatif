<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Formulir</h1>

    <!-- Table for displaying students -->  
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Formulir</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No. </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($murid)) : ?>
                                        <?php $no = 1; ?>
                                        <?php foreach ($murid as $formulir_data) : ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?= ($murid['nama'] ?? '') ?></td>
                                                <td><?= ($murid['nik'] ?? '') ?></td>
                                                <td><?= htmlspecialchars(($formulir_data->tempat_lahir ?? '') . (!empty($formulir_data->tanggal_lahir) ? date('d-m-Y', strtotime($formulir_data->tanggal_lahir)) : '')) ?></td>                                                <td><?= ($formulir_data->jenis_kelamin); ?></td>
                                                <td><?= ($formulir_data->alamat); ?></td>
                                                <td><?= ($formulir_data->no_hp); ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/read_formulir_detail/' . $formulir_data->id); ?>" class="btn btn-info btn-sm">Detail</a>
                                                    </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data formulir siswa.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
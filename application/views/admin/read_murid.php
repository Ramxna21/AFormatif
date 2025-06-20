<!-- Begin Page Content --> 
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Murid</h1>

    <!-- Tombol Tambah Murid -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahMurid">Tambah Data</button>

    <!-- Tabel Daftar Murid -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Murid</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>NISN</th>
                            <th>NIK</th>
                            <th>No. KK</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_murid as $m): ?>
                        <tr>
                            <td><?= $m->id ?></td>
                            <td><?= $m->nama_lengkap ?></td>
                            <td><?= $m->jenis_kelamin ?></td>
                            <td><?= $m->nisn ?></td>
                            <td><?= $m->nik ?></td>
                            <td><?= $m->no_kk ?></td>
                            <td><?= $m->tempat_lahir ?></td>
                            <td><?= $m->tanggal_lahir ?></td>
                            <td><?= $m->alamat_rumah ?></td>
                            <td><?= $m->no_handphone ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton<?= $m->id ?>" data-toggle="dropdown">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $m->id ?>">
                                        <a class="dropdown-item" href="<?= base_url('admin/edit_murid/' . $m->id) ?>">Edit</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/delete_murid/' . $m->id) ?>" onclick="return confirm('Yakin mau hapus?')">Delete</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/detail_murid/' . $m->id) ?>">Detail</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- End of Page Content -->

<!-- Modal Tambah Murid -->
<div class="modal fade" id="modalTambahMurid" tabindex="-1" role="dialog" aria-labelledby="modalTambahMuridLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= base_url('admin/action_create_murid') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Murid</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text" name="nisn" class="form-control" maxlength="20">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control" maxlength="20">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>No. KK</label>
                                <input type="text" name="no_kk" class="form-control" maxlength="20">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" maxlength="50">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Akte Kelahiran</label>
                                <input type="text" name="no_akte_kelahiran" class="form-control" maxlength="30">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Agama</label>
                                <input type="text" name="agama" class="form-control" maxlength="20">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat Rumah <span class="text-danger">*</span></label>
                        <textarea name="alamat_rumah" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Desa/Kelurahan</label>
                                <input type="text" name="desa_kelurahan" class="form-control" maxlength="50">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" maxlength="50">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kabupaten</label>
                                <input type="text" name="kabupaten" class="form-control" maxlength="50">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" name="provinsi" class="form-control" maxlength="50">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tinggal Dengan</label>
                                <input type="text" name="tinggal_dengan" class="form-control" maxlength="50">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mode Transportasi</label>
                                <input type="text" name="mode_transportasi" class="form-control" maxlength="50">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Anak Keberapa</label>
                                <input type="number" name="anak_keberapa" class="form-control" min="1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Punya KIP/PK</label>
                                <select name="punya_kip_pk" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>No. Handphone <span class="text-danger">*</span></label>
                        <input type="text" name="no_handphone" class="form-control" maxlength="20" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
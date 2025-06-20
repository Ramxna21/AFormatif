<!-- Tambah Data Button -->
<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahDataModal">Tambah Data</button>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pertanyaan Formulir</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Isi Pertanyaan</th>
                        <th>Tipe Pertanyaan</th>
                        <th>Jenis Jawaban</th>
                        <th>Action</th> <!-- Tambahkan kolom Action -->
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data as $data): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data->isi_pertanyaan ?></td>
                        <td><?= $data->nama_tipe_pertanyaan ?></td>
                        <td><?= $data->jenis_jawaban_pertanyaan ?></td>
                        <td>
                            <!-- Dropdown Action -->
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?= $data->id_pertanyaan ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $data->id_pertanyaan ?>">
                                    <!-- Button to trigger Edit Modal -->
                                    <button class="dropdown-item" data-toggle="modal" data-target="#editDataModal<?= $data->id_pertanyaan ?>">Edit</button>
                                    <a class="dropdown-item" href="<?= base_url('admin/action_delete_pertanyaan/' . $data->id_pertanyaan) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editDataModal<?= $data->id_pertanyaan ?>" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel<?= $data->id_pertanyaan ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editDataModalLabel<?= $data->id_pertanyaan ?>">Edit Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/action_edit_pertanyaan/' . $data->id_pertanyaan) ?>" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="pertanyaan<?= $data->id_pertanyaan ?>">Isi Pertanyaan</label>
                                            <input type="text" class="form-control" id="pertanyaan<?= $data->id_pertanyaan ?>" name="pertanyaan" value="<?= $data->isi_pertanyaan ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis<?= $data->id_pertanyaan ?>">Jenis Jawaban</label>
                                            <select class="form-control" id="jenis<?= $data->id_pertanyaan ?>" name="jenis" required>
                                                <option value="text" <?= $data->jenis_jawaban_pertanyaan == 'text' ? 'selected' : '' ?>>Huruf</option>
                                                <option value="number" <?= $data->jenis_jawaban_pertanyaan == 'number' ? 'selected' : '' ?>>Angka</option>
                                                <option value="date" <?= $data->jenis_jawaban_pertanyaan == 'date' ? 'selected' : '' ?>>Tanggal</option>
                                                <option value="email" <?= $data->jenis_jawaban_pertanyaan == 'email' ? 'selected' : '' ?>>Email</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tipe<?= $data->id_pertanyaan ?>">Tipe Pertanyaan</label>
                                            <select class="form-control" id="tipe<?= $data->id_pertanyaan ?>" name="tipe" required>
                                                <?php foreach ($items as $item): ?>
                                                    <option value="<?= $item->id_tipe_pertanyaan ?>" <?= $data->id_tipe_pertanyaan == $item->id_tipe_pertanyaan ? 'selected' : '' ?>>
                                                        <?= $item->nama_tipe_pertanyaan ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Form -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/action_create_pertanyaan') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pertanyaan">Isi Pertanyaan</label>
                        <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Jawaban</label>
                        <select class="form-control" id="jenis" name="jenis" required>
                            <option value="text">Huruf</option>
                            <option value="number">Angka</option>
                            <option value="date">Tanggal</option>
                            <option value="email">Email</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe Pertanyaan</label>
                        <select class="form-control" id="tipe" name="tipe" required>
                            <?php if (!empty($items)): ?>
                                <?php foreach ($items as $item): ?>
                                    <option value="<?= $item->id_tipe_pertanyaan; ?>">
                                        <?= $item->nama_tipe_pertanyaan; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">Tidak ada tipe pertanyaan ditemukan.</option>
                            <?php endif; ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
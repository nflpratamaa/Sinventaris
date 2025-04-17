<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- Form Peminjaman -->
            <form action="<?php echo base_url('peminjaman/tambah_peminjaman'); ?>" method="POST">
                <div class="form-group">
                    <label for="id_barang">Pilih Barang</label>
                    <select class="form-control" name="id_barang" required>
                        <option value="">-- Pilih Barang --</option>
                        <?php foreach ($barang as $brg): ?>
                            <option value="<?= $brg->id_barang ?>"><?= $brg->nama_barang ?> (Stok: <?= $brg->stok ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" required min="1">
                </div>

                <div class="form-group">
                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_kembali">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Pinjam</button>
            </form>

            <h3 class="mt-4">Daftar Peminjaman</h3>
            <!-- Tabel Peminjaman -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($peminjaman as $pinjam): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $pinjam->nama_barang ?></td>
                        <td><?= $pinjam->jumlah ?></td>
                        <td><?= $pinjam->tanggal_pinjam ?></td>
                        <td><?= $pinjam->tanggal_kembali ?></td>
                        <td><?= $pinjam->status ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

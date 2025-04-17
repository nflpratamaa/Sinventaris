<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h3>Daftar Peminjaman yang Belum Dikembalikan</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($peminjaman as $pinjam): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $pinjam->nama_barang ?></td>
                        <td><?= $pinjam->jumlah ?></td>
                        <td><?= $pinjam->tanggal_pinjam ?></td>
                        <td><?= $pinjam->tanggal_kembali ?: '-' ?></td>
                        <td><?= $pinjam->status ?></td>
                        <td>
                            <?php if ($pinjam->status == 'Dipinjam'): ?>
                                <!-- Tombol untuk mengembalikan barang, akan menampilkan modal konfirmasi -->
                                <button class="btn btn-success" data-toggle="modal" data-target="#confirmReturnModal<?= $pinjam->id_peminjaman ?>">Kembalikan</button>
                            <?php else: ?>
                                <!-- Tombol disabled jika sudah dikembalikan -->
                                <button class="btn btn-secondary" disabled>Sudah Dikembalikan</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- Modal Konfirmasi Pengembalian -->
<?php foreach ($peminjaman as $pinjam): ?>
<div class="modal fade" id="confirmReturnModal<?= $pinjam->id_peminjaman ?>" tabindex="-1" role="dialog" aria-labelledby="confirmReturnModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmReturnModalLabel">Konfirmasi Pengembalian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin mengembalikan barang <strong><?= $pinjam->nama_barang ?></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <!-- Tautkan aksi pengembalian ke controller 'pengembalian/kembalikan' -->
                <a href="<?= base_url('pengembalian/kembalikan/'.$pinjam->id_peminjaman) ?>" class="btn btn-success">Ya, Kembalikan</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

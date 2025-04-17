<div class="content-wrapper">
    <section class="content">
        <?php foreach($barang as $brg)?>

        <form action="<?php echo base_url().'barang/update' ?>" method="post">
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="hidden" name="id_barang" value="<?php echo $brg->id_barang ?>">
                <input type="text" class="form-control" name="nama_barang" value="<?php echo $brg->nama_barang ?>">
            </div>

            <div class="form-group">
                <label for="id_kategori">Kategori</label>
                <select class="form-control" name="id_kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach($kategori as $kat): ?>
                        <option value="<?= $kat->id_kategori ?>" 
                            <?= $kat->id_kategori == $brg->id_kategori ? 'selected' : '' ?>>
                            <?= $kat->nama_kategori ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>            

            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" name="stok" value="<?php echo $brg->stok ?>">
            </div>

            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        <?php ?>
    </section>
</div>
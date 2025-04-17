<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Kategori</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Form untuk update kategori -->
            <form action="<?= base_url('kategori/update') ?>" method="POST">
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" value="<?= $kategori->nama_kategori ?>" required>
                </div>
                <input type="hidden" name="id_kategori" value="<?= $kategori->id_kategori ?>">

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('kategori') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </section>
</div>

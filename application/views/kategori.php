<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Kategori</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
    <div class="container-fluid">
        <!-- Tombol tambah kategori -->
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Tambah Kategori
            </button>
        </div>

        <!-- Tabel data kategori -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($kategori as $kat) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $kat->id_kategori ?></td>
                    <td><?php echo $kat->nama_kategori ?></td>
                    <td>
                        <?php 
                        echo anchor('kategori/hapus/' . $kat->id_kategori, 
                        '<div class="btn btn-danger btn-sm d-inline" onclick="return confirm(\'Yakin ingin menghapus kategori ini?\')">
                            <i class="fa fa-trash"></i>
                        </div>'); 

                        echo anchor('kategori/edit/' .$kat->id_kategori,
                        '<div class="btn btn-primary btn-sm d-inline ml-1">
                            <i class="fa fa-edit"></i>
                        </div>');
                        ?>
                    </td>
                </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div> 
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="<?php echo base_url('kategori/tambah_aksi') ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

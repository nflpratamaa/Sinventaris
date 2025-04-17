<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
    <div class="container-fluid">
        <!-- Tombol tambah -->
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Tambah Data Barang
            </button>
        </div>

        <!-- Tabel data -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($barang as $brg) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $brg->id_barang ?></td>
                        <td><?php echo $brg->nama_barang ?></td>
                        <td>
                            <?php 
                            // Cek apakah id_kategori ada (tidak NULL)
                            if ($brg->id_kategori != NULL) {
                                echo $brg->nama_kategori;
                            } else {
                                echo "Tidak ada kategori";
                            }
                            ?>
                        </td>
                        <td><?php echo $brg->stok ?></td>
                        <td>
                            <?php 
                            echo anchor('barang/hapus/' . $brg->id_barang, 
                            '<div class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus barang ini?\')">
                                <i class="fa fa-trash"></i>
                            </div>'); 
                            ?>
                        </td>
                        <td>
                            <?php echo anchor('barang/edit/' .$brg->id_barang,
                            '<div class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                            </div>');
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <hr>

</section>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('barang/tambah_aksi') ?>">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control">
                
            </div>
            <div class="form-group">
                <label for="id_kategori">Kategori</label>
                <select class="form-control" name="id_kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach($kategori as $kat): ?>
                        <option value="<?= $kat->id_kategori ?>"><?= $kat->nama_kategori ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id_barang = button.data('id');
    var stok = button.data('stok');

    var modal = $(this);
    modal.find('#id_barang').val(id_barang);
    modal.find('#stok').val(stok);
  });
</script>

    <!-- /.content-header -->
</div>

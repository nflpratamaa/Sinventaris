<?php

class Pengembalian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengembalian');
    }

    // Menampilkan data peminjaman yang belum dikembalikan
    public function index()
    {
        $data['peminjaman'] = $this->M_pengembalian->get_peminjaman_dipinjam();
        
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('pengembalian', $data);
        $this->load->view('templates/footer');
    }

    public function kembalikan($id_peminjaman)
    {
        // Mengambil data peminjaman yang akan dikembalikan
        $peminjaman = $this->M_peminjaman->get_peminjaman_by_id($id_peminjaman);
    
        if ($peminjaman) {
            // Update status peminjaman menjadi 'Dikembalikan'
            $data_update = array(
                'status' => 'Dikembalikan',
                'tanggal_kembali' => date('Y-m-d') // Menambahkan tanggal pengembalian saat ini
            );
            $this->M_peminjaman->update_peminjaman($id_peminjaman, $data_update);
    
            // Jika ada tabel pengembalian, kita masukkan data barang yang dikembalikan ke tabel pengembalian
            $data_pengembalian = array(
                'id_barang' => $peminjaman->id_barang,
                'id_peminjaman' => $id_peminjaman,
                'tanggal_kembali' => date('Y-m-d')
            );
            $this->M_pengembalian->insert_pengembalian($data_pengembalian);
    
            // Redirect kembali ke halaman pengembalian atau peminjaman
            redirect('pengembalian');
        } else {
            // Jika data peminjaman tidak ditemukan
            echo "Data peminjaman tidak ditemukan.";
        }
    }
    
    
}

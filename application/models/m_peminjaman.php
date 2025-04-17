<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peminjaman extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    // Menambah data peminjaman
    public function tambah_peminjaman($id_barang, $jumlah, $tanggal_pinjam, $tanggal_kembali, $user_id)
    {
        $data = [
            'id_barang' => $id_barang,
            'jumlah' => $jumlah,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
            'user_id' => $user_id,
            'status' => 'Dipinjam'  // Status peminjaman
        ];

        // Simpan ke tabel peminjaman
        return $this->db->insert('peminjaman', $data);

        // Kurangi stok barang yang dipinjam
        $this->db->set('stok', 'stok - ' . $jumlah, FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang');
    }
    public function get_peminjaman_data() {
        $this->db->select('peminjaman.*, barang.nama_barang');
        $this->db->from('peminjaman');
        $this->db->join('barang', 'barang.id_barang = peminjaman.id_barang');
        $query = $this->db->get();
        return $query->result();
    }
    public function update_peminjaman($id_peminjaman, $data)
    {
        $this->db->where('id_peminjaman', $id_peminjaman);
        return $this->db->update('peminjaman', $data);
    }
    
    public function get_peminjaman_by_id($id_peminjaman)
    {
        $this->db->where('id_peminjaman', $id_peminjaman);
        return $this->db->get('peminjaman')->row();
    }
    
}

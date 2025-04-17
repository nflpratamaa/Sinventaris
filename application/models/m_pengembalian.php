<?php 
class M_pengembalian extends CI_Model {

    public function get_peminjaman_dipinjam()
    {
        $this->db->select('peminjaman.*, barang.nama_barang');
        $this->db->from('peminjaman');
        $this->db->join('barang', 'barang.id_barang = peminjaman.id_barang');
        $this->db->where('peminjaman.status', 'Dipinjam'); // Hanya mengambil data yang statusnya 'Dipinjam'
        $query = $this->db->get();
        return $query->result();
    }
    

    public function kembalikan_barang($id_peminjaman)
    {
        $this->db->set('status', 'Dikembalikan');
        $this->db->set('tanggal_kembali', date('Y-m-d')); // Set tanggal kembalinya ke hari ini
        $this->db->where('id_peminjaman', $id_peminjaman);
        return $this->db->update('peminjaman');
    }

    public function insert_pengembalian($data)
    {
        return $this->db->insert('pengembalian', $data);
    }
    

}

<?php

class M_barang extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function tampil_data() {
        $this->db->select('barang.*, kategori.nama_kategori');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        return $this->db->get();
    }
    public function tambah_data($data) {
        return $this->db->insert('barang', $data);
    }

    public function hapus_data($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function get_kategori() {
        return $this->db->get('kategori')->result();
    }

    public function get_available_barang() {
        $this->db->where('stok >', 0);
        return $this->db->get('barang')->result();
    }

    public function get_barang_by_id($id)
    {
        $this->db->where('id_barang', $id);
        return $this->db->get('barang')->row();
    }
    
    public function get_barang_by_kategori($id_kategori) {
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get('barang')->result();
    }

    public function update_stok_barang($id_barang, $jumlah) {
        $this->db->set('stok', 'stok + ' . (int)$jumlah, FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang');
    }

    public function total_stok_barang() {
        $this->db->select_sum('stok');
        return $this->db->get('barang')->row()->stok;
    }

    // Mencari barang berdasarkan nama
    public function cari_barang($nama_barang) {
        $this->db->like('nama_barang', $nama_barang);
        return $this->db->get('barang')->result();
    }

    // Mengambil barang terbaru
    public function get_barang_terbaru() {
        $this->db->order_by('tanggal_ditambahkan', 'DESC');
        return $this->db->get('barang')->result();
    }
}

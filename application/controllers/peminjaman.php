<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model-model yang dibutuhkan
        $this->load->model('M_peminjaman');
        $this->load->model('M_barang');
    }

    public function index()
    {
        $data['peminjaman'] = $this->M_peminjaman->get_peminjaman_data();
        $data['barang'] = $this->M_barang->get_available_barang();

        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('peminjaman', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_peminjaman()
    {

        $id_barang = $this->input->post('id_barang');
        $jumlah = $this->input->post('jumlah');
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $tanggal_kembali = $this->input->post('tanggal_kembali');
        $user_id = 1;
    
        $barang = $this->M_barang->get_barang_by_id($id_barang);
        if ($barang->stok < $jumlah) {
            // Jika stok tidak mencukupi, beri pesan error
            $this->session->set_flashdata('error', 'Stok barang tidak mencukupi!');
            redirect('peminjaman');
        }
    
        // Proses peminjaman
        $this->M_peminjaman->tambah_peminjaman($id_barang, $jumlah, $tanggal_pinjam, $tanggal_kembali, $user_id);
        redirect('peminjaman');
    }
    
}

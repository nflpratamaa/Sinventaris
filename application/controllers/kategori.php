<?php
class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_kategori'); // Pastikan model kategori dimuat
    }

    public function index() {
        $data['kategori'] = $this->M_kategori->tampil_data()->result();
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi() {
        $nama_kategori = $this->input->post('nama_kategori');

        $data = [
            'nama_kategori' => $nama_kategori
        ];

        $this->M_kategori->tambah_data($data);
        redirect('kategori'); // kembali ke halaman kategori
    }

    public function edit($id_kategori) {
        $data['kategori'] = $this->M_kategori->get_kategori_by_id($id_kategori);
        if (!$data['kategori']) {
            redirect('kategori');
        }
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori_edit', $data);
        $this->load->view('templates/footer');
        
    }
    
    public function update() {
        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');
    
        $data = array(
            'nama_kategori' => $nama_kategori,
        );
        $this->M_kategori->update_data($id_kategori, $data);
        redirect('kategori');
    }
    
    
    public function hapus($id) {
        $this->M_kategori->hapus_data($id);
        redirect('kategori');
    }


}

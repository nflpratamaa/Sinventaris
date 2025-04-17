<?php

class Barang extends CI_Controller{

	public function __construct() {
        parent::__construct();
        $this->load->model('M_barang'); // pastikan model dimuat
    }

    public function index(){
        $data['barang'] = $this->M_barang->tampil_data()->result(); // ambil data dari model
		$data['kategori'] = $this->M_barang->get_kategori();

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('barang', $data);
		$this->load->view('templates/footer');
    }

	public function tambah_aksi(){
		$nama_barang = $this->input->post('nama_barang');
		$id_kategori = $this->input->post('id_kategori');  // Menangkap id_kategori yang dipilih

		$data = array(
			'nama_barang' => $nama_barang,
			'id_kategori' => $id_kategori,  // Ini foreign key, akan mengacu pada id_kategori di tabel kategori
		);

		$this->M_barang->tambah_data($data, 'barang');  // Panggil fungsi model untuk menambahkan data
		redirect('barang');
	}

	public function hapus($id){
		$where = ['id_barang' => $id];
		$this->M_barang->hapus_data($where, 'barang');
		redirect('barang');
	}
	
	public function edit($id){
		$where = array('id_barang' => $id);
		$data['barang'] = $this->M_barang->edit_data($where, 'barang')->result();
		$data['kategori'] = $this->M_barang->get_kategori(); 

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('edit', $data);
		$this->load->view('templates/footer');
	}

	public function update(){
		$id = $this->input->post('id_barang');
		$nama_barang = $this->input->post('nama_barang');
		$id_kategori = $this->input->post('id_kategori');
		$stok = $this->input->post('stok');
	
		$data = array(
			'nama_barang' => $nama_barang,
			'id_kategori' => $id_kategori,
			'stok' => $stok
		);
	
		$where = array('id_barang' => $id);
	
		$this->M_barang->update_data($where, $data, 'barang');
	
		redirect('barang');
	}
	
	public function tambah_kategori(){
		$nama_kategori = $this->input->post('nama_kategori'); // menangkap nama kategori
	
		$data = array(
			'nama_kategori' => $nama_kategori
		);
	

		$this->db->insert('kategori', $data);

		redirect('barang');
	}
	

}
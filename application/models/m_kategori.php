<?php
class M_kategori extends CI_Model {

    public function tampil_data(){
        $this->db->select('*');
        $this->db->from('kategori');
        return $this->db->get();
    }
    
    public function hapus_data($id) {
        $this->db->set('id_kategori', NULL);
        $this->db->where('id_kategori', $id);
        $this->db->update('barang');
    
        // Sekarang hapus kategori
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }

    public function tambah_data($data) {
        $this->db->insert('kategori', $data);
    }

    public function update_kategori($id_kategori, $nama_kategori) {
        $data = array(
            'nama_kategori' => $nama_kategori
        );
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }
    
    public function get_kategori_by_id($id_kategori) {
        return $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row();
    }


    public function hapus($id) {
        if ($id) {
            $this->M_kategori->hapus_data($id);
            redirect('kategori'); // Redirect ke halaman kategori
        } else {
            show_404();
        }
    }
}


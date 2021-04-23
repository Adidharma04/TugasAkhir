<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_kuliah_model extends CI_Model {

    public function tambahDataTracerKuliah(){

        $id_profile = $this->session->userdata('sess_id_profile');

        $tracer_kuliah =[
            'id_profile'                    => $id_profile,
            'nama_kampus'                   => $this->input->post('nama_kampus', true),
            'program_studi'                 => $this->input->post('program_studi', true),
            'jurusan'                       => $this->input->post('jurusan', true),
            'tahun_masuk'                   => $this->input->post('tahun_masuk', true),
            'tahun_lulus'                   => $this->input->post('tahun_lulus', true),
            'jalur_penerimaan'              => $this->input->post('jalur_penerimaan', true),
        ];
        $this->db->insert('tracer_kuliah', $tracer_kuliah);
    }

    // hapus tracer kuliah
    function hapusTracerKuliah( $id ) {

        // query 
        $this->db->where('id_kuliah', $id);
        $this->db->delete('tracer_kuliah');
    }
    

}

/* End of file Tracer_kuliah.php */
?>
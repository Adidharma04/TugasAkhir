<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_kerja_model extends CI_Model {

    public function tambahDataTracerkerja(){

        $id_profile = $this->session->userdata('sess_id_profile');

        $tracer_kuliah =[
            'id_profile'                        => $id_profile,
            'nama_perusahaan'                   => $this->input->post('nama_perusahaan', true),
            'jenis_perusahaan'                  => $this->input->post('jenis_perusahaan', true),
            'jabatan'                           => $this->input->post('jabatan', true),
            'alamat_perusahaan'                 => $this->input->post('alamat_perusahaan', true),
            'tahun_masuk'                       => $this->input->post('tahun_masuk', true),
            'tahun_keluar'                       => $this->input->post('tahun_keluar', true),
            'status'                            => $this->input->post('status', true),
        ];
        $this->db->insert('tracer_kerja', $tracer_kuliah);
    }
    

}

/* End of file Tracer_kuliah.php */
?>
<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_dashboard extends CI_Model {
    
        /** pegawai | event | lowongan  */
        function ambilJumlah() {

            $pegawai = 0; 
            $event   = 0;
            $lowongan= 0;
            $informasi= 0;

            $sql_pegawai = "SELECT * FROM profile WHERE level IN('staff', 'bk')";
            $pegawai = $this->db->query($sql_pegawai)->num_rows();


            // lowongan 
            $event = $this->db->get_where('event', ['status' => "accept"])->num_rows();
            $lowongan = $this->db->get_where('loker', ['status' => "accept"])->num_rows();
            $informasi = $this->db->get_where('informasi_umum', ['status' => "accept"])->num_rows();


            return array(

                'pegawai'   => $pegawai,
                'event'     => $event,
                'informasi'     => $informasi,
                'lowongan'  => $lowongan
            );
        }


        
        // ambil data statistik antara kerja dan kuliah
        function ambilDataStatistik_kerjaKuliah() {

            $data = array();
            $tahun = substr(date('Y'), 2, 2);

            for ( $i = 10; $i <= intval($tahun); $i++) {

                $data_tahun = (20).$i;
                



                // kerja
                $sql_kerja  = "SELECT * FROM tracer_kerja WHERE tahun_masuk = '$data_tahun'";
                $sql_kuliah = "SELECT * FROM tracer_kuliah WHERE tahun_masuk = '$data_tahun'";


                $query_kerja  = $this->db->query( $sql_kerja );
                $query_kuliah = $this->db->query( $sql_kuliah );

                array_push( $data, array(

                    'tahun' => $data_tahun,
                    'kerja' => $query_kerja->num_rows(),
                    'kuliah'=> $query_kuliah->num_rows()
                ));
                
            }


            return $data;
        }




        // jumlah data kerja, kuliah, kerja dan kuliah
        function ambilDataTracer() {

            $kondisi = ['verifikasi_alumni' => "diterima"];
            $ambilDataSiswaBerdasarkanALumni = $this->db->get_where('profil_siswa', $kondisi);

            // tampung nilai
            $kerja = 0;
            $kuliah = 0;
            $kerjaKuliah = 0;
            $alumni = 0;

            if ( $ambilDataSiswaBerdasarkanALumni->num_rows() > 0 ) {

                foreach ( $ambilDataSiswaBerdasarkanALumni->result_array() AS $row) {

                    $id_profil_siswa = $row['id_profile'];

                    $kondisiTracer = ['id_profile' => $id_profil_siswa];
                    
                    // query
                    $cekTracerKerja = $this->db->get_where('tracer_kerja', $kondisiTracer)->num_rows();
                    $cekTracerKuliah = $this->db->get_where('tracer_kuliah', $kondisiTracer)->num_rows();
                    
                    
                    // pengecekan
                    if ( $cekTracerKerja != 0 ) $kerja++;
                    if ( $cekTracerKuliah != 0 ) $kuliah++;
                    if( ($cekTracerKuliah != 0) AND ($cekTracerKerja != 0) ) $kerjaKuliah++;
                }

                // total alumni
                $alumni = $ambilDataSiswaBerdasarkanALumni->num_rows();
            }


            return array(

                'total_alumni'  => $alumni,
                'total_kerja'   => $kerja,
                'total_kuliah'  => $kuliah,
                'total_kerjakuliah' => $kerjaKuliah
            );
        }
    }
    
    /* End of file M_dashboard.php */
    
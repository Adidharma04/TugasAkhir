<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Tracer_model extends CI_Model {
    
        // ambil keseluruhan kerja + kuliah
        function getDataTracer() {

            // session 
            $id_profile = $this->session->userdata('sess_id_profile');
            $where = ['id_profile' => $id_profile];

            // menyiapkan data tracer kuliah + kerja
            $dataTracer = array();


            /**
             * 
             *  To do List
             *  1. Mengambil data tracer kerja berdasarkan id_profile (query) + (session)
             *  2. Pengecekan apakah alumni memiliki tracer kerja ? (num_rows)
             *  3. jika iya --- memasukkan data tracer kerja ke dalam variabel $dataTracer (foreach) + (array_push)
             * 
             *  4. Mengambil data tracer kuliah berdasarkan id_profile (query) + (session)
             *  5. Pencekan apakah alumni sedang kuliah ? (num_rows)
             *  6. Iya -- memasukkan data tracer kuliah ke dalam variabel $dataTracer (foreach)
             * 
             */


            // @TODO 1 : Mengambil data tracer kerja
            $this->db->where( $where );
            $ambilDataTracerKerja = $this->db->get('tracer_kerja');

            // @TODO 2 : Pengecekan tracer kerja 
            if ( $ambilDataTracerKerja->num_rows() > 0 ) {

                // @TODO 3 : Memasukkan rekap kerja ke dalam variabel $dataTracer 
                foreach ( $ambilDataTracerKerja->result_array() AS $rowKerja ) {  // foreach

                    // array_push 
                    $dataKerja = array(

                        'tipe_tracer'   => "kerja", // jenis tracer
                        'data'          => $rowKerja, // informasi detail
                        'time'          => $rowKerja['tahun_masuk'] // informasi waktu
                    );
                    array_push( $dataTracer, $dataKerja );
                }
            } 





            

            // @TODO 4 : Mengambil data tracer kuliah
            $this->db->where( $where );
            $ambilDataTracerKuliah = $this->db->get('tracer_kuliah');

            // @TODO 5: Pengecekan tracer kuliah
            if ( $ambilDataTracerKuliah->num_rows() > 0 ) {

                // @TODO 6 : Memasukan rekap kuliah ke dalam variabel $dataTracer 
                foreach ( $ambilDataTracerKuliah->result_array() AS $rowKuliah ) {

                    // array_push 
                    $dataKuliah = array(

                        'tipe_tracer'   => "kuliah",
                        'data'          => $rowKuliah,
                        'time'          => $rowKuliah['tahun_masuk']
                    );

                    // push 
                    array_push( $dataTracer, $dataKuliah );
                }
            }



            // return
            return $dataTracer;
        }
    
    }



    /* End of file Tracer_model.php */
    
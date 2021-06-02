<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Tracer_model extends CI_Model {
        

        // hitung tracer kerja
        function hitungTracerKerja( $id_profile ) {

            $where = ['id_profile' => $id_profile];
            return $this->db->get_where('tracer_kerja', $where);
        }


        // hitung tracer kerja
        function hitungTracerKuliah( $id_profile ) {

            $where = ['id_profile' => $id_profile];
            return $this->db->get_where('tracer_kuliah', $where);
        }


        // ambil keseluruhan kerja + kuliah
        function getDataTracer( $id_profile ) {

            
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

        // ambil data edit tracer
        function getDataTracerByTypeAndId( $tipe, $id ) {

            if ( $tipe == "kuliah" ) {

                $this->db->where('id_kuliah', $id);
                $query = $this->db->get('tracer_kuliah');

            } else {
                $this->db->where('id_kerja', $id);
                $query = $this->db->get('tracer_kerja');
            }


            return $query;
        }

        function editDataTracer(){

            /**
             * 
             *  @var $id = id yang bersifat universal akan tetapi berdasarkan variabel $tipe 
             *  @var $tipe = merepresentasikan jenis yang akan di ubah
            */

            $id   = $this->input->post('id'); 
            $tipe = $this->input->post('tipe');

            if ( $tipe == "kuliah" ) {
                
                $data = [
                    'nama_kampus'                   => $this->input->post('nama_kampus', true),
                    'program_studi'                 => $this->input->post('program_studi', true),
                    'jurusan'                       => $this->input->post('jurusan', true),
                    'tahun_masuk'                   => $this->input->post('tahun_masuk', true),
                    'tahun_lulus'                   => $this->input->post('tahun_lulus', true),
                    'jalur_penerimaan'              => $this->input->post('jalur_penerimaan', true),
                ];

                $this->db->where('id_kuliah', $id);
                $this->db->update('tracer_kuliah', $data);

            }else if( $tipe == "kerja" ){

                $data = [

                    'nama_perusahaan'                   => $this->input->post('nama_perusahaan', true),
                    'jenis_perusahaan'                  => $this->input->post('jenis_perusahaan', true),
                    'jabatan'                           => $this->input->post('jabatan', true),
                    'alamat_perusahaan'                 => $this->input->post('alamat_perusahaan', true),
                    'tahun_masuk'                       => $this->input->post('tahun_masuk', true),
                    'tahun_keluar'                       => $this->input->post('tahun_keluar', true),
                    'status'                            => $this->input->post('status', true),
                ];

                $this->db->where('id_kerja', $id);
                $this->db->update('tracer_kerja', $data);
            }

        }

        // delete tracer kuliah / kerja
        function hapusTracer( $tipe, $id ){


            if ( $tipe == "kuliah" ) {

                $this->db->where('id_kuliah', $id);
                $this->db->delete('tracer_kuliah');
                
                
            
            } else if ( $tipe == "kerja" ) {

                $this->db->where('id_kerja', $id);
                $this->db->delete('tracer_kerja');
            }


            // redirect
            redirect('alumni/tracer');
        }
    }



    /* End of file Tracer_model.php */
    
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_alumni extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Tracer_alumni_model');
        $this->load->model('alumni/Tracer_model');



        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("admin/login");
        }if($this->session->userdata('sess_level') != "staff"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Staff!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('admin/login', 'refresh');
        }
    }

    public function index()
    {
         //-- Title Halaman
         $data ['title'] = 'Halaman Tracer alumni | admin';
         //----------------------------
                // old
        // $data['tracer_alumni'] = $this->Tracer_alumni_model->tampilDataTracerKuliah(); 
        
        // new
        $data['tracer_alumni'] = $this->Tracer_alumni_model->unionTracerKuliahAndKerja(); 
        $data['tracer_kuliahkerja'] = $this->Tracer_alumni_model->ambilDataStatistik_kerjaKuliah();
        
        $this->load->view('Template/admin/navbar',$data);
        $this->load->view('Template/admin/sidebar',$data);
        $this->load->view('admin/tracer_alumni/index',$data);
        $this->load->view('Template/admin/footer');


        // print_r( $data['tracer_alumni']->result_array() );
    }




    // tracer detail
    function detail( $id_profile = null ) {


        if ( $id_profile ) {

            $data ['title'] = 'Detail Tracer | alumni';
            $data['tracer'] =  $this->Tracer_model->getDataTracer( $id_profile );
            //----------------------------

            foreach ( $data['tracer'] as $row ) {

                // echo $row['data']['nama_perusahaan'].' '; 

                $nama = "";
                if ( $row['tipe_tracer'] == "kuliah" ) {

                    $nama = $row['data']['nama_kampus'];
                } else {

                    $nama = $row['data']['nama_perusahaan'];
                }
            }

            $this->load->view('Template/admin/navbar',$data);
            $this->load->view('Template/admin/sidebar',$data);
            $this->load->view('admin/tracer_alumni/detail',$data);
            $this->load->view('Template/admin/footer');
        } else {

            // page not found
            show_404();
        }
        
    }

    // cetak pdf
    function exportToPDF() {

        
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


        // //meletakkan gambar
        // $pdf->letak('assets/Gambar/Website/Title_SMA.png');
        // //meletakkan judul disamping logo diatas
        // $pdf->judul('PEMERINTAH PROVINSI JAWA TIMUR', 'DINAS PENDIDIKAN','SEKOLAH MENENGAH ATAS NEGERI PLOSO','Jl. Raya 230 Ploso Jombang Telp. (0321)888814', 'Website: www.smanegeriploso.sch.id | E-Mail: smanegeri_ploso@yahoo.co.id');
        // //membuat garis ganda tebal dan tipis
        // $pdf->garis();




        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('smannplosojombang');
        $pdf->SetTitle('REKAP DATA TRACER alumni');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('times', '', 14, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage('L', 'A4');

        // set text shadow effect
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));






        $filter_graduate = $this->input->get('graduate');
        
        $spesifik = "";
        if ( $filter_graduate == true ) {

            $spesifik = "Tahun ". $filter_graduate; 
        }





        // Set some content to print
        $html = '<table border="0">
                <tr>
                    <td align="center"><h2>REKAP DATA TRACER alumni</h2></td>
                </tr>
                <tr>
                    <td align="center"><h3>SMA Negeri Ploso '.$spesifik.'</h3></td>
                </tr>
            </table>';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(5, false);




        $table_body = "";
        $profil_siswa = $this->Tracer_alumni_model->tampilDataTracerKuliah();

        $no = 1;
        foreach ( $profil_siswa AS $row ) {

            $table_body .= '
                <tr>
                
                    <td>'.$no.'</td>
                    <td>'.$row->nis.'</td>
                    <td>'.$row->nama.'</td>
                    <td>'.$row->nama_kampus.'</td>
                    <td>'.$row->program_studi.'</td>
                </tr>
            ';

            $no++;
        }




        
        $table = '
        
            <table border="1" width="100%" cellpadding="6" style="font-size: 10px">
                <tr>
                    <th><b>No</b></th>
                    <th><b>NIS</b></th>
                    <th>NAMA</th>
                    <th>NAMA KAMPUS</th>
                    <th>PROGRAM STUDI</th>
                </tr>

                '.$table_body.'
            </table>
        ';


        $pdf->writeHTML($table, true, false, true, false, '');
        $pdf->Ln(5, false);




        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('REKAP DATA TRACER alumni.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }

}

/* End of file Controllername.php */

?>
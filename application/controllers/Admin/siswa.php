<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/siswa_model');
        if (empty($this->session->userdata('sess_id_profile'))) {

            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "staff"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Staff!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('Admin/login', 'refresh');
        }



        $this->load->library('pdf');
    }
    public function index()
    {
        //-- Title Halaman
        $data['title'] = 'Halaman Siswa | Admin';
        //----------------------------
        $data['profil_siswa'] = $this->siswa_model->tampilDataSiswa();
        
        $this->load->view('Template/Admin/navbar', $data);
        $this->load->view('Template/Admin/sidebar', $data);
        $this->load->view('Admin/siswa/index', $data);
        $this->load->view('Template/Admin/footer');
    }
    public function tambah()
    {
        //-- rule--//
        $this->form_validation->set_rules('nis', 'Nis ', 'required|trim|is_unique[profil_siswa.nis]', [
            'required' => 'Masukkan No Induk Siswa',
            'is_unique' => 'No Induk Siswa telah terdaftar',
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Masukkan Nama Siswa',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Masukkan Alamat Siswa',
        ]);
        
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Masukkan Tanggal Lahir',
        ]);
        
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => 'Masukkan Tempat Lahir',
        ]);

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim', [
            'required' => 'Pilih salah satu jurusan',
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[profil_siswa.email]', [
            'required'  => 'Masukkan Email Siswa',
            'is_unique' => 'Email telah terdaftar',
        ]);
        $this->form_validation->set_rules('no_telfon', 'No Telpon', 'required|trim', [
            'required' => 'Masukkan No Telpon Siswa',
        ]);

        $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'required|trim', [
            'required' => 'Masukkan Tahun Lulus Siswa',
        ]);
        //----------------------------------------------------------------------

        //-- Title Halaman
        $data['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
        $data['profil_siswa'] = $this->siswa_model->tampilDataSiswa();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/Admin/navbar', $data);
            $this->load->view('Template/Admin/sidebar', $data);
            $this->load->view('Admin/siswa/tambah', $data);
            $this->load->view('Template/Admin/footer',$data);
        } else {

            $nis = $this->input->post('nis');
            $upload = $this->siswa_model->upload( $nis );
            if ($upload['result'] == 'success') {
                $this->siswa_model->tambahDataSiswa($upload);
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Data siswa berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('Admin/siswa', 'refresh');
            } else {
                echo $upload['error'];
            }
        }
    }
    public function edit($id_siswa)
    {
        $getDataSiswaById = $this->siswa_model->getSiswa($id_siswa);
        $nis = $getDataSiswaById->nis;
        $email = $getDataSiswaById->email;

        // input 
        $inputNIS = $this->input->post('nis');
        $inputEmail = $this->input->post('email');

        if ($nis != $inputNIS) {
            //-- rule--//
            $this->form_validation->set_rules('nis', 'Nis ', 'required|trim|is_unique[profil_siswa.nis]', [
                'required' => 'Masukkan No Induk Siswa',
                'is_unique' => 'No Induk Siswa telah terdaftar',
            ]);
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Masukkan Nama Siswa',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Masukkan Alamat Siswa',
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => 'Masukkan Tempat Lahir',
        ]);

        if ($email != $inputEmail) {

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[profil_siswa.email]', [
                'required'  => 'Masukkan Email Siswa',
                'is_unique' => 'Email telah terdaftar',
            ]);
        }

        $this->form_validation->set_rules('no_telfon', 'No Telpon', 'required|trim', [
            'required' => 'Masukkan No Telpon Siswa',
        ]);

        $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'required|trim', [
            'required' => 'Masukkan Tahun Lulus Siswa',
        ]);
        //----------------------------------------------------------------------
        //-- Title Halaman
        $data['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
        $data['profil_siswa'] = $getDataSiswaById;
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/Admin/navbar', $data);
            $this->load->view('Template/Admin/sidebar', $data);
            $this->load->view('Admin/siswa/edit', $data);
            $this->load->view('Template/Admin/footer');
        } else {
            $this->siswa_model->editDataSiswa($id_siswa);
            $html = '<div class="alert alert-success">
                        <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                        <b>Pemberitahuan</b> 
                        <br>
                        Data siswa berhasil di edit pada tanggal ' . date('d F Y H.i A') . '
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Admin/siswa', 'refresh');
        }
    }
    public function detail($id_siswa)
    {
        //-- Title Halaman
        $data['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
        $data['profil_siswa'] = $this->siswa_model->getSiswa($id_siswa);

        $this->load->view('Template/Admin/navbar', $data);
        $this->load->view('Template/Admin/sidebar', $data);
        $this->load->view('Admin/siswa/detail', $data);
        $this->load->view('Template/Admin/footer');
    }



    // proses hapus siswa
    function onDelete($id_profile)
    {
        $this->siswa_model->prosesHapusSiswa($id_profile);
        $html = '<div class="alert alert-success">
                    <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                    <b>Pemberitahuan</b> <br>
                    Data siswa berhasil terhapus pada tanggal ' . date('d F Y H.i A') . '
                 </div>';
        $this->session->set_flashdata('msg', $html);
        redirect('Admin/siswa', 'refresh');
    }










    // cetak pdf
    function exportToPDF() {

        
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


        // //meletakkan gambar
        // $pdf->letak('assets/Gambar/Website/Title_SMA.png');
        // //meletakkan judul disamping logo diatas
        // $pdf->judul('PEMERINTAH KOTA PAGAR ALAM', 'DINAS PENDIDIKAN','SEKOLAH MENENGAH ATAS NEGERI 4','Jambat Balo Pagar Alam Selatan Kota Pagar Alam Telp. (0730)622442', 'Website: http://sman4pagaralam.sch.id | E-Mail: smanegeri4pagaralam@gmail.com');
        // //membuat garis ganda tebal dan tipis
        // $pdf->garis();




        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('LAPORAN DATA SISWA DAN ALUMNI');
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






        $filter_query = $this->input->get('tahun');
        
        $spesifik = "";
        if ( $filter_query == true ) {

            $spesifik = "berdasarkan tahun lulus ". $filter_query; 
        }





        // Set some content to print
        $html = '<table border="0">
                <tr>
                    <td align="center"><h2>LAPORAN DATA SISWA</h2></td>
                </tr>
                <tr>
                    <td align="center"><h3>SMA Negeri Ploso '.$spesifik.'</h3></td>
                </tr>
            </table>';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(5, false);




        $table_body = "";
        $profil_siswa = $this->siswa_model->tampilDataSiswa();

        $no = 1;
        foreach ( $profil_siswa AS $row ) {

            $status_siswa = "";

            if ( $row->verifikasi_alumni == "diterima" ) {

                $status_siswa  = "Alumni";
            } else {
                $status_siswa  = "Siswa";
            }

            $table_body .= '
                <tr>
                
                    <td>'.$no.'</td>
                    <td>'.$row->nis.'</td>
                    <td>'.$row->nama.'</td>
                    <td>'.$status_siswa.'</td>
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
                    <th>Status</th>
                </tr>

                '.$table_body.'
            </table>
        ';


        $pdf->writeHTML($table, true, false, true, false, '');
        $pdf->Ln(5, false);




        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('LAPORAN DATA SISWA.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }
}

/* End of file profile.php */

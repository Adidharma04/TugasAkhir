<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_diskusi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
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

        $this->load->model('Admin/forum_diskusi_model');
    }
    public function index()
    {
        //-- Title Halaman
         $data ['title'] = 'Halaman Forum diskusi | Admin';
        //----------------------------

        $data['topik'] = $this->forum_diskusi_model->getDataTopic();
        $data['forum'] = $this->forum_diskusi_model->getDataForum();


        // $data['informasi_umum'] = $this->informasi_umum_model->tampilDataInformasiUmum(); 
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/forum_diskusi/index',$data);
        $this->load->view('Template/Admin/footer');
    } 

    // proses tambah topik
    function prosestambah() {
        $this->forum_diskusi_model->onInsertDataTopic();
    }

    public function tambahForum()
    {   
        //rule
        $this->form_validation->set_rules('nama_forum', 'Nama Forum', 'required|trim',[
            'required' => 'Masukkan Nama Forum',
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim',[
            'required' => 'Masukkan Deskripsi Forum',
        ]);
        $this->form_validation->set_rules('tanggal_forum', 'Tanggal Forum', 'required|trim',[
            'required' => 'Masukkan Tanggal Forum',
        ]);

        //-- Title Halaman
        $data ['title'] = 'Halaman Forum tambah diskusi | Admin';
        $data['topik'] = $this->forum_diskusi_model->getDataTopic();
        //----------------------------
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/forum_diskusi/tambah',$data);
            $this->load->view('Template/Admin/footer');
        }else{
            $upload = $this->forum_diskusi_model->upload();
            if ($upload['result'] == 'success') {
                $this->forum_diskusi_model->tambahDataForum($upload);
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Forum berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('Admin/forum_diskusi', 'refresh');
                
            } else {
                echo $upload['error'];
            }
        }    
    }

    public function editForum($id_forum)
    {   
        $getDataForumById = $this->forum_diskusi_model->getForum($id_forum);
        $data['topik'] = $this->forum_diskusi_model->getDataTopic();

        //rule
        $this->form_validation->set_rules('nama_forum', 'Nama Forum', 'required|trim',[
            'required' => 'Masukkan Nama Forum',
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim',[
            'required' => 'Masukkan Deskripsi Forum',
        ]);
        $this->form_validation->set_rules('tanggal_forum', 'Tanggal Forum', 'required|trim',[
            'required' => 'Masukkan Tanggal Forum',
        ]);

        //-- Title Halaman
        $data ['title'] = 'Halaman Forum tambah diskusi | Admin';
        $data['forum'] = $getDataForumById;
        //----------------------------
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/forum_diskusi/edit_forum',$data);
            $this->load->view('Template/Admin/footer');
        }else{
                $this->forum_diskusi_model->editDataForum();
                $html = '<div class="alert alert-success">
                            <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                            <b>Pemberitahuan</b> <br>
                            Edit Data Forum berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                        </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('Admin/Forum_diskusi', 'refresh');
        }    
    }
    
    // proses hapus
    function hapusForum( $id_forum ) {

        $this->forum_diskusi_model->prosesHapusForum( $id_forum );
        $html = '<div class="alert alert-success">
                     <b>Pemberitahuan</b> <br>
                     Data Forum berhasil terhapus pada tanggal '.date('d F Y H.i A').'
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Admin/forum_diskusi','refresh');
    }


    // proses tambah
    public function tambahDetailForum()
    {   

        $id_forum = $this->input->post('id_forum');

         //-- Title Halaman
         $data ['title'] = 'Halaman Forum Detail | Admin';
         $data['detail'] = $this->forum_diskusi_model->getDataForumById( $id_forum );
         $data['diskusi'] = $this->forum_diskusi_model->getDataForumDetail( $id_forum );
         //----------------------------

        $this->form_validation->set_rules('notes', 'Notes', 'required|trim',[
            'required' => ' (Masukkan Komentar untuk Forum)',
        ]);

        if( $this->form_validation->run() == FALSE ){
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/forum_diskusi/forum_detail',$data);
        }else{
            $this->forum_diskusi_model->tambahDataDetailForum();
            $html = '<div class="alert alert-success">
                        <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                        <b>Pemberitahuan</b> <br>
                        Tambah Data Forum berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('admin/forum_diskusi/discuss/'. $id_forum);  
        }
   
    }

    // detail forum
    function discuss( $id_forum ) {
        //-- Title Halaman
        $data ['title'] = 'Halaman Forum Detail | Admin';
        $data['detail'] = $this->forum_diskusi_model->getDataForumById( $id_forum );
        $data['diskusi'] = $this->forum_diskusi_model->getDataForumDetail( $id_forum );
        //----------------------------
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/forum_diskusi/forum_detail',$data);
       
    }


}

/* End of file profile.php */
?>
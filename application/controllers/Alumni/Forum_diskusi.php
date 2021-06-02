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
            redirect("admin/login");
        }if($this->session->userdata('sess_level') != "alumni"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan alumni!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('admin/login', 'refresh');
        }

        $this->load->model('alumni/Forum_diskusi_model');
    }
    public function index()
    {
        //-- Title Halaman
         $data ['title'] = 'Halaman Forum diskusi | alumni';
        //----------------------------

        $data['topik'] = $this->Forum_diskusi_model->getDataTopic();
        $data['forum'] = $this->Forum_diskusi_model->getDataForum();


        // $data['informasi_umum'] = $this->informasi_umum_model->tampilDataInformasiUmum(); 
        $this->load->view('Template/alumni/navbar_alumni',$data);
        $this->load->view('Template/alumni/sidebar_alumni',$data);
        $this->load->view('alumni/forum_diskusi/index',$data);
        $this->load->view('Template/alumni/footer_alumni');
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
        $this->form_validation->set_rules('id_topik', 'id_topik', 'required|trim',[
            'required' => 'Masukkan Topik',
        ]);

        //-- Title Halaman
        $data ['title'] = 'Halaman Forum tambah diskusi | alumni';
        $data['topik'] = $this->Forum_diskusi_model->getDataTopic();
        //----------------------------
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('Template/alumni/navbar_alumni',$data);
            $this->load->view('Template/alumni/sidebar_alumni',$data);
            $this->load->view('alumni/forum_diskusi/tambah',$data);
            $this->load->view('Template/alumni/footer_alumni');
        }else{
            $upload = $this->Forum_diskusi_model->upload();
            if ($upload['result'] == 'success') {
                $this->Forum_diskusi_model->tambahDataForum($upload);
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Forum berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('alumni/forum_diskusi', 'refresh');
                
            } else {
                echo $upload['error'];
            }
        }    
    }
    public function editForum($id_forum)
    {   
        $getDataForumById = $this->Forum_diskusi_model->getForum($id_forum);
        $data['topik'] = $this->Forum_diskusi_model->getDataTopic();

        //rule
        $this->form_validation->set_rules('nama_forum', 'Nama Forum', 'required|trim',[
            'required' => 'Masukkan Nama Forum',
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim',[
            'required' => 'Masukkan Deskripsi Forum',
        ]);

        //-- Title Halaman
        $data ['title'] = 'Halaman Forum tambah diskusi | admin';
        $data['forum'] = $getDataForumById;
        //----------------------------
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('Template/alumni/navbar_alumni',$data);
            $this->load->view('Template/alumni/sidebar_alumni',$data);
            $this->load->view('alumni/forum_diskusi/edit_forum',$data);
            $this->load->view('Template/alumni/footer_alumni');
        }else{
            $upload = $this->Forum_diskusi_model->upload();
            if ($upload['result'] == 'success') {
                $this->Forum_diskusi_model->editDataForum($upload);
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Forum berhasil di edit pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('alumni/forum_diskusi', 'refresh');
                
            } else {
                echo $upload['error'];
            }
        }    
    }
    
    // proses hapus
    function hapusForum( $id_forum ) {

        $this->Forum_diskusi_model->prosesHapusForum( $id_forum );
        $html = '<div class="alert alert-success">
                     <b>Pemberitahuan</b> <br>
                     Data Forum berhasil terhapus pada tanggal '.date('d F Y H.i A').'
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('alumni/forum_diskusi','refresh');
    }

    // Khusus Detail Forum-----------------------------------------------------------------------------------------


    // detail forum
    public function discuss($id_forum ) {
        //-- Title Halaman
        $data ['title'] = 'Halaman Forum Detail | alumni';
        $data['detail'] = $this->Forum_diskusi_model->getDataForumById( $id_forum );
        $data['diskusi'] = $this->Forum_diskusi_model->getDataForumDetail( $id_forum );
        //----------------------------
            $this->load->view('Template/alumni/navbar_alumni',$data);
            $this->load->view('Template/alumni/sidebar_alumni',$data);
            $this->load->view('alumni/forum_diskusi/forum_detail',$data);
            $this->load->view('Template/alumni/footer_alumni');
       
    }
    // proses tambah detail forum
    public function tambahDetailForum()
    {   

        $id_forum = $this->input->post('id_forum');

         //-- Title Halaman
         $data ['title'] = 'Halaman Forum Detail | alumni';
         $data['detail'] = $this->Forum_diskusi_model->getDataForumById( $id_forum );
         $data['diskusi'] = $this->Forum_diskusi_model->getDataForumDetail( $id_forum );
         //----------------------------

        $this->form_validation->set_rules('notes', 'Notes', 'required|trim',[
            'required' => ' (Masukkan Komentar untuk Forum)',
        ]);

        if( $this->form_validation->run() == FALSE ){
            $this->load->view('Template/alumni/navbar_alumni',$data);
            $this->load->view('Template/alumni/sidebar_alumni',$data);
            $this->load->view('alumni/forum_diskusi/forum_detail',$data);
        }else{
            $this->Forum_diskusi_model->tambahDataDetailForum();
            $html = '<div class="alert alert-success">
                        <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                        <b>Pemberitahuan</b> <br>
                        Tambah Data Forum berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('alumni/forum_diskusi/discuss/'. $id_forum);  
        }
    }

    // proses edit detail forum
    public function editDetailForum($id_detail_forum, $id_forum){

        $id_forum = $this->input->post('id_forum');
        $this->Forum_diskusi_model->editDataDetailForum($id_detail_forum);

        $html = '<div class="alert alert-success">
                    <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                    <b>Pemberitahuan</b> <br>
                    Data Detail Forum berhasil di edit pada tanggal '.date('d F Y H.i A').'
                 </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('alumni/forum_diskusi/discuss/'.$id_forum);
    }

     // proses hapus
     function hapusDetailForum( $id_detail_forum, $id_forum ) {

        $this->Forum_diskusi_model->prosesHapusDetailForum( $id_detail_forum );
        $html = '<div class="alert alert-success">
                    <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                    <b>Pemberitahuan</b> <br>
                    Data Detail Forum berhasil terhapus pada tanggal '.date('d F Y H.i A').'
                 </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('alumni/forum_diskusi/discuss/'.$id_forum);
    }


}

/* End of file profile.php */
?>
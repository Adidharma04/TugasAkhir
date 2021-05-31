<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sharing_loker_model extends CI_Model {
    
    public function tampilDataLoker()
    {
        $id_profile = $this->session->userdata('sess_id_profile');
        
        $where = ['id_profile' => $id_profile];
        return $this->db->get_where('loker', $where);

    }public function tambahDataLoker($upload_foto,$upload_berkas){

        $id_profile = $this->session->userdata('sess_id_profile');
        $getDataSiswaById = $this->db->where('id_profile', $id_profile)->get('profil_siswa')->row();
		
		
		$sqlProfileBK  = "SELECT profile.id_profile, profile.level, profil_pegawai.email FROM profile 
						 JOIN profil_pegawai ON profil_pegawai.id_profile = profile.id_profile 
						 
						 WHERE level = 'bk'";
		$getDataBKByLevel = $this->db->query( $sqlProfileBK )->row();

        $nama_pekerjaan    = $this->input->post('nama_pekerjaan', true);

        $loker =[
            'id_profile'                   => $id_profile,
            'nama_pekerjaan'               => $nama_pekerjaan,
            'deskripsi_pekerjaan'          => $this->input->post('deskripsi_pekerjaan', true),
            'alamat'                       => $this->input->post('alamat', true),
            'status'                       => 'pending',
            'foto'                         => $upload_foto['file'],
            'berkas'                       => $upload_berkas['file'],
        ];
        $this->db->insert('loker', $loker);

         // notifikasi

			$this->notifikasiEmail( $getDataBKByLevel->email, $getDataSiswaById->nama, $nama_pekerjaan );
    }

    public function upload( $type, $size, $name ){    
        $config['upload_path'] = './assets/Gambar/Upload/Loker/';  
        $config['allowed_types'] = $type;
        $config['max_size']     = $size; // 3 mb

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
            if($this->upload->do_upload( $name )){
                $return = array(
                    'result' => 'success', 
                    'file' => $this->upload->data('file_name'), 
                    'error' => '');      
                return $return;
            }else{    
                $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
                return $return;   
            }  
    }

    public function getLoker($id_loker){
		// return $this->db->get_where('profil_siswa',['id_siswa'=>$id_siswa])->result();
        return $this->db->get_where('loker',['id_loker'=>$id_loker])->row();
	}
	
    public function editDataLoker( $id_loker){
        
        // ambil detail informasi loker
        $ambilInformasiLoker = $this->getLoker( $id_loker );
        
        // upload foto
        $config['upload_path'] = './assets/Gambar/Upload/Loker/';    
        $config['allowed_types'] = 'doc|docx|pdf|png|jpg|jpeg';
        $this->load->library('upload', $config);


        $foto = "";
        $berkas = "";

        // apabila dia ingin mengubah gambar 
        if ( !empty( $_FILES['foto']['name'] )  ) {


            if ( $this->upload->do_upload('foto')  ){

                if ( $ambilInformasiLoker->foto  ) { // remove old photo

                    $link = $config['upload_path']. $ambilInformasiLoker->foto;
                    unlink( $link );
                    
                }
                // set value new photo
                $foto = $this->upload->data('file_name');
                
            }else{    
                
                // upload error
                $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> '.$this->upload->display_errors().'</div>';
                $this->session->set_flashdata('msg', $html);

                redirect('Admin/loker/edit/'. $id_loker);
                
            }  

        // gambar tetap alias tidak diubah sama sekali
        } else {

            if ( $ambilInformasiLoker->foto   ) {
                $foto = $ambilInformasiLoker->foto;
            }
        }

        // apabila dia ingin mengubah dokumen 
        if ( !empty(  $_FILES['berkas']['name']) ) {

            $conf_berkas_allowed = 'pdf|docx|doc';
            $conf_berkas_size    = 10000;
            $upload_berkas = $this->upload( $conf_berkas_allowed, $conf_berkas_size, 'berkas' );

            if ( $upload_berkas['result'] == "success" ) {

                $berkas = $upload_berkas['file'];

                // hapus file lama 
                if ( $ambilInformasiLoker->berkas ) { // remove old document

                    $link = './assets/Gambar/Upload/Informasi/'. $ambilInformasiLoker->berkas;
                    unlink( $link );
                }
            }else{    
                
                // upload error
                $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> '.$this->upload->display_errors().'</div>';
                $this->session->set_flashdata('msg', $html);

                redirect('Admin/loker/edit/'. $id_loker);
                
            }
        // Dokumen tetap alias tidak diubah sama sekali
        } else {

            if ( $ambilInformasiLoker->berkas ) {

                $berkas = $ambilInformasiLoker->berkas;
            }
        }
        
        
        // data informasi loker
        $dataInformationLoker =[

            'nama_pekerjaan'               => $this->input->post('nama_pekerjaan', true),
            'deskripsi_pekerjaan'          => $this->input->post('deskripsi_pekerjaan', true),
            'alamat'                       => $this->input->post('alamat', true),
            'status'                       => 'pending',
            'foto'                         => $foto,
            'berkas'                       => $berkas,
		];

        // update loker
        $this->db->where('id_loker', $id_loker);	
        $this->db->update('loker', $dataInformationLoker);

    }   // porses hapus

    function prosesHapusLoker( $id_loker ){
		$ambilInformasiLoker = $this->getLoker( $id_loker );

        $config['upload_path'] = './assets/Gambar/Upload/Loker/';    
        $config['allowed_types'] = 'doc|docx|pdf|png|jpg|jpeg';
        $this->load->library('upload', $config);

        if (!empty( $_FILES['berkas']['name'] )  ) {
            if ( $ambilInformasiLoker->berkas) { 
                $link = $config['upload_path']. $ambilInformasiLoker->berkas;
                unlink( $link );
            }
        }
        if (!empty( $_FILES['foto']['name'] )  ) {
            if ( $ambilInformasiLoker->foto) { 
                $link = $config['upload_path']. $ambilInformasiLoker->foto;
                unlink( $link );
            }
        }

        $this->db->where('id_loker', $id_loker)->delete('loker');

    }

    
    
    function notifikasiEmail( $email, $nama_siswa, $nama_pekerjaan) {


		// load library
		$this->load->library('email');

		$config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = 465;
        $config['smtp_user'] = "smanistracerstudy@gmail.com";
        $config['smtp_pass'] = "smanis123";
        $config['smtp_timeout'] = '7';
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['starttls'] = true;
            

        $this->email->initialize($config);
            

        $this->email->set_newline("\r\n");
            
        $this->email->from('no-reply@smanegeriploso', "SMA Negeri Ploso");

        // Email penerima
        $this->email->to('"' . $email . '"'); // Email tujuan / penerima

        // Subject email
        $this->email->subject('Pengajuan Sharing Loker '. $nama_pekerjaan);

		// membuat pesan dinamis berdasarkan status
		$pesan = "";
		
		$htmlContent = '
		<!doctype html>
		<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
		<head>
			<title>
			</title>
			<!--[if !mso]><!-- -->
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<!--<![endif]-->
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<style type="text/css">
				#outlook a {
					padding: 0;
				}
				.ReadMsgBody {
					width: 100%;
				}
				.ExternalClass {
					width: 100%;
				}
				.ExternalClass * {
					line-height: 100%;
				}
				body {
					margin: 0;
					padding: 0;
					font-family: Sans-Serif;
					-webkit-text-size-adjust: 100%;
					-ms-text-size-adjust: 100%;
				}
				table,
				td {
					border-collapse: collapse;
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
				}
				img {
					border: 0;
					height: auto;
					line-height: 100%;
					outline: none;
					text-decoration: none;
					-ms-interpolation-mode: bicubic;
				}
				p {
					display: block;
					margin: 13px 0;
				}
			</style>
			<!--[if !mso]><!-->
			<style type="text/css">
				@media only screen and (max-width:480px) {
					@-ms-viewport {
						width: 320px;
					}
					@viewport {
						width: 320px;
					}
				}
			</style>
			<!--<![endif]-->
			<!--[if mso]>
				<xml>
				<o:OfficeDocumentSettings>
				<o:AllowPNG/>
				<o:PixelsPerInch>96</o:PixelsPerInch>
				</o:OfficeDocumentSettings>
				</xml>
				<![endif]-->
			<!--[if lte mso 11]>
				<style type="text/css">
				.outlook-group-fix { width:100% !important; }
				</style>
				<![endif]-->
			<style type="text/css">
				@media only screen and (min-width:480px) {
					.mj-column-per-100 {
						width: 100% !important;
					}
				}
			</style>
			<style type="text/css">
			</style>
		</head>
		<body style="background-color:#f9f9f9;">
			<div style="background-color:#f9f9f9;">
				<!--[if mso | IE]>
				<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600">
					
					<tr>
						<td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
				<![endif]-->
							<div style="background:#f9f9f9;background-color:#f9f9f9;Margin:0px auto;max-width:600px;">
								<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f9f9f9;background-color:#f9f9f9;width:100%;">
									<tbody>
									<tr>
										<td style="border-bottom:#333957 solid 5px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
											<!--[if mso | IE]>
											<table role="presentation" border="0" cellpadding="0" cellspacing="0">
											
												<tr>
													
												</tr>
							
											</table>
											<![endif]-->
										</td>
									</tr>
									</tbody>
								</table>
							</div>
						<!--[if mso | IE]>
						</td>
					</tr>
				</table>
				
				<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600">
					<tr>
						<td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
						<![endif]-->
							<div style="background:#fff;background-color:#fff;Margin:0px auto;max-width:600px;">
								<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#fff;background-color:#fff;width:100%;">
									<tbody>
										<tr>
											<td style="border:#dddddd solid 1px;border-top:0px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
												<!--[if mso | IE]>
												<table role="presentation" border="0" cellpadding="0" cellspacing="0">
							
												<tr>
							
													<td style="vertical-align:bottom;width:600px;">
													<![endif]-->
														<div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
															<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
																<tr>
																	<td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;">
																		<img src="http://www.smanegeriploso.sch.id/wp-content/uploads/2020/06/Logo.png" style="width: 100px; display: block" title="Logo" alt="Logo">
																		<div style="font-family:sans-serif;font-size:20px;font-weight:bold;line-height:1;text-align:left;color:#555; margin-top: 20px">
																			SMA Negeri Ploso
																			<div style="color:#555; font-size: 12px; margin-top: 5px">Persetujuan Sharing Loker</div>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
																		<div style="font-family:Helvetica Neue,Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
																			Saudara, '.$nama_siswa.'
																			<br>
																			Ingin membagikan informasi lowongan pekerjaan  '.$nama_pekerjaan.' untuk dibagikan di Smanis Tracer Study.' .$pesan.'
																		</div>
																	</td>
																</tr>
																<tr>
																	<td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
																		<div style="font-size: 12px;font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:22px;text-align:left;color:#555;">
																			Dimohon untuk segera mengakses website Smanis Tracer Study.
																			<br>Untuk melakukan validasi sharing lowongan pekerjaan oleh alumni.
																		</div>
																	</td>
																</tr>
																<tr>
																	<td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
																		<div style="font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:20px;text-align:left;color:#525252;"><br>
																			Salam,<br><br> Admin<br>
																			
																		</div>
																	</td>
																</tr>
																<tr>
																	<td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
																		<div style="font-family:Helvetica Neue,Arial,sans-serif;font-size:10px;line-height:20px;text-align:left;color:#525252;">
																			<hr>
																			<label>Jika anda mengalami permasalahan dalam pengiriman email, hubungi admin segera.</label>
																			
																		</div>
																	</td>
																</tr>
								
															</table>
														</div>
														<!--[if mso | IE]>
													</td>
												
												</tr>
	
												</table>
												<![endif]-->
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!--[if mso | IE]>
						</td>
					</tr>
				</table>
				<![endif]-->
			</div>
		</body>
		</html>';

		// Isi email
		$this->email->message($htmlContent);
		$this->email->send();

		//return $this->email->print_debugger();
		$print = $this->email->print_debugger();

		// print_r( $print );
	}



}

/* End of file Event_model.php */
?> 
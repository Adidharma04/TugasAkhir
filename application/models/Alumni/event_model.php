<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {

    public function tampilDataEvent(){
        $id_profile = $this->session->userdata('sess_id_profile');
        
        $where = ['id_profile' => $id_profile];
        return $this->db->get_where('event', $where);
    }
    public function tambahDataEvent($upload){


        $id_profile = $this->session->userdata('sess_id_profile');

		$getDataSiswaById = $this->db->where('id_profile', $id_profile)->get('profil_siswa')->row();
		
		
		$sqlProfileBK  = "SELECT profile.id_profile, profile.level, profil_pegawai.email FROM profile 
						 JOIN profil_pegawai ON profil_pegawai.id_profile = profile.id_profile 
						 
						 WHERE level = 'bk'";
		$getDataBKByLevel = $this->db->query( $sqlProfileBK )->row();

        $tanggal_evt = $this->input->post('tanggal_event', true);
		$nama_evt    = $this->input->post('nama_event', true);

        $event =[
            'id_profile'            => $id_profile,
            'nama_event'            => $nama_evt,
            'deskripsi_event'       => $this->input->post('deskripsi_event', true),
            'tanggal_event'         => $tanggal_evt,
            'foto'                  => $upload['file']['file_name'],
            'lokasi'                => $this->input->post('lokasi', true),
            'status'                => "pending",
        ];

        // query untuk melakukan pengecekan
        $where = ['id_profile' => $id_profile];
        $dataEvent = $this->db->get_where('event', $where);
        
        $tanggal_sekarang = date('Y-m-d');

        if ( strtotime( $tanggal_evt ) < strtotime($tanggal_sekarang ) ){

            // maaf masukkan tanggal yang valid
            $html = '<div class="alert alert-danger">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Tanggal event harus hari ini ' . date('d F Y H.i A') . ' atau lebih dari hari ini
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('alumni/event/tambah', 'refresh');
        } else {

            if ( $dataEvent->num_rows() == 1 ) {
                // do update data
                $this->db->where( $where );
                $this->db->insert('event', $event);
            } else {
                $this->db->insert('event', $event);
            }


			// notifikasi

			$this->notifikasiEmail( $getDataBKByLevel->email, $getDataSiswaById->nama, $nama_evt );

            $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Data event berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
            redirect('alumni/event', 'refresh');
        }
    }
    public function upload(){    
        $config['upload_path'] = './assets/Gambar/Upload/Event/';    
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);

        if ( empty( $_FILES['foto']['name'] ) ) {

            return array('result' => 'success', 'file' => ['file_name' => ""]);
        } else {

            if($this->upload->do_upload('foto')){
                $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
                return $return;
            }else{    
                $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());return $return;   
            }  
        }
    }
    public function getEvent($id_siswa){
        return $this->db->get_where('event',['id_event'=>$id_siswa])->row();
	}
    
    public function editDataEvent( $id_event ){
        
        // ambil detail informasi siswa
        $ambilInformasiEvent = $this->getEvent( $id_event );
        
        

        // upload foto
        $config['upload_path'] = './assets/Gambar/Upload/Event/';    
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);


        $foto = "";
        // apabila dia ingin mengubah gambar 
        if ( !empty( $_FILES['foto']['name'] ) ) {


            if ( $this->upload->do_upload('foto') ){

                if ( $ambilInformasiEvent->foto ) { 
                    // remove old photo
                    $link = $config['upload_path']. $ambilInformasiEvent->foto;
                    unlink( $link );
                }

                // set value new photo
                $foto = $this->upload->data('file_name');
                
            }else{    
                
                // upload error
                $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> '.$this->upload->display_errors().'</div>';
                $this->session->set_flashdata('msg', $html);

                redirect('alumni/event/edit/'. $id_event);
                
            }  

        // gaambar tetap alias tidak diubah sama sekali
        } else {

            if ( $ambilInformasiEvent->foto ) {

                $foto = $ambilInformasiEvent->foto;
            }
        }
        
        $tanggal_evt = $this->input->post('tanggal_event', true);
        // data informasi siswa
        $dataInformationEvent =[

            'nama_event'            => $this->input->post('nama_event', true),
            'deskripsi_event'       => $this->input->post('deskripsi_event', true),
            'tanggal_event'         => $tanggal_evt,
            'foto'                  => $foto,
            'lokasi'                => $this->input->post('lokasi', true),
            'status'                => 'pending',
		];
        $tanggal_sekarang = date('Y-m-d');

        if ( strtotime( $tanggal_evt ) < strtotime($tanggal_sekarang ) ){

            // maaf masukkan tanggal yang valid
            $html = '<div class="alert alert-danger">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Data event tidak berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('alumni/event/tambah', 'refresh');
        } else {

            // update information_event
            $this->db->where('id_event', $id_event);	
            $this->db->update('event', $dataInformationEvent);
            
            $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <br>
                                <b>Pemberitahuan</b> <br>
                                Data event berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
            redirect('alumni/event', 'refresh');
        }
        

    }
     // porses hapus
     function prosesHapusEvent( $id_event ){
        $ambilInformasiEvent = $this->getEvent( $id_event );
        
        if ( $ambilInformasiEvent->foto ) {

            $directory = './assets/Gambar/Upload/Event/';    
            // remove old photo
            $link = $directory . $ambilInformasiEvent->foto;
            unlink( $link );
        }
        
        
        $this->db->where('id_event', $id_event)->delete('event');

    }



    function notifikasiEmail( $email, $nama_siswa, $nama_event) {

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
        $this->email->subject('Pengajuan Event '. $nama_event);

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
																			<div style="color:#555; font-size: 12px; margin-top: 5px">Persetujuan Event Alumni</div>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
																		<div style="font-family:Helvetica Neue,Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
																			Saudara, '.$nama_siswa.'
																			<br>
																			Telah melakukan pengajuan event  '.$nama_event.' untuk dibagikan di Smanis Tracer Study.' .$pesan.'
																		</div>
																	</td>
																</tr>
																<tr>
																	<td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
																		<div style="font-size: 12px;font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:22px;text-align:left;color:#555;">
																			Dimohon untuk segera mengakses website Smanis Tracer Study.
																			<br>Untuk melakukan validasi event yang telah diajukan oleh alumni.
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
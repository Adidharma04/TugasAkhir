<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {
	
	public function registerAlumni(){
		$data=[
            'nama'		    =>$this->input->post('nama' , true),
            'email'			=>$this->input->post('email', true),
			'no_induk'		=>$this->input->post('no_induk', true),
			'username'		=>$this->input->post('username', true),
			'password'		=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
			'role_id' 		=> 3,
			'status'		=> 'pasif',
			'date_created'	=> time()
		];
		$this->db->insert('user', $data);
	}



	// cek  data nis
	function cekDataNIS() {


		// init
		$pesan = false;
		$data = [];
		
		// ambil nilai
		$nis = $this->input->get('nis');
		

		// query
		$where = ['nis' => $nis];
		$query = $this->db->get_where('profil_siswa', $where);
		
		// cek
		if ( $query->num_rows() == 1 ) {

			$pesan = true;
			$data = $query->result_array();
		} else {

			$pesan = false;
			$data  = [];
		}


		echo json_encode( [

			'status' => $pesan, // TRUE or FALSE
			'data'	 => $data // data or value
		] );
		
	}




	
	// registrasi 
	function registrasiSiswa() {


		$nis   = $this->input->post('no_induk');
		$email = $this->input->post('email');


		// ambil data siswa
		$where = ['nis' => $nis];
		$getDataSiswa = $this->db->get_where('profil_siswa', $where)->row_array();


		$data_informationstudent = [

			'email'				=> $email,
			'verifikasi_alumni'	=> "pengajuan"
		];

		$this->db->where('nis', $nis);
		$this->db->update('profil_siswa', $data_informationstudent);

		
		/** Proses Pengiriman Email (Add On) */
		$this->notifikasiEmail( $email, $getDataSiswa['nama'] );



		return true;




		
	}










	// notifikasi email
	function notifikasiEmail( $email, $nama_siswa ) {


		// load library
		$this->load->library('email');

		$config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = 465;
        $config['smtp_user'] = "ikawahyufeb@gmail.com";
        $config['smtp_pass'] = "punyanyaika17";
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
        $this->email->subject('Registrasi Alumni SMA Negeri Ploso');

		

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
																			<div style="color:#555; font-size: 12px; margin-top: 5px">Informasi Pengajuan Menjadi Alumni.</div>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
																		<div style="font-family:Helvetica Neue,Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
																			Halo saudara '.$nama_siswa.'
																			<span style="font-size: 12px">
																			Anda telah melakukan verifikasi alumni, dimohon untuk menunggu BK agar segera memproses permintaan anda.
																				<br>
																			</span>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
																		<div style="font-size: 12px;font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:22px;text-align:left;color:#555;">
																			Anda akan mendapatkan notifikasi jika anda telah di verifikasi menjadi alumni.
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
/* End of file ModelName.php */
?>
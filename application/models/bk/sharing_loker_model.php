<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sharing_loker_model extends CI_Model {
    public function tampilDataLoker()
    {  
		$sql = "SELECT 
		profil_siswa.*,
		loker.id_loker, loker.nama_pekerjaan, loker.alamat, loker.status, loker.foto
		
			FROM loker
			
			JOIN profil_siswa 
			
			ON profil_siswa.id_profile = loker.id_profile";

		return $this->db->query( $sql );
    }
    function prosesKonfirmasiStatus( $id_loker ){


        $status =  $this->input->get('status');
		$alasan = $this->input->post('alasan');

        $data = [

           
            'status'    		=> $status,
			'pesan_ditolak'		=> $alasan
        ];

        $this->db->where('id_loker', $id_loker);
        $this->db->update('loker', $data);

         /** Notifikasi Email */

		$sql = "SELECT 

		loker.id_loker, loker.nama_pekerjaan, 
		profil_siswa.id_profile, profil_siswa.nama, profil_siswa.nis, profil_siswa.email

			FROM loker
			JOIN profil_siswa ON profil_siswa.id_profile = loker.id_profile
			
			WHERE id_loker = '$id_loker'";

			$getInfoLoker = $this->db->query( $sql )->row();

			// inisialisasi pengirim 
			$email = $getInfoLoker->email;
			$nama  = $getInfoLoker->nama;
			$nama_pekerjaan = $getInfoLoker->nama_pekerjaan;

			$this->notifikasiEmail( $email, $nama, $status, $nama_pekerjaan, $alasan );
    }

    function notifikasiEmail( $email, $nama_siswa, $status, $nama_pekerjaan, $alasan ) {


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
        $this->email->subject('Verifikasi Sharing Loker '. $nama_pekerjaan);

		// membuat pesan dinamis berdasarkan status
		$pesan = "";
		if ( $status == "accept" ) {

			$pesan = " telah kami setujui, dan akan segera dibagikan ke siswa.";
		} else{

			$pesan = " tidak dapat kami terima dikarenakan $alasan ";
		}

		

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
																		Halo saudara
																			<br>'.$nama_siswa.',
																			<br><br>
																		Lowongan Pekerjaan '.$nama_pekerjaan.' yang ingin anda bagikan' .$pesan.'
																		</div>
																	</td>
																</tr>
																<tr>
																	<td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
																		<div style="font-size: 12px;font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:22px;text-align:left;color:#555;">
																		Terimakasih atas partisipasi Anda.<br>
																		<br>Kami mengharapkan lebih banyak lowongan pekerjaan baik dari perusahaan BUMN maupun BUMS yang bisa anda bagikan di Smanis Tracer Study.
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
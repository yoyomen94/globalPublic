<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Phpmailer_lib
{
    public function __construct(){
        
    }

    public function load(){
        require_once APPPATH.'third_party/phpmailer/src/Exception.php';
        require_once APPPATH.'third_party/phpmailer/src/PHPMailer.php';
        require_once APPPATH.'third_party/phpmailer/src/SMTP.php';
        
        $mail = new PHPMailer;
        return $mail;
    }  
	
	function send($to,$subject,$message)
	{
		$mail = $this->load();
        
        $mail->isSMTP();
        $mail->Host     = 'mail.globalbitsco.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@globalbitsco.com';
        $mail->Password = 'Ddo$%7C%98Cw';
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;
        
        $mail->setFrom('info@globalbitsco.com', 'globalbitsco');
        $mail->addReplyTo('info@globalbitsco.com', 'globalbitsco');
        
        // Add a recipient
        $mail->addAddress($to);
        
        // Add cc or bcc 
        /* $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com'); */
        
        // Email subject
        $mail->Subject = $subject;
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
		$logo_path=base_url().'assets/images/temp/logo.png';
		
        $mailContent = '<html>
	<head>
	<meta charset="UTF-8">
		<title>SureForMore</title>
	</head>
<body>
	<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="border-collapse:collapse!important;height:100%!important;width:100%!important;background:#f7f7f7;margin:0;padding:0" bgcolor="#F7F7F7">
	<tbody>
	<tr>
	<td align="center" valign="top" style="height:100%!important;width:100%!important;margin:0;padding:20px">							    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse!important;width:100%;border:0px transparent">
	<tbody>
			
			<tr>
			<td align="center" valign="top">
                                  
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse!important;background:#f4f4f4" bgcolor="#F4F4F4">
				<tbody>
				<tr>
					<td valign="top" style="background-color:#fdb813;text-align:center;color:#808080;font-size:10px;line-height:125%;padding:5px 5px 5px" align="center">
                            
						<img src="'.$logo_path.'" style="display:inline-block;text-align:center;width:150px;outline:none;text-decoration:none;border:0" class="CToWUd">
                       </td>
                </tr>
				</tbody>
				</table>
			</td>
		</tr>
			
<tr>
				<td align="center" valign="top">
                                  
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse!important;background:white" bgcolor="#F7F7F7">
					<tbody>
					<tr>
						<td valign="top" style="text-align:center;color:#808080;font-size:10px;line-height:125%;padding:20px 30px 0px" align="center">
                            
						<h1 style="text-align:center;font-size:27px;line-height:30px;font-weight:bold;color:#000000!important;display:block;font-style:normal;letter-spacing:normal;margin:0 0 10px" align="center">Thank you for your order at <br><a href="http://SureForMore.com" target="_blank" >SureForMore.com</a></h1>
                       </td>
                    </tr>
					<tr>
						<td valign="top" style="text-align:center;color:#676767;font-size:13px;line-height:125%" align="center">
                            <p>SureForMore has received your order.</p>
						
                       </td>
                    </tr>
					</tbody>
					</table>

				</td>
            </tr>';
												
												
				$mailContent.=$message;
				
				$mailContent.='</tbody></table></td>
			</tr>
			</tbody>
		</table>
</body>
</html>';
			
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            return 0;
        }else{
			return 1;
        }
    }
	
	
	function sendMail($to,$subject,$message)
	{
		$mail = $this->load();
        
        $mail->isSMTP();
        $mail->Host     = 'mail.globalbitsco.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@globalbitsco.com';
        $mail->Password = 'Ddo$%7C%98Cw';
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;
        
        $mail->setFrom('info@globalbitsco.com', 'globalbitsco');
        $mail->addReplyTo('info@globalbitsco.com', 'globalbitsco');
        
        // Add a recipient
        $mail->addAddress($to);
        
        // Add cc or bcc 
        /* $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com'); */
        
        // Email subject
        $mail->Subject = $subject;
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
		$logo_path=base_url().'assets/images/temp/logo.png';
		$messageadmin='<html>
			<head>
			<meta charset="UTF-8">
				<title>Bhozn</title>
			</head>
		<body>
			<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#eff0f2">
				<tbody>
					<tr style="border-collapse:collapse">
						<td align="center" bgcolor="#EFF0F2" style="border-collapse:collapse;font-family:Helvetica Neue,Arial,Helvetica,sans-serif">
							<table style="margin:0 10px" width="640" cellpadding="0" cellspacing="0" border="0">
								<tbody>
									<tr style="border-collapse:collapse">
										<td width="640" align="center" bgcolor="#EFF0F2" style="border-collapse:collapse;font-family:Helvetica Neue,Arial,Helvetica,sans-serif">
											
											<table width="640" cellpadding="0" cellspacing="0" border="0">
												<tbody>
													<tr style="border-collapse:collapse">
														
														<td style="border-collapse:collapse;font-family:Helvetica Neue,Arial,Helvetica,sans-serif; background-color: #071635;">
															
															<div align="center" style="margin:10px;padding: 0px 0;margin-bottom: 28px;">
																<div style="display: inline-block;   border-radius: 5px; position: absolute;  padding: 8px 15px;">
																	<a href="https://globalbitsco.com" style="text-decoration:none" target="_blank">
																		<img src="'.$logo_path.'" style="height: 57px;">
																		
																	</a>
																</div>
															</div>
														</td>
														
													</tr>
												</tbody>
											</table>
											
											
											
										</td>
									</tr>
									<tr style="border-collapse:collapse">
										<td width="640" bgcolor="#ffffff" style="border-collapse:collapse;font-family:Helvetica Neue,Arial,Helvetica,sans-serif;padding-top: 20px;">
											<table width="640" cellpadding="0" cellspacing="0" border="0">
												<tbody>
													<tr style="border-collapse:collapse">
														<div align="left" style="font-size:15px;line-height:21px;color:#676c70;margin:20px 50px;font-family:Helvetica Neue,Arial,Helvetica,sans-serif;font-weight:400">';
														
														
						$messageadmin.=$message;
						
						$messageadmin.='</div>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>		
									
									<tr style="border-collapse:collapse">
										<td width="640" align="center" bgcolor="#EFF0F2" style="border-collapse:collapse;font-family:Helvetica Neue,Arial,Helvetica,sans-serif">
											
											<table width="640" cellpadding="0" cellspacing="0" border="0">
												<tbody>
													<tr style="border-collapse:collapse">
														
														<td style="border-collapse:collapse;font-family:Helvetica Neue,Arial,Helvetica,sans-serif">
															
															<div align="center" style="margin: 20px 0;">
																<p align="center" style="font-size:11px;line-height:15px;color:#888;margin-top:0;margin-bottom:3px;white-space:normal">
																										<span>©2019 <a href="https://globalbitsco.com">https://globalbitsco.com</a> - All Rights Reserved.</span>
																								</p>
															</div>
														</td>
														
													</tr>
												</tbody>
											</table>
											
											
											
										</td>
									</tr>
									
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</body>
		</html>';
		$mail->Body = $messageadmin;
		
        // Send email
        if(!$mail->send()){
            return 0;
        }else{
			return 1;
        }
    }
}
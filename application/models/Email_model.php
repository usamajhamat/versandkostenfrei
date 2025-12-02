<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Email_model extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		/***User email sender****/
		function admin_message($sender_name = '',$sender_email = '',$sender_subject = '',$message = ''){
			$to = $this->db->get_where('system_settings' , array('type' => 'email'))->row()->description;
			$subject = 'Contact US Query';
			$message = '
						<html>
							<head>
								<title>Contact Us Request</title>
							</head>
							<body>
								<p> Hello Admin<br> A new contact us query has been submitted</p>
								<p> Name: <strong>'.$sender_name.',</strong><br/></p>
								<p> Email: <strong>'.$sender_email.', </strong><br/></p>
								<p> Email: <strong>'.$sender_subject.', </strong><br/></p>
								<p> Message:<strong>'.$message.' </strong></p>


								Warm Regards,<br>
								EIGIX IT Solutions
								</p>
							</body>
						</html>
			';
			$email = $this->do_email($message,$subject,$to);
			if($email){
				return 'success';
			} else{
				return 'failed';
			}
		}
		
		/***custom email sender****/
		function do_email($msg=NULL, $sub=NULL, $to=NULL, $from=NULL,$file_path=NULL){
			$system			 = 		 $this->db->get_where('system_settings' , array('system_settings_id' => 1))->row()->description;
			$host   		 =  	 $this->db->get_where('system_settings' , array('system_settings_id' => 7))->row()->description;
			$smtp_port   	 = 		 $this->db->get_where('system_settings' , array('system_settings_id' => 8))->row()->description;
			$smtp_username   =   	 $this->db->get_where('system_settings' , array('type' => "customer_support_email"))->row()->description;
			$smtp_password   =  	 $this->db->get_where('system_settings' , array('system_settings_id' => 10))->row()->description;
			$config = Array(
				/*// 'protocol' => 'smtp',
				// 'smtp_host' => $host,
				// 'smtp_port' => $smtp_port   ,
				// 'smtp_user' => $smtp_username,
				// 'smtp_pass' => $smtp_password,  */
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);
			$this->load->library('email', $config); 
			$msg .= '<br><br><br> Danke, <br> ';
			$msg .= '<b><i>'.$system.'</b></i>';
			$this->email->set_newline("\r\n");
			$this->email->from($smtp_username);
			$this->email->to($to);
			$this->email->subject($sub);
			$this->email->message($msg);
			if($this->email->send()) {
				return true;
			} else {
				return show_error($this->email->print_debugger());
			} 
		}
		/***custom email sender****/
	}
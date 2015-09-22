<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontak extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */	
	//constructor
	function __construct(){
		parent::__construct();
		//$this->load->model('m_shop','',TRUE);
		$this->load->helper(array('url','form'));
		
		session_start();
	}
	
	function index(){
		$data['is_sent'] = 0;
		$this->load->view('contact-us',$data);
	}
	
	function get_in_touch(){
			header('Content-type: application/json');

			$name       = @trim(stripslashes($_POST['name'])); 
			$email      = @trim(stripslashes($_POST['email'])); 
			$subject    = @trim(stripslashes($_POST['subject'])); 
			$message    = @trim(stripslashes($_POST['message'])); 

			$email_from = $email;
			$email_to = 'dimas@dmusttonlineshop.besaba.com';//replace with your email

			$body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

			$success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

			//echo json_encode($status);
			//die;
			
			redirect("kontak/sukses");
			
	}
	
	function sukses(){
		$data['message_sent'] = "Terima kasih sudah mengontak kami. Kami secepat mungkin akan membalas email anda";
		$data['is_sent'] = 1;
		$this->load->view('contact-us',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
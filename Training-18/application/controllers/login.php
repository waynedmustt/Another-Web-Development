<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
	private $limit = 3;
	private $onok = 0;	
	private $c = "";
	private $aktif = 1;
	private $is_insert = 0;
	private $is_insert1 = 0;
	
	//constructor
	function __construct(){
		parent::__construct();
		$this->load->model('m_login','',TRUE);
		$this->load->helper(array('url','form'));
		
		session_start();
	}
	
	function index(){
		$data['agama'] = $this->m_login->agama();
		$data['hobi'] = $this->m_login->hobi();
		$data['aktif'] = 0;
        $this->load->view('v_login',$data);
	}
	
	function is_login(){
		$data['aktif'] = 1;
		//mengambil data dari form
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$tanggal = $this->input->post('tanggal');
		$status = $this->input->post('status');
		$agama = $this->input->post('agama');
		if($agama == "0"){
			$agama = "";
		}
		
		//untuk memasukkan data hobi agar bisa divalidasi
		$index = 1;
		while($index <= $_SESSION['total_index']){
			if(!empty($_POST['hobi'.$index])){
				$idhobi = $_POST['hobi'.$index];
			}
			$index++;
		}

		$nohp = $this->input->post('nohp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		
		//validasi
		if(empty($username)){
			$data['required'] = "username diperlukan";
		} else if(empty($password)){
			$data['required'] = "password diperlukan";
		} else if(empty($nama)){
			$data['required'] = "nama diperlukan";
		} else if(empty($tanggal)){
			$data['required'] = "tanggal diperlukan";
		} else if(empty($status)){
			$data['required'] = "status diperlukan";
		} else if(empty($agama)){
			$data['required'] = "agama diperlukan";
		} else if(empty($idhobi)){
			$data['required'] = "hobi diperlukan";
		} else if(empty($nohp)){
			$data['required'] = "No. HP diperlukan";
		} else if(empty($email)){
			$data['required'] = "E-mail diperlukan";
		} else if(empty($alamat)){
			$data['required'] = "Alamat diperlukan";
		} else {
			$data['required'] = "Data tidak kosong";
			$this->is_insert = 1;
		}
		
		   if(strlen($password) < 8){
			  $data['message'] = "password minimal 8 digit!";
		   } else if (!ctype_alnum($password)){
			  $data['message'] = "password bukan alphanumerik!";
		   } else if (!is_numeric($nohp)) {
			  $data['message'] = "nomor telpon bukan numerik!";
		   } else if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
			   $data['message'] =  "email is invalid format!";
		   } else {
				$data['message'] = "data valid!";
				$this->is_insert1 = 1;
		   }
		$data['agama'] = $this->m_login->agama();
		$data['hobi'] = $this->m_login->hobi();
		
		if($this->is_insert == 1 && $this->is_insert1 == 1){ 
				$this->m_login->insert_member(); //masuk ke database
				if ($this->db->affected_rows()!=0)
				$data['sukses'] = "Data member berhasil diinsert";
			} else {
				$data['sukses'] = "Data member tidak berhasil diinsert";
			}
        $this->load->view('v_login', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
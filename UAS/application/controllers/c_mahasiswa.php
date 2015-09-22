<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_mahasiswa extends CI_Controller {

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
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_mahasiswa','',TRUE);
		$this->load->helper(array('url','form'));
		session_start();
	}
		
	function index($offset = 0){
		$data['judul']= 'IP Mahasiswa';
		$data['mhs'] = $this->m_mahasiswa->display_mahasiswa();
		$data['matkul'] = $this->m_mahasiswa->display_matkul();
		$data['nilai'] = $this->m_mahasiswa->display_nilai();
		$this->load->view('view_mahasiswa',$data);
	}
}

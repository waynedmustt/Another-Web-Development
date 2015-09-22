<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_pegawai extends CI_Controller {

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
	 
	private $limit = 1;
	public $file_name = "";
	public $file_ext = "";
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_pegawai','',TRUE);
		$this->load->helper(array('url','form'));
		session_start();
	}
		
	function index($offset = 0){
		$data['judul']= 'Pegawai';
		$data['pegawai'] = $this->m_pegawai->display_pegawai();
		$this->load->view('view_pegawai',$data);
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {

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
		$this->load->model('m_beranda','',TRUE);
		$this->load->helper(array('url','form'));
		
		session_start();
	}
	
	//tampilan beranda
	function index(){
		$total_rows = $this->m_beranda->count_all();
		$page = isset($_GET['page']) ? $_GET['page'] : 1; 
		$data['halaman'] = $page;	
		$limit = 6;  
		$pertama = 0;
		$mulai_dari = $limit * ($page - 1);
		$banyakHalaman = ceil($total_rows / $limit);
		$data['total_pages'] = $banyakHalaman;	
		$data['data_barang'] = $this->m_beranda->get_first($mulai_dari,$limit);
		$data['jenis_barang'] = $this->m_beranda->get_jenis_barang();
		$this->load->view('home',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
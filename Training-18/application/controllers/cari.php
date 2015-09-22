<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cari extends CI_Controller {

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
		$this->load->model('m_cari','',TRUE);
		$this->load->helper(array('url','form'));
		
		session_start();
	}
	
	//mencari data barang
	function index(){
		if(empty($c) && $this->aktif == 1){ 
			$c = $this->input->POST('barang_cari');
			$this->aktif = 2;
		} 
		if($this->aktif == 2 && isset($_GET['status'])){
		$status = $_GET['status'];
			if($status == 1){
				//print_r($status);
				$c = $_GET['nama'];
			}
		}
		$total_rows = $this->m_cari->count_all_search($c);
		$page = isset($_GET['page']) ? $_GET['page'] : 1; 
		$data['halaman'] = $page;	
		$limit = 6;  
		$pertama = 0;
		$mulai_dari = $limit * ($page - 1);
		$data['yang_dicari'] = $c;
		$banyakHalaman = ceil($total_rows / $limit);
		$data['total_pages'] = $banyakHalaman;	
		$data['list_barang'] = $this->m_cari->get_search($c,$mulai_dari,$limit);
		$data['jenis_barang'] = $this->m_cari->get_jenis_barang();
		$this->load->view('v_cari',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
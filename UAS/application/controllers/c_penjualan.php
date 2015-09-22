<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_penjualan extends CI_Controller {

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
		$this->load->model('m_penjualan','',TRUE);
		$this->load->helper(array('url','form'));
		session_start();
	}
		
	function index($offset = 0){
		$data['judul']= 'Penjualan';
		$this->load->view('view_penjualan',$data);
	}
	
	function tabel(){
		$data['judul'] = 'Tabel Penjualan';
		$data['penjualan'] = $this->m_penjualan->penjualan();
		$data['sales'] = $this->m_penjualan->sales();
		$this->load->view('view_tabel_penjualan',$data);
	}
	
	function simpan_penjualan()
    {   
		 if($this->input->post('submit')){
			$this->m_penjualan->simpan();
		 }
		 $data['judul'] = 'Penjualan'; 
		if ($this->db->affected_rows()!=0)
		{
			$data['aktif']='1';
		    $data['notifikasi'] = 'Data berhasil disimpan';
		}
		else
		{
			$data['aktif']='2';
		    $data['notifikasi'] = 'Data tidak berhasil disimpan';
		}
        $this->load->view('view_penjualan', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
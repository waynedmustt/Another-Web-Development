<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesan extends CI_Controller {

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
		$this->load->model('m_pesan','',TRUE);
		$this->load->helper(array('url','form'));
		
		session_start();
	}

	function index(){
			$this->m_pesan->pesan_barang();
			if ($this->db->affected_rows()==0)
			echo "Gagal 3";
			else {
				$data['result'] = 'Data berhasil dipesan!';
				$data['announcement'] = 'Terima kasih telah belanja di Dmustt Online Shop. Untuk langkah selanjutnya, 
				pembeli akan menerima email untuk konfirmasi pembayaran dan pengiriman barang.
				Pembayaran dilakukan dalam waktu 24 jam dan jika tidak, maka dianggap membatalkan pembelian.';
				$this->load->view('v_finish_pesan',$data);
			}
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
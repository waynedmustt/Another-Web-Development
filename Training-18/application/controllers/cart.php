<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

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
		$this->load->model('m_cart','',TRUE);
		$this->load->helper(array('url','form'));
		
		session_start();
	}
	
	function index(){
		$data['is_jumlah'] = 1;
		$this->load->view('v_shoppingcart',$data);
	}
	
	//clear semua barang di shopping cart
	public function clear()
	{		
		$status = $_GET['status'];
		$index = $_GET['del'];

		if($status == 1)
		{
		array_splice($_SESSION['data'],$index,1);
		array_splice($_SESSION['jumlah'],$index,1);
		redirect("cart");
		}	
		else
		{
		unset ($_SESSION['data']);
		unset ($_SESSION['jumlah']);
		redirect("beranda");
		}
	}
	
	//menampilkan cart
	function show_cart($id){
		if(!isset($_SESSION['data']) or $_SESSION['data'] == NULL){
				$data['barang_cart'] = $this->m_cart->search_data($id);
			} else {
			$index = 0;
				foreach($_SESSION['data'] as $rows)
				{
					$vid = $_SESSION['data'][$index][0]->ID_BARANG;
					if($vid == $id){
						$this->onok = 1;
					}
				$index++;		
				}
			}
		if($this->onok == 1){
			$data['exist'] = 1;
			$data['notifikasi'] = "Barang sudah dishopping cart!";
		} else {
			$data['exist'] = 0;
			$data['barang_cart'] = $this->m_cart->search_data($id);
		}		
		$this->load->view('v_cart',$data);
	}
	
	//update cart
	function update_cart($id){
		$_SESSION['jumlah'][$id] = $this->input->post('jumlah');
		$data['is_jumlah'] = 1;
		$this->load->view('v_shoppingcart',$data);
	}
	
	function update_process(){
		$status = $_GET['status'];
		$index = $_GET['upt'];
		
		if($status == 2){
			$data['index_update'] = $index;
			$data['is_jumlah'] = 0;
		}
		$this->load->view('v_shoppingcart',$data);
	}
	
	function insert_cart($id)
	{	
		$result = $this->m_cart->search_data($id);
	
		$_SESSION['data'][] = $result->result();
		$_SESSION['jumlah'][]  = $this->input->post('jumlah');
		
		redirect("cart");
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php 
class M_beranda extends CI_Model{
	
	private $ttl_harga = 0;
	private $ttl_barang = 0;
	private $nama = "";
	private $alamat = "";
	private $tanggal = "";
	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_jenis_barang(){
		$query=$this->db->query("select * from jenis_barang");
		return $query;
	}
	
	public function count_all(){
		return $this->db->count_all("barang");
   }
   
	function get_first($mulai_dari,$limit)
	{
		$query=$this->db->query("SELECT * FROM barang ORDER BY `TANGGAL` DESC limit $mulai_dari, $limit");
		return $query->result();
	}
}




?>
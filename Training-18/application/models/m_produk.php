<?php 
class M_produk extends CI_Model{
	
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

	function count_all(){
		return $this->db->count_all("barang");
   }
	
	function get_paged_list($mulai_dari,$limit)
	{
		$query=$this->db->query("select * from barang order by ID_BARANG ASC limit $mulai_dari, $limit");
		 return $query->result(); 
	}

}




?>
<?php 
class M_cart extends CI_Model{
	
	private $ttl_harga = 0;
	private $ttl_barang = 0;
	private $nama = "";
	private $alamat = "";
	private $tanggal = "";
	
	function __construct()
	{
		parent::__construct();
	}

	function search_data($id)
	{
		$query = $this->db->query("SELECT * FROM barang WHERE ID_BARANG = '".$id."' ");
		return $query;
	}
}




?>
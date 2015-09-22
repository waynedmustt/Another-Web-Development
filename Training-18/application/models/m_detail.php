<?php 
class M_detail extends CI_Model{
	
	private $ttl_harga = 0;
	private $ttl_barang = 0;
	private $nama = "";
	private $alamat = "";
	private $tanggal = "";
	
	function __construct()
	{
		parent::__construct();
	}
	function get_data_detail($id){
		$query_detail=$this->db->query("select * from barang where ID_BARANG = '$id'");
		return $query_detail;
	}
	
	function get_jenis_barang(){
		$query=$this->db->query("select * from jenis_barang");
		return $query;
	}
	
}




?>
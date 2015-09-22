<?php 
class M_cari extends CI_Model{
	
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
   
   function count_all_search($c){
		$sqlCount = "select COUNT(ID_BARANG) from barang where ID_BARANG LIKE '%$c%'"; 
		$rsCount = mysql_fetch_array(mysql_query($sqlCount));
		$banyakData = $rsCount[0]; 
		return $banyakData;
   }
	
	function get_search($c,$mulai_dari,$limit){
		$query=$this->db->query("select * from barang where ID_BARANG LIKE '%$c%' order by NAMA_BARANG ASC limit $mulai_dari, $limit");
		 return $query; 
	}
	
}




?>
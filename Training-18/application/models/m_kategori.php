<?php 
class M_kategori extends CI_Model{
	
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
	
	function count_all_type($id){
		$sqlCount = "select COUNT(ID_BARANG) from barang where ID_JENIS_BARANG = '$id'"; 
		$rsCount = mysql_fetch_array(mysql_query($sqlCount));
		$banyakData = $rsCount[0]; 
		return $banyakData;
   }
   
	function get_category($id, $mulai_dari,$limit){
		$query_category=$this->db->query("select * from barang where ID_JENIS_BARANG = '$id' ORDER BY `TANGGAL` ASC limit $mulai_dari, $limit");
		return $query_category;
	}

}




?>
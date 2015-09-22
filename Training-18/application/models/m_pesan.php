<?php 
class M_pesan extends CI_Model{
	
	private $ttl_harga = 0;
	private $ttl_barang = 0;
	private $nama = "";
	private $alamat = "";
	private $tanggal = "";
	
	function __construct()
	{
		parent::__construct();
	}
   
   function pesan_barang(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$tanggal = date("Y-m-d");
		$email = $this->input->post('email');
		$tipe_pembayaran = $this->input->post('pilih_pembayaran');
		$total_harga = $this->input->post('total');
		$konfirmasi_pembayaran = 0;
		$query = $this->db->query("insert into pemesanan values('','$tanggal','$nama','$alamat', '$email', $konfirmasi_pembayaran, '$total_harga', '$tipe_pembayaran')");
		$id_pemesanan =  mysql_insert_id();
		
		if ($this->db->affected_rows()==0)
		echo "Gagal 1";
		
		//pemilihan data
			
		$index = 0;
		
		foreach($_SESSION['data'] as $rows){
				$vid = $_SESSION['data'][$index][0]->ID_BARANG;
				$vharga = $_SESSION['data'][$index][0]->HARGA;
				$vjumlah = $_SESSION['jumlah'][$index];
				
				//insert untuk pesan
				$mysql_pesan = $this->db->query("insert into pesan values('$vid','$id_pemesanan','$vjumlah','$vharga')");
				
				//panggil data barang
				$mysql_barang = $this->db->query("select STOK from barang where ID_BARANG = '$vid'");
				$stok = $mysql_barang->result();
				
				//mengurangi stok
				foreach($stok as $rows){
					$stok = $rows->STOK;
				}
				$stok_now = $stok - $vjumlah;
				$query_update=$this->db->query("UPDATE barang SET STOK = '$stok_now' WHERE ID_BARANG = '$vid'");
				$index++;
		}
		session_destroy();
		
		return $mysql_pesan;
    }

}




?>
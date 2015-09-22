<?php 
class M_login extends CI_Model{
	
	private $ttl_harga = 0;
	private $ttl_barang = 0;
	private $nama = "";
	private $alamat = "";
	private $tanggal = "";
	
	function __construct()
	{
		parent::__construct();
	}
	
	function agama(){
		$query=$this->db->query("select * from agama");
		return $query;
	}
	
	function hobi(){
		$query=$this->db->query("select * from hobi");
		return $query;
	}
	
	function insert_member(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$tanggal = $this->input->post('tanggal');
		$status = $this->input->post('status');
		$agama = $this->input->post('agama');
		$nohp = $this->input->post('nohp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$query = $this->db->query("insert into member values('','$username','$password','$nama','$tanggal','$status', '$agama', '$nohp', '$email', '$alamat')");
		$id_member =  mysql_insert_id();
		
		//untuk hobi dimasukan ke array
		$index = 1;
		while($index <= $_SESSION['total_index']){
			if(!empty($_POST['hobi'.$index])){
				$id_hobi[$index] = $_POST['hobi'.$index];
				$id_hobi = $id_hobi[$index];
				$mysql_member_hobi = $this->db->query("insert into member_hobi values('$id_member','$id_hobi')");
			}
			$index++;
		}
		
		return $query;
	}
}




?>
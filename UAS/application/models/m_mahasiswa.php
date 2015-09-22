<?php 
class M_mahasiswa extends CI_Model{
	
	function display_mahasiswa(){
		$query_mahasiswa = $this->db->query("SELECT * from mahasiswa");
		return $query_mahasiswa->result();
	}
	
	function display_matkul(){
		$query_matkul = $this->db->query("SELECT * from mata_kuliah");
		return $query_matkul->result();
	}
	
	function display_nilai(){
		$query_nilai = $this->db->query("SELECT * from nilai");
		return $query_nilai->result();
	}

}




?>
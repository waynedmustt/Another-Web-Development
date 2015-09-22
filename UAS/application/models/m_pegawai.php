<?php 
class M_pegawai extends CI_Model{
	
	function display_pegawai(){
		$query_pegawai = $this->db->query("SELECT * FROM gaji
		INNER JOIN pegawai,proyek
		WHERE pegawai.ID_PEGAWAI = gaji.ID_PEGAWAI AND
		proyek.ID_PROYEK = gaji.ID_PROYEK");
		
		return $query_pegawai->result();
	}
	
}




?>
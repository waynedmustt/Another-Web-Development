<?php 
class M_file extends CI_Model{
	
	function simpan_file($file_name)
    {
		$id_file = "";
		$file = $file_name;
		$keterangan = $this->input->post('keterangan');
		
        $simpan_data=array(
            'ID_FILE'  => $id_file,
			'FILE' => $file,
            'KETERANGAN'      => $keterangan
       );
        $simpan = $this->db->insert('upload_file', $simpan_data);
        return $simpan;
    }
	
	function display_file(){
		$query_file = $this->db->query("select * from upload_file");
		return $query_file->result();
	}
	
}




?>
<?php 
class M_penjualan extends CI_Model{
	
	function simpan()
    {
		$id = "";
		$id_sales = $this->input->post('id_sales');
		$penjualan_ke = $this->input->post('penjualan_ke');
		$jumlah = $this->input->post('jumlah');
		
        $simpan_data=array(
			'ID_PENJUALAN' => $id,
			'ID_SALES' => $id_sales,
            'PENJUALAN_KE'  => $penjualan_ke,
			'JUMLAH' => $jumlah,
       );
        $simpan = $this->db->insert('penjualan', $simpan_data);
        return $simpan;
    }
	
	function penjualan(){
		$query_penjualan = $this->db->query("select * from penjualan");
		return $query_penjualan->result();
	}
	
	function sales(){
		$query_sales = $this->db->query("select * from sales");
		return $query_sales->result();
	}
	
}




?>
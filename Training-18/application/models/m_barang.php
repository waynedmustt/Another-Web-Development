<?php 
class M_barang extends CI_Model{

	function get_list_data(){
		$query=$this->db->query("select * from barang order by ID_BARANG");
		return $query;
	}
	
	function get_jenis_barang(){
		$query=$this->db->query("select * from jenis_barang");
		return $query;
	}
	
	function Get_admin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$query_admin = $this->db->query("select * from admin where username = '$username' AND password = '$password'");
		
		return $query_admin;
	}
	
	function pemesanan(){
		$query = $this->db->query("select * from pemesanan");
		return $query;
	}
	
	function count_all(){
		return $this->db->count_all("barang");
    }
   
   function get_paged_list($limit = 3, $offset = 0)
	{
		$this->db->order_by('ID_BARANG','asc');
		return $this->db->get("barang", $limit, $offset)->result();
	}
	
	function konfirmasi_data($id){
		$query_update=$this->db->query("UPDATE pemesanan SET PEMBAYARAN = 1 WHERE ID_PEMESANAN = '$id'");
		
		return $query_update;
	}
	
	function konfirmasi_data_belum($id){
		$query_update=$this->db->query("UPDATE pemesanan SET PEMBAYARAN = 0 WHERE ID_PEMESANAN = '$id'");
		
		return $query_update;
	}
	
	function get_order_list()
	{
		$tampil_pemesanan_pesan = $this->db->query("SELECT * FROM pemesanan
		INNER JOIN pesan,barang
		WHERE pemesanan.ID_PEMESANAN = pesan.ID_PEMESANAN AND
		barang.ID_BARANG = pesan.ID_BARANG");
		return $tampil_pemesanan_pesan->result();
	}
	
	function delete_data($id){
		$query_delete=$this->db->query("delete from barang where ID_BARANG = '$id'");
		return $query_delete;
	}
	
	function update_data($id,$file,$file1,$file2,$file3){
		$id_barang = $id;
		$gambar = $file;
		$gambar1 = $file1;
		$gambar2 = $file2;
		$gambar3 = $file3;
		$tipe_barang = $this->input->post('tipe_barang');
		$nama_barang = $this->input->post('nama_barang');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$deskripsi = $this->input->post('deskripsi');
		$tanggal = date("Y-m-d");
		$query_update=$this->db->query("UPDATE barang SET ID_JENIS_BARANG = '$tipe_barang', NAMA_BARANG = '$nama_barang', GAMBAR = '$gambar', GAMBAR1 = '$gambar1', GAMBAR2 = '$gambar2', GAMBAR3 = '$gambar3', HARGA = '$harga', STOK = '$stok', TANGGAL = '$tanggal', DESKRIPSI = '$deskripsi' WHERE ID_BARANG = '$id_barang'");
		/*$this->db->where('NIM', $nim_update);
		$this->db->update('mahasiswa', $data);*/
		return $query_update;
	}
	
	function cari_data(){
		 $c = $this->input->POST('barang_cari');
		 $query=$this->db->query("select * from barang where ID_BARANG LIKE '%$c%'");
		 /*
		 $this->db->like('NIM', $c);
		 $query = $this->db->get('mahasiswa');*/
		 return $query; 
	}
	
	function get_data_detail($id){
		$query_detail=$this->db->query("select * from barang where ID_BARANG = '$id'");
		/*$this->db->where('NIM',$nim);
		$query_detail = $this->db->get('mahasiswa');*/
		return $query_detail;
	}
	
	function simpan($file,$file1,$file2,$file3)
    {
		$id_barang = $this->input->post('id_barang');
		$tipe_barang = $this->input->post('tipe_barang');
		$nama_barang = $this->input->post('nama_barang');
		$gambar = $file;
		$gambar1 = $file1;
		$gambar2 = $file2;
		$gambar3 = $file3;
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$tanggal = date("Y-m-d");
		$deskripsi = $this->input->post('deskripsi');
		
        $simpan_data=array(
            'ID_BARANG'  => $id_barang,
			'ID_JENIS_BARANG' => $tipe_barang,
            'NAMA_BARANG'      => $nama_barang,
			'GAMBAR'  => $gambar,
			'GAMBAR1' => $gambar1,
			'GAMBAR2' => $gambar2,
			'GAMBAR3' => $gambar3,
            'HARGA'      => $harga,
            'STOK'      => $stok,
			'TANGGAL' => $tanggal,
			'DESKRIPSI' => $deskripsi
       );
        $simpan = $this->db->insert('barang', $simpan_data);
        return $simpan;
    }
}




?>
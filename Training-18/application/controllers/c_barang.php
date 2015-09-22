<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_barang extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	private $limit = 3;
	public $file_name = "";
	public $file_ext = "";
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_barang','',TRUE);
		$this->load->helper(array('url','form'));
		session_start();
	}
	
	function is_login(){
		$data['judul']= 'Beranda';
		$this->load->view('admin/view_welcome',$data);
	}
	
	function view_first(){
		$data['judul']= 'Beranda';
		$this->load->view('admin/admin',$data);
	}
	
	function admin(){
		if($this->input->post('submit')){
			$result = $this->m_barang->Get_admin();
			foreach($result->result() as $row){
				$username = $row->username;
			}
		 }
		 $data['judul'] = 'Halaman admin'; 
		if ($this->db->affected_rows()!=0)
		{ 
			$_SESSION['username'] = $username;
			$this->load->view('admin/view_welcome',$data);
		}
		else
		{
			$data['aktif']='1';
		    $data['notifikasi'] = 'Username atau password salah';
			$this->load->view('admin/admin', $data);
		}
	}
	
	public function destroy()
	{
		session_destroy();
	}
	
	function display($offset = 0){
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		$content="";
		$data['barang'] =$this->m_barang->get_paged_list($this->limit, $offset);
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('c_barang/display/');
 		$config['total_rows'] = $this->m_barang->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$data['judul']= 'Tabel Barang';
		$this->load->view('admin/view',$data);
	}
	
	function barang()
    {
        $data['judul'] = 'Insert Data Barang';
		$data['jenis_barang'] = $this->m_barang->get_jenis_barang();
        $this->load->view('admin/view_input', $data);
    }
	
	//melihat data secara detail
	function view_detail($id){
		$data['judul']= 'Tabel Barang';
		$data['judul_cari']='Cari Data Barang';
		$data['aktif']='1';
		$data['detail_brg']=$this->m_barang->get_data_detail($id);
		$this->load->view('admin/view_detail',$data);
	}
	
	//form untuk update data
	function form_update($id){
		$data['judul']= 'Update data Barang';
		$data['barang']= $id;
		$data['jenis_barang'] = $this->m_barang->get_jenis_barang();
		$this->load->view('admin/view_form_update',$data);
	}
	
	//update data
	function update($id){
		//Configure
		//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
		$config['upload_path'] = 'images/shop/';
		
		$file_name = $config['upload_path'].$_FILES['gambar_update']['name'];
		
        // set the filter image types
		$config['allowed_types'] = 'gif|jpg|png';
		
		//load the upload library
		$this->load->library('upload', $config);
    
        $this->upload->initialize($config);
    
        $this->upload->set_allowed_types('*');
		
		if(!empty($_FILES['gambar1']['name'])){
		$file_name1 = $config['upload_path'].$_FILES['gambar1']['name']; 
		$this->upload->do_upload('gambar1');
		} else $file_name1 = "";
		if(!empty($_FILES['gambar2']['name'])){
		$file_name2 = $config['upload_path'].$_FILES['gambar2']['name']; 
		$this->upload->do_upload('gambar2');
		} else $file_name2 = "";
		if(!empty($_FILES['gambar3']['name'])){
		$file_name3 = $config['upload_path'].$_FILES['gambar3']['name']; 
		$this->upload->do_upload('gambar3');
		} else $file_name3 = "";
		
		if($this->input->post('submit')){
			$this->m_barang->update_data($id,$file_name,$file_name1,$file_name2,$file_name3);
		 }
		 $data['judul'] = 'Edit data barang'; 
		if ($this->db->affected_rows()!=0 && $this->upload->do_upload('gambar_update'))
		{
			$data['aktif']='1';
		    $data['notifikasi'] = 'Data berhasil diedit';
		}
		else
		{
			$data['aktif']='2';
			$data['upload_failed'] = $this->upload->display_errors();
		    $data['notifikasi'] = 'Data tidak berhasil diedit';
		}
        $this->load->view('admin/view_notification', $data);
	}
	
	//menghapus data
	function delete($id){
		$data['judul']='Hapus data barang';
		$this->m_barang->delete_data($id);
		if ($this->db->affected_rows()!=0)
		{
			$data['aktif']='1';
		    $data['notifikasi'] = 'Data berhasil dihapus';
		}
		else
		{
			$data['aktif']='2';
		    $data['notifikasi'] = 'Data tidak berhasil dihapus';
		}
		$this->load->view('admin/view_notification',$data);
	}
	
	//mencari data pada tabel
	function cari(){
		$data['judul'] = 'Hasil Pencarian';
		$data['list_barang']=$this->m_barang->cari_data();
	   //jika data yang dicari tidak ada maka akan keluar informasi 
       //bahwa data yang dicari tidak ada
       if($this->db->affected_rows()== 0) {
			$data['aktif']='2';
			$data['tidak_ketemu']='Data yang dicari tidak ada';
          }
          else {
			$data['aktif']='1';
			$data['ketemu']='Data yang dicari ada'; 
		}
		$this->load->view('admin/view_cari',$data);
	}
	
	function confirmation($id){
		$this->m_barang->konfirmasi_data($id);
	   //jika data yang dicari tidak ada maka akan keluar informasi 
       //bahwa data yang dicari tidak ada
       if($this->db->affected_rows() != 0) {
		redirect("c_barang/pemesanan");
	   }
	}
	
	function confirmation_belum($id){
		$this->m_barang->konfirmasi_data_belum($id);
	   //jika data yang dicari tidak ada maka akan keluar informasi 
       //bahwa data yang dicari tidak ada
       if($this->db->affected_rows() != 0) {
		redirect("c_barang/pemesanan");
	   }
	}
	
	function pemesanan(){
		$data['judul'] = "Pemesanan";
		$data['pemesanan'] = $this->m_barang->pemesanan();
		$this->load->view('admin/view_pemesanan',$data);
	}
	
	function order(){
		$data['order'] =$this->m_barang->get_order_list();
		
		$data['judul']= 'Tabel Order';
		$this->load->view('admin/view_order',$data);
	}
 
    function simpan_barang()
    {   
		//Configure
		//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
		$config['upload_path'] = 'images/shop/';
		
		$file_name = $config['upload_path'].$_FILES['gambar']['name'];
	
        // set the filter image types
		$config['allowed_types'] = 'gif|jpg|png';
		
		//load the upload library
		$this->load->library('upload', $config);
    
        $this->upload->initialize($config);
    
        $this->upload->set_allowed_types('*');
		
		if(!empty($_FILES['gambar1']['name'])){
		$file_name1 = $config['upload_path'].$_FILES['gambar1']['name']; 
		$this->upload->do_upload('gambar1');
		} else $file_name1 = "";
		if(!empty($_FILES['gambar2']['name'])){
		$file_name2 = $config['upload_path'].$_FILES['gambar2']['name']; 
		$this->upload->do_upload('gambar2');
		} else $file_name2 = "";
		if(!empty($_FILES['gambar3']['name'])){
		$file_name3 = $config['upload_path'].$_FILES['gambar3']['name']; 
		$this->upload->do_upload('gambar3');
		} else $file_name3 = "";
    
		 if($this->input->post('submit')){
			$this->m_barang->simpan($file_name,$file_name1,$file_name2,$file_name3);
		 }
		 $data['judul'] = 'Insert Data Barang'; 
		if ($this->db->affected_rows()!=0 && 
		$this->upload->do_upload('gambar'))
		{
			$data['aktif']='1';
		    $data['notifikasi'] = 'Data berhasil disimpan';
		}
		else
		{
			$data['aktif']='2';
			$data['upload_failed'] = $this->upload->display_errors();
		    $data['notifikasi'] = 'Data tidak berhasil disimpan';
		}
        $this->load->view('admin/view_input', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_file extends CI_Controller {

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
	 
	private $limit = 1;
	public $file_name = "";
	public $file_ext = "";
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_file','',TRUE);
		$this->load->helper(array('url','form'));
		session_start();
	}
		
	function index($offset = 0){
		$data['judul']= 'Upload File';
		$data['aktif'] = 0;
		$this->load->view('view_file',$data);
	}
	
	function display(){
		$data['judul'] = 'File'; 
		$data['aktif'] = 1;
		$data['download'] = 0;
		$data['file'] = $this->m_file->display_file();
		$this->load->view('view_file',$data);
	}
	
	function download($id_file){
		header("Content-Type: application/octet-stream");

		$file = $id_file;
		header("Content-Disposition: attachment; filename=" . urlencode($file));   
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Description: File Transfer");            
		header("Content-Length: " . filesize($file));
		flush(); // this doesn't really matter.
		$fp = fopen($file, "r");
		while (!feof($fp))
		{
			echo fread($fp, 65536);
			flush(); // this is essential for large downloads
		} 
		fclose($fp); 
	}
	
	function upload()
    {   
		//Configure
		//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
		$config['upload_path'] = 'file/';
		
		$file_name = $_FILES['file']['name'];
		
        // set the filter image types
		$config['allowed_types'] = 'pdf|doc';
		
		$config['max_size'] = 0;
		
		//load the upload library
		$this->load->library('upload', $config);
    
        $this->upload->initialize($config);
    
        $this->upload->set_allowed_types('*');
		
		 if($this->input->post('submit')){
			$this->m_file->simpan_file($file_name);
		 }
		 $data['judul'] = 'File'; 
		if ($this->db->affected_rows()!=0 &&
		$this->upload->do_upload('file'))
		{
			$data['file'] = $this->m_file->display_file();
			$data['aktif']='1';
			$data['download'] = 1;
		    $data['notifikasi'] = 'Data berhasil disimpan';
		}
		else
		{
			$data['aktif']='2';
		    $data['notifikasi'] = 'Data tidak berhasil disimpan';
		}
        $this->load->view('view_file', $data);
    }
}

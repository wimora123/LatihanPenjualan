<?php 

/**
 * 
 */
class User extends MY_Controller
{
	public function __construct()
	{
		parent:: __construct();
		// is_logged_in();
	}

	public function index()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_user_session($email);
		$data['kategori']=$this->model_barang->get_barang_kategori();
		$data['barang']=$this->model_barang->get_barang();

		$data['page']='pages/home';
		$this->load->view('index', $data);
	}
	
	public function kategori($kategori)
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_user_session($email);

		$data['kategori']=$this->model_barang->get_barang_kategori();

		$data['specificKategori']=$this->model_barang->get_specific_kategori($kategori);

		$data['page']='pages/kategori';
		$this->load->view('index', $data);
	}

}

 ?>
<?php 	

/**
 * 
 */

date_default_timezone_set('Asia/Jakarta');

class Invoice extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);

		$data['invoice']=$this->model_invoice->get_invoice();

		$data['page']='pages/admin/invoice';
		$this->load->view('index_admin', $data);
	}

	public function detailInvoice($idInvoice)
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);

		$data['invoice']=$this->model_invoice->get_id_invoice($idInvoice);
		// $data['pesanan']=$this->model_invoice->get_id_pesanan($idInvoice);
		$data['pesanan']=$this->model_invoice->get_pesanan($idInvoice);

		$data['page']='pages/admin/detailInvoice';
		$this->load->view('index_admin', $data);
	}
}

 ?>
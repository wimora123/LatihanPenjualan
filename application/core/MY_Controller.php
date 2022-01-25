<?php 

/**
 * 
 */
class MY_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('url', 'form', 'html', 'MY_Helper', 'file', 'security'));
		$this->load->database();
		$this->load->library(array('form_validation', 'cart', 'session'));
		$this->load->model(array('model_barang', 'model_auth', 'model_invoice'));
	}
}

 ?>
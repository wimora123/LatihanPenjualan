<?php 

/**
 * 
 */
date_default_timezone_set('Asia/Jakarta');

class Model_invoice extends CI_Model
{
	public function index()
	{
		$name=$this->input->post('name');
		$alamat=$this->input->post('alamat');

		$invoice = array(
			'nama_lengkap'=> $name,
			'alamat'=> $alamat,
			'tanggal_pesan' => date('Y-m-d H:i:s'),
			'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))
		));

		$this->db->insert('tbl_invoice', $invoice);
		$id_invoice=$this->db->insert_id();

		foreach ($this->cart->contents() AS $item) {
			$data=array(
				'id_invoice' => $id_invoice,
				'id_barang' => $item['id'],
				'nama_barang' => $item['name'],
				'jumlah' => $item['qty'],
				'harga' => $item['price'],
			);

			$this->db->insert('tbl_pesanan', $data);
		}
		return true;
	}

	public function get_invoice()
	{
		return $this->db->get('tbl_invoice')->result_array();
	}

	public function get_id_invoice($id)
	{
		$this->db->where('tbl_invoice.id_invoice', $id);
		return $this->db->get('tbl_invoice')->row_array();
	}

	// public function get_id_pesanan($id)
	// {
	// 	$this->db->where('tbl_pesanan.id_invoice', $id);
	// 	return $this->db->get('tbl_pesanan')->result_array();
	// }

	public function get_pesanan($id)
	{
		$this->db->join('tbl_invoice', 'tbl_pesanan.id_invoice=tbl_invoice.id_invoice');
		$this->db->where('tbl_pesanan.id_invoice', $id);
		return $this->db->get('tbl_pesanan')->result_array();
	}

}


 ?>
<?php 

/**
 * 
 */
class Model_barang extends CI_Model
{
	public function get_barang()
	{
		$this->db->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori');
		return $this->db->get('tbl_barang')->result_array();
	}

	public function get_barang_kategori()
	{
		return $this->db->get('tbl_kategori')->result_array();
	}

	public function get_specific_stok($stok)
	{
		// $this->db->where('tbl_barang.id_barang', $id);
		$this->db->where('tbl_barang.stok', $stok);
		return $this->db->get('tbl_barang')->row_array();
	}

	public function deleteBarang($id)
	{
		$this->db->delete('tbl_barang', $id);
	}


	// Gabungkan table barang dengan table kategori supaya nama kategori tertangkap sesuai dengan id kategori
	public function get_specific_kategori($kategori)
	{
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori');
		$this->db->where('tbl_barang.id_kategori', $kategori);
		return $this->db->get()->result_array();
	}

	public function update_kategori($data, $where)
	{
		$this->db->update('tbl_kategori', $data, $where);
	}

	// Carilah detail barang sesuai dengan id barang. Gabungkan table barang dengan table kategori supaya nama kategori tertangkap sesuai dengan id kategori
	public function get_detail_barang($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori');
		$this->db->where('tbl_barang.id_barang', $id);
		return $this->db->get()->row_array();
	}

	public function tambah_barang($data)
	{
		$this->db->insert('tbl_barang', $data);
	}

	public function update_barang($data, $where)
	{
		$this->db->update('tbl_barang', $data, $where);
	}


	public function tambah_kategori($data)
	{
		$this->db->insert('tbl_kategori', $data);
	}

		public function tampil_invoice()
	{
		return $this->db->get('tbl_invoice')->result_array();
	}
}

 ?>
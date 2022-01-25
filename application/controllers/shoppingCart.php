<?php 

/**
 * 
 */
class ShoppingCart extends MY_Controller
{
	public function index()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_user_session($email);
		$data ['items'] = $this->cart->contents();
		$data['page']='pages/ShoppingCart';
		$this->load->view('index', $data);
	}

	public function detail_product($id)
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_user_session($email);
		$data ['items'] = $this->cart->contents();
		$data['detailBarang']=$this->model_barang->get_detail_barang($id);
		$data['page']='pages/detailBarang';
		$this->load->view('index', $data);
	}

	public function add_cart()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_user_session($email);
		$this->form_validation->set_rules('qty', 'Stok', 'greater_than[tbl_barang.stok]', array(
			'greater_than' => '%s tidak cukup'));
		// Nama field itu akan diwakili oleh nama cart yg diwakilkan, bukan nama field database
		
		$data=array(
			'id' => $this->input->post('idBarang'),
			'name' => $this->input->post('namaBarang'),
			'image' => $this->input->post('photo'),
			'price' => $this->input->post('harga'),
			'qty' => $this->input->post('qty'),
			'csrfName' => $this->security->get_csrf_token_name(),
        	'csrfHash' => $this->security->get_csrf_hash()
        );


		$qty=$this->input->post('qty');

		$results=$this->model_barang->get_specific_stok($qty);

		$row = $results;
		
		$tb_qty=$row["stok"];
		echo json_encode(['available' => $tb_qty < $qty]);
		
		// Return rowid
		$this->cart->insert($data);
		// Tampilkan cart setelah add
		 // echo $this->show_cart();
	}

	// public function show_cart()
	// {
	// 	$output='';
	// 	$no=0;
	// 	foreach($this->cart->contents() AS $item){
	// 		$no++;
	// 		$output .='
	// 		<tr>
	// 			<td>'.$item['name'].'</td>
	// 			<td>'.number_format($item['price'],2,',','.').'</td>
	// 			<td>'.$item['qty'].'</td>
	// 			<td>'.number_format($item['subtotal'],2,',','.').'</td>
	// 			<td><button type="button" class="hapus_cart btn btn-danger btn-sm" id="'.$item['rowid'].'">Batal</button></td>
	// 			<td>
	// 		</tr>
	// 		';
	// 	}

	// 	$output .='<tr>
	// 	<td colspan="3">Total</td>
	// 	<td colspan="2">Rp. '.number_format($this->cart->total()).'</td>
	// 	</tr>';

	// 	return $output;
	// }

	// public function load_cart()
	// {
	// 	echo $this->show_cart();
	// }

	public function update_cart()
	{
		$qty = $this->input->post('qty');
		$rowid = $this->input->post('rowid');
		$id = $this->input->post('id');
		
		for($i=0; $i <= count($this->cart->contents()); $i++)
		{
			$data=array(
			'rowid' => $rowid[$i],
			'qty' => $qty[$i]
			);

			// Return rowid
			$this->cart->update($data);
		}
		redirect('ShoppingCart/pembayaran');

		// $qty = $this->input->post('qty');
		// $rowid = $this->input->post('rowid');
		// $id = $this->input->post('id');
		
		// $i = 0;
  //   	foreach ($this->cart->contents() as $item) 
  //   	{
	 //        $qty1 = count($qty);
	 //        //$i=1;
	 //        for ($i = 0; $i < $qty1; $i++)
	 //        {
	 //            $data = array(
	 //            'rowid' => $rowid[$i], 
	 //            'qty' => $qty[$i]
	 //        	);
	 //            $this->cart->update($data);
	 //        }
	 //    }
	}

	public function delete_cart($rowid)
	{
		$data=array(
			'rowid' => $rowid,
			'qty' => 0
		);
		$this->cart->update($data);
		redirect('ShoppingCart');
		// echo $this->show_cart();
	}

	public function pembayaran()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_user_session($email);

		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
			'required' => '%s harus diisi'));
		$this->form_validation->set_rules('telp1', 'Nomor Telepon 1', 'required|numeric', array(
			'required' => '%s harus diisi',
			'numeric' => ' %s Harus Angka'));
		$this->form_validation->set_rules('telp2', 'Nomor Telepon 2', 'required|numeric', array(
			'required' => '%s harus diisi',
			'numeric' => ' %s Harus Angka'));

		if($this->form_validation->run()==FALSE)
		{
			$data['page']='pages/pembayaran';
			$this->load->view('index', $data);
		}

		else
		{
			// Sebelum masukkan invoice, kita cek dulu apakah ada proses transaksi atau tidak
			$is_processed=$this->model_invoice->index();

			if($is_processed)
			{		
				$is_processed;
				redirect('ShoppingCart/prosesPesanan');
			}
			else
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Proses pesanan anda gagal <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('ShoppingCart/pembayaran');
			}
		}
	}

	public function prosesPesanan()
	{
		$this->cart->destroy();
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_user_session($email);	


		$data['page']='pages/prosesPesanan';
		$this->load->view('index', $data);
		
	}  
}

 ?>
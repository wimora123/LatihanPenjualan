<?php 

/**
 * 
 */
date_default_timezone_set('Asia/Jakarta');

class Admin extends MY_Controller
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
		$data['kategori']=$this->model_barang->get_barang_kategori();
		$data['barang']=$this->model_barang->get_barang();
		$data['page']='pages/admin/home';
		$this->load->view('index_admin', $data);
	}

	public function editProfile()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);
		$data['kategori']=$this->model_barang->get_barang_kategori();
		$data['barang']=$this->model_barang->get_barang();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['page']='pages/admin/editProfile';
			$this->load->view('index_admin', $data);
			// echo 'Welcome, '. $data['user']['fullName'];
		}
		else
		{
			$name=$this->input->post('name');
			$email=$this->input->post('email');

			// Cek jika ada gambar yang diupload
			$uploadImage=$_FILES['image']['name'];

			if($uploadImage)
			{
				$config['allowed_types']        = 'gif|jpg|png';
				$config['upload_path']          = 'assets/images/';
                $config['max_size']             = 2048;


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image'))
                {
 					$oldImage=$data['user']['image'];
 					// Berarti gambar baru
 					if($oldImage)
 					{
 						// Hapus dan cari tahu letak file
 						unlink(FCPATH . 'assets/images/'. $oldImage);
 					}

 					$newImage=$this->upload->data('file_name');
 					// $this->db->set('image', $newImage);
                }
                else
                {    
                 	echo $this->upload->display_errors();

                }
			}
			else
			{
				$newImage=$this->input->post('oldImage');
			}


			$data=$this->model_auth->edit_profile(array(
				'nama_user' => $name,
				'image' => $newImage
			),array(
				'email' => $email,
			));

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Profile berhasil diedit <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('admin');
		}
	
	}

	public function changePassword()
	{
		$this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim', array(
			'required' => 'Password sekarang harus diisi'));

		$this->form_validation->set_rules('newPassword', 'New Password', 'required|trim|min_length[3]|matches[repeatPassword]', array(
			'required' => 'Password sekarang harus diisi',
			'min_length' => 'Password sekarang tidak boleh kurang dari 3',
			'matches' => 'Password tidak cocok'));

		$this->form_validation->set_rules('repeatPassword', 'Repeat Password', 'required|trim|min_length[3]|matches[newPassword]', array(
			'required' => 'Password repeat harus diisi',
			'min_length' => 'Password repeat tidak boleh kurang dari 3'));

		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);
		

		if($this->form_validation->run() == FALSE)
		{
			$data['page']='pages/admin/changePassword';
			$this->load->view('index_admin', $data);
		}
		else
		{
			$currentPassword=$this->input->post('currentPassword');
			$newPassword=$this->input->post('newPassword');

			// Jika password salah termasuk saat di dalam login
			if(!password_verify($currentPassword, $data['user']['password']))
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Wrong current password <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/changePassword');
			}
			// Jika password benar, tapi harus cek password lagi apakah password yg lama itu benar atau salah supaya jangan ganti password lama seenaknya
			else
			{
				// Jangan masukin password yg sama
				if($currentPassword == $newPassword)
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password must not be same <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('admin/changePassword');
				}
				else
				{
					$passwordHash=password_hash($newPassword, PASSWORD_DEFAULT);
					// Where nama email yang sudah terdaftar dan login saat ini
					$emailWhere=$this->session->userdata('email');

					$this->model_auth->change_password(array(
						'password' => $passwordHash),
					array('email' => $emailWhere)
					);

					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Profile berhasil diedit <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

					redirect('admin/changePassword');
				}
			}
		}
		// echo 'Welcome, '. $data['user']['fullName'];
	}

	
	public function kategori($kategori)
	{
		$data['kategori']=$this->model_barang->get_barang_kategori();
		$data['namaKategori']=$this->model_barang->get_nama_kategori($kategori);
		$data['page']='pages/admin/kategori';
		$this->load->view('index_admin', $data);
	}

	public function all_barang()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);

		$data['barang']=$this->model_barang->get_barang();
	
		$data['page']='pages/admin/listBarang';
		$this->load->view('index_admin', $data);
	}

	public function add_barang()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);

		$this->form_validation->set_rules('barang', 'Barang', 'required|trim|min_length[3]', array(
			'required' => 'Nama barang tidak boleh kosong',
			'min_length' => 'Nama barang tidak boleh kurang dari 3'
		));
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', array(
			'required' => 'Keterangan harus diisi'
		));
		$this->form_validation->set_rules('idKategori', 'ID Kategori', 'required|trim', array(
			'required' => 'Kategori harus diisi'
		));
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', array(
			'required' => '%s harus diisi',
			'numeric' => '%s harus angka'
		));

		$data['kategori']=$this->model_barang->get_barang_kategori();
		if($this->form_validation->run() == FALSE)
		{
			$data['page']='pages/admin/addBarang';
			$this->load->view('index_admin', $data);
		}
		else
		{
			$barang=$this->input->post('barang');
			$keterangan=$this->input->post('keterangan');
			$idKategori=$this->input->post('idKategori');
			$harga=$this->input->post('harga');
			$stok=$this->input->post('stok');
			$image=$_FILES['image']['name'];

			if($image=='')
			{
				$config['upload_path']          = 'assets/images/';
	            $config['allowed_types']        = 'gif|jpg|png';
	            $config['max_size']             = 2000;
	            $config['max_width']            = 2000;
	            $config['max_height']           = 1000;

	            $this->load->library('upload', $config);
	            if (!$this->upload->do_upload('image'))
                {
                    echo "Gambar gagal diupload"; 
                }
                else
                {
                	$image=$this->upload->data('file_name');
                }
			}

			$data=array(
				'nama_barang' => $barang,
				'keterangan' => $keterangan,
				'id_kategori'=> $idKategori,
				'harga' => $harga,
				'stok' => $stok,
				'gambar' =>$image
			);

			$this->model_barang->tambah_barang($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Barang berhasil dimasukkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('admin/add_barang');
		}
	}

	public function editBarang($id)
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);

		$data['kategori']=$this->model_barang->get_barang_kategori();

		$this->form_validation->set_rules('barang', 'Barang', 'required|trim|min_length[3]', array(
			'required' => 'Nama barang tidak boleh kosong',
			'min_length' => 'Nama barang tidak boleh kurang dari 3'
		));
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', array(
			'required' => 'Keterangan harus diisi'
		));
		$this->form_validation->set_rules('idKategori', 'ID Kategori', 'required|trim', array(
			'required' => 'Kategori harus diisi'
		));
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', array(
			'required' => '%s harus diisi',
			'numeric' => '%s harus angka'
		));

		$data['barang']=$this->model_barang->get_detail_barang($id);
		if($this->form_validation->run() == FALSE)
		{
			$data['page']='pages/admin/editBarang';
			$this->load->view('index_admin', $data);
		}
		else
		{
			$id=$this->input->post('idBarang');
			$barang=$this->input->post('barang');
			$keterangan=$this->input->post('keterangan');
			$idKategori=$this->input->post('idKategori');
			$harga=$this->input->post('harga');
			$stok=$this->input->post('stok');
			$image=$_FILES['image']['name'];

			if($image)
			{
				$config['upload_path']          = 'assets/images/';
	            $config['allowed_types']        = 'gif|jpg|png';
	            $config['max_size']             = 2000;
	            $config['max_width']            = 2000;
	            $config['max_height']           = 1000;

	            $this->load->library('upload', $config);
	            if ($this->upload->do_upload('image'))
                {
                    $oldImage=$data['barang']['gambar'];
 					// Berarti gambar baru
 					if($oldImage)
 					{
 						// Hapus dan cari tahu letak file
 						unlink(FCPATH . 'assets/images/'. $oldImage);
 					} 
 					$newImage=$this->upload->data('file_name');
                }
                else
                {
                	echo "Gambar gagal diupload";
                }
			}
			else
			{
				$newImage=$this->input->post('oldImage');
			}

			$this->model_barang->update_barang(array(
				'nama_barang' => $barang,
				'keterangan' => $keterangan,
				'id_kategori'=> $idKategori,
				'harga' => $harga,
				'stok' => $stok,
				'gambar' =>$newImage
			), array(
				'id_barang' => $id
			));

			
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Barang berhasil diedit <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('admin/all_barang');
		}
	}

	public function deleteBarang($id)
	{
		$where=array(
			'id_barang' => $id
		);

		$this->model_barang->deleteBarang($where);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Barang berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/all_barang');
	}



	public function add_kategori()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);

		$data['kategori']=$this->model_barang->get_barang_kategori();

		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim|min_length[3]|is_unique[tbl_kategori.nama_kategori]', array(
			'required' => 'Nama kategori tidak boleh kosong',
			'min_length' => 'Nama kategori tidak boleh kurang dari 3',
			'is_unique' => 'Nama %s sudah ada'
		));

		if($this->form_validation->run() == FALSE)
		{
			$data['page']='pages/admin/addKategori';
			$this->load->view('index_admin', $data);
		}
		else
		{
			$kategori=$this->input->post('kategori');
			

			$data=array(
				'nama_kategori' => $kategori	
			);

			$this->model_barang->tambah_kategori($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kategori berhasil dimasukkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('admin/add_kategori');
		}
	}

	public function edit_kategori()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);

		$data['kategori']=$this->model_barang->get_barang_kategori();

		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim|is_unique[tbl_kategori.nama_kategori]', array(
			'required' => 'Nama %s tidak boleh kosong',
			'is_unique' => 'Nama %s sudah ada'
		));

		if($this->form_validation->run() == FALSE)
		{
			$data['page']='pages/admin/addKategori';
			$this->load->view('index_admin', $data);
		}

		else
		{
			$id=$this->input->post('idKategori');
			$kategori=$this->input->post('kategori');

			$this->model_barang->update_kategori(array(
				'nama_kategori' => $kategori
			),
			array(
				'id_kategori' => $id
			));

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kategori berhasil diedit <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('admin/add_kategori');	
		}

	}

	public function add_menu()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);

		$data['menu']=$this->model_auth->get_menu();

		$this->form_validation->set_rules('menu', 'Menu', 'required|trim|is_unique[user_menu.menu]', array(
			'required' => 'Nama %s tidak boleh kosong',
			'is_unique' => 'Nama %s sudah ada'
		));

		if($this->form_validation->run() == FALSE)
		{
			$data['page']='pages/admin/addMenu';
			$this->load->view('index_admin', $data);
		}
		else
		{
			$menu=$this->input->post('menu');
			
			$data=array(
				'menu' => $menu
			);

			$this->model_auth->tambah_menu($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Menu berhasil dimasukkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('admin/add_menu');
		}
	}

	public function edit_menu()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);

		$data['menu']=$this->model_auth->get_menu();

		$this->form_validation->set_rules('menu', 'Menu', 'required|trim|is_unique[user_menu.menu]', array(
			'required' => 'Nama %s tidak boleh kosong',
			'is_unique' => 'Nama %s sudah ada'
		));

	
		if($this->form_validation->run() == FALSE)
		{
			$data['page']='pages/admin/addMenu';
			$this->load->view('index_admin', $data);
		}
		else
		{
			$id=$this->input->post('idMenu');
			$menu=$this->input->post('menu');

			$this->model_auth->update_menu(array(
				'menu' => $menu
			),
			array(
				'id_menu' => $id
			));

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Menu berhasil diedit <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('admin/add_menu');	
		}
	}

	public function role()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);
		// $data['role']=$this->model_auth->getRoleAccess($role_id);
		$data['role']=$this->model_auth->get_role();

		$this->form_validation->set_rules('role', 'Role', 'required|trim|is_unique[user_role.nama_role]', array(
			'required' => 'Nama %s tidak boleh kosong',
			'is_unique' => 'Nama %s sudah ada'
		));

		if($this->form_validation->run() == FALSE)
		{
			$data['page']='pages/admin/role';
			$this->load->view('index_admin', $data);
		}
		else
		{
			$namaRole=$this->input->post('role');
			
			$data=array(
				'nama_role' => $namaRole
			);

			$this->model_auth->tambah_role($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Role berhasil dimasukkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/role');
		}
	}


	public function edit_role()
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);
		// $data['role']=$this->model_auth->getRoleAccess($role_id);
		$data['role']=$this->model_auth->get_role();

		$this->form_validation->set_rules('role', 'Role', 'required|trim|is_unique[user_role.nama_role]', array(
			'required' => 'Nama %s tidak boleh kosong',
			'is_unique' => 'Nama %s sudah ada'
		));

		if($this->form_validation->run() == FALSE)
		{
			$data['page']='pages/admin/role';
			$this->load->view('index_admin', $data);
		}
		else
		{
			$idRole=$this->input->post('idRole');
			$namaRole=$this->input->post('role');
			
			
			$this->model_auth->update_role(array(
				'nama_role' => $namaRole),
			array(
				'id_role' => $idRole
		));

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Role berhasil diedit <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/role');
		}
	}

	public function roleAccess($id)
	{
		$email= $this->session->userdata('email');
		$data['user']=$this->model_auth->get_admin_session($email);
		// $data['role']=$this->model_auth->getRoleAccess($role_id);
		$data['menu']=$this->model_auth->getMenuNoShowAdmin();
		$data['role']=$this->model_auth->getRoleAccess($id);
		$data['page']='pages/admin/roleAccess';
		$this->load->view('index_admin', $data);
	}

	public function changeAccess()
	{
		$role_id=$this->input->post('idRole');
		$menu_id=$this->input->post('idMenu');
		
		$data=array(
			'role_id' => $role_id,
			'menu_id' => $menu_id
		);

		$result=$this->db->get_where('user_access_menu', $data);

		// Ada isi access menu tidak?
		if($result->num_rows()<1)
		{
			// Bikin jadi ada
			$this->model_auth->insert_access_menu($data);
		}
		else
		{
			// Bikin jadi tidak ada
			$this->model_auth->delete_access_menu($data);
		}


		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Role Access berhasil diupdate <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

		
	}
}

 ?>
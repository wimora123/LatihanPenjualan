		<?php 

date_default_timezone_set('Asia/Jakarta');

class Auth extends MY_Controller
{
	public function index()
	{
		if($this->session->userdata('role_id') ==1)
		{
			redirect('admin');
		}
		else if($this->session->userdata('role_id') ==2)
		{
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['page']='pages/login/login';
			$this->load->view('index_login', $data);
		}
		else
		{
			$this->_login();
		}
	}

	private function _login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');

		$user=$this->model_auth->get_login($email);

		if($user)
		{
			if($user['is_active']==1)
			{
				// Cocokkan password yang sudah dihash
				if(password_verify($password, $user['password']))
				{
					$data=array(
					'email'=> $user['email'],
					'role_id'=>$user['role_id']
					);

					// Data disimpan ke dalam session
					$this->session->set_userdata($data);

					if($user['role_id']==1)
					{
						redirect('admin');
					}
					else
					{
						redirect('user');
					}	
				}
				else
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password is not correct <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('auth');
				}
			}
			else
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">User is not activated <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span></button></div>');
			    redirect('auth');
			}
		}
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password is not correct <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		// Yuk saat logout, bersihkan semua cart
		$this->cart->destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-secondary alert-dismissible fade show" role="alert">Silahkan login lagi <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span></button></div>');
			redirect('user');
	}

	public function logoutAdmin()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-secondary alert-dismissible fade show" role="alert">Silahkan login lagi <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
	}

	public function registrasi()
	{
		if($this->session->userdata('role_id') ==1)
		{
			redirect('admin');
		}
		else if($this->session->userdata('role_id') ==2)
		{
			redirect('user');
		}

		$this->form_validation->set_rules('name', 'Name', 'required|trim', array(
			'required' => 'Nama tidak boleh kosong'
		));
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', array(
			'required' => 'Nama tidak boleh kosong',
			'valid_email' => 'Email tidak valid, contoh xxx@yahoo.com',
			'is_unique' => 'Email sudah terdaftar'
		));
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', array(
			'required' => 'Password tidak boleh kosong',
			'matches' => 'Password tidak cocok'
		));
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]', array(
			'required' => 'Password tidak boleh kosong',
			'matches' => 'Password tidak cocok'
		));

		if($this->form_validation->run() == FALSE)
		{
			$data['page']='pages/login/registrasi';
			$this->load->view('index_login', $data);
		}
		else
		{
			$nama=$this->input->post('name');
			$email=$this->input->post('email');
			$image="user.png";
			$password=$this->input->post('password1');
			$role_id=2;
			$is_active=1;

			$data=array(
				'nama_user' => $nama,
				'email' => $email,
				'image' => $image,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'role_id' => $role_id,
				'is_active' => 1,
				'date_created' => date("Y-m-d H:i:s")
			);

			$this->model_auth->registrasi_user($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Registrasi berhasil. Silahkan login <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('auth');

		}
	}

	public function blocked()
	{
		$this->load->view('pages/blocked');
	}
}

 ?>
<?php 

function is_logged_in()
{
	$ci = get_instance();

	if(!$ci->session->userdata('email'))
	{
		$ci->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Harap login dulu <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
	}
	else
	{
		$role_id=$ci->session->userdata('role_id');
		// Dapatkan menu_id
		$menu=$ci->uri->segment(1);

		// Nama menu telah diakui jadi controller karena dia akan akses url
		$queryMenu=$ci->db->get_where('user_menu', array('menu' => $menu))->row_array();

		// Ada ga user access menu di tabel? Maksudnya usernya adl member tapi mau akses admin. Sayangnya member cuma boleh akses menu member sendiri, bukan admin 
		$menu_id=$queryMenu['id_menu'];

		$userAccess=$ci->db->get_where('user_access_menu', array(
			'role_id' => $role_id, 
			'menu_id' => $menu_id
		))->row_array();

		if($userAccess < 1)
		{
			redirect('auth/blocked');
		}
	}
}

function check_access($roleID, $menuID)
{
	$ci = get_instance();
	$result = $ci->model_auth->checkRoleAccess($roleID, $menuID);

	if($result>0)
	{
		// Kalau ada, checklist
		return "checked='checked'";
	}
}


 ?>
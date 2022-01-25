<?php 

/**
 * 
 */
class Model_auth extends CI_Model
{
	public function registrasi_user($data)
	{
		$this->db->insert('user', $data);
	}

	public function get_login($email)
	{
		return $this->db->get_where('user', array('email' => $email))->row_array();
	}

	public function get_user_session($email)
	{
		return $this->db->get_where('user', array('email' => $email))->row_array();
	}

	public function get_admin_session($email)
	{
		return $this->db->get_where('user', array('email' => $email))->row_array();
	}

	public function tambah_menu($data)
	{
		$this->db->insert('user_menu', $data);
	}
	
	public function get_menu()
	{
		return $this->db->get('user_menu')->result_array();
	}

	public function get_id_menu($id)
	{
		return $this->db->get_where('user_menu',array('id_menu' => $id))->row_array();
	}

	public function update_menu($data, $where)
	{
		$this->db->update('user_menu', $data, $where);
	}

	public function get_role()
	{
		return $this->db->get('user_role')->result_array();
	}	

	public function tambah_role($data)
	{
		$this->db->insert('user_role', $data);
	}

	public function update_role($data, $where)
	{
		$this->db->update('user_role', $data, $where);
	}

	public function getMenuNoShowAdmin()
	{
		$this->db->where('id_menu !=', 1);
		return $this->db->get('user_menu')->result_array();
	}

	public function getRoleAccess($id)
	{
		return $this->db->get_where('user_role', array('id_role' => $id))->row_array();
	}

	public function checkRoleAccess($roleID, $menuID)
	{
		$this->db->where('role_id', $roleID);
		$this->db->where('menu_id', $menuID);
		return $this->db->get('user_access_menu')->row_array();
	}

	public function insert_access_menu($data)
	{
		$this->db->insert('user_access_menu', $data);
	}

	public function delete_access_menu($data)
	{
		$this->db->delete('user_access_menu', $data);
	}

	public function edit_profile($data, $where)
	{
		$this->db->update('user', $data, $where);
	}
	
	public function change_password($data, $email)
	{
		$this->db->update('user', $data, $email);
	}
}

 ?>
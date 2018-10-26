<?php 



/**
 * 
 */
class UsersModel extends CI_Model
{
	

	function read()
	{
		$this->db->select('name, lastname, email, user_id');
		
		$this->db->from('users');
			
		$query = $this->db->get();

		return $query->result();

	}

	public function store($name, $lastname, $email, $password)
	{
		$data = array(
        'name' => $name,
        'lastname' => $lastname,
        'email' => $email,
        'password' => $password,
);
		$this->db->insert('users', $data);
	}

	public function edit($name, $lastname, $email, $password, $iduser)
	{
		$this->db->set('name', $name);

		$this->db->set('lastname', $lastname);

		$this->db->set('email', $email);

		$this->db->set('password', $password);

		$this->db->where('user_id', $iduser);

		$this->db->update('users');
	}

	public function destroy($idcategory)
	{
		$this->db->where('user_id', $idcategory);

		$this->db->delete('users');
	}
}
<?php 



/**
 * 
 */
class Users_model extends CI_Model
{
	

	function read()
	{
		$this->db->select('foto, name, lastname, email, user_id');
		
		$this->db->from('users');
			
		$query = $this->db->get();

		return $query->result();

	}

	public function store($foto, $name, $lastname, $email, $password)
	{
		$data = array(

		'foto' => $foto,
        'name' => $name,
        'lastname' => $lastname,
        'email' => $email,
        'password' => $password,
);
		$result = $this->db->insert('users', $data);

		return $result;
	}

	public function edit($foto, $name, $lastname, $email, $password, $iduser)
	{
		$this->db->set('foto', $foto);

		$this->db->set('name', $name);

		$this->db->set('lastname', $lastname);

		$this->db->set('email', $email);

		$this->db->where('user_id', $iduser);

		$this->db->update('users');
	}

	public function destroy($id)
	{
		$this->db->where('user_id', $id);

		$this->db->delete('users');
	}

	function show($userid)
	{
		$this->db->select('foto, name, lastname, email, user_id, password');

		$this->db->where('user_id', $userid);
		
		$this->db->from('users');
			
		$query = $this->db->get();

		return $query->result();

	}
}
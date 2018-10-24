<?php

/**
 * 
 */
class authModel extends CI_Model
{
	
	function ValidarUsuario($email, $password)
	{
		$query = $this->db->where('Email',$email);

		$query = $this->db->where('Password',$password);

		$query = $this->db->get('Usuarios');

		return $query->row();

	}

	public function CrearUsuario($usuario, $email, $password)
	{
		$data = array(
        'Usuario' => $usuario,
        'Email' => $email,
        'Password' => $password
		);

		$query = $this->db->insert('usuarios', $data);

		return $query;
	}

	public function ActualizarEmail($email, $email2)
	{
		$this->db->set('Email', $email2);

		$this->db->where('Email', $email);

		$query = $this->db->update('Usuarios');

		return $query;

	}

	public function ActualizarPassword($password, $password2)
	{
		$this->db->set('Password', $password2);

		$this->db->where('Password', $password);

		$query = $this->db->update('Usuarios');

		return $query;
	}

	public function EliminarUsuario($email, $password)
	{
		$this->db->where('Email', $email);

		$this->db->where('Password', $password);

		$query = $this->db->delete('Usuarios');

		return $query;

	}
}
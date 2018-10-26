<?php

/**
 * 
 */
class Users extends CI_Controller
{
	
	public function index()
	{
		$this->load->model('UsersModel');

		$data = array(
        'users' => $this->UsersModel->read()
    	);

		$this->load->view('users/index', $data);
	}

	public function create()
	{
		$this->load->view('users/create');

	}

	public function edit()
	{

		$this->load->view('users/edit');
	}

	public function store()
	{
		$this->load->model('UsersModel');

		$this->UsersModel->store($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['password']);

		redirect('users/index', 'refresh');
	}

	public function update()
	{
		$this->load->model('UsersModel');

		$this->UsersModel->edit($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['iduser']);

		redirect('users/index', 'refresh');
	}

	public function destroy()
	{
		$this->load->model('UsersModel');

		$this->UsersModel->destroy($_GET['usersId']);

		redirect('users/index', 'refresh');

	}

}
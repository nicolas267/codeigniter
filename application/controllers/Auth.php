<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Auth extends CI_Controller
{
	
	public function login()
	{
		$this->form_validation->set_rules('email','e-mail','required|valid_email');
        $this->form_validation->set_rules('password','password','required');

         if(($this->form_validation->run()===FALSE)) {

				$this->load->view('Auth/Login/login');
         }

        $this->load->model('authModel');
        $logueado = $this->authModel->ValidarUsuario($_POST['email'],$_POST['password']);

        if (!$logueado) {

			$this->load->view('Auth/Login/login');
        } else {
        	$this->load->view('Admin/index');
        }


	}

	public function Create()
	{

        $this->load->model('authModel');
        $create =  $this->authModel->CrearUsuario($_POST['name'], $_POST['email'], $_POST['password']);

        if (!$create) {

         	$this->load->view('login');
        } else {

         		$this->load->view('Auth/Login/login');
        }
	}

	public function ActualizarEmail()
	{
		$this->load->model('authModel');

		$update = $this->authModel->ActualizarEmail($_POST['email'], $_POST['email2']);

		if (!$update) {

        	$this->load->view('Admin/index');
		} else {

         	$this->load->view('Auth/Login/login');
		}
	}

	public function ActualizarPassword()
	{
		$this->load->model('authModel');

		$update2 = $this->authModel->ActualizarPassword($_POST['Password'], $_POST['Password2']);

		if (!$update2) {

        	$this->load->view('Admin/index');
		} else {

         	$this->load->view('Auth/Login/login');
		}
	}

	public function EliminarUsuario()
	{
		$this->load->model('authModel');

		$eliminado = $this->authModel->EliminarUsuario($_POST['Email'], $_POST['Password']);

		if (!$eliminado) {

        	$this->load->view('Admin/index');
		} else {

		$this->load->view('Auth/Login/login');
		}

	}
}
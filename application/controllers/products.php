<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('ProductsModel');

		$data = array(
        'products' => $this->ProductsModel->read()
    	);

		$this->load->view('products/index', $data);
	}

	public function create()
	{
		$this->load->view('products/create');

	}

	public function edit()
	{

		$this->load->view('products/edit');
	}

	public function store()
	{
		$this->load->model('ProductsModel');

		$this->ProductsModel->store($_POST['title'], $_POST['description'], $_POST['category']);

		redirect('products/index', 'refresh');
	}

	public function update()
	{
		$this->load->model('ProductsModel');

		$this->ProductsModel->edit($_POST['title'], $_POST['description'], $_POST['category'], $_POST['idproduct']);

		redirect('products/index', 'refresh');
	}

	public function destroy()
	{
		$this->load->model('ProductsModel');

		$this->ProductsModel->destroy($_GET['productId']);

		redirect('products/index', 'refresh');

	}

	public function show()
	{
		# code...
	}
}

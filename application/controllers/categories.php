<?php

/**
 * 
 */
class Categories extends CI_Controller
{
	
	public function index()
	{
		$this->load->model('CategoriesModel');

		$data = array(
        'categories' => $this->CategoriesModel->read()
    	);

		$this->load->view('categories/index', $data);
	}

	public function create()
	{
		$this->load->view('categories/create');

	}

	public function edit()
	{

		$this->load->view('categories/edit');
	}

	public function store()
	{
		$this->load->model('CategoriesModel');

		$this->CategoriesModel->store($_POST['category']);

		redirect('categories/index', 'refresh');
	}

	public function update()
	{
		$this->load->model('categoriesModel');

		$this->categoriesModel->edit($_POST['category'], $_POST['idcategory']);

		redirect('categories/index', 'refresh');
	}

	public function destroy()
	{
		$this->load->model('categoriesModel');

		$this->categoriesModel->destroy($_GET['categoryId']);

		redirect('categories/index', 'refresh');

	}

}
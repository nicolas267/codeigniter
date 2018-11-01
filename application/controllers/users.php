<?php

/**
 * 
 */
class Users extends CI_Controller
{
	
	public function index()
	{
		$this->load->model('users_model');

		$data = array(
        'users' => $this->users_model->read()
    	);

		$this->load->view('users/index', $data);
	}

	public function create()
	{
		$this->load->view('users/create');

	}

	public function edit()
	{
		$this->load->model('users_model');

		$data = array(
        'users' => $this->users_model->show($_GET['usersId'])
    	);


		$this->load->view('users/edit', $data);
	}

	public function store() 
	{
		$this->load->model('users_model');

		$config['upload_path']	= './images/';		
		$config['allowed_types']	= 'gif|jpg|png';	    
		$config['max_size'] = 20000;	  	
		$config['encrypt_name'] = TRUE;	  	
		$config['width'] = 800;		
		$config['height'] = 600;	    
		$this->load->library('upload', $config);		
		if ( ! $this->upload->do_upload('userfile'))		
			{			
				 var_dump($this->upload->display_errors());	
				 var_dump($_POST);	
			} else {			

				$upload_data = array('upload_data' => $this->upload->data());

				$this->users_model->store($upload_data['upload_data']['file_name'], $_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['password']);
			}
    }


	public function update()
	{
		$this->load->model('users_model');

		$config['upload_path']	= './images/';		
		$config['allowed_types']	= 'gif|jpg|png';	    
		$config['max_size'] = 20000;	  	
		$config['encrypt_name'] = TRUE;	  	
		$config['width'] = 800;		
		$config['height'] = 600;	    
		$this->load->library('upload', $config);		
		if ( ! $this->upload->do_upload('userfile'))		
			{			
				 var_dump($this->upload->display_errors());	
				 var_dump($_POST);	
			} else {			

				$upload_data = array('upload_data' => $this->upload->data());

				$this->users_model->edit($upload_data['upload_data']['file_name'], $_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['userid']);

				redirect('users/index', 'refresh');

			}
	}

	public function destroy()
	{
		$this->load->model('users_model');

		$this->users_model->destroy($_GET['usersId']);

		redirect('users/index', 'refresh');

	}
}
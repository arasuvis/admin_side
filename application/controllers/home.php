<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function HOME() // Constructor
	{
		parent::__construct(); 
		$this->load->library('session');
		session_start();
	}

	/**** Start Login ****/

	public function index()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$email_address = $this->messages_model->get_admin();

			if($this->session->userdata['is_logged_in']['email_address'] == $email_address)
			{
				$messages = $this->messages_model->get_all_entries();
				$data['messages'] = $messages;
				$this->load->view('header', $data);
				$this->load->view('leftbar', $data);
				$this->load->view('welcome_message', $data);
				$this->load->view('footer', $data);
			}
			
		}
		else
		{
			$this->load->view('index_admin');
		}
	}
	
	public function signin_form()
	{
	
		$email_address = $_POST['email_address'];
		$password = $_POST['password'];
		$valid_check = $this->messages_model->check_credentials($email_address,$password);
		if($valid_check == true)
		{
			$data = array(
			'email_address' => $email_address,
			'is_logged_in' => true);
		    $this->session->set_userdata('is_logged_in', $data);
			echo 1;
		}
		else
		{
			echo 2;
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('index_admin');	
	}	

	/**** End Login ****/

	public function relation()
	{
		$messages = $this->relations_model->get_all_relations();
		$data['messages'] = $messages;
		$this->load->view('header', $data);
		$this->load->view('leftbar', $data);
		$this->load->view('relations/relations', $data);
		$this->load->view('footer', $data);
	}
}
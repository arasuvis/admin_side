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
			$messages = $this->messages_model->get_all_entries();
			$data['messages'] = $messages;
			$this->load->view('header', $data);
			$this->load->view('leftbar', $data);
			$this->load->view('welcome_message', $data);
			$this->load->view('footer', $data);
		}
		else
		{
			$this->load->view('index_admin');
		}
	}
	
	public function signin_form()
	{
		echo "<pre>";print_r($_POST);die();
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
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create extends CI_Controller {


	public function index()
	{

		$data['messages'] = "";
			$this->load->view('header');
			$this->load->view('create_view');
			$this->load->view('footer');
	}

	public function input(){

		if(
			$this->input->post('name') != "" &&
			$this->input->post('message') != "" &&
			$this->input->post('contact') != ""
		)
		{
			$data['name'] = $this->input->post('name');
			$data['message'] = $this->input->post('message');
			$data['contact'] = $this->input->post('contact');
			$this->messages_model->insert_entry($data);

		//	redirect("/home/index?action=success");
		}
		else{
			
		}
		redirect("/home/index");
	}	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
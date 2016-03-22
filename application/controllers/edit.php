<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$data['entry'] =  $this->messages_model->get_entry($this->uri->segment(3, 0));
		if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
			echo "error";
		}
		else
		{
			$data['entry'] = $data['entry'][0];
			$data['xxx'] = 'dasd';
			$this->load->view('header');
			$this->load->view('leftbar');
			$this->load->view('edit_view', $data);
			$this->load->view('footer');
		}
	}

	
	public function input(){

		if(
			$this->input->post('exampleInputEmail1') != "" &&
			$this->input->post('exampleInputPassword1') != "" &&
			$this->input->post('name') != ""
		)
		{
			$data['email'] = $this->input->post('exampleInputEmail1');
			$data['id'] = $this->input->post('id');
			$data['password'] = $this->input->post('exampleInputPassword1');
			$data['name'] = $this->input->post('name');
			$data['phone_number'] = $this->input->post('phone_number');
			$data['address'] = $this->input->post('address');
			$this->messages_model->update_entry($data);
			
		}
		else{
			
		}
		redirect("/home/index");
	}

	public function delete(){
		if($this->uri->segment(3, 0) != ""){
			$this->messages_model->delete_entry($this->uri->segment(3, 0));	
		}
		redirect("/home/index");
	}	
	
	public function update_view()
	{
		
		$data['entry'] =  $this->relations_model->get_entry($this->uri->segment(3, 0));
		if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
			echo "error";
		}
		else
		{
			$data['entry'] = $data['entry'][0];
			$this->load->view('header');
			$this->load->view('leftbar');
			$this->load->view('relations/edit_view', $data);
			$this->load->view('footer');
		}
	}
	
	public function edit_relation(){

		if(
			$this->input->post('name') != ""
		)
		{			
			$data['id'] = $this->input->post('id');
			$data['name'] = $this->input->post('name');
			$this->relations_model->update_entry($data);			
		}
		else{
			
		}
		redirect("/home/relation");
	}
	
	public function delete_relation(){
		if($this->uri->segment(3, 0) != ""){
			$this->relations_model->delete_entry($this->uri->segment(3, 0));	
		}
		redirect("/home/relation");
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
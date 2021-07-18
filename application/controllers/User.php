<?php 
	class User extends CI_Controller{
			public function signup(){
				$this->load->helper('url');
				$this->load->library('form_validation');
				$this->load->view('signup_form');
			}

			public function submit(){
				$this->load->helper('url');
				$this->load->library('form_validation');
				$this->load->database();
				
				$this->form_validation->set_rules('email','Email','required|is_unique[user.email]',array('is_unique'=>'Email already exists!'));
				$this->form_validation->set_rules('name','Name','required');
				$this->form_validation->set_rules('password','Password','required');
				if($this->form_validation->run()==FALSE){
					$this->load->view('signup_form');
				}else{
					$data['name'] = $this->input->post('name');
					$data['email'] = $this->input->post('email');
					$data['password'] = $this->input->post('password');
				
					$this->load->model('user_model');
					$response = $this->user_model->store($data);
					if($response==true){
						echo 'Succesfully registered';
					}else{
						echo 'Failed to register';	
					}
				}
				
			}
	}


?>

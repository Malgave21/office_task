<?php
class Login extends CI_Controller {
	public function index()
	{
		$this->load->view('login');
	
	}
	public function register()
	{
		$this->load->view('register');
	
	}
	public function post_register()
	{
		        $this->form_validation->set_rules('name','user name','trim|required');
                $this->form_validation->set_rules('email','user email','trim|required|is_unique[user.email]');
                $this->form_validation->set_rules('password','user password','required');
                $this->form_validation->set_rules('birth_date','user birth date','required');
                if($this->form_validation->run() == false){
                        $data_error = [
                                'error'=>validation_errors()
                        ];
                        $this->session->set_flashdata($data_error);
                        $this->load->view('register');
                }  else{
                      
                        $this->load->model('login_model');
                      $addUser =  $this->login_model->adduser([
                                'name' => $this->input->post('name'),
                                'email' => $this->input->post('email'),
                                'password' => $this->input->post('password'),
                                'birth_date' => $this->input->post('birth_date'),
                        ]);
                        if($addUser){
                                $this->session->set_flashdata('inserted', 'user register successfully');
                                redirect('task');
                        }
                        
                       
                }
        $this->load->view('add_task');
	
	}

        public function post_login()
	{
              
                $this->form_validation->set_rules('email','user email','required');
                $this->form_validation->set_rules('password','user password','required');
                if($this->form_validation->run() == false){
                        $data_error = [
                                'error'=>validation_errors()
                        ];
                        $this->session->set_flashdata($data_error);
                        $this->load->view('login');
                }  else{
                        $username = $this->input->post('email');
                        $password = $this->input->post('password');
                        $this->load->model('login_model');
                      $login_id =  $this->login_model->isValided($username,$password);
                        if($login_id){
                                $this->session->set_userdata('id',$login_id);
                                redirect('task');
                        }else{
                                $this->session->set_flashdata('no', 'please check login details');
                                redirect('login');
                        }
                       
                }
                redirect('login');

        }

        public function logout()
	{
                $this->session->unset_userdata('id');
                $this->session->sess_destroy();
                redirect('login');
        }

}

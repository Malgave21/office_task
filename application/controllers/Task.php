<?php
class Task extends CI_Controller {
	public function index()
	{
        $this->load->model('task_model');
        $data['task_details'] = $this->task_model->getTask();
        $this->load->view('task',$data);
	}
        public function add_task()
	{
        $this->load->view('add_task');
	}

        public function post_add_task()
	{
              
                $this->form_validation->set_rules('u_name','Task worker name','trim|required');
                $this->form_validation->set_rules('description','Task description','trim|required');
                $this->form_validation->set_rules('start_date','Task Start date','trim|required');
                $this->form_validation->set_rules('end_date','Task End Date','trim|required');
                if($this->form_validation->run() == false){
                        $data_error = [
                                'error'=>validation_errors()
                        ];
                        $this->session->set_flashdata($data_error);
                }  else{
                      
                        $this->load->model('task_model');
                      $addData =  $this->task_model->addTask([
                                'u_name' => $this->input->post('u_name'),
                                'description' => $this->input->post('description'),
                                'start_date' => $this->input->post('start_date'),
                                'end_date' => $this->input->post('end_date'),
                                'task_status' => 'pending',
                                'user_id' => 1
                        ]);
                        if($addData){
                                $this->session->set_flashdata('inserted', 'your data has successfully added');
                                redirect('task');
                        }
                        
                       
                }
        $this->load->view('add_task');
	}

	public function edit_task($id)
	{
            $this->load->model('task_model');
            $data['task_editData'] = $this->task_model->getEditTask($id);
            $this->load->view('edit_task',$data);
	}
        public function post_edit_task($id)
	{
                $this->form_validation->set_rules('u_name','Task worker name','trim|required');
                $this->form_validation->set_rules('description','Task description','required');
                $this->form_validation->set_rules('start_date','Task Start date','required');
                $this->form_validation->set_rules('end_date','Task End Date','required');
                if($this->form_validation->run() == false){
                        $data_error = [
                                'error'=>validation_errors()
                        ];
                        $this->session->set_flashdata($data_error);
                }else{
                      
                        $this->load->model('task_model');
                      $addData =  $this->task_model->editTask([
                                'u_name' => $this->input->post('u_name'),
                                'description' => $this->input->post('description'),
                                'start_date' => $this->input->post('start_date'),
                                'end_date' => $this->input->post('end_date'),
                                'task_status' => $this->input->post('task_status'),
                                'user_id' => 1
                        ],$id);
                        if($addData){
                                $this->session->set_flashdata('inserted', 'your data has successfully updated');
                                redirect('task');
                        }
                        
                       
                }
        
        $this->load->view('edit_task');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public $project = "sp_dashboard";
	public $category = "user";
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('UserModel');
	}


	public function login()
	{
        if ($this->input->server('REQUEST_METHOD')=='GET'){		
            $context=array(
                "title"					=>	"Login",
                "project" 				=> 	$this->project,
                "category" 				=>	$this->category,
                "view" 					=>  $this->router->fetch_method(),
            );
			$this->load->view("$this->project/user/base",$context);
        }
        else if ($this->input->server('REQUEST_METHOD')=='POST'){
            $this->form_validation->set_rules('input_username', 'input_username', 'required');
            $this->form_validation->set_rules('input_password', 'input_password', 'required');
            
            if($this->form_validation->run() == TRUE){
				$user = $this->UserModel->get(
					array(
						"username"     => $this->input->post("input_username"),
						"password"  => md5($this->input->post("input_password")),
						"is_active"  => 1
					)
				);

				if($user){


					$this->session->set_userdata("user", $user);
					if($user->is_active == 1  && $user->is_superuser == 1){
						redirect(base_url('/sp-admin'));
					}
					else if($user->is_active == 0){
						redirect(base_url('/welcome'));
					}

				} 
				else {
					redirect(base_url("login"));
				}
            }
            else{
                $context=array(
                "title"					=>	"asd",
                "project" 				=> 	$this->project,
                "category" 				=>	$this->category,
                "view" 					=>  $this->router->fetch_method(),
                "form_error"      =>  "Hata oluştu",
            );
            $this->load->view("$this->project/user/base",$context);
            }



        }


    }
    
    public function logout(){

        $this->session->unset_userdata("user");
        redirect(base_url("/sp-admin"));

	}
	

}

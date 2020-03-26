<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public $project = "dashboard";
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
					)
				);

				if($user){
					$this->session->set_userdata("user", $user);
					if($user->is_active == 1){
						redirect(base_url('/admin'));
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
        redirect(base_url("/admin"));

	}
	

	public function register()
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
			$this->load->library("form_validation");
			$this->form_validation->set_rules("user_first_name", "Ad", "required|trim");
			$this->form_validation->set_rules("user_last_name", "Soyad", "required|trim");
			$this->form_validation->set_rules("user_email", "Eposta", "required|trim");
			$this->form_validation->set_rules("user_username", "Kullanıcı Adı", "required|trim");
			$this->form_validation->set_rules("user_password", "Şifre", "required|trim");
			$this->form_validation->set_message(
				array(
					"required"  => "<b>{field}</b> alanı doldurulmalıdır"
				)
			);
			$validate = $this->form_validation->run();
			if($validate){


				$username = $this->input->post("user_username");
				$email = $this->input->post("user_email");


				$username_control = $this->UserModel->get(
					array(
						"username"	=> $username,
					)
				);


				$email_control = $this->UserModel->get(
					array(
						"email"	=> $email,
					)
				);

				if (isset($username_control) || isset($email_control) ) {
					echo "Kullanıcı kayıtlı";
				}
				else {
					$insert = $this->UserModel->add(
						array(
							"first_name"    =>	$this->input->post("user_first_name"),
							"last_name"   	=>	$this->input->post("user_last_name"),
							"email"   		=>	$this->input->post("user_email"),
							"username"		=>	AutoSlugField($this->input->post("user_username")),
							"password"      =>	md5($this->input->post("user_password")),
							"is_active"     =>	0,
							"is_superuser"  =>	0,
							"date_joined"   =>	date("Y-m-d H:i:s")
						)
					);
					if($insert){
						redirect(base_url("/welcome"));
					} 
					else {
						redirect(base_url("/welcome"));
					}

				}

			} else {
				$context=array(
					"title"					=>	"Login",
					"project" 				=> 	$this->project,
					"category" 				=>	$this->category,
					"view" 					=>  $this->router->fetch_method(),
				);
				$this->load->view("$this->project/user/base",$context);
			}
		}
	}





	
	public function forgot_password(){

		$context=array(
			"title"					=>	"Login",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
		);
		$this->load->view("$this->project/user/base",$context);
    }
}

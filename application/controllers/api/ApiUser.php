<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiUser extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
        $this->load->model('UserApiModel');
	}



	public function login(){

		$user = $this->UserApiModel->get(
			array(
				"username"     => $this->input->post("input_username"),
				"password"  => md5($this->input->post("input_password")),
				"is_active"  => 1
			)
		);

		if($user){
			$this->session->set_userdata("user", $user);

			echo "Giriş yapıldı";
		} 

		else {
			echo "Hata verildi";
		}
	  }


    public function logout(){

        $this->session->unset_userdata("user");
		echo "Çıkış yapıldı";

	}
	

	public function register()
	{
			echo  $this->UserApiModel->add(
				array(
					"first_name"    =>	$this->input->post("first_name"),
					"last_name"   	=>	$this->input->post("last_name"),
					"email"   		=>	$this->input->post("email"),
					"username"		=>	AutoSlugField($this->input->post("username")),
					"password"      =>	md5($this->input->post("password")),
					"is_active"     =>	1,
					"is_superuser"  =>	0,
					"date_joined"   =>	date("Y-m-d H:i:s")
				)
			);
	}

	
	public function forgot_password(){
		echo "Şifremi unuttum.";
    }
}

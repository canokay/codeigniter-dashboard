<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeDashboard extends CI_Controller {

	public $project = "welcome_dashboard";
	public $category = "welcome_dashboard";
	public $user = "";

	public function __construct(){
		parent::__construct();


		if(!get_notactive_user()){
            redirect(base_url("/login"));
		}
		else{
			$this->user = get_notactive_user();
		}
	}

	
	public function index()
	{
			$context=array(
				"title"					=>	"Hoş Geldiniz.",
				"sub_title"				=>	"Hoş Geldiniz",
				"project" 				=> 	$this->project,
				"category" 				=>	$this->category,
				"view" 					=>  $this->router->fetch_method(),
				"user" 					=>	$this->user,
			);
			$this->load->view("$this->project/base",$context);

	}



	}

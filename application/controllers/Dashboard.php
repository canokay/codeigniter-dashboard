<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $project = "";
	public $category = "";
	
	public function __construct()
	{
		parent::__construct();
		if(!get_active_user()){
            redirect(base_url("/login"));
        }
		$this->project = "dashboard";
		$this->category = "homepage";
	}


	public function homepage()
	{
		$context=array(
			"title"					=>	"Welcome to CodeIgniter",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
		);
		$this->load->view("$this->project/base",$context);
	}
}

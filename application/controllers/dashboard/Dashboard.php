<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $project = "dashboard";
	public $category = "dashboard";
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model("DashboardModel");
		
		login_required();
	}


	public function index()
	{
		$context=array(
			"title"					=>	"Dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"ticket_alerts" 		=>	$this->ticket_alerts
			
		);
		$this->load->view("$this->project/base",$context);
	}



}

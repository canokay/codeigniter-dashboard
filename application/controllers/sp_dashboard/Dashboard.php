<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $project = "sp_dashboard";
	public $category = "example";
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model("DashboardModel");

		if(!get_superuser_user()){
            redirect(base_url("/login"));
		}
		else{
			$this->user = get_superuser_user();
			$this->notification_alerts = $this->DashboardModel->get_notification_alerts();
			$this->ticket_alerts = $this->DashboardModel->get_ticket_alerts();
		}
	}


	public function homepage()
	{
		$context=array(
			"title"					=>	"sp_dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"ticket_alerts" 		=>	$this->ticket_alerts,
			"view_footer_include"	=> "homepage_script",
			
		);
		$this->load->view("$this->project/base",$context);
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $project = "sp_dashboard";
	public $category = "example";
	
	public function __construct()
	{
		parent::__construct();
		if(!get_superuser_user()){
            redirect(base_url("/sp-login"));
		}
		else{
			$this->user = get_superuser_user();
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
			"view_footer_include"	=> "homepage_script",
			
		);
		$this->load->view("$this->project/base",$context);
	}


	public function animations()
	{
		$context=array(
			"title"					=>	"sp_dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
		);
		$this->load->view("$this->project/base",$context);
	}

	public function borders()
	{
		$context=array(
			"title"					=>	"sp_dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
		);
		$this->load->view("$this->project/base",$context);
	}


	public function buttons()
	{
		$context=array(
			"title"					=>	"sp_dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
		);
		$this->load->view("$this->project/base",$context);
	}


	public function cards()
	{
		$context=array(
			"title"					=>	"sp_dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
		);
		$this->load->view("$this->project/base",$context);
	}


	public function charts()
	{
		$context=array(
			"title"					=>	"sp_dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
		);
		$this->load->view("$this->project/base",$context);
	}

	public function colors()
	{
		$context=array(
			"title"					=>	"sp_dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
		);
		$this->load->view("$this->project/base",$context);
	}


	public function tables()
	{
		$context=array(
			"title"					=>	"sp_dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
			"view_header_include"	=> "tables_style",
			"view_footer_include"	=> "tables_script",
		);
		$this->load->view("$this->project/base",$context);
	}


	public function other()
	{
		$context=array(
			"title"					=>	"sp_dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
		);
		$this->load->view("$this->project/base",$context);
	}


}

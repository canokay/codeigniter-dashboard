<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $project = "dashboard";
	public $category = "dashboard";
	public $verbose_name = "Dashboard";
	public $verbose_name_plural = "Kontrol Paneli";
	
	public function __construct()
	{
		parent::__construct();

		login_required();
	}


	public function index()
	{
		$context=array(
			"title"		=>	$this->verbose_name_plural,
			"sub_title"	=>	$this->verbose_name . " Listesi",
		);
		render_view($context);
	}



}

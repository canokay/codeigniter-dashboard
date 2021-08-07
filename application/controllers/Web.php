<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public $project = "web";
	public $category = "pages";
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$context=array(
			"title"					=>	"Codeigniter 3x",
			"card_title"				=>	"Codeigniter",
		);
		render_view($context);
	}


}

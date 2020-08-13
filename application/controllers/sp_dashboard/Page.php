<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public $project = "sp_dashboard";
	public $category = "pages";
	public $verbose_name = "Sayfa";
	public $verbose_name_plural = "Sayfalar";

	public function __construct()
	{
		parent::__construct();

		login_required_spuser();

		$this->load->model("PageModel");
	}


	public function index()
	{
		$pages = $this->PageModel->get_all();

		$context=array(
			"title"					=>	"Sayfalar",
			"sub_title"				=>	"Sayfa Listesi",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"ticket_alerts" 		=>	$this->ticket_alerts,
			"items" 				=>	$pages,
			"DataTablesField"		=> "datatable",
			"page_title_add_button" => 1
		);
		$this->load->view("sp_dashboard/base",$context);
	}

	public function create()
	{		
		$context=array(
			"title"				=>	"Sayfa Ekle",
			"sub_title"			=>	"Yeni Sayfa Ekle",
			"project" 			=> 	$this->project,
			"category" 			=>	$this->category,
			"view" 				=>	$this->router->fetch_method(),
			"user" 				=>	$this->user,
		"notification_alerts" 	=>	$this->notification_alerts,
		"ticket_alerts" 		=>	$this->ticket_alerts,
			"CKEditorField"		=>	array(
				"description"	=> "description"
			),
		);
		$this->load->view("sp_dashboard/base",$context);
	}

	public function store()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_rules("description", "İçerik", "required|trim");

		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);

		$validate = $this->form_validation->run();

		if($validate){
			$insert = $this->PageModel->add(
				array(
					"title"         =>	$this->input->post("title"),
					"description"   =>	$this->input->post("description"),
					"url"           =>	AutoSlugField($this->input->post("title")),
					"is_active"      =>	1,
					"created_at"     =>	date("Y-m-d H:i:s"),
				)
			);

			if($insert){
				$ToastField	=	array(
					"status"	=> "success",
					"title"		=>	"İşlem Başarılı.",
					"message"		=>"Başarılı bir şekilde kayıt oldu.",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("sp-admin/page"));
			}
			else {
				$ToastField	=	array(
					"status"	=> "error",
					"title"		=>	"İşlem başarısız.",
					"message"		=>"İşlem kayıt olamadı :(",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("sp-admin/page"));
			}

		} 
		else {
			$context=array(
				"title"					=>	"Sayfa Ekle",
				"sub_title"				=>	"Yeni Sayfa Ekle",
				"project" 				=> 	$this->project,
				"category" 				=>	$this->category,
				"view" 					=>	$this->router->fetch_method(),
				"user" 					=>	$this->user,
				"notification_alerts" 	=>	$this->notification_alerts,
				"ticket_alerts" 		=>	$this->ticket_alerts,
				"CKEditorField"			=>	array(
					"description" => "description"
				),
				"form_errors"	=> validation_errors(),
			);
			$this->load->view("sp_dashboard/base",$context);

		}
	}
	

	public function show()
	{
		$id = $this->uri->segment(3);

		$item = $this->PageModel->get(
			array(
				"id"	=> $id,
			)
		);
		
		$context=array(
			"title"					=>	"Sayfa Güncelle",
			"sub_title"				=>	"Sayfa Güncelle",
			"project"				=>	$this->project,
			"category"				=>	$this->category,
			"view"					=>	$this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"ticket_alerts" 		=>	$this->ticket_alerts,
			"CKEditorField"	=>	array(
				"description" => "description"
			),
			"item" 		=>	$item,
		);
		$this->load->view("sp_dashboard/base",$context);
	}


	public function edit()
	{
		$id = $this->uri->segment(3);

		$item = $this->PageModel->get(
			array(
				"id"	=> $id,
			)
		);
		
		$context=array(
			"title"					=>	"Sayfa Güncelle",
			"sub_title"				=>	"Sayfa Güncelle",
			"project"				=>	$this->project,
			"category"				=>	$this->category,
			"view"					=>	$this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"ticket_alerts" 		=>	$this->ticket_alerts,
			"CKEditorField"	=>	array(
				"description" => "description"
			),
			"item" 		=>	$item,
		);
		$this->load->view("sp_dashboard/base",$context);
	}
		
	public function update()
	{
		$id = $this->uri->segment(3);

		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_rules("description", "İçerik", "required|trim");
		
		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);

		$validate = $this->form_validation->run();

		if($validate){

			$update =$this->PageModel->update(
				array(
					"id"    => $id
				),
				array(
					"title"         => $this->input->post("title"),
					"description"   => $this->input->post("description"),
					"url"           => AutoSlugField($this->input->post("title")),
				)
			);
			

			if($update){
				$ToastField	=	array(
					"status"	=> "success",
					"title"		=>	"İşlem Başarılı.",
					"message"		=>"Başarılı bir şekilde güncellendi.",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("sp-admin/page"));
			} 
			else {
				$ToastField	=	array(
					"status"	=> "error",
					"title"		=>	"İşlem başarısız.",
					"message"		=>"Güncelleme olmadı :(",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("sp-admin/page"));
			}
		} 
		else {
			$id = $this->uri->segment(3);

			$item = $this->PageModel->get(
				array(
					"id"	=> $id,
				)
			);
			
			$context=array(
				"title"					=>	"Sayfa Güncelle",
				"sub_title"				=>	"Sayfa Güncelle",
				"project"				=>	$this->project,
				"category"				=>	$this->category,
				"view"					=>	$this->router->fetch_method(),
				"user" 					=>	$this->user,
				"notification_alerts" 	=>	$this->notification_alerts,
				"ticket_alerts" 		=>	$this->ticket_alerts,
				"CKEditorField"			=>	array(
					"description" => "description"
				),
				"item" 		=>	$item,
				"form_errors"	=> validation_errors(),
			);
			$this->load->view("sp_dashboard/base",$context);
		}
    	
	}
	

	public function destroy()
	{
		$id = $this->uri->segment(4);
		$delete = $this->PageModel->delete(
            array(
                "id"	=>	$id
            )
		);
		if($delete){
			$ToastField	=	array(
				"status"	=> "success",
				"title"		=>	"İşlem Başarılı.",
				"message"	=>	"Başarılı bir şekilde silindi.",
			);
			$this->session->set_flashdata("ToastField", $ToastField);
			redirect(base_url("sp-admin/page"));
		} 
		else {
			$ToastField	=	array(
				"status"	=>	"error",
				"title"		=>	"İşlem başarısız.",
				"message"	=>	"Silme işlemi olmadı :(",
			);
			$this->session->set_flashdata("ToastField", $ToastField);
			redirect(base_url("sp-admin/page"));
		}
	}

}

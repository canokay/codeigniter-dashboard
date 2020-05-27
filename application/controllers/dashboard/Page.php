<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/controllers/CRID_Controller.php';

class Page extends CRID_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->project = "dashboard";
		$this->category = "pages";
		$this->verbose_name  = "Sayfa";
		$this->verbose_name_plural  = "Sayfalar";
		$this->fileds  = array("title","description");

		$this->editable_fileds  = array(
			"title" => array(
				"name" => "title", 
				"label" => "Baslik", 
				"validation" => "required|trim")
			,
			"description" => array(
				"name" => "description", 
				"label" => "Icerik", 
				"validation" => "required|trim")
			);
			$this->load->model("PageModel");

	}


	public function update()
	{
		if ($this->input->server('REQUEST_METHOD')=='GET'){
			
			$id = $this->uri->segment(3);

			$item = $this->PageModel->get(
				array(
					"id"	=> $id,
				)
			);
			
			$context=array(
				"title"		=>	"Sayfa Güncelle",
				"sub_title"	=>	"Sayfa Güncelle",
				"project"	=>	$this->project,
				"category"	=>	$this->category,
				"view"		=>	$this->router->fetch_method(),
				"user" 					=>	$this->user,
				"notification_alerts" 	=>	$this->notification_alerts,
				"ticket_alerts" 		=>	$this->ticket_alerts,
				"CKEditorField"	=>	array(
					"description" => "description"
				),
				"item" 		=>	$item,
			);
			$this->load->view("dashboard/base",$context);
		}
		else if ($this->input->server('REQUEST_METHOD')=='POST'){
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
					redirect(base_url("admin/page"));
				} 
				else {
					$ToastField	=	array(
						"status"	=> "error",
						"title"		=>	"İşlem başarısız.",
						"message"		=>"Güncelleme olmadı :(",
					);
					$this->session->set_flashdata("ToastField", $ToastField);
					redirect(base_url("admin/page"));
				}

			} 
			else {
				$item = $this->PageModel->get(
					array(
						"id"	=>	$id,
					)
				);

				$context=array(
					"title"		=>	"Sayfa Güncelle",
					"sub_title"	=>	"Sayfa Güncelle",
					"project"	=>	$this->project,
					"category"	=>	$this->category,
					"view"		=>	$this->router->fetch_method(),
					"user" 					=>	$this->user,
					"notification_alerts" 	=>	$this->notification_alerts,
					"ticket_alerts" 		=>	$this->ticket_alerts,
					"CKEditorField"	=>	array(
						"description" => "description"
					),
					"item" 		=>	$item,
					"form_errors"	=> validation_errors(),
				);
				$this->load->view("dashboard/base",$context);
			}
    	}
	}
	



}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	public $project = "dashboard";
	public $category = "notification";
	public $verbose_name = "Bildirim";
	public $verbose_name_plural = "Bildirimler";
	

	public function __construct(){
		parent::__construct();

		login_required();
	
		$this->load->model("NotificationModel");

	}

	public function index(){
		$items = $this->NotificationModel->get_all();

		$context=array(
			"title"		=>	"Bildirim",
			"card_title"	=>	"Bildirim Listesi",
			"items" 	=>	$items,
			"DataTablesField"	=> "datatable"
		);
		render_dashboard_view($context);
	}

	public function show(){

		$id = $this->uri->segment(3);
		$this->load->library("form_validation");
		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);

		$validate = $this->form_validation->run();

		if($validate){

			$update =$this->NotificationModel->update(
				array(
					"id"    => $id
				),
				array(
					"title"         => AutoSlugField($this->input->post("title")),
				)
			);
							

			if($update){
				$ToastField	=	array(
					"status"	=> "success",
					"title"		=>	"İşlem Başarılı.",
					"message"		=>"Başarılı bir şekilde güncellendi.",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("sp-admin/notification"));
			} else {
				$ToastField	=	array(
					"status"	=> "error",
					"title"		=>	"İşlem başarısız.",
					"message"		=>"Güncelleme olmadı :(",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("sp-admin/notification"));
			}

		} 
		else {
			$id = $this->uri->segment(3);

			$notification = $this->NotificationModel->get(
				array(
					"id"	=> $id,
				)
			);

			$context=array(
				"title"		=>	$notification->title,
				"card_title"	=>	$notification->title,
				"CKEditorField"	=>	array(
					"description" => "description"
				),
				"notification" 		=>	$notification,
				"form_errors"	=> validation_errors(),
			);
			render_dashboard_view($context);
		}
	}
	

}
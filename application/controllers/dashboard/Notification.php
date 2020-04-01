<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	public $project = "dashboard";
	public $category = "notification";
	public $user = "";

	public function __construct(){
		parent::__construct();

		$this->load->model("DashboardModel");
		
		if(!get_active_user()){
            redirect(base_url("/login"));
		}
		else{
			$this->user = get_active_user();
			$this->notification_alerts = $this->DashboardModel->get_notification_alerts();
			$this->ticket_alerts = $this->DashboardModel->get_ticket_alerts();
		}
	
		$this->load->model("NotificationModel");

	}

	public function list(){
		$items = $this->NotificationModel->get_all();

		$context=array(
			"title"		=>	"Bildirim",
			"sub_title"	=>	"Bildirim Listesi",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"ticket_alerts" 		=>	$this->ticket_alerts,
			"items" 	=>	$items,
			"DataTablesField"	=> "datatable"
		);
		$this->load->view("sp_dashboard/base",$context);
	}

	public function update(){
		if ($this->input->server('REQUEST_METHOD')=='GET'){
			
			$id = $this->uri->segment(3);

			$notification = $this->NotificationModel->get(
				array(
					"id"	=> $id,
				)
			);

			$context=array(
				"title"		=>	$notification->title,
				"sub_title"	=>	$notification->title,
				"project" 				=> 	$this->project,
				"category" 				=>	$this->category,
				"view" 					=>  $this->router->fetch_method(),
				"user" 					=>	$this->user,
				"notification_alerts" 	=>	$this->notification_alerts,
				"ticket_alerts" 		=>	$this->ticket_alerts,
				"CKEditorField"	=>	array(
					"description" => "description"
				),
				"notification" 		=>	$notification,
			);
			$this->load->view("dashboard/base",$context);
		}
		else if ($this->input->server('REQUEST_METHOD')=='POST'){

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

			} else {
				$context = new stdClass();
				$notifications = $this->NotificationModel->get_all(
					array(
						"id"	=>	$id,
					)
				);
				$context=array(
					"title"		=>	"Sayfalar",
					"sub_title"	=>	"Sayfa Listesi",
					"project" 				=> 	$this->project,
					"category" 				=>	$this->category,
					"view" 		=>	"list",
					"user" 					=>	$this->user,
					"notification_alerts" 	=>	$this->notification_alerts,
					"ticket_alerts" 		=>	$this->ticket_alerts,
					"notifications" 		=>	$notifications,
				);
				$this->load->view("dashboard/base",$context);
			}
    	}
	}

}
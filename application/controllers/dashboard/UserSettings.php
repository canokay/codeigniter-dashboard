<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserSettings extends CI_Controller {

	public $project = "dashboard";
	public $category = "settings";
	public $verbose_name = "Ayar";
	public $verbose_name_plural = "Ayarlar";
	

	public function __construct(){
		parent::__construct();

		login_required();
	
		$this->load->model("UserModel");

	}

	public function index(){
		$items = $this->UserModel->get_all();

		$context=array(
			"title"		=>	"Kullanıcılar",
			"sub_title"	=>	"Kullanıcı Listesi",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"ticket_alerts" 		=>	$this->ticket_alerts,
			"items" 	=>	$items,
			"DataTablesField"	=> "datatable"
		);
		$this->load->view("dashboard/base",$context);
	}

	public function create()
	{
			
			$context=array(
				"title"		=>	"Hesap Ayarları",
				"sub_title"	=>	"Hesap Ayarları",
				"project"	=>	$this->project,
				"category"	=>	$this->category,
				"view"		=>	$this->router->fetch_method(),
				"user" 					=>	$this->user,
				"notification_alerts" 	=>	$this->notification_alerts,
				"ticket_alerts" 		=>	$this->ticket_alerts,
				"CKEditorField"	=>	array(
					"description" => "description"
				)
			);
			$this->load->view("dashboard/base",$context);
		}
		public function update(){

			$this->load->library("form_validation");

			$this->form_validation->set_rules("first_name", "İsim", "required|trim");
			$this->form_validation->set_rules("last_name", "Soyisim", "required|trim");
			$this->form_validation->set_rules("email", "Eposta", "required|trim");

			$this->form_validation->set_message(
				array(
					"required"  => "<b>{field}</b> alanı doldurulmalıdır"
				)
			);

			$validate = $this->form_validation->run();
			
			if($validate){
				$update =$this->UserModel->update(
					array(
						"id"    => $this->user->id
					),
					array(
						"first_name"         => $this->input->post("first_name"),
						"last_name"   => $this->input->post("last_name"),
						"email"   => $this->input->post("email"),
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
			else{
				$context=array(
					"title"		=>	"Hesap Ayarları",
					"sub_title"	=>	"Hesap Ayarları",
					"project"	=>	$this->project,
					"category"	=>	$this->category,
					"view"		=>	$this->router->fetch_method(),
					"user" 					=>	$this->user,
					"notification_alerts" 	=>	$this->notification_alerts,
					"ticket_alerts" 		=>	$this->ticket_alerts,
					"CKEditorField"	=>	array(
						"description" => "description"
					),
					"form_errors"	=> validation_errors(),
				);
				$this->load->view("dashboard/base",$context);	
			}
			 
		
	}

/*
	public function security()
	{
		public function create(){
			
			$item = $this->UserModel->get(
				array(
					"id"	=> $this->user->id,
				)
			);
			
			$context=array(
				"title"		=>	"Hesap Güvenliği",
				"sub_title"	=>	"Hesap Güvenliği",
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
		public function update(){

			$this->load->library("form_validation");

			$this->form_validation->set_rules("old_password", "Eski Şifre", "required|trim");
			$this->form_validation->set_rules("new_password", "Yeni Şifre", "required|trim|matches[confirm_new_password]");
			$this->form_validation->set_rules("confirm_new_password", "Yeni Şifre (Tekrar)", "required|trim");

			$this->form_validation->set_message(
				array(
					"required"  => "<b>{field}</b> alanı doldurulmalıdır"
				)
			);
			
			$validate = $this->form_validation->run();

			if($validate){

				if(md5($this->input->post("old_password")) == $this->user->password){

					$update =$this->UserModel->update(
						array(
							"id"    => $this->user->id
						),
						array(
							"password"   => md5($this->input->post("password")),
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
					$ToastField	=	array(
						"status"	=> "error",
						"title"		=>	"İşlem başarısız.",
						"message"		=>"Güncelleme olmadı :(",
					);
					$this->session->set_flashdata("ToastField", $ToastField);
					redirect(base_url("admin/user/change_password"));
				}
			}
			else{
							
			}
		}
		
	}
*/

	public function change_password()
	{
		if ($this->input->server('REQUEST_METHOD')=='POST'){
			
			if(md5($this->input->post("old_password")) == $this->user->password){

				$update =$this->UserModel->update(
					array(
						"id"    => $this->user->id
					),
					array(
						"password"   => md5($this->input->post("password")),
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
				$ToastField	=	array(
					"status"	=> "error",
					"title"		=>	"İşlem başarısız.",
					"message"		=>"Güncelleme olmadı :(",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("admin/user/change_password"));
			}

		}
		
	}

}
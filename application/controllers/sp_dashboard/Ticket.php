<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {
	
	public $project = "sp_dashboard";
	public $category = "ticket";
	public $verbose_name = "Mesaj";
	public $verbose_name_plural = "Mesajlar";
	
	public function __construct()
	{
		parent::__construct();

		login_required_spuser();
		
		$this->load->model("TicketModel");
		$this->load->model("TicketMessageModel");
	}


	public function index()
	{
		$items = $this->TicketModel->get_all();

		$context=array(
			"title"		=>	$this->verbose_name_plural,
			"card_title"	=>	$this->verbose_name . " Listesi",
			"items" 	=>	$items,
			"DataTablesField"	=> "datatable",
			"page_title_add_button" => 1
		);
		render_dashboard_view($context);
	}

	public function create()
	{		
		$context=array(
			"title"		=>	$this->verbose_name . " Oluştur",
			"card_title"	=>	$this->verbose_name . " Ekle",
			"CKEditorField"	=>	array(
				"message" => "message"
			),
		);
		render_dashboard_view($context);
	}

	public function store()
	{

		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_rules("message", "Mesaj", "required|trim");

		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);

		$validate = $this->form_validation->run();

		if($validate){
			$insert = $this->TicketModel->add(
				array(
					"title"         =>	$this->input->post("title"),
					"message"   =>	$this->input->post("message"),
					"user_id"         =>	$this->user->id,
					"is_active"      =>	1,
				)
			);

			if($insert){
				$ToastField	=	array(
					"status"	=> "success",
					"title"		=>	"İşlem Başarılı.",
					"message"		=>"Başarılı bir şekilde kayıt oldu.",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("sp-admin/ticket"));
			}
			else {
				$ToastField	=	array(
					"status"	=> "error",
					"title"		=>	"İşlem başarısız.",
					"message"		=>"İşlem kayıt olamadı :(",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("sp-admin/ticket"));
			}

		} 
		else {
			$context=array(
				"title"		=>	"Sayfa Ekle",
				"card_title"	=>	"Yeni Sayfa Ekle",
				"CKEditorField"	=>	array(
					"message" => "message"
				),
				"form_errors"	=> validation_errors(),
			);
			render_dashboard_view($context);
		}
	}

	public function show()
	{		
		$ticket_id = $this->uri->segment(3);

		$message = $this->TicketModel->get(
			array(
				"id"	=> $ticket_id,
			)
		);

		$message_chat = $this->TicketMessageModel->get_all(
			array(
				"ticket_id"	=> $ticket_id,
			)
		);

		$context=array(
			"title"		=>	"Ticket Görüntüle",
			"card_title"	=>	"Ticket Görüntüle",
			"CKEditorField"	=>	array(
				"message" => "message"
			),
			"message" 		=>	$message,
			"message_chat"	=>	$message_chat
		);
		render_dashboard_view($context);
	}

	public function edit()
	{		
		$ticket_id = $this->uri->segment(3);

		$message = $this->TicketModel->get(
			array(
				"id"	=> $ticket_id,
			)
		);

		$message_chat = $this->TicketMessageModel->get_all(
			array(
				"ticket_id"	=> $ticket_id,
			)
		);

		$context=array(
			"title"		=>	"Ticket Görüntüle",
			"card_title"	=>	"Ticket Görüntüle",
			"CKEditorField"	=>	array(
				"message" => "message"
			),
			"message" 		=>	$message,
			"message_chat"	=>	$message_chat
		);
		render_dashboard_view($context);
	}

	public function update()
	{

		$ticket_id = $this->uri->segment(3);

		$this->load->library("form_validation");

		$this->form_validation->set_rules("message", "Mesaj", "required|trim");

		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);

		$validate = $this->form_validation->run();
		
		if($validate){
			$insert = $this->TicketMessageModel->add(
				array(
					"ticket_id"         =>	$ticket_id,
					"user_id"         =>	$this->user->id,
					"message"   =>	$this->input->post("message"),
				)
			);

			if($insert){
				$ToastField	=	array(
					"status"	=> "success",
					"title"		=>	"İşlem Başarılı.",
					"message"		=>"Başarılı bir şekilde kayıt oldu.",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("sp-admin/ticket"));
			} 
			else {
				$ToastField	=	array(
					"status"	=> "error",
					"title"		=>	"İşlem başarısız.",
					"message"		=>"İşlem kayıt olamadı :(",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("sp-admin/ticket"));
			}
		}
		else{
			$ticket_id = $this->uri->segment(3);

			$message = $this->TicketModel->get(
				array(
					"id"	=> $ticket_id,
				)
			);

			$message_chat = $this->TicketMessageModel->get_all(
				array(
					"ticket_id"	=> $ticket_id,
				)
			);

			$context=array(
				"title"		=>	"Ticket Görüntüle",
				"card_title"	=>	"Ticket Görüntüle",
				"CKEditorField"	=>	array(
					"message" => "message"
				),
				"message" 		=>	$message,
				"message_chat"	=>	$message_chat,
				"form_errors"	=> validation_errors(),
			);
			render_dashboard_view($context);
		}
	}
	

	public function destroy()
	{
		$id = $this->uri->segment(4);
		$delete = $this->TicketModel->delete(
            array(
                "id"	=>	$id
            )
		);
		if($delete){
			$ToastField	=	array(
				"status"	=> "success",
				"title"		=>	"İşlem Başarılı.",
				"message"		=>"Başarılı bir şekilde silindi.",
			);
			$this->session->set_flashdata("ToastField", $ToastField);
			redirect(base_url("sp-admin/ticket"));
		} 
		else {
			$ToastField	=	array(
				"status"	=> "error",
				"title"		=>	"İşlem başarısız.",
				"message"		=>"Silme işlemi olmadı :(",
			);
			$this->session->set_flashdata("ToastField", $ToastField);
			redirect(base_url("sp-admin/ticket"));
		}
	}

}

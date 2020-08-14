<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	
	public $project = "dashboard";
	public $category = "pages";
	public $verbose_name = "Sayfa";
	public $verbose_name_plural = "Sayfalar";
	
	public function __construct()
	{
		parent::__construct();

		login_required();

		$this->load->model("PageModel");
	}


	public function index()
	{
		$items = $this->PageModel->get_all();

		$context=array(
			"title"		=>	$this->verbose_name_plural,
			"card_title"	=>	$this->verbose_name . " Listesi",
			"items" 	=>	$items,
			"DataTablesField"	=> "datatable",
			"page_title_add_button" => 1
		);
		render_view($context);
	}

	public function create()
	{
		$context=array(
			"title"		=>	$this->verbose_name . " Oluştur",
			"card_title"	=>	$this->verbose_name . " Ekle",
			"CKEditorField"	=>	array(
				"description" => "description"
			),
		);
		render_view($context);
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

			toast_field_insert($insert);

		}

		else {
			$context=array(
				"title"		=>	"Sayfa Ekle",
				"card_title"	=>	"Yeni Sayfa Ekle",
				"CKEditorField"	=>	array(
					"description" => "description"
				),
				"form_errors"	=> validation_errors(),
			);
			render_view($context);

		}
	}


	public function edit()
	{			
		$id = $this->uri->segment(3);

		$item = $this->PageModel->get(
			array(
				"id"	=> $id,
			)
		);
		
		get_object_or_404($item);
		
		$context=array(
			"title"		=>	$item->title . " - Düzenle",
			"card_title"	=>	"Sayfa Güncelle",
			"CKEditorField"	=>	array(
				"description" => "description"
			),
			"item" 		=>	$item,
		);
		render_view($context);
	}

	public function show()
	{			
		$id = $this->uri->segment(3);

		$item = $this->PageModel->get(
			array(
				"id"	=> $id,
			)
		);

		get_object_or_404($item);
		
		$context=array(
			"title"		=>	$item->title,
			"card_title"	=>	$item->title,
			"item" 		=>	$item,
		);
		render_view($context);
	}

	public function update(){

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
			
			toast_field_update($update);

		} 
		else {
			$item = $this->PageModel->get(
				array(
					"id"	=>	$id,
				)
			);
		
			get_object_or_404($item);
		
			$context=array(
				"title"		=>	"Sayfa Güncelle",
				"card_title"	=>	"Sayfa Güncelle",
				"CKEditorField"	=>	array(
					"description" => "description"
				),
				"item" 		=>	$item,
				"form_errors"	=> validation_errors(),
			);
			render_view($context);
		}
	}
	
	public function delete()
	{			
		$id = $this->uri->segment(3);

		$item = $this->PageModel->get(
			array(
				"id"	=> $id,
			)
		);
		
		get_object_or_404($item);
		
		
		$context=array(
			"title"		=>	$item->title,
			"card_title"	=>	$item->title,
			"item" 		=>	$item,
		);
		render_view($context);
	}
	

	public function destroy()
	{
		$id = $this->uri->segment(3);
		$delete = $this->PageModel->delete(
            array(
                "id"	=>	$id
            )
		);

		toast_field_delete($delete);
		
	}

}

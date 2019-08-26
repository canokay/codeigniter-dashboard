<?php
class My404 extends CI_Controller
{
   public function __construct()
   {
	   parent::__construct();
	   
   }
   public function index()
   {
       $this->output->set_status_header('404');
	   if(!get_active_user()){
		   echo "Site 404 Error";
		}  
		else{		   
			$context=array(
				"project" 	=> 	"dashboard",
			);
			$this->load->view("dashboard/error",$context);
		}
	}
}

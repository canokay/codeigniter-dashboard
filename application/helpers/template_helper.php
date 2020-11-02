<?php

function render_view($context){
    $t = &get_instance();
    $context['project'] =  $t->project;
    $context['category'] =  $t->category;
    $context['view'] =  $t->router->fetch_method();
    return $t->load->view($t->project . "/layout",$context);
}

function render_dashboard_view($context){
    $t = &get_instance();
    $context['project'] =  $t->project;
    $context['category'] =  $t->category;
    $context['view'] =  $t->router->fetch_method();
    $context['user'] 					=	$t->user;
    $context['verbose_name'] =  $t->verbose_name;
    $context['verbose_name_plural'] =  $t->verbose_name_plural;
    $context['notification_alerts'] 	=	$t->notification_alerts;
    $context['ticket_alerts'] 		=	$t->ticket_alerts;
    return $t->load->view($t->project . "/layout",$context);
}

function render_dashboard_index_view($context){
    $t = &get_instance();
    $context['project'] =  $t->project;
    $context['category'] =  $t->category;
    $context['view'] =  "index";
    $context['title'] =  $t->verbose_name_plural;
    $context['card_title'] =  $t->verbose_name . " Listesi";
    $context['DataTablesField'] =  "datatable";
    $context['page_title_add_button'] =  1;
    $context['user'] 					=	$t->user;
    $context['verbose_name'] =  $t->verbose_name;
    $context['verbose_name_plural'] =  $t->verbose_name_plural;
    $context['notification_alerts'] 	=	$t->notification_alerts;
    $context['ticket_alerts'] 		=	$t->ticket_alerts;
    return $t->load->view($t->project . "/layout",$context);
}

function render_dashboard_create_view($context){
    $t = &get_instance();
    $context['project'] =  $t->project;
    $context['category'] =  $t->category;
    $context['view'] =  "create";
    $context['title']		=	$t->verbose_name . " Oluştur";
    $context['card_title']	=	$t->verbose_name . " Ekle";
    $context['user'] 					=	$t->user;
    $context['verbose_name'] =  $t->verbose_name;
    $context['verbose_name_plural'] =  $t->verbose_name_plural;
    $context['notification_alerts'] 	=	$t->notification_alerts;
    $context['ticket_alerts'] 		=	$t->ticket_alerts;
    return $t->load->view($t->project . "/layout",$context);
}

function render_dashboard_edit_view($context,$title){
    $t = &get_instance();
    $context['project'] =  $t->project;
    $context['category'] =  $t->category;
    $context['view'] =  "edit";
    $context['user'] 					=	$t->user;
    $context['title'] =  $title . " - Düzenle";
    $context['card_title'] =  $title . " Güncelle";
    $context['verbose_name'] =  $t->verbose_name;
    $context['verbose_name_plural'] =  $t->verbose_name_plural;
    $context['notification_alerts'] 	=	$t->notification_alerts;
    $context['ticket_alerts'] 		=	$t->ticket_alerts;
    return $t->load->view($t->project . "/layout",$context);
}

function render_dashboard_show_view($context,$title){
    $t = &get_instance();
    $context['project'] =  $t->project;
    $context['category'] =  $t->category;
    $context['view'] =  "show";
    $context['title'] =  $title;
    $context['card_title'] =  $title;
    $context['user'] 					=	$t->user;
    $context['verbose_name'] =  $t->verbose_name;
    $context['verbose_name_plural'] =  $t->verbose_name_plural;
    $context['notification_alerts'] 	=	$t->notification_alerts;
    $context['ticket_alerts'] 		=	$t->ticket_alerts;
    return $t->load->view($t->project . "/layout",$context);
}

function render_dashboard_delete_view($context,$title){
    $t = &get_instance();
    $context['project'] =  $t->project;
    $context['category'] =  $t->category;
    $context['view'] =  "delete";
    $context['user'] 					=	$t->user;
    $context['title'] =  $title . " - Sil";
    $context['card_title'] =  $title . " - Silinecek";
    $context['verbose_name'] =  $t->verbose_name;
    $context['verbose_name_plural'] =  $t->verbose_name_plural;
    $context['notification_alerts'] 	=	$t->notification_alerts;
    $context['ticket_alerts'] 		=	$t->ticket_alerts;
    return $t->load->view($t->project . "/layout",$context);
}


function render_card_header($card_header_title){
    echo "    <!-- Card Header - Dropdown -->";
    echo "    <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>";
    echo "        <h6 class='m-0 font-weight-bold text-primary'>" . $card_header_title . "</h6>";
    echo "    </div>";

}


function render_card_header_and_button($card_header_title){
    $t = &get_instance();
    echo "    <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>";
    echo "        <h6 class='m-0 font-weight-bold text-primary'>" . $card_header_title . "</h6>";
    echo "        <div class='dropdown no-arrow'>";
    echo "            <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
    echo "                <i class='fas fa-ellipsis-v fa-sm fa-fw text-gray-400'></i>";
    echo "            </a>";
    echo "            <div class='dropdown-menu dropdown-menu-right shadow animated--fade-in' aria-labelledby='dropdownMenuLink'>";
    echo "                <div class='dropdown-header'>Sayfa:</div>";
    echo "                <a class='dropdown-item' href=" . base_url($t->uri->segment(1) . "/" . $t->uri->segment(2) . "/create") . ">" . $t->verbose_name ." Ekle</a>";
    echo "                <a class='dropdown-item' href=" . base_url($t->uri->segment(1) . "/" . $t->uri->segment(2)) . ">" . $t->verbose_name . " Listele</a>";
    echo "            </div>";
    echo "        </div>";
    echo "    </div>";

}
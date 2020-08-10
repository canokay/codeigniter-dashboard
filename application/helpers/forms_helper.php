<?php

function create_input_label($id, $label){
    echo "					<label for='". $id . "'>". $label ."</label>\n";

}


function create_input_field($type, $name, $id,  $label, $value = "",$class=""){
    echo "					<input type='". $type . "' class='form-control" . " " . $class . "' name='". $name . "' id='". $id . "' placeholder='". $label . "' value='". $value ."'>\n";
}

function create_input_b4($type = "text", $name, $id, $label){
    create_input_label($id, $label);
    create_input_field($type, $name, $id, $label);
}


function create_form_group_b4($type, $name, $id, $label, $value = "",$class=""){
    echo "<div class='form-group'>\n";
    create_input_label($id, $label);
    create_input_field($type, $name, $id, $label, $value, $class);
    echo "				</div>\n";
}


function get_insert_url()
{
    $t = &get_instance();

    echo base_url($t->uri->segment(1) . "/" .  $t->uri->segment(2) . "/create");
}


function get_update_url()
{
    $t = &get_instance();

    echo base_url($t->uri->segment(1) . "/" .  $t->uri->segment(2) . "/" .  $t->uri->segment(3));
}
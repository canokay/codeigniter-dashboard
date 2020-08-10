<?php

function json_and_die($data){
    echo json_encode($data);
    die();
}


function echo_and_die($data = "test"){
    echo $data;
    die();
}


function js_json_and_die($data){
    echo "<script>var testData = ".json_encode($data)."</script>";
    echo "<script>console.log('testData')</script>";

}


function js_echo_and_die($data = "test"){
    echo "<script>console.log(". $data .")</script>";
    echo $data;
}


function uri_and_die($segment){
    $t = &get_instance();
    $t->uri->segment($segment);
    die();
}

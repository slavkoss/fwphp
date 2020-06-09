<?php


class Controller {

  public function model($model){
    require_once '../app/models/' . $model . '.php';
    return new $model();
  }

  public function view($v_script_name, &$data = []) {
    require_once '../app/views/' . $v_script_name ;
  }
}
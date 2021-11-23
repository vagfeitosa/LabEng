<?php
  /* 
   *  CORE CONTROLLER CLASS
   *  Carrega Models & Views
   */
  class Controller {
    // Permite carregar model do controller
    public function model($model){
      // Require model file
      require_once '../app/models/' . $model . '.php';
      // Instantiate model
      return new $model();
    }

    // Permite carregar view do controller
    public function view($url, $data = []){
      // Verifica se o view existe
      if(file_exists('../app/views/'.$url.'.php')){
        // Requere o arquivo do view
        require_once '../app/views/'.$url.'.php';
      } else {
        // Se a view nao existe
        die('View does not exist');
      }
    }
  }
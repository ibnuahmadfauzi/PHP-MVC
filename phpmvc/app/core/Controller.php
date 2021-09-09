<?php 

    // Parent class dari class yang ada di phpmvc/app/controllers
    class Controller {
        public function view($view,$data = []) {
            require_once '../app/views/' . $view . '.php';
        }
        public function model($model) {
            require_once '../app/models/' . $model . '.php';
            return new $model;
        }
    }

?>
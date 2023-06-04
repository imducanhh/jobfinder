<?php
    require_once('models/Home.php');

    class HomeController{
        
        var $model; // Thuộc tính
        function __construct() {
            $this->model = new Home();
        }
        
        public function list() {
            $data = $this->model->getAll();
            include_once('view/user/home.php');
        }
    }
?>
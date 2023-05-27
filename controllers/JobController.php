<?php
    require_once('models/Job.php');

    class JobController{
        
        var $model; // Thuộc tính
        function __construct() {
            $this->model = new Job();
        }
        
        public function list() {
            $data = $this->model->getAll();
            include_once('view/jobs.php');
        }

        public function detail() {
            $code = $_GET['code'];
            $job = $this->model->find($code);
            
            include_once('view/job.php');
        }
    }
?>
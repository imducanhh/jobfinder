<?php
    require_once('models/Job.php');

    class JobController{
        
        var $model; // Thuộc tính
        function __construct() {
            $this->model = new Job();
        }
        
        function list() {
            $data = $this->model->getAll();
            include_once('view/user/jobs.php');
        }

        function detail() {
            $id = $_GET['id'];
            $job = $this->model->find($id);
            
            include_once('view/user/job.php');
        }

        function edit($data) {
            // $id = $_GET['id'];
            $job = $this->model->edit($data);
            
            include_once('view/user/job.php');
        }

        function deleteJob() {
            $id = $_POST['id'];
            $job = $this->model->delete($id);
            
            return $job;
        }

        function show() {
            $id = $_GET['id'];
            $job = $this->model->find($id);
            
            echo json_encode($job);
        }
    }
?>
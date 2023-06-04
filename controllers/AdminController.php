<?php
require_once('models/Admin.php');
require_once('models/Job.php');

class AdminController
{
    var $model; // Thuộc tính
    function __construct()
    {
        $this->model = new Admin();
    }

    function formAdminLogin()
    {
        if (isset($_SESSION['admin'])) {
            header("Location: ");
        } else {
            require_once('view/admin/login.php');
        }
    }

    function login()
    {
        $data = $_POST;
        $admin = new Admin();
        $result = $admin->check($data);
        if ($result != null) {
            session_start();
            $_SESSION['admin'] = 1;
            $_SESSION['isLogin'] = 1;
            header("Location: ?mod=admin&act=dashboard");
        } else {
            header("Location: ?mod=admin");
        }
    }

    function logout()
    {
        session_start();
        session_destroy();
        // echo $_SESSION['admin'];
        header("Location: ?mod=admin");
    }

    function dashboard()
    {
        $dataAdmin = $this->model->getAll();
        include_once('view/admin/dashboard.php');
    }

    function jobs()
    {
        $job = new Job();
        $dataJob = $job->getAll();
        include_once('view/admin/jobs.php');
    }

    function insertJob()
    {
        $data = $_POST;
        $job = new Job();
        $job->insertJob($data);
        header("Location: ?mod=admin&act=jobs");
    }

    function listUser()
    {
        $admin = new Admin();
        $dataUser = $admin->getAll();

        include_once('view/admin/users.php');
    }

    function insertUser()
    {
        $data = $_POST;
        echo $data['status'];

        $admin = new Admin();
        $admin->insertUser($data);
        // header("Location: ?mod=admin&act=list");
    }

    function listUserDatatable()
    {
        $admin = new Admin();
        $dataUser = $admin->getAll();
        // $data = 
        echo '{"data": ' . json_encode($dataUser) . '}';
    }

    function showUser()
    {
        $id = $_GET['id'];
        $user = $this->model->find($id);

        echo json_encode($user);
    }

    function deleteUser()
    {
        $id = $_GET['id'];
        $admin = new Admin();
        $user = $admin->deleteUser($id);
        echo json_encode($user); 
    }
}
?>
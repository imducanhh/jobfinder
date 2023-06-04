<?php

$mod = isset($_GET['mod']) ? $_GET['mod'] : '';

$act = isset($_GET['act']) ? $_GET['act'] : '';

switch ($mod) {

    case 'home':
        require_once('controllers/HomeController.php');
        $home_controller = new HomeController();
        switch ($act) {
            case 'home':
                $home_controller->list();
                break;
            default:
                $home_controller->list();
                break;
        }
        break;
    case 'job':
        require_once('controllers/JobController.php');
        $job_controller = new JobController();
        switch ($act) {
            case 'detail':
                $job_controller->detail();
                break;
            case 'edit':
                $job_controller->edit();
                break;
            case 'delete':
                $job_controller->deleteJob();
                break;
            case 'show':
                $job_controller->show();
                break;
            default:
                $job_controller->list();
                break;
        }
        break;
    case 'admin':
        require_once('controllers/AdminController.php');
        $admin_controller = new AdminController();
        switch ($act) {
            case 'logout':
                $admin_controller->logout();
                break;
            case 'login':
                $admin_controller->login();
                break;
            case 'formLogin':
                $admin_controller->formAdminLogin();
                break;
            case 'dashboard':
                $admin_controller->dashboard();
                break;
            case 'jobs':
                $admin_controller->jobs();
                break;
            case 'insertJob':
                $admin_controller->insertJob();
                break;
            case 'insertUser':
                $admin_controller->insertUser();
                break;
            case 'showUser':
                $admin_controller->showUser();
                break;
            case 'list':
                $admin_controller->listUser();
                break;
            case 'listUserDatatable':
                $admin_controller->listUserDatatable();
                break;
            case 'deleteUser':
                $admin_controller->deleteUser();
                break;
            default:
                $admin_controller->formAdminLogin();
                break;
        }
        break;
    case 'user':
        require_once('controllers/UserController.php');
        $user_controller = new UserController();
        switch ($act) {
            case 'logout':
                $user_controller->logout();
                break;
            case 'login':
                $user_controller->login();
                break;
            case 'register':
                $user_controller->register();
                break;
            default:
                $user_controller->formAdminLogin();
                break;
        }
        break;
    default:
        header('Location: ?mod=home');
        break;
}
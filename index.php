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
                // default:
                //     $admin_controller->formAdminLogin();
                //     break;
        }
        break;

    default:
        header('Location: ?mod=home');
        break;
}

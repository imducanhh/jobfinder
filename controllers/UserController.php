<?php
require_once('models/User.php');

class UserController
{
    var $model; // Thuộc tính
    function __construct()
    {
        $this->model = new User();
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
        $user = new User();
        $result = $user->check($data);
        if ($result != null) {
            session_start();
            $_SESSION['user'] = 1;
            $_SESSION['isLogin'] = 1;
            header("Location: ?mod=home");
        } else {
            // header("Location: ?mod=home");
        }
    }

    function register()
    {
        $data = $_POST;
        $user = new User();
        $user->register($data);
        
        if ($user != null) {
            session_start();
            $_SESSION['user'] = 1;
            $_SESSION['isLogin'] = 1;
            header("Location: ?mod=home");
        }
        return $user;
    }

    function logout()
    {
        session_start();
        session_destroy();
        header("Location: ?mod=home");
    }
}
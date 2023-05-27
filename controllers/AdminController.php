<?php
    require_once('models/Admin.php');
    class AdminController{
        function formAdminLogin(){
            if(isset($_SESSION['admin'])) {
                header("Location: ");
            } else {
                require_once('view/admin/login.php');
            }
        }
        
        function login(){
            $data = $_POST;
            echo $_POST['email'];
            echo $_POST['password'];
            $admin = new Admin();
            $result = $admin->check($data);
            if($result != null) {
                $_SESSION['admin'] = $result;
                $_SESSION['isLogin'] = 1;
                setcookie('dntc','Đăng nhập thành công',time()+10);
                header("Location: ?mod=admin&act=dashboard");
            } else {
                setcookie('dnktc','Đăng nhập không thành công',time()+10);
                // header("Location: ?mod=admin&act=login");
            }
        }
        
        function logout(){
            session_destroy();
            setcookie('logout','Đăng xuất thành công',time()+10);
            header("Location: ?mod=admin");
        }
        function dashboard(){
            if(isset($_SESSION['admin'])) {
                require_once('view/admin/dashboard.php');
            } else {
                require_once('view/admin/login.php');
            }
        }
    }
?>
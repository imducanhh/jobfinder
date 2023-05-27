<?php
    require_once('models/Employee.php');
    class LoginController{
        function formlogin(){
            if(isset($_SESSION['employee'])) {
                header("Location: ");
            } else {
                require_once('view/admin/login.php');
            }
        }
        
        function login(){
            $data = $_POST;
            $employee = new Employee();
            $result = $employee->check($data);
            if($result != null) {
                $_SESSION['employee'] = $result;
                $_SESSION['isLogin'] = 1;
                setcookie('dntc','Đăng nhập thành công',time()+10);
                header("Location: ?mod=employee&act=list");
            } else {
                setcookie('dnktc','Đăng nhập không thành công',time()+10);
                header("Location: ?mod=login&act=formlogin");
            }
        }
        
        function logout(){
            session_destroy();
            setcookie('logout','Đăng xuất thành công',time()+10);
            header("Location: ?mod=login&act=formlogin");
        }
    }
?>
<?php
    require_once('models/Model.php');
    class Employee extends Model {
        var $conn;
        var $table = 'employees';
        var $primary_key = 'employee_code'; 
        
        function check($data){
            $query = "SELECT * FROM employees WHERE employee_email='".$data['username']."' AND  employee_password='".$data['password']."'";
            
            $result = $this->conn->query($query)->fetch_assoc();
            return $result;
        }
    }
?>
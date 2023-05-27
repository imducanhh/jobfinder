<?php
    require_once('models/Model.php');
    class Admin extends Model {
        var $conn;
        var $table = 'admins';
        var $primary_key = 'code'; 

        function check($data){
            $query = "SELECT * FROM admins WHERE email='".$data['email']."' AND  password='".$data['password']."'";
            
            $result = $this->conn->query($query)->fetch_assoc();
            return $result;
        }
    }
?>
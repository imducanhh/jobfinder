<?php
    require_once('models/Model.php');
    class Admin extends Model {
        var $conn;
        var $table = 'admins';
        var $primary_key = 'id'; 

        function check($data){
            $query = "SELECT * FROM admins WHERE email='".$data['email']."' AND  password='".md5($data['password'])."'";
            $result = $this->conn->query($query)->fetch_assoc();
            return $result;
        }

        function deleteUser($id){
            $query = "DELETE FROM admins WHERE id ='".$id."' ";
            $result = $this->conn->query($query);
            return $result;
        }

        public function insertUser($data) {
            
            $fields = '';
            $values = '';
            
            foreach ($data as $key => $value) {
                if ($key == 'password') {
                    $value = md5($value);
                }
                $fields .= $key .',';
                $values .= "'".$value."',";
            }
            
            $fields = trim($fields,',');
            $values = trim($values,',');

            $query = "INSERT INTO ".$this->table." (".$fields.") VALUES (".$values.")";
            echo $query;
            $result = $this->conn->query($query);
            
            return $result;
        }
    }
?>
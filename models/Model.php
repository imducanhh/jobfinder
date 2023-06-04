<?php
    require_once('Connection.php');
    class Model{
        
        var $conn;
        
        var $table = '';
        var $primary_key = 'id';
        
        function __construct(){
            $connection_object = new Connection();
            $this->conn = $connection_object->conn;
        }
        
        public function getAll() {

            $query = "SELECT * FROM ".$this->table;

            $result = $this->conn->query($query);

            $data = array();
            while($row = $result->fetch_assoc()) { 
                $data[] = $row;
            }

            return $data;
        }
        
        public function find($code) {
            $query = "SELECT * FROM ".$this->table." WHERE ".$this->primary_key." = '".$code."' ";
            $result = $this->conn->query($query);
            $data = $result->fetch_assoc();
            return $data;
        }
        
        public function insert($data) {
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
            $result = $this->conn->query($query);
            
            return $result;
        }
        
        public function insert_product($data) {
            unset($_POST['submit']);
            
            $data = $_POST;
            
            $fields = '';
            $values = '';
            
            foreach ($data as $key => $value) {
                $fields .= $key .',';
                $values .= "'".$value."',";
                
//                echo "<br> $values";
            }
            
            $fields = trim($fields,',');
            $values = trim($values,',');
            
//            echo "<br> $fields";
//            echo "<br> $values";

            $query = "INSERT INTO ".$this->table." (".$fields.",product_image) VALUES (".$values.",'".$_FILES['product_image']['name']."')";

            $result = $this->conn->query($query);
            
            return $result;
        }
        
        
        
        public function detail_ajax($code) {
            require_once('models/Connection.php');
            
            $CODE = $_GET['code'];

            $query = "SELECT * FROM products WHERE product_code='".$CODE."' ";

            $result = $conn->query($query);

            $product = $result->fetch_assoc();

            return $product;
        }
        
        public function update_bill($data) {

            $data = $_POST;

            $query = "UPDATE bills SET customer_code='".$data['customer_code']."', total_money='".$data['total_money']."', time_bill='".$data['time_bill']."', employee_code='".$data['employee_code']."', funds='".$data['funds']."', statuss='".$data['statuss']."' WHERE bill_code='".$data['bill_code']."' ";

            $result = $this->conn->query($query);
            
            return $result;
        }
        
        public function update_product($data) {

            $data = $_POST;

            $query = "UPDATE products SET product_name='".$data['product_name']."', product_image='".$_FILES['product_image']['name']."', category_code='".$data['category_code']."', product_quantity='".$data['product_quantity']."', product_price='".$data['product_price']."' WHERE product_code='".$data['product_code']."' ";
            
            $result = $this->conn->query($query);
            
            return $result;
        }
        
        public function update_customer($data) {

            $data = $_POST;

            $query = "UPDATE customers SET customer_name='".$data['customer_name']."', customer_birthday='".$data['customer_birthday']."', customer_email='".$data['customer_email']."', customer_mobile='".$data['customer_mobile']."', customer_address='".$data['customer_address']."' WHERE customer_code='".$data['customer_code']."' ";
            
            echo($query);
            die();
            $result = $this->conn->query($query);
            
            return $result;
        }
        
        public function delete($code) {

            $query = "DELETE FROM ".$this->table." WHERE ".$this->primary_key." ='".$code."' ";
            $result = $this->conn->query($query);
            return $result;
        }
        
    }
    

?>
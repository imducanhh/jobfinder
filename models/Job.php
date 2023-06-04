<?php
    require_once('models/Model.php');
    class Job extends Model {
        var $table = 'jobs';
        var $primary_key = 'id';   

        // function listJob(){
        //     $query = "SELECT * FROM jobs";
            
        //     $result = $this->conn->query($query)->fetch_assoc();
        //     return $result;
        // }

        public function getAll() {
            $query = "SELECT * FROM ".$this->table;
            $result = $this->conn->query($query);
            $data = array();
            while($row = $result->fetch_assoc()) { 
                $data[] = $row;
            }

            return $data;
        }

        public function insertJob($data) {
            $fields = '';
            $values = '';
            
            foreach ($data as $key => $value) {
                $fields .= $key .',';
                $values .= "'".$value."',";
            }
            
            $fields = trim($fields,',');
            $values = trim($values,',');
            $query = "INSERT INTO ".$this->table." (".$fields.") VALUES (".$values.")";
            $result = $this->conn->query($query);
            
            return $result;
        }

        public function edit($data) {
            // $fields = '';
            // $values = '';
            
            // foreach ($data as $key => $value) {
            //     $fields .= $key .',';
            //     $values .= "'".$value."',";
            // }
            
            // $fields = trim($fields,',');
            // $values = trim($values,',');
            // $query = "INSERT INTO ".$this->table." (".$fields.") VALUES (".$values.")";

            $query = "UPDATE jobs SET name = '".$data['name']."', company = '".$data['company']."', salary = '".$data['salary']."', description = '".$data['description']."', location = '".$data['location']."', job_dealine = '".$data['job_dealine']."', quantity = '".$data['quantity']."', type = '".$data['type']."', level = '".$data['quantity']."', gender = '".$data['gender']."', experience = '".$data['experience']."', status = '".$data['experience']."' WHERE id = '".$data['id']."' ";
            echo $query;
            
            $result = $this->conn->query($query);
            
            return $result;
        }

        public function delete($id) {
            $query = "DELETE FROM jobs WHERE id = '".$id."'";
            echo $query;
            $result = $this->conn->query($query);
            
            return $result;
        }
    }
?>
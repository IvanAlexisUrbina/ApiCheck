<?php

    include_once '../../config/Connection.php';

    class MasterModel extends Connection{

        public function insert($name, $email){
            $stmt = mysqli_prepare($this->getConnect(), "INSERT INTO users (name, email) VALUES (?, ?)");
            mysqli_stmt_bind_param($stmt, "ss", $name, $email);
            $result = mysqli_stmt_execute($stmt);
            if (!$result) {
                die('Error en la consulta: ' . mysqli_error($this->getConnect()));
            }
            return $result;
        }

        
        public function update($sql){
            $result=mysqli_query($this->getConnect(),$sql);
            return $result;
        }

        public function delete($sql){
            $result=mysqli_query($this->getConnect(),$sql);
            return $result;
        }
        public function consult($sql){
            $result=mysqli_query($this->getConnect(),$sql);
            return $result;
        }
        public function autoIncrement($table,$field){
            $sql="SELECT MAX($field) FROM $table";
            $result=$this->consult($sql);
            $account=mysqli_fetch_row($result);

            return end($account)+1;
        }

        
    }
?>
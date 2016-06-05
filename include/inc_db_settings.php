<?php
    class ConnectionSettings {
        private $hostname = 'localhost';
        private $username = 'test';
        private $password = 'test';
        private $db = 'MecaStock';
        public $connection;

        public function connect(){
            if(!$this->connection = mysqli_connect($this->hostname, $this->username, $this->password)) {
                throw new Exception('Error connecting to MySQL: '.mysqli_error());
            }

            if(!mysqli_select_db($this->connection, $this->db)) {
                throw new Exception('Error selecting database: '.mysqli_error());
            }
        }
        
        public function close(){
            mysqli_close($this->connection);
        }
    }
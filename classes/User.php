<?php
    require_once ("/var/www/MecaStock/include/inc_db_settings.php");
    class User{
        var $id = null;
        var $login = null;
        var $password = null;
        var $role = null;

        const TABLE = "User";

        function loadUser($id){
            $connectionSetting = new ConnectionSettings();
            $connectionSetting->connect();
            $query = "SELECT login, password, role FROM ".self::TABLE." WHERE id = ".$id;
            $result = mysqli_query($connectionSetting->connection, $query);
            $this->id = $id;
            $this->login = mysqli_result($result, 0, "login");
            $this->password = mysqli_result($result, 0, "password");
            $this->role = mysqli_result($result, 0, "role");
            $connectionSetting->close();
        }

        function loadUserByLogin($login){
            $connectionSetting = new ConnectionSettings();
            $connectionSetting->connect();
            $query = "SELECT id, login, password, role FROM ".self::TABLE." WHERE login = \"".$login."\"";
            $result = mysqli_query($connectionSetting->connection, $query);
            $row = mysqli_fetch_assoc($result);
            $this->id = $row['id'];
            $this->login = $row['login'];
            $this->password = $row['password'];
            $this->role = $row['role'];
            $connectionSetting->close();
        }

        function saveUser(){
            $connectionSetting = new ConnectionSettings();
            $connectionSetting->connect();
            if(is_null($this->id) || empty($this->id)){
                $query = "INSERT INTO ".self::TABLE."(login, password, role) VALUES (\"".$this->login."\", \"".$this->password."\", \"".$this->role."\")";
                mysqli_query($connectionSetting->connection, $query);
                $this->id = mysqli_insert_id();
            }else{
                $query = "UPDATE ".self::TABLE." SET login = \"".$this->login."\" password = \"".$this->password."\", role = \"".$this->role."\" WHERE id = ".$this->id;
                mysqli_query($connectionSetting->connection, $query);
            }
            $connectionSetting->close();
        }
    }
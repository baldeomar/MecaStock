<?php
    require_once ("/var/www/MecaStock/include/inc_db_settings.php");
    class Produit{
        var $id = null;
        var $nom = null;
        var $desc = null;
        var $emp = null;
        var $prix = null;

        const TABLE = "Produit";

        public function loadProduit($id){
            $connectionSetting = new ConnectionSettings();
            $connectionSetting->connect();
            $query = "SELECT nom, `description`, emplacement, prix FROM ".self::TABLE." WHERE id = ".$id;
            $result = mysqli_query($connectionSetting->connection, $query);
            $row = mysqli_fetch_assoc($result);
            $this->id = $id;
            $this->nom = $row["nom"];
            $this->desc = $row["description"];
            $this->emp = $row["emplacement"];
            $this->prix = $row["prix"];
            $connectionSetting->close();
        }

        function saveProduit(){
            try {
                $connectionSetting = new ConnectionSettings();
                $connectionSetting->connect();
                if (is_null($this->id) || empty($this->id)) {
                    $query = "INSERT INTO " . self::TABLE . "(`nom`, `description`, `emplacement`, `prix`) VALUES (\"" . $this->nom . "\", \"" . $this->desc . "\", \"" . $this->emp . "\", \"" . $this->prix . "\")";
                    error_log("query: " . $query);
                    $req = mysqli_query($connectionSetting->connection, $query);
                    $this->id = mysqli_insert_id($connectionSetting->connection);
                    if(!$req){
                        throw new mysqli_sql_exception(mysqli_error($connectionSetting->connection));
                    }
                } else {
                    $query = "UPDATE " . self::TABLE . " SET `nom` = \"" . $this->nom . "\", `description` = \"" . $this->desc . "\", `emplacement` = \"" . $this->emp . "\", `prix` = \"" . $this->prix . "\" WHERE id = " . $this->id;
                    mysqli_query($connectionSetting->connection, $query);
                }
            }catch (mysqli_sql_exception $e){
                error_log("Impossible d'inserer un produit: ".$e);
                throw new Exception(mysqli_error($connectionSetting->connection));
            }finally{
                $connectionSetting->close();
            }
        }

        function loadProduitByName($name){
            $connectionSetting = new ConnectionSettings();
            $connectionSetting->connect();
            $query = "SELECT id, nom, description, emplacement, prix FROM ".self::TABLE." WHERE name = \"".$name."\"";
            $result = mysqli_query($connectionSetting->connection, $query);
            $row = mysqli_fetch_assoc($result);
            $this->id = $row['id'];
            $this->nom = $row['nom'];
            $this->desc = $row['description'];
            $this->emp = $row['emplacement'];
            $this->prix = $row['prix'];
            $connectionSetting->close();
        }

        function loadAllProduit(){
            try {
                $connectionSetting = new ConnectionSettings();
                $connectionSetting->connect();
                $query = "SELECT id, nom, description, emplacement, prix FROM " . self::TABLE;
                $result = mysqli_query($connectionSetting->connection, $query);
                error_log("query: ".$query);
                if(!$result){
                    throw new mysqli_sql_exception(mysqli_error($connectionSetting->connection));
                }
                $produits = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $produit = new Produit();
                    $produit->id = $row['id'];
                    $produit->nom = $row['nom'];
                    $produit->desc = $row['description'];
                    $produit->emp = $row['emplacement'];
                    $produit->prix = $row['prix'];

                    array_push($produits, $produit);
                }
            }catch (mysqli_sql_exception $e){
                error_log("Impossible d'afficher les produits: ".$e);
                throw new Exception(mysqli_error($connectionSetting->connection));
            }finally{
                $connectionSetting->close();
            }
            return $produits;
        }
        
        function findProduitByNameAndDescAndEmp($research){
            try {
                $connectionSetting = new ConnectionSettings();
                $connectionSetting->connect();
                $query = "SELECT id, nom, description, emplacement, prix FROM " . self::TABLE
                    . " WHERE nom LIKE \"".$research."\" OR description LIKE \"".$research
                    ."\" OR emplacement LIKE \"".$research."\"";
                $result = mysqli_query($connectionSetting->connection, $query);
                if(!$result){
                    throw new mysqli_sql_exception(mysqli_error($connectionSetting->connection));
                }
                $produits = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $produit = new Produit();
                    $produit->id = $row['id'];
                    $produit->nom = $row['nom'];
                    $produit->desc = $row['description'];
                    $produit->emp = $row['emplacement'];
                    $produit->prix = $row['prix'];

                    array_push($produits, $produit);
                }
            }catch (mysqli_sql_exception $e){
                error_log("Impossible d'afficher les produits: ".$e);
                throw new Exception(mysqli_error($connectionSetting->connection));
            }finally{
                $connectionSetting->close();
            }
            return $produits;
        }
    }
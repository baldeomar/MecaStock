<?php
    require_once ("security/sessionControle.php");
    require_once ("classes/Produit.php");
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $produit = new Produit();
        $produit->supprimerProduit($id);
        echo json_encode("OK");
    }
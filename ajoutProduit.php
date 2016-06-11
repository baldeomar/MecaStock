<?php
    session_start();
    require_once ("security/sessionControle.php");
    require_once ("classes/Produit.php");
    $nom = null;
    $desc = null;
    $emp = null;
    $prix = null;
    if(isset($_POST['nom']) && !is_null($_POST['nom'])){
        $nom = $_POST['nom'];
    }
    if(isset($_POST['desc']) && !is_null($_POST['desc'])){
        $desc = $_POST['desc'];
    }
    if(isset($_POST['emp']) && !is_null($_POST['emp'])){
        $emp = $_POST['emp'];
    }
    if(isset($_POST['prix']) && !is_null($_POST['prix'])){
        $prix = $_POST['prix'];
    }
    
    if(is_null($nom) || is_null($emp) || is_null($prix)
        || empty($nom) || empty($emp) || empty($prix)){
        header("Location: formProduit.php?error");
        exit();
    }else{
        $produit = new Produit();
        $produit->nom = $nom;
        $produit->desc = $desc;
        $produit->emp = $emp;
        $produit->prix = $prix;

        try {
            $produit->saveProduit();
        }catch (Exception $e){
            header("Location: formProduit.php?error");
            exit();
        }
        header("Location: formProduit.php?success");
        exit();
    }
    
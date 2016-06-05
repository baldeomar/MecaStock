<?php
    require_once ("classes/Produit.php");
    
    $produit = new Produit();
    $produits = $produit->loadAllProduit();
    $json = array();
    foreach ($produits as $ligne) {
        $json[] = array(
            'nom' => $ligne->nom,
            'desc' => $ligne->desc,
            'emp' => $ligne->emp,
            'prix' =>$ligne->prix
        );
    }
    $results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($json),
        "iTotalDisplayRecords" => count($json),
        "aaData"=>$json
    );
    echo json_encode($results);
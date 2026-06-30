<?php

function initialiserCategories() {
    return [
        
       0=> [
            "code" => "CAT001",
            "nom" => "Alimentaire",
            'produits' => [
                ['nom'=>'lait', 'reference'=>'ref1', 'prix'=>2000, 'quantite'=>10],
                ['nom'=>'cafe', 'reference'=>'ref2', 'prix'=>1500, 'quantite'=>8]
            ]
        ],
        1=> [
        "code" => "CAT002",
        'nom' => "hygienique",
        'produits' => []
    ]
    ];
}


$categories = initialiserCategories();

function afficheCategorieSansProduit(array $categories): void{
    foreach ($categories as  $categorie ) {
        if (empty($categorie["produits"])) {
            echo $categorie["nom"]."\n";
        }
    }
 }
 afficheCategorieSansProduit($categories);

function enregistrerCategorie(array &$categories): void {

    
    $codeValid = false;
    do {
        $codeValid = true;
        $code = readline("Saisir le code : ");
        if (empty($code)) {
            echo "Code obligatoire\n";
            $codeValid = false;
        } else {
            foreach ($categories as $categorie) {
                if ($categorie['code'] === $code) {
                    echo "Code existe déjà\n";
                    $codeValid = false;  
                }
            }
        }
    } while (!$codeValid);

    
    $nomValid = false;
    do {
        $nomValid = true;
        $nom = readline("Saisir le nom : ");
        if (empty($nom)) {
            echo "Nom obligatoire\n";
            $nomValid = false;
        } else {
            foreach ($categories as $categorie) {
                if ($categorie['nom'] === $nom) {
                    echo "Nom existe déjà\n";
                    $nomValid = false;
                }
            }
        }
    } while (!$nomValid);

    
    $categories[] = [
        'code'     => $code,
        'nom'      => $nom,
        'produits' => []
    ];
    echo "Catégorie ajoutée !\n";
}


enregistrerCategorie($categories);
<?php
// initialisation
$categories = [

   0 => [
        "code" => "CAT001",
        'nom' => "Alimentaire",
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
// affiche categorie sans produit
  foreach ($categories as  $categorie ) {
    if (empty($categorie["produits"])) {
         echo $categorie["nom"]."\n";
    }
 }

 
// recherche par categorie
$codeValid = false;
do {
    $codeValid = true;  
    $code = readline("Entrer votre code : ");
    if (empty($code)) {
        echo "Code obligatoire\n";
        $codeValid = false;  
    } else {
        foreach ($categories as $categorie) {
            if ($categorie['code'] === $code) {
                echo "Le code existe déjà\n";
                $codeValid = false;  
            }
        }
    }
} while (!$codeValid);  
    
     $nomIsValid = true;
  do { 
        
        $nom = readline("Entrer le nom  : ");
        if (empty($nom)) {
            echo "le nom est obligatoire";
             $nomIsValid= false;
        }else{
            foreach ($categories as  $categorie ) {
               if (($categorie["nom"]) === $nom) {
                $nomIsValid = false;
                echo "le nom existe deja ..."; 
         }
       }  
}
    } while (!$nomIsValid);


$categories[] = [
    'code' => $code,
    'nom' => $nom,
    'produits' => []
];
// $categories[] = $categorie;

// ajouter produit

$codeCat = readline("Code de la catégorie : ");
$indexCategorie = -1;
foreach ($categories as $index => $categorie) {
    if ($categorie['code'] === $codeCat) {
        $indexCategorie = $index;
        break;
    }
}

if ($indexCategorie === -1) {
    echo "Catégorie introuvable !\n";
} else {
    
    $nomValid = false;
    do {
        $nomValid = true;
        $nom = readline("Saisir le nom : ");
        if (empty($nom)) {
            echo "Nom obligatoire\n";
            $nomValid = false;
        }
    } while (!$nomValid);

    
    $refValid = false;
    do {
        $refValid = true;
        $reference = readline("Saisir la référence : ");
        if (empty($reference)) {
            echo "Référence obligatoire\n";
            $refValid = false;
        } else {
            foreach ($categories as $cat) {
                foreach ($cat['produits'] as $prod) {
                    if ($prod['reference'] === $reference) {
                        echo "Référence déjà existante\n";
                        $refValid = false;
                    }
                }
            }
        }
    } while (!$refValid);

    
    $prixValid = false;
    do {
        $prixValid = true;
        $prix = (int)readline("Saisir le prix : ");
        if ($prix <= 0) {
            echo "Prix doit être positif\n";
            $prixValid = false;
        }
    } while (!$prixValid);


    $quantiteValid = false;
    do {
        $quantiteValid = true;
        $quantite = (int)readline("Saisir la quantité : ");
        if ($quantite <= 0) {
            echo "Quantité doit être positive\n";
            $quantiteValid = false;
        }
    } while (!$quantiteValid);


    $categories[$indexCategorie]['produits'][] = [
        'nom'       => $nom,
        'reference' => $reference,
        'prix'      => $prix,
        'quantite'  => $quantite
    ];
    echo "Produit ajouté avec succès !\n";
}
// ajout categorie
$codeIsValid = false;
do {
    $codeIsValid = true;
    $code = readline("Saisir le code : ");
    if (empty($code)) {
        echo "Code obligatoire\n";
        $codeIsValid = false;
    } else {
        foreach ($categories as $categorie) {
            if ($categorie['code'] === $code) {
                echo "Code existe déjà\n";
                $codeIsValid = false;
            }
        }
    }
} while (!$codeIsValid);


$nomIsValid = false;
do {
    $nomIsValid = true;
    $nom = readline("Saisir le nom : ");
    if (empty($nom)) {
        echo "Nom obligatoire\n";
        $nomIsValid = false;
    } else {
        foreach ($categories as $categorie) {
            if ($categorie['nom'] === $nom) {
                echo "Nom existe déjà\n";
                $nomIsValid = false;
            }
        }
    }
} while (!$nomIsValid);


$reponse = readline("Voulez-vous ajouter un produit ? (O/N) : ");

if (strtoupper($reponse) === "O") {
    
    $nomProduitValid = false;
    do {
        $nomProduitValid = true;
        $nomProduit = readline("Nom du produit : ");
        if (empty($nomProduit)) {
            echo "Nom obligatoire\n";
            $nomProduitValid = false;
        }
    } while (!$nomProduitValid);

    $refValid = false;
    do {
        $refValid = true;
        $reference = readline("Référence : ");
        if (empty($reference)) {
            echo "Référence obligatoire\n";
            $refValid = false;
        } else {
            foreach ($categories as $cat) {
                foreach ($cat['produits'] as $prod) {
                    if ($prod['reference'] === $reference) {
                        echo "Référence déjà existante\n";
                        $refValid = false;
                    }
                }
            }
        }
    } while (!$refValid);

    $prixValid = false;
    do {
        $prixValid = true;
        $prix = (int)readline("Prix : ");
        if ($prix <= 0) {
            echo "Prix doit être positif\n";
            $prixValid = false;
        }
    } while (!$prixValid);

    $quantiteValid = false;
    do {
        $quantiteValid = true;
        $quantite = (int)readline("Quantité : ");
        if ($quantite <= 0) {
            echo "Quantité doit être positive\n";
            $quantiteValid = false;
        }
    } while (!$quantiteValid);

    $produit = [
        'nom'       => $nomProduit,
        'reference' => $reference,
        'prix'      => $prix,
        'quantite'  => $quantite
    ];

    $categories[] = [
        'code'     => $code,
        'nom'      => $nom,
        'produits' => [$produit]
    ];
    echo "Catégorie avec produit ajoutée avec succès !\n";

} else {
    echo "Ajout annulé !\n";
}
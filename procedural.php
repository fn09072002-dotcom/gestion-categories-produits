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
    $code = saisieChampObligatoireEtUnique($categories, "Saisir le code : ", "Code obligatoire", "code");
    $nom = saisieChampObligatoireEtUnique($categories, "Saisir le nom : ", "Nom obligatoire", "nom");
    $categories[] = [
        'code'     => $code,
        'nom'      => $nom,
        'produits' => []
    ];
    echo "Catégorie ajoutée !\n";
}

function saisieChaine(string $message): string {
    return readline($message);
}

function champObligatoire(string $value, string $message): bool {
    if (empty($value)) {
        echo $message."\n";
        return false;
    }
    return true;
}

function rechercheCategorieParCle(array $categories, string $key, string $value): int|bool {
    foreach ($categories as $index => $categorie) {
        if ($categorie[$key] === $value) {
            return $index;
        }
    }
    return false;
}


function saisieChampObligatoireEtUnique(array $categories, string $smsSaisie, string $smsError, string $key): string {
    $valueIsValid = false;
    do {
        $value = saisieChaine($smsSaisie);
        $valueIsValid = champObligatoire($value, $smsError);
        if ($valueIsValid) {
            $existe = rechercheCategorieParCle($categories, $key, $value);
            if ($existe !== false) {
                echo "Cette valeur existe déjà !\n";
                $valueIsValid = false;
            }
        }
    } while (!$valueIsValid);
    return $value;
}


function saisiePositif(string $message): int {
    $valid = false;
    do {
        $valid = true;
        $valeur = (int)readline($message);
        if ($valeur <= 0) {
            echo "La valeur doit être positive\n";
            $valid = false;
        }
    } while (!$valid);
    return $valeur;
}


function ajouterProduit(array &$categories): void {
    $codeCat = saisieChaine("Code de la catégorie : ");
    $index = rechercheCategorieParCle($categories, 'code', $codeCat);

    if ($index === false) {
        echo "Catégorie introuvable !\n";
        return;
    }

    $nom = saisieChampObligatoireEtUnique(
        $categories,
        "Nom du produit : ",
        "Nom obligatoire",
        "nom"
    );

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

    $prix = saisiePositif("Prix : ");
    $quantite = saisiePositif("Quantité : ");

    $categories[$index]['produits'][] = [
        'nom'       => $nom,
        'reference' => $reference,
        'prix'      => $prix,
        'quantite'  => $quantite
    ];
    echo "Produit ajouté avec succès !\n";
}


function ajouterCategorieAvecProduit(array &$categories): void {
    $code = saisieChampObligatoireEtUnique($categories, "Saisir le code : ", "Code obligatoire", "code");
    $nom = saisieChampObligatoireEtUnique($categories, "Saisir le nom : ", "Nom obligatoire", "nom");

    $reponse = readline("Voulez-vous ajouter un produit ? (O/N) : ");

    if (strtoupper($reponse) === "O") {
        $nomProduit = saisieChampObligatoireEtUnique(
            $categories,
            "Nom du produit : ",
            "Nom obligatoire",
            "nom"
        );

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

        $prix = saisiePositif("Prix : ");
        $quantite = saisiePositif("Quantité : ");

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
        echo "Catégorie avec produit ajoutée !\n";

    } else {
        echo "Ajout annulé !\n";
    }
}

$categories = initialiserCategories();
afficheCategorieSansProduit($categories);
enregistrerCategorie($categories);
ajouterProduit($categories);
ajouterCategorieAvecProduit($categories);


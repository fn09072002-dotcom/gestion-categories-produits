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
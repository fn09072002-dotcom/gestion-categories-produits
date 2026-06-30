<?php

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
  foreach ($categories as  $categorie ) {
    if (empty($categorie["produits"])) {
         echo $categorie["nom"]."\n";
    }
 }

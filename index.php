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
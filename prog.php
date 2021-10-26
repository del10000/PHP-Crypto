<?php

// function createWallet(){
    function genererChaineAleatoire($longueur){
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = '';
        for ($i = 0; $i < $longueur; $i++){
            $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        return $chaineAleatoire;
    }
    
    $priv = genererChaineAleatoire(20);
    echo $priv.PHP_EOL;
    $public = md5($priv);
    echo $public.PHP_EOL;
    
    $createFile = file_put_contents($argv[1] . "prog.json", json_encode([$priv, $public]));
// }

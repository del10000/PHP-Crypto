<?php

if ($argv[1] === "create" && $argv[2] === "wallet") {

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

    $createFile = file_put_contents($argv[3] . "prog.json", json_encode([$priv, $public]));
}

if ($argv[1] === "decrypt"){
    $block = file_get_contents("http://sophos.gg:7676/block");
    $decode = json_decode($block);
    $compare = $decode->{'block'};
    
    for ($i = 0; $i < 100; $i++){
    
        $truc = strtoupper(md5($i));
        $test = strtoupper(md5($truc));
        if ($test === $compare) {
    
            echo($test).PHP_EOL;
            echo("trouvé").PHP_EOL;
            echo("le nombre était " . $i).PHP_EOL;
            return;
        }
    }
}
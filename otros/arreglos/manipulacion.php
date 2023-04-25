<?php
/*
$edaddes = [18,20, 40, 34];

//count

echo count($edaddes);

echo "\n";

//array push
array_push($edaddes,13);

//var_dump($edaddes);
//echo count($edaddes);


$tienda = array(
    "Americano" => 20,
    "capuchino" => 27.5,
    "Moca" =>24,
);

foreach($tienda as $subindice => $late){
    echo "el costo de cafe $subindice cuesta $$late \n";
}
echo "\n"; 

//platzi

function get_pokemon(){
    $numero_aleatorio = Rand(1,4);

    switch($numero_aleatorio){
        case 1:
            echo "pikachu";
            break;
        case 2:
            echo "Charmander";
            break ;
        case 3:
            echo "Mewtwo";
            break;
        default:
            echo "LOL";
    }
}

for($i=1;$i<=10;$i++){
    echo "\n";
    get_pokemon();
    echo "<br>";
}
*/
function es_estudainte($platzi_rank){
    if ($platzi_rank >= 20000){
        echo "eres un gran esudiante";
    }
    else{
        echo "lo siento";

    }
}

$entrada = (int) readline("por favor , dinpo tus puntos: ");
es_estudainte($entrada);
echo "<br>";

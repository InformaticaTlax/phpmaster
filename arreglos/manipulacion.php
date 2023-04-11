<?php
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


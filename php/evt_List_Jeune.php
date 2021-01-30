<?php

include "config.php";

$return_arr = array();

$query = "CALL evt_List_Jeune()";

$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $prenom = $row['prenom'];
    $nom = $row['nom'];
    $nom_ville = $row['nom_ville'];
    $pe = $row['pe'];


    $return_arr[] = array(
        "id" => $id,
        "prenom" => $prenom,
        "nom" => $nom,
        "nom_ville" => $nom_ville,
        "pe" => $pe
        );
}

if($return_arr) {echo json_encode($return_arr);}
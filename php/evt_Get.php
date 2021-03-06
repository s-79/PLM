<?php

include "config.php";

$return_arr = array();

$id = mysqli_real_escape_string($con, $_GET['id']);
$id_evt = mysqli_real_escape_string($con, $_GET['id_evt']);
$id_evt_pro = mysqli_real_escape_string($con, $_GET['id_evt_pro']);
$id_evt_int = mysqli_real_escape_string($con, $_GET['id_evt_int']);
$uuid = mysqli_real_escape_string($con, $_GET['uuid']);
$id_int = mysqli_real_escape_string($con, $_GET['id_int']);

// ----------------------------------------------------------------------------- Récupération des infos de l'événement en fonction de l'id
if($id) {
    $query = "CALL evt_Get('$id')";

    $result = mysqli_query($con,$query);

    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $nom = $row['nom'];
        $mission = $row['mission'];
        $dat = $row['dat'];
        $id_ville = $row['id_ville'];
        $type = $row['type'];
        $visio = $row['visio'];
        $intitule = $row['intitule'];
        $id_projet = $row['id_projet'];
        $organise = $row['organise'];
        $nb_jeunes = $row['nb_jeunes'];
        $nb_pros = $row['nb_pros'];
        $commentaires = $row['commentaires'];

        $return_arr[] = array(
            "id" => $id,
            "nom" => $nom,
            "mission" => $mission,
            "dat" => $dat,
            "id_ville" => $id_ville,
            "type" => $type,
            "visio" => $visio,
            "intitule" => $intitule,
            "id_projet" => $id_projet,
            "organise" => $organise,
            "nb_jeunes" => $nb_jeunes,
            "nb_pros" => $nb_pros,
            "commentaires" => $commentaires
        );
    }
// ----------------------------------------------------------------------------- Récupération de la liste des jeunes qui ont participé à l'événement en fonction de l'id
} elseif($id_evt) {
    $query = "CALL evt_Get_Jeune('$id_evt')";

    $result = mysqli_query($con,$query);

    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $prenom = $row['prenom'];
        $nom = $row['nom'];
        $nom_ville = $row['nom_ville'];
        $acc = $row['acc'];

        $return_arr[] = array(
            "id" => $id,
            "prenom" => $prenom,
            "nom" => $nom,
            "nom_ville" => $nom_ville,
            "acc" => $acc
        );
    }

// ----------------------------------------------------------------------------- Récupération de la liste des jeunes qui ont participé à l'événement en fonction de l'id
} elseif($id_evt_pro) {
    $query = "CALL evt_Get_Pro('$id_evt_pro')";

    $result = mysqli_query($con,$query);

    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $prenom = $row['prenom'];
        $nom = $row['nom_pro'];
        $structure = $row['nom_orga'];
        $ville = $row['nom_ville'];

        $return_arr[] = array(
            "id" => $id,
            "prenom" => $prenom,
            "nom" => $nom,
            "structure" => $structure,
            "ville" => $ville
        );
    }

// ----------------------------------------------------------------------------- Récupération de la liste des intervenants qui ont participé à l'événement en fonction de l'id
} elseif($id_evt_int) {
    $query = "CALL evt_Get_Inter('$id_evt_int')";

    $result = mysqli_query($con,$query);

    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $prenom = $row['prenom'];
        $nom = $row['nom'];
        $actif = $row['actif'];
        $volontaire = $row['volontaire'];

        $return_arr[] = array(
            "id" => $id,
            "prenom" => $prenom,
            "nom" => $nom,
            "actif" => $actif,
            "volontaire" => $volontaire
        );
    }

// ----------------------------------------------------------------------------- Récupération de l'id de l'événement nouvellement créé
} elseif($uuid) {
    $query = "CALL evt_Get_Id('$uuid')";

    $result = mysqli_query($con,$query);

    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];

        $return_arr[] = array(
            "id" => $id
        );
    }

// ----------------------------------------------------------------------------- Remplissage des données d'un intervenant dans le moadal update_int
} elseif($id_int) {
    $query = "CALL int_Get('$id_int')";

    $result = mysqli_query($con,$query);

    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $prenom_int = $row['prenom_int'];
        $nom_int = $row['nom_int'];
        $nom = $row['nom'];
        $actif = $row['actif'];
        $volontaire = $row['volontaire'];
        $ref = $row['ref'];

        $return_arr[] = array(
            "id" => $id,
            "prenom_int" => $prenom_int,
            "nom_int" => $nom_int,
            "nom" => $nom,
            "actif" => $actif,
            "volontaire" => $volontaire,
            "ref" => $ref,
        );
    }
}

if($return_arr) {echo json_encode($return_arr);}

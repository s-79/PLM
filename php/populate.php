<?php

include "config.php";

$return_arr = array();

$v_npv = mysqli_real_escape_string($con, $_GET['v_npv']);
$v_orga = mysqli_real_escape_string($con, $_GET['v_orga']);
$v_evt = mysqli_real_escape_string($con, $_GET['v_evt']);
$v_int = mysqli_real_escape_string($con, $_GET['v_int']);
$v_ref = mysqli_real_escape_string($con, $_GET['v_ref']);
$v_intUp = mysqli_real_escape_string($con, $_GET['v_intUp']);
$v_acc_list_evt = mysqli_real_escape_string($con, $_GET['v_acc_list_evt']);
$v_acc_list_evt2 = mysqli_real_escape_string($con, $_GET['v_acc_list_evt2']);
$v_pays = mysqli_real_escape_string($con, $_GET['v_pays']);
$v_part = mysqli_real_escape_string($con, $_GET['v_part']);
$v_prj = mysqli_real_escape_string($con, $_GET['v_prj']);
$v_pro = mysqli_real_escape_string($con, $_GET['v_pro']);
$orga_type = mysqli_real_escape_string($con, $_GET['orga_type']);
$v_ville = mysqli_real_escape_string($con, $_GET['v_ville']);
$id_ville_qpv = mysqli_real_escape_string($con, $_GET['id_ville']);
$id_pays = mysqli_real_escape_string($con, $_GET['id_pays']);
$texte = mysqli_real_escape_string($con, $_GET['texte']);
$texte_evt = mysqli_real_escape_string($con, $_GET['texte_evt']);
$texte_prj = mysqli_real_escape_string($con, $_GET['texte_prj']);
$texte_pro = mysqli_real_escape_string($con, $_GET['texte_pro']);
$v_pro_list_evt = mysqli_real_escape_string($con, $_GET['v_pro_list_evt']);


if($v_npv) {$query = "CALL npv_List ()";

} elseif($v_orga) {
    $query = "CALL orga_List ()";

} elseif($v_evt) {
    $query = "CALL evt_List ()";

} elseif($v_int) {
    $query = "CALL int_List ()";

} elseif($v_ref) {
    $query = "CALL ref_List ()";

} elseif($v_intUp) {
    $query = "CALL intUp_List ()";

} elseif($v_acc_list_evt) {
    $query = "CALL acc_List_Evt ()";

} elseif($v_acc_list_evt2) {
    $query = "CALL acc_List_Evt2 ()";

} elseif($v_pro_list_evt) {
    $query = "CALL pro_List_Evt ()";

} elseif($v_ville) {
    $query = "CALL ville_List ()";

} elseif($v_pays) {
    $query = "CALL pays_List ()";

} elseif($v_part) {
    $query = "CALL part_List ()";

} elseif($v_prj) {
    $query = "CALL prj_List ()";

} elseif($v_pro) {
    $query = "CALL pro_List ()";

} elseif($orga_type) {
    $query = "CALL orga_Type ('$orga_type')";

} elseif($id_ville_qpv) {
    $query = "CALL ville_Qpv ('$id_ville_qpv')";

} elseif($id_pays) {
    $query = "CALL pays_Change ('$id_pays')";

} elseif($texte) {
    if(strlen($texte) > 0) {
        $query = "CALL jeune_Search ('$texte')";
    }

} elseif($texte_evt) {
    if(strlen($texte_evt) > 0) {
        $query = "CALL evt_Search ('$texte_evt')";
    }

} elseif($texte_prj) {
    if(strlen($texte_prj) > 0) {
        $query = "CALL prj_Search ('$texte_prj')";
    }

} elseif($texte_pro) {
    if(strlen($texte_pro) > 0) {
        $query = "CALL pro_Search ('$texte_pro')";
    }
}
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $nom = $row['nom'];

    $return_arr[] = array(
        "id" => $id,
        "nom" => $nom,);
}
echo json_encode($return_arr);

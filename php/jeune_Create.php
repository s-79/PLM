<?php

include "config.php";

// $adherent = mysqli_real_escape_string($con, $_GET['adherent']);
// $genre = mysqli_real_escape_string($con, $_GET['genre']);
// $prenom = mysqli_real_escape_string($con, $_GET['prenom']);
// $nom = mysqli_real_escape_string($con, $_GET['nom']);
// $ddn = mysqli_real_escape_string($con, $_GET['ddn']);
// $sensiblisation = mysqli_real_escape_string($con, $_GET['sensiblisation']);
// $email = mysqli_real_escape_string($con, $_GET['email']);
// $tel = mysqli_real_escape_string($con, $_GET['tel']);
// $facebook = mysqli_real_escape_string($con, $_GET['facebook']);
// $skype = mysqli_real_escape_string($con, $_GET['skype']);
// $insta = mysqli_real_escape_string($con, $_GET['insta']);
// $urgence = mysqli_real_escape_string($con, $_GET['urgence']);
// $adresse = mysqli_real_escape_string($con, $_GET['adresse']);
// $id_ville = mysqli_real_escape_string($con, $_GET['id_ville']);
// $qpv = mysqli_real_escape_string($con, $_GET['qpv']);
// $id_qpv = mysqli_real_escape_string($con, $_GET['id_qpv']);
// $id_orga = mysqli_real_escape_string($con, $_GET['id_orga']);
// $nom_ref = mysqli_real_escape_string($con, $_GET['nom_ref']);
// $tel_ref = mysqli_real_escape_string($con, $_GET['tel_ref']);
// $email_ref = mysqli_real_escape_string($con, $_GET['email_ref']);
// $formation = mysqli_real_escape_string($con, $_GET['formation']);
// $niveau = mysqli_real_escape_string($con, $_GET['niveau']);
// $diplome = mysqli_real_escape_string($con, $_GET['diplome']);
// $niveau_anglais = mysqli_real_escape_string($con, $_GET['niveau_anglais']);
// $langues = mysqli_real_escape_string($con, $_GET['langues']);
// $statut = mysqli_real_escape_string($con, $_GET['statut']);
// $pe = mysqli_real_escape_string($con, $_GET['pe']);
// $rsa = mysqli_real_escape_string($con, $_GET['rsa']);
// $gj = mysqli_real_escape_string($con, $_GET['gj']);

$adherent = 1;
$genre = "Homme";
$prenom = "prenom2";
$nom = "nom";
$ddn = "1979-03-11";
$sensiblisation = 1;
$email = "email";
$tel = "tel";
$facebook = "facebook";
$skype = "skype";
$insta = "insta";
$urgence = "urgence";
$adresse = "adresse";
$id_ville = 1;
$qpv = "Oui";
$id_qpv = 1;
$id_orga = 1;
$nom_ref = "nom_ref";
$tel_ref = "tel_ref";
$email_ref = "email_ref";
$formation = "formation";
$niveau = "3 CAP-BEP";
$diplome = "diplome";
$niveau_anglais = "C1";
$langues = "langues";
$statut = "Non";
$pe = "Oui";
$rsa = "Non";
$gj = 1;


$query = "CALL jeune_Create (NULL, '$adherent', '$genre', '$prenom', '$nom', '$ddn', '$sensiblisation', '$email', '$tel', '$facebook', '$skype',
'$insta', '$urgence', '$adresse', '$id_ville', '$qpv', '$id_qpv', '$id_orga', '$nom_ref', '$tel_ref', '$email_ref', '$formation', '$niveau',
'$diplome', '$niveau_anglais', '$langues', '$statut', '$pe', '$rsa', '$gj')";


$result = $con->prepare($query);

$result->execute();

echo "La fiche du jeune a bien été ajoutée à la base de données.";
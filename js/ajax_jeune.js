/* ----------------------------------------------------------------------------- ! ! ! - - J E U N E  :  C R É A T I O N - - ! ! ! */
const jeune_Create = (npv, adherent, genre, nom, prenom, ddn, sensiblisation, email, tel facebook, skype, insta, urgence, adresse,
id_ville, qpv, id_qpv, id_orga, nom_ref, tel_ref, email_ref, formation, niveau, diplome, niveau_anglais, langues,
statut, pe, rsa, gj) => {
    $.ajax({
        //---------------------------------------------------------------------- Vérification : Le nom de l'organisme existe-t-il déjà dans la BDD ?
        url: "php/exist.php",
        dataType: 'JSON',
        data : {nom_jeune:npv},
        success: function(response){
            const statut = parseInt(response[0].statut);
            if(statut === 1) {
                alert("Création impossible : Il existe déjà un jeune qui porte ce nom et qui habite cette ville dans la base de données.");
            } else {
                alert("ok");
                //-------------------------------------------------------------- Envoie des infos vers la BDD
                $.ajax({
                    url: 'php/jeune_Create.php',
                    dataType: 'JSON',
                    data : {adherent:adherent, genre:genre, prenom:prenom, nom:nom, ddn:ddn, sensiblisation:sensiblisation,
                        email:email, tel:tel, facebook:facebook, skype:skype, insta:insta, urgence:urgence,
                        adresse:adresse, id_ville:id_ville, qpv:qpv, id_qpv:id_qpv, id_orga:id_orga, nom_ref:nom_ref, tel_ref:tel_ref, email_ref:email_ref,
                        formation:formation, niveau:niveau, diplome:diplome, niveau_anglais:niveau_anglais, langues:langues,
                        statut:statut, pe:pe, rsa:rsa, gj:gj},
                    complete: function(response){
                        // alert(response.responseText);
                        // //------------------------------------------------------ Fermeture du modal
                        // $('#modal_orga_create').modal('hide');
                        // // //--------------------------------------------------- Remplissage de la liste des noms d'organisme
                        // $("#nom_orga").html("<option selected value=''>Séléctionner le nom de l'organisme</option>");
                        // ajaxListOrga("#nom_orga");
                    }
                });
            }
        }
    });
}
$(function(){
    // ----------------------------------------------------------------------------- ! ! ! - - C H A N G E - - ! ! !

    $("#ville").change(function(){
        const id_ville = $("#ville").val();
        //---------------------------------------------------------------------- Si aucune ville n'est séléctionnée, on vide les champs
        if(!id_ville){
            $("#contrat_ville").val("");
            $("#qpv").val("");
            $("#nom_qpv").html("<option selected value='0'>Séléctionner le quartier QPV</option>");
            $("#nom_qpv")[0].disabled = true;
            $("#prij").prop('checked', false);
        } else {
            //------------------------------------------------------------------ Remplissage du champ "contrat de ville"
            contrat_ville_Change(id_ville);
            //------------------------------------------------------------------ La ville possède-t-elle des quartiers QPV ? Si oui, on donne accès au champs QPV
            qpv_Exist(id_ville);
            //------------------------------------------------------------------ Reinitialisation du champ QPV
            $("#qpv").val("");
            //------------------------------------------------------------------ Reinitialisation et désactivation du champ nom QPV
            $("#nom_qpv").html("<option selected value='0'>Séléctionner le quartier QPV</option>");
            $("#nom_qpv")[0].disabled = true;
            //------------------------------------------------------------------ Décochage de la case prij
            $("#prij").prop('checked', false);
        }
    });

    //-------------------------------------------------------------------------- EVENEMENT CHANGE SUR QPV (OUI, NON, LIMITE)
    $("#qpv").change(function(){

        //---------------------------------------------------------------------- Remplissage de la liste des quartiers QPV del la ville séléctionnée
        qpv_Change($("#ville").val(), $("#qpv").val());

    });

    //-------------------------------------------------------------------------- EVENEMENT CHANGE SUR LE CHOIX D'UN NOM DE QUARTIER QPV
    $("#nom_qpv").change(function(){
        const prij = $("#nom_qpv").val();
        //---------------------------------------------------------------------- Si aucun quartier n'est séléctionné, on décoche la case..
        if(!prij) $("#prij").prop('checked', false);
        //---------------------------------------------------------------------- Le quartier est-il PRIJ ? Si oui, on coche la case.
        else {qpv_Prij(prij);}
    });
});

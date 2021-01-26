$(function(){
    //-------------------------------------------------------------------------- EVENEMENT CHANGE UN NOM DE VILLE
    $("#ville").change(function(){
        //---------------------------------------------------------------------- Remplissage du champ "contrat de ville"
        contrat_ville_Change($("#ville").val());
        //---------------------------------------------------------------------- La ville possède-t-elle des quartiers QPV ? Si oui, on donne accès au champs QPV
        qpv_Exist($("#ville").val())
        //---------------------------------------------------------------------- Reinitialisation du champ QPV
        let qpv_Reset = "<option selected value=''>QPV</option>"
        for (e of ["Oui", "Non", "Limite"]) {qpv_Reset += `<option value="${e}">${e}</option>`;}
        $("#qpv").html(qpv_Reset);
        //---------------------------------------------------------------------- Reinitialisation et désactivation du champ nom QPV
        $("#nom_qpv").html("<option selected>Séléctionner le quartier QPV</option>");
        $("#nom_qpv")[0].disabled = true;
        //---------------------------------------------------------------------- Décochage de la case prij
        $("#prij").prop('checked', false);
    });

    //-------------------------------------------------------------------------- EVENEMENT CHANGE SUR QPV (OUI, NON, LIMITE)
    $("#qpv").change(function(){
        //---------------------------------------------------------------------- Remplissage de l'en-tête de liste de noms de QPV
        $("#nom_qpv").html("<option selected value=''>Séléctionner le quartier QPV</option>");

        const qpv = $("#qpv").val();
        //---------------------------------------------------------------------- Remplissage de la liste des quartiers QPV del la ville séléctionnée
        if(qpv === "Oui" || qpv === "Limite") {qpv_Change($("#ville").val())}
        //---------------------------------------------------------------------- Désactivation du champ nom_qpv
        else {$("#nom_qpv")[0].disabled = true;}

        //---------------------------------------------------------------------- Décochage de la case prij
        $("#prij").prop('checked', false);
    });

    //-------------------------------------------------------------------------- EVENEMENT CHANGE LE CHOIX D'UN NOM DE QUARTIER QPV
    $("#nom_qpv").change(function(){
        //---------------------------------------------------------------------- Le quartier est-il PRIJ ? Si oui, on coche la case.
        qpv_Prij($("#nom_qpv").val());
    });
});
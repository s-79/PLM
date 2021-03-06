$(function(){
    // ------------------------------------------------------------------------- ! ! ! - - P O P U L A T E - - ! ! !

    // ------------------------------------------------------------------------- EVENEMENT CLICK SUR LES BOUTONS "AJOUTER" OU "MODIFIER" UN ORGANISME
    $('.close-modal').click(function(){
        // --------------------------------------------------------------------- Fermeture du modal sur lequel on vient de cliquer
        $('#modal_orga').modal('hide')
    })
    //-------------------------------------------------------------------------- EVENEMENT CLICK SUR LE BOUTON DE CREATION D'ORGANISME
    $("#btn_orga_create").click(function(){
        //---------------------------------------------------------------------- Réinitialisation du formulaire dans le modal Create
        document.getElementById("form_orga_create").reset();
    })

    //-------------------------------------------------------------------------- EVENEMENT CLICK SUR LE BOUTON DE MISE A JOUR D'ORGANISME
    $("#btn_orga_update").click(function(){
        //---------------------------------------------------------------------- Réinitialisation du formulaire dans le modal orga_Update
        document.getElementById("form_orga_update").reset();
        ajaxListOrga("#select_nom_orga");
    })

    // ------------------------------------------------------------------------- ! ! ! - - C H A N G E - - ! ! !

    //-------------------------------------------------------------------------- EVENEMENT CHANGE UN TYPE D'ORGANISME
    $("#type_orga").change(function(){
        $("#nom_orga").html("<option selected value='0'>Séléctionner le nom de l'organisme</option>");
        const type_orga = $("#type_orga").val();
        // --------------------------------------------------------------------- S'il n'y a pas de type séléctionné, on grise la case nom_type
        if(!type_orga)$("#nom_orga")[0].disabled = true;
        // --------------------------------------------------------------------- Sinon, affichage des noms reliés à ce type d'organisme
        else{type_Change(type_orga)};
    });

    // ------------------------------------------------------------------------- EVENEMENT CLICK SUR LE BOUTON (+)
    $('#new_orga').click(function(){
        // --------------------------------------------------------------------- Masquer la div qui affiche qu'il n'y a pas d'orga de ce type
        $("#txt_modal_orga").removeClass("d-block");
        $("#txt_modal_orga").addClass("d-none");
    })

    // ------------------------------------------------------------------------- ! ! ! - - C R E A T E - - ! ! !

    // ------------------------------------------------------------------------- EVENEMENT CLICK SUR LE BOUTON AJOUTER UN ORGANISME DANS LE MODAL DE CREATION
    $('#orga_create').click(function(){
        // --------------------------------------------------------------------- Récupération des valeurs saisies par l'utilisateur
        const nom = $('#create_nom_orga').val();
        const type = $('#create_type_orga').val();

        if(!type)alert("Merci de séléctionner un type d'organisme")
        else {
            // ----------------------------------------------------------------- Vérification si la longueur ets ok pour la BDD puis vérif si le nom existe déjà dans la BDD et si non envoie des infos
            if(vLen("Nom de l'organisme",nom,100))orga_Create(nom, type);
        }
    })

    // ------------------------------------------------------------------------- ! ! ! - - U P D A T E - - ! ! !

    //-------------------------------------------------------------------------- EVENEMENT CHANGE LORS DE LA SELECTION D'UN ORGANISME DANS LE MODAL DE MODIFICATION
    $('#select_nom_orga, #nom_orga').change(function(){
        const id = $(this).val();
        if(id) orga_Change(id);
    })

    //-------------------------------------------------------------------------- EVENEMENT CLICK SUR LE BOUTON MODIFIER UN ORGANISME
    $('#orga_update').click(function(){
        const id = $('#select_nom_orga').val();
        const type = $('#update_type_orga').val();
        const nom = $('#update_nom_orga').val();
        if(!id) alert("Aucun organisme n'a été séléctionné");
        else {
            if(!type) alert("Aucun type d'organisme n'a été séléctionné");
            // ------------------------------------------------------------- Envoies des données à modifier vers la BDD après vérif de la longueur du nom
            else {
                if(vLen("Nom de l'organisme",nom,100)) orga_Update(id, nom, type);
            }
        }
    })
    // ------------------------------------------------------------------------- ! ! ! - - D E L E T E- - ! ! !

    //-------------------------------------------------------------------------- EVENEMENT CLICK SUR LE BOUTON SUPPRIMER UN ORGANISME
    $('#orga_delete').click(function(){
        const id = $('#select_nom_orga').val();
        if(!id) alert("Aucun organisme n'a été séléctionné")
        // --------------------------------------------------------------------- Envoies de l'id à supprimer vers la BDD & Vérification de la suppression
        else {orga_Delete(id);}
    })
});

<?php
include("header.php"); ?>

<div class="container-fluid">
<div class="row justify-content-center mt-5" style="margin-top: 5em !important;">
    <!--                                                                                                              Zone de recherche -->
    <div class="col-12 col-lg-2 my-4 mx-1 text-center">
        <input type="text" class="form-control" id="prj_search" placeholder="Saisir la date, le type ou la ville">
        <label for="dtv" class="d-none">Saisir la date, le type ou la ville</label>
    </div>
    <!--                                                                                                              Résultat de recherche -->
    <div class="col-12 col-lg-2 my-4 mx-1 text-center">
        <select class="form-select" aria-label="Default select example" id="prj_res">
          <option selected value="">Séléctionner un événement</option>
        </select>
    </div>
    <!--                                                                                                              Bouton afficher les infos-->
    <div class="col-5 col-lg-2 my-4 mx-1 text-center">
        <button type="button" id="infos" class="btn btn-primary bg-bleu btn-bleu marine">Afficher les informations</button>
    </div>
</div>

<form id="form_prj">
<div class="row justify-content-center ">
    <!--                                                                                                              Projet-->
    <div class="col-12 col-lg-3 bg-marine m-3 rounded rounded-3">
        <div class="row pt-4">
            <div class="col-3">
                <h2>Projet</h2>
            </div>
            <div class="col-1 p-0 m-0">
                <i id="new_prj" class="fas fa-plus-circle fa-2x text-white pointeur" data-toggle="tooltip" data-placement="top" title="Créer un nouvel événement"></i>
            </div>
        </div>
        <!--                                                                                                        Récupération de l'id dans un input invisible -->
        <input type="text" class="form-control d-none" id="id_prj">

        <div class="form-floating mx-3 mt-3">
            <select class="form-select type_m" id="type" aria-label="Type de projet *">
                <option selected value="">Séléctionner un type de projet *</option>
                <option value="Échange de jeunes">Échange de jeunes</option>
                <option value="Volontariat CES court terme">Volontariat CES court terme</option>
                <option value="Volontariat CES long terme">Volontariat CES long terme</option>
                <option value="Chantier international">Chantier international</option>
                <option value="WWoofing / HelpX / Workaway">WWoofing / HelpX / Workaway</option>
                <option value="VIE / VIA / VIS">VIE / VIA / VIS</option>
                <option value="Volontariat hors cadre">Volontariat hors cadre</option>
                <option value="Au pair">Au pair</option>
                <option value="Stage Erasmus +">Stage Erasmus +</option>
                <option value="Stage OFQJ">Stage OFQJ</option>
                <option value="Stage OFAJ">Stage OFAJ</option>
                <option value="PVT">PVT</option>
                <option value="Training Course">Training Course</option>
                <option value="Emploi">Emploi</option>
            </select>
            <label for="type">Type de projet *</label>
        </div>
        <div class="form-floating mx-3 mt-3">
            <input type="text" class="form-control" id="intitule" placeholder="Intitulé *">
            <label for="intitule">Intitulé *</label>
        </div>
        <div class="form-floating mx-3 mt-3">
            <select class="form-select" id="pays" aria-label="Pays">
                <option selected value="0">Pays de destination</option>
            </select>
            <label for="pays">Pays de destination</label>
        </div>
        <div class="form-floating mx-3 mt-3">
            <input type="text" class="form-control" id="ville" placeholder="Ville">
            <label for="ville">Ville de déstination</label>
        </div>
        <div class="form-floating mx-3 mt-3 mb-4">
            <select class="form-select" id="partenaire" aria-label="Partenaire">
                <option selected value="0">Partenaire</option>
            </select>
            <label for="partenaire">Partenaire</label>
        </div>
    </div>
    <!--                                                                                                              Période -->
    <div class="col-12 col-lg-3 bg-marine m-3 rounded rounded-3">
        <h2 class="pt-4">Période & Détails</h2>
        <div class="form-floating mx-3 mt-4">
            <input type="date" class="form-control" id="debut" placeholder="Début de la période">
            <label for="debut">Début de la période</label>
        </div>
        <div class="form-floating mx-3 mt-3">
            <input type="date" class="form-control" id="fin" placeholder="Fin de la période">
            <label for="fin">Fin de la période</label>
        </div>
        <div class="form-floating mx-3 mt-3">
            <select class="form-select type_m" id="duree" aria-label="Durée du projet">
                <option selected value="">Durée du projet</option>
                <option value="- de 2 mois">- de 2 mois</option>
                <option value="2 mois">2 mois</option>
                <option value="entre 2 et 6 mois">entre 2 et 6 mois</option>
                <option value="+ de 6 mois">+ de 6 mois</option>
            </select>
            <label for="duree">Durée du projet</label>
        </div>
        <div class="form-floating mx-3 mt-3">
            <input type="text" class="form-control" id="them" placeholder="Thématique">
            <label for="them">Thématique</label>
        </div>
        <div class="form-floating mx-3 mt-3 mb-4">
            <textarea class="form-control" placeholder="Commentaires" id="commentaires"></textarea>
            <label for="commentaires">Commentaires</label>
        </div>
    </div>
    <!--                                                                                                              Échange de jeunes -->
    <div class="col-12 col-lg-3 bg-marine m-3 rounded rounded-3">
        <h2 class="pt-4">Échange de jeunes</h2>
        <div class="form-floating mx-3 mt-4">
            <input type="text" class="form-control" id="youth_leader" placeholder="Nom du Youth Leader">
            <label for="youth_leader">Nom du Youth Leader</label>
        </div>
        <div class="form-floating mx-3 mt-3">
            <input type="text" class="form-control" id="nb_part" placeholder="Nombre de participants">
            <label for="nb_part">Nombre de participants</label>
        </div>
        <div class="form-floating mx-3 mt-3">
            <textarea class="form-control" placeholder="Pays participants" id="pays_part" style="height:125px;"></textarea>
            <label for="pays_part">Pays participants</label>
        </div>

        <div id="btn_prj_create" class="form-group d-flex justify-content-center mx-3 mt-1 mb-1">
            <button type="button" id="prj_create" class="btn btn-primary bg-bleu btn-bleu marine m-3">&nbsp;Enregistrer&nbsp;<br>la fiche</button>
        </div>
        <div id="btn_prj_update" class="form-group d-flex justify-content-center mx-3 mt-1 mb-1 d-none">
            <button type="button" id="prj_update" class="btn btn-warning m-3">&nbsp;Modifier&nbsp;<br>la fiche</button>
            <button type="button" id="prj_delete" class="btn btn-danger m-3">Supprimer <br>la fiche</button>
        </div>
    </div>
</div>
</form>
<!--                                                                             Tableau -->
<div class="container">
<div class="row justify-content-center mt-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" style="width:130px">#</th>
                <th scope="col" style="width:130px">Prénom</th>
                <th scope="col" style="width:130px">Nom</th>
                <th scope="col" style="width:130px">Ville</th>
                <th scope="col" style="width:130px">Accompagnement</th>
            </tr>
        </thead>
        <tbody id="tableau">
        </tbody>
    </table>
</div>
</div>

<!--                                                                             ! ! ! - - M O D A L S  I N T E R V E N A N T - - ! ! ! -->

<!--                                                                                                               Modal pour choisir ajouter / modifier un-e intervenant-e -->
<div class="modal fade" id="modal_int" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter ou modifier/supprimer un-e intervenant-e PLM</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
          Souhaitez-vous ajouter ou modifier/supprimer un-e intervenant-e PLM ?
      </div>
      <div class="modal-footer">
          <button id="btn_int_create" type="button" class="btn btn-primary close-modal" data-bs-toggle="modal" data-bs-target="#modal_int_create">Ajouter</button>
          <button id="btn_int_update" type="button" class="btn btn-warning close-modal" data-bs-toggle="modal" data-bs-target="#modal_int_update">Modifier</button>
      </div>
    </div>
  </div>
</div>

<!---                                                                                                              Modal pour ajouter un-e intervenant-e -->
<div class="modal fade" id="modal_int_create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un-e intervenant-e PLM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_int_create">
                    <div class="form-floating mx-3 mt-3">
                        <input type="text" class="form-control" id="create_prenom_int" placeholder="Prénom *">
                        <label for="create_prenom_int">Prénom *</label>
                    </div>
                    <div class="form-floating mx-3 mt-3">
                        <input type="text" class="form-control" id="create_nom_int" placeholder="Nom *">
                        <label for="create_nom_int">Nom *</label>
                    </div>
                    <div class="form-check form-switch mx-3 mt-3">
                        <input class="form-check-input" type="checkbox" id="create_actif" checked>
                        <label class="form-check-label fw-bold" for="create_actif">actif</label>
                    </div>
                    <div class="form-check form-switch mx-3 mt-3">
                        <input class="form-check-input" type="checkbox" id="create_volontaire">
                        <label class="form-check-label fw-bold" for="create_volontaire">volontaire</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="int_create" type="button" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</div>

<!---                                                                                                              Modal pour modifier un intervenant-e -->
<div class="modal fade" id="modal_int_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier ou supprimer un-e intervenant-e</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_int_update">
                    <div class="form-floating mx-3 mt-4">
                        <select class="form-select" id="select_nom_int" aria-label="Nom de l'intervenant-e">
                        <option selected value="">Séléctionner le nom de l'intervenant-e à modifier</option>
                        </select>
                        <label for="select_nom_int">Séléctionner le nom de l'intervenant-e à modifier</label>
                    </div>
                    <div class="form-floating mx-3 mt-3">
                        <input type="text" class="form-control" id="update_prenom_int" placeholder="Prenom de l'intervenant-e">
                        <label for="update_prenom_int">Modifier le prenom de l'intervenant-e</label>
                    </div>
                    <div class="form-floating mx-3 mt-3">
                        <input type="text" class="form-control" id="update_nom_int" placeholder="Nom de l'intervenant-e">
                        <label for="update_nom_int">Modifier le nom de l'intervenant-e</label>
                    </div>
                    <div class="form-check form-switch mx-3 mt-3">
                        <input class="form-check-input" type="checkbox" id="update_actif">
                        <label class="form-check-label fw-bold" for="update_actif">actif</label>
                    </div>
                    <div class="form-check form-switch mx-3 mt-3">
                        <input class="form-check-input" type="checkbox" id="update_volontaire">
                        <label class="form-check-label fw-bold" for="update_volontaire">volontaire</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="int_update" type="button" class="btn btn-warning">Modifier</button>
                <button id="int_delete" type="button" class="btn btn-danger">Supprimer</button>
            </div>
        </div>
    </div>
</div>

<!--                                                                                                               Scripts -->
<script src="js/ajax_villeQpv.js"></script>
<script src="js/ajax_prj.js"></script>
<script src="js/prj.js"></script>
<script src="js/int.js"></script>
<script src="js/ajax_int.js"></script>
<script src="js/functions.js"></script>

</body>
</html>

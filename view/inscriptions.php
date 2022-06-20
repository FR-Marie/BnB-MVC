

<h2 class="teal-text">INSCRIPTION D'UTILISATEUR</h2>



<div class="row">
    <form id="formInscriptionUtilisateur" class="col s12" method="POST">

        <!-----------NOM ET PRENOM------------>
        <div class="row">
            <div class="input-field col s6">
                <input name="nom_utilisateur" placeholder="Entrez votre nom ici" id="nom_utilisateur" type="text" class="validate" required>
                <label for="nom_utilisateur">Nom</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <input name="prenom_utilisateur" placeholder="Entrez votre prénom ici" id="prenom_utilisateur" type="text" class="validate" required>
                <label for="prenom_utilisateur">Prénom</label>
            </div>
        </div>



        <!---------------MAIL--------------->
        <div class="row">
            <div class="input-field col m6 s12">
                <input name="mail_utilisateur" placeholder="Entrez votre adresse mail ici" id="mail_utilisateur" type="email" class="validate" required>
                <label for="mail_utilisateur">Email</label>
            </div>
        </div>


        <!-----------------TELEPHONE ET REGION----------------->
        <div class="row">
            <div class="input-field col m3 s12">
                <input name="telephone_utilisateur" min="10" placeholder="0606060606" id="telephone_utilisateur" type="number" class="validate" required>
                <label for="telephone_utilisateur">Téléphone</label>
            </div>
            <div class="input-field col m3 s12">
                <select name="region_utilisateur">
                    <option value="" disabled selected>Sélectionnez votre région</option>

                    <?php
                    afficherToutesLesRegions()
                    ?>

                </select>
                <label>Votre région</label>
            </div>
        </div>

        <!---------------PASSWORD--------------->
        <div class="row">
            <div class="input-field col m3 s12">
                <input name="password_utilisateur" placeholder="Entrez votre mot de passe ici" id="password_utilisateur" type="password" class="validate" required>
                <label for="password_utilisateur">Votre mot de passe</label>
            </div>
            <div class="input-field col m3 s12">
                <input name="passwordRepeat_utilisateur" placeholder="Répétez votre mot de passe ici" id="passwordRepeat_utilisateur" type="password" class="validate" required>
                <label for="passwordRepeat_utilisateur">Vérification du mot de passe</label>
            </div>
        </div>

        <button type="submit" class="btn teal white-text" id="btn-inscription" name="btn-inscription">VALIDER MON INSCRIPTION</button>
        <a href="accueil" class="btn red white-text" id="btn-inscription">ANNULER</a>

    </form>
</div>



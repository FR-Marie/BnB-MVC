

<h2 class="teal-text">SE CONNECTER EN TANT QUE</h2>

<div class="row">

    <div class="col">
        <button onclick="toggleFormUtilisateur()" class="btn teal btn-large">Utilisateur</button>
    </div>

    <div class="col">
        <button onclick="toggleFormAdministrateur()" class="btn teal btn-large">Administrateur</button>
    </div>

</div>




<div class="row">
    <form id="formulaireUtilisateur" class="col s12" method="POST">
        <div class="row"><h5 class="teal-text">Vous allez vous connecter en tant qu'utilisateur</h5></div>
        <!---------------MAIL--------------->
        <div class="row">
            <div class="input-field col m4 s12">
                <input name="mail_connexion_utilisateur" placeholder="Entrez votre adresse mail ici" id="mail_connexion_utilisateur" type="email" class="validate" required>
                <label for="mail_connexion_utilisateur">Email</label>
            </div>
        </div>
        <!---------------PASSWORD--------------->
        <div class="row">

            <div class="input-field col m4 s12">
                <input name="password_connexion_utilisateur" placeholder="Entrez votre mot de passe ici" id="password_connexion_utilisateur" type="password" class="validate" required>
                <label for="password_connexion_utilisateur">Votre mot de passe</label>
            </div>

        </div>

        <button type="submit" class="btn teal white-text" id="btn-inscription_utilisateur" name="btn-connexion_utilisateur">SE CONNECTER</button>
        <a href="accueil" class="btn red white-text" id="btn-inscription_utilisateur">ANNULER</a>

    </form>
</div>



<div class="row">
    <form id="formulaireAdministrateur" class="col s12" method="POST">
        <div class="row"><h5 class="teal-text">Vous allez vous connecter en tant qu'administrateur</h5></div>
        <!---------------MAIL--------------->
        <div class="row">
            <div class="input-field col m4 s12">
                <input name="mail_connexion_administrateur" placeholder="Entrez votre adresse mail ici" id="mail_connexion_administrateur" type="email" class="validate" required>
                <label for="mail_connexion_administrateur">Email</label>
            </div>
        </div>
        <!---------------PASSWORD--------------->
        <div class="row">

            <div class="input-field col m4 s12">
                <input name="password_connexion_administrateur" placeholder="Entrez votre mot de passe ici" id="password_connexion_administrateur" type="password" class="validate" required>
                <label for="password_connexion_administrateur">Votre mot de passe</label>
            </div>

        </div>

        <button type="submit" class="btn teal white-text" id="btn-inscription_administrateur" name="btn-connexion_administrateur">SE CONNECTER</button>
        <a href="accueil" class="btn red white-text" id="btn-inscription_administrateur">ANNULER</a>

    </form>
</div>




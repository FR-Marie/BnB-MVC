<div class="row">
    <h1 class="center teal-text">Bienvenue sur <br> Le Marché du Livre</h1>
</div>

<div id="h2-derniers-livres-ajoutes" class="white-text grey border">
    <h2 id="livres-accueil" class="">Les derniers livres ajoutés</h2>
</div>



    <div id="row-derniers-livres-ajoutes" class="row">
<?php

foreach ($toutesLesAnnonces as $annonce){
    ?>
<div id="cards-accueil-derniers-livres-ajoutes" class="col m4 s6">

    <div id="annonce-card" class="card grey">
        <div id="card-genre" class="card-title white-text red darken-2">∟ <?= $annonce["genre"] ?></div>
        <div id="card-annonce"class="card-title white-text teal">∟ <?= $annonce["titre_livre"] ?></div>
        <div id="card-auteur" class="card-title white-text lime darken-3">∟ <?= $annonce["auteur"] ?></div>


            <div id="card-image" class="responsive-img"><img src="<?= $annonce["photo_livre"] ?>"></div>

            <div class="card-content white-text">
                <p id="card-text-vendeur" class="text-info">Vendu par: <?= $annonce["prenom_utilisateur"] ?></p>
                <p id="card-text-region" class="text-info">Localisation: <?= $annonce["nom_region"] ?></p>
                <p id="card-text-etat" class="text-info">Etat du livre: <?= $annonce["etat_livre"] ?></p>
                <p id="card-text-prix" class="text-info">Prix: <?= $annonce["prix_livre"] ?>€</p>
            </div>


            <div class="card-content">
                <a class="waves-effect waves-light lime darken-3 btn"><i class="material-icons lime darken-4 left">cloud</i>Acheter</a>
                <a class="waves-effect waves-light btn"><i class="material-icons teal right">cloud</i>Voir vendeur</a>
            </div>

    </div>

</div>
<?php
}

?>
</div>

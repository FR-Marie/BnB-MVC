<?php

require_once "../model/Model_Regions.php";

function afficherToutesLesRegions(){

    $regionsClasse = new Regions();

    $regions = $regionsClasse->afficherLesRegions();

    foreach ($regions as $region){
        ?>
        <option value="<?=$region["id_region"]?>"><?= $region["nom_region"] ?></option>
        <?php
    }
    return $regionsClasse;

}
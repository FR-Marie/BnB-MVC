///////SELECT DU FORMULAIRE D'INSCRIPTION/////////

document.addEventListener('DOMContentLoaded', function() {
    let elems = document.querySelectorAll('select');
    let instances = M.FormSelect.init(elems);

    return instances;
});



////// BOUTON FORMULAIRES DE CONNEXION //////
function toggleFormUtilisateur(){
    // on réccupère l'élément form.
    let formulaire = document.getElementById('formulaireUtilisateur');

    // Condition pour afficher/cacher le formulaire en fonction de son état
    if(formulaireUtilisateur.style.display == 'block'){
        formulaireUtilisateur.style.display = 'none';
    }else{
        formulaireUtilisateur.style.display = 'block';
        formulaireAdministrateur.style.display = 'none';
    }
}

function toggleFormAdministrateur(){
    // on réccupère l'élément form.
    let formulaireAdmin = document.getElementById('formulaireAdministrateur');

    // Condition pour afficher/cacher le formulaire en fonction de son état
    if(formulaireAdministrateur.style.display == 'block'){
        formulaireAdministrateur.style.display = 'none';
    }else{
        formulaireAdministrateur.style.display = 'block';
        formulaireUtilisateur.style.display = 'none';
    }
}
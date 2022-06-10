///////SELECT DU FORMULAIRE D'INSCRIPTION/////////

document.addEventListener('DOMContentLoaded', function() {
    let elems = document.querySelectorAll('select');
    let instances = M.FormSelect.init(elems);

    return instances;
});
$(document).ready(function() {

    // Calcul de la moyenne
    const sendButton = $('button[name="calculate"]');
    $(sendButton).click(function(e) {
        e.preventDefault();

        // On vérifie si les champs sont remplis

        // On récupére lastname + firstname
        var lastname = $('input[name="average_form[lastname]"]').val();
        var firstname = $('input[name="average_form[firstname]"]').val();
        if (lastname === '' || firstname === '' ) {
            alert('Veuillez remplir tous les champs');
            return false;
        }

        // On récupère les notes + vérifie que ce soit bien des float||int
        let notes = [];
        let isValid = true;
        $('.note').each(function() {
            let val = $(this).val();
            if (isNaN(val) || val === '') {
                alert('Veuillez entrer des nombres valides');
                isValid = false;
                return false; // Arrête seulement la boucle `each()`
            }
            notes.push($(this).val());
        });

        if (!isValid || notes.length < 2) {
            alert('Veuillez entrer des nombres valides, et au moins 2 notes');
            return false;
        }
        console.log(notes, isValid);

        // Calcul de la moyenne
        var sum = 0;
        $.each(notes, function() {
            sum += parseFloat(this);
        });
        var average = sum/notes.length;

        // On affiche les infos de l'étudiant + le résultat
        if (average >= 10) {
            $('#averageResult').removeClass('text-danger').addClass('text-success');
        } else {
            $('#averageResult').removeClass('text-success').addClass('text-danger');
        }

        $('#student').text(firstname + ' ' + lastname);
        $('#average').text(average);
        $('#averageResult').show();
    });
});
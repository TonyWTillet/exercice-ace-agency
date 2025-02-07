$(document).ready(function() {

    // Calcul de la moyenne
    $('#averageForm').submit(function(e) {
        e.preventDefault();

        // On vérifie si les champs sont remplis

        // On récupére lastname + firstname
        var lastname = $('input[name="lastname"]').val();
        var firstname = $('input[name="firstname"]').val();
        if (lastname === '' || firstname === '') {
            alert('Veuillez remplir tous les champs');
            return false;
        }

        console.log($('input[name="lastname"]'));
        // On récupère les notes + vérifie que ce soit bien des float
        var notes = [];
        $('.note').each(function() {
            if (isNaN($(this).val())) {
                alert('Veuillez entrer des nombres');
                return false;
            }
            notes.push($(this).val());
        });

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
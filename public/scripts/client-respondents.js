$(document).ready(function () {
    $('.clients-button').addClass('active-link');

    $("#birthdate").flatpickr({
        allowInput: true,
    });

    $('#birthdate').change(function () {
        var dob = $(this).val();
        var birthDate = new Date(dob);
        var currentDate = new Date();
        var age = currentDate.getFullYear() - birthDate.getFullYear();
        if (currentDate.getMonth() < birthDate.getMonth() || (currentDate.getMonth() === birthDate.getMonth() && currentDate.getDate() < birthDate.getDate())) {
            age--;
        }
        $('#age').val(age);
    });

    $('#respondents-button').addClass('active-button');
    $('#respondents-aria').addClass('active-aria');

    $('#new-respondent-button').click(function () {
        $('#new-client-modal').toggle('hidden');
    });

    $('#new-respondent-close-button').click(function () {
        $('#new-client-modal').toggle('hidden');
        $('#new-client-form').trigger('reset');
    });

    $('#close-complete-respondent-modal-button').click(function () {
        $('#complete-respondent-modal').toggle('hidden');
        $('#complete-respondent-form').trigger('reset');
    });

    $('#error-confirm-button').click(function () {
        $('.error-modal').toggle('hidden');
        $('#new-respondent-form').trigger('reset');
    });

    $('#new-respondent-form').submit(function (event) {
        event.preventDefault();
        var route = $(this).data('route');

        $.ajax({
            type: "POST",
            url: route,
            data: {
                '_token': $(this).data('csrf'),
                'firstname': $('#firstname').val(),
                'middlename': $('#middlename').val(),
                'lastname': $('#lastname').val()
            },
            success: function (response) {
                if (response) {
                    $('.error-modal').toggle('hidden');
                } else {
                    $('#new-respondent-modal').toggle('hidden');
                    $('#respondent-firstname').val($('#firstname').val());
                    $('#respondent-middlename').val($('#middlename').val());
                    $('#respondent-lastname').val($('#lastname').val());
                    $('#complete-respondent-modal').toggle('hidden');
                    $('#new-respondent-form').trigger('reset');
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    });
});

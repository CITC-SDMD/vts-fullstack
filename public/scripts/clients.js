$(document).ready(function () {
    $('.clients-button').addClass('active-link');

    $("#birthdate").flatpickr({
        allowInput: false,
    });

    $('#new-client-button').click(function () {
        $('#new-client-modal').toggle('hidden');
    });

    $('#new-client-close-button').click(function () {
        $('#new-client-modal').toggle('hidden');
        $('#new-client-form').trigger('reset');
    });

    $('#close-complete-client-modal-button').click(function () {
        $('#complete-client-modal').toggle('hidden');
        $('#complete-client-form').trigger('reset');
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

    $('#new-client-form').submit(function (event) {
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
                    console.log(response);
                } else {
                    $('#new-client-modal').toggle('hidden');
                    $('#client-firstname').val($('#firstname').val());
                    $('#client-middlename').val($('#middlename').val());
                    $('#client-lastname').val($('#lastname').val());
                    $('#complete-client-modal').toggle('hidden');
                    $('#new-client-form').trigger('reset');
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    });
});

$(document).ready(function () {
    $("#birthdate").flatpickr({
        allowInput: true,
    });

    if ($('#occupation').val() == 'Government' || $('#occupation').val() == 'OFW') {
        $('.sub_occupation').removeClass('hidden');
    }

    $('#occupation').change(function () {
        if ($(this).val() == 'Government' || $(this).val() == 'OFW') {
            $('.sub_occupation').removeClass('hidden');
        } else {
            $('.sub_occupation').addClass('hidden');
        }
    });

    $('#birthdate').change(function () {
        var dob = $(this).val();
        var birthDate = new Date(dob);
        var currentDate = new Date();
        var age = currentDate.getFullYear() - birthDate.getFullYear();
        if ($(this).val() != '') {
            if (currentDate.getMonth() < birthDate.getMonth() || (currentDate.getMonth() === birthDate.getMonth() && currentDate.getDate() < birthDate.getDate())) {
                age--;
            }
            $('#age').val(age);
        } else {
            $('#age').val('');
        }
    });
});

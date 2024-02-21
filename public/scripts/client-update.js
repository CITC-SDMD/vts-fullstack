$(document).ready(function () {
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
});

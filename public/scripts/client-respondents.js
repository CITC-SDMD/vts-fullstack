$(document).ready(function () {
    $('.clients-button').addClass('active-link');

    $("#birthdate").flatpickr({
        allowInput: true,
    });

    $('#occupation_id').change(function () {
        if ($(this).val() == 5) {
            $('.sub_occupation').removeClass('hidden');
            $('#suboccupation_id').attr('required', true);
        } else {
            $('.sub_occupation').addClass('hidden');
            $('#suboccupation_id').removeAttr('required');
            $('#suboccupation_id').val('');
        }
    });

    $('#respondent_id').selectize({
        plugins: ["clear_button"],
        persist: false,
    });

    $('#create-new-respondent').click(function () {
        $('#new-client-modal').toggle('hidden');
        $('#respondent_id')[0].selectize.clear();
        $('#complete-respondent-modal').toggle('hidden');
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
});

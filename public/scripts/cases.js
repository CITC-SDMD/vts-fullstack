$(document).ready(function () {
    $('.caseprofiles-button').addClass('active-link');

    $('#new-case-button').click(function () {
        $('#new-case-modal').toggle('hidden');
    });

    $('#new-case-close-button').click(function () {
        $('#new-case-modal').toggle('hidden');
    });
});

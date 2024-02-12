$(document).ready(function () {
    $('.users-button').addClass('active-link');

    $('#new-user-button').click(function () {
        $('#new-user-modal').toggle('hidden');
    });

    $('#new-user-close-button').click(function () {
        $('#new-user-modal').toggle('hidden');
    });
});

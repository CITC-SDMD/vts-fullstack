$(document).ready(function () {
    $('.clients-button').addClass('active-link');

    $('#children-button').addClass('active-button');
    $('#children-aria').addClass('active-aria');

    $('#create-dependent-button').click(function () {
        $('#new-dependent-modal').toggle('hidden');
    });

    $('#close-new-dependent-modal-button').click(function () {
        $('#new-dependent-form').trigger('reset');
        $('#new-dependent-modal').toggle('hidden');
    });
});

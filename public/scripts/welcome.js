$(document).ready(function () {
    $('#showPassword').click(function () {
        $('#password').attr('type', 'text');
        $(this).addClass('hidden');
        $('#hidePassword').removeClass('hidden');
    });

    $('#hidePassword').click(function () {
        $('#password').attr('type', 'password');
        $(this).addClass('hidden');
        $('#showPassword').removeClass('hidden');
    });
});

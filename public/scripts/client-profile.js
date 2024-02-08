$(document).ready(function () {
    $('.clients-button').addClass('active-link');

    $('#uploadButton').click(function () {
        $("#signature-modal").toggle('hidden');
    });

    $('#upload-close-button').click(function () {
        $('#upload-form').trigger('reset');
        $('#image-preview').addClass('hidden group-hover:hidden');
        $('#default-image').removeClass('hidden');
        $("#signature-modal").toggle('hidden');
    });

    $("#image-input").change(function () {
        var input = this;
        if (input.files && input.files[0]) {
            $('#default-image').addClass('hidden');
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview').removeClass('hidden group-hover:hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
});

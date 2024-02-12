$(document).ready(function () {
    $('.caseprofiles-button').addClass('active-link');

    $("#referral_agency_id").selectize({
        plugins: ["clear_button"],
        maxItems: null,
        persist: false,
    });

    $("#service_id").selectize({
        plugins: ["clear_button"],
        persist: false,
        maxItems: null,
    });

    $('#new-caselog-button').click(function () {
        $('#new-caselog-modal').toggle('hidden');
    });

    $('#close-new-caselog-button').click(function () {
        $('#new-caselog-form').trigger('reset');
        $('#new-caselog-modal').toggle('hidden');
        $("#referral_agency_id")[0].selectize.clear();
        $("#service_id")[0].selectize.clear();
    });
});

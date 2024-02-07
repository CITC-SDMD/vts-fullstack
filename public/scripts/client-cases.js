$(document).ready(function () {
    $('.clients-button').addClass('active-link');

    $("#complainant_id").selectize({
        plugins: ["clear_button"],
        persist: false,
    });

    $("#respondent_id").selectize({
        plugins: ["clear_button"],
        persist: false,
    });

    $("#relationship_id").selectize({
        plugins: ["clear_button"],
        persist: false,
    });

    $("#case_category_id").selectize({
        plugins: ["clear_button"],
        persist: false,
    });

    $("#abuse_category_id").selectize({
        plugins: ["clear_button"],
        maxItems: null,
        persist: false,
    });

    $("#abuse_subcategory_id").selectize({
        plugins: ["clear_button"],
        maxItems: null,
        persist: false,
    });

    $('#new-case-close-button').click(function () {
        $('#new-case-modal').toggle('hidden');
        $('#new-case-form').trigger('reset');
        $("#respondent_id")[0].selectize.clear();
        $("#case_category_id")[0].selectize.clear();
        $("#case_subcategory_id")[0].selectize.clear();
    });

    $('#casesprofile-button').addClass('active-button');
    $('#caseprofiles-aria').addClass('active-aria');

    $('#new-caseprofile-button').click(function () {
        $('#new-case-modal').toggle('hidden');
    });

    $('#case_category_id').change(function () {
        if ($(this).val() == 1) {
            $(".abusecat").removeClass('hidden');
        } else {
            $(".abusecat").addClass('hidden');
        }
    });
});

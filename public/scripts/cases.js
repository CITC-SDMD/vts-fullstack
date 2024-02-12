$(document).ready(function () {

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

    $('#case_category_id').change(function () {
        var case_id = $(this).val();
        if (case_id == 1) {
            $('.abusecat').removeClass('hidden');
        } else {
            $("#abuse_subcategory_id")[0].selectize.clear();
            $("#abuse_category_id")[0].selectize.clear();
            $('.abusecat').addClass('hidden');
        }
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

    $('.caseprofiles-button').addClass('active-link');

    $('#new-case-button').click(function () {
        $('#new-case-modal').toggle('hidden');
    });

    $('#new-case-close-button').click(function () {
        $('#new-case-modal').toggle('hidden');
        $('#new-case-form').trigger('reset');
        $("#complainant_id")[0].selectize.clear();
        $("#respondent_id")[0].selectize.clear();
        $("#relationship_id")[0].selectize.clear();
        $("#case_category_id")[0].selectize.clear();
        $("#abuse_subcategory_id")[0].selectize.clear();
        $("#abuse_category_id")[0].selectize.clear();
    });
});

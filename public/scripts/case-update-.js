$(document).ready(function () {
    var caseCategory = $('#case_category_id').val();

    if (caseCategory == 1) {
        $('#abuse_category_id').removeAttr('disabled');
        $('#abuse_subcategory_id').removeAttr('disabled');
    } else {
        $('#abuse_category_id').attr('disabled', true);
        $('#abuse_subcategory_id').attr('disabled', true);
    }


    $('#case_category_id').change(function () {
        var value = $(this).val();
        if (value == 1) {
            $('#abuse_category_id').removeAttr('disabled');
            $('#abuse_subcategory_id').removeAttr('disabled');
        } else {
            $('#abuse_category_id').attr('disabled', true);
            $('#abuse_subcategory_id').attr('disabled', true);
        }
    });
});

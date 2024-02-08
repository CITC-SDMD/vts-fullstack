$(document).ready(function () {
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
});

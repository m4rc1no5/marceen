$(document).ready(function () {
    $("#eng").click(function () {
        $("#eng").hide();
        $("#polska_wersja").hide();

        $("#pol").show();
        $("#english_version").show();

    });

    $("#pol").click(function () {
        $("#pol").hide();
        $("#english_version").hide();

        $("#eng").show();
        $("#polska_wersja").show();
    });
});

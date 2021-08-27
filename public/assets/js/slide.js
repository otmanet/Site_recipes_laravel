$(function () {
    // Sidebar toggle behavior
    $("#ham").on("click", function () {
        $(".new-slide-bar").toggleClass("active");
    });
    $(".svg-icon-slidebar").on("click", function () {
        $(".new-slide-bar1").toggleClass("active");
    });
    $("#hamnull").on("click", function () {
        $(".new-slide-bar").toggleClass("active");
    });
});

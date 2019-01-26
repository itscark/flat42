function switchNavbar() {
    if ($(window).width() < 992) {
        $(".navbar").removeClass("fixed-top");
        $("#main-container").removeClass("mt-5");
        $("#main-container").addClass("mt-4");
        $(".navbar").addClass("fixed-bottom");
    } else {
        $("#main-container").removeClass("mt-4");
        $("#main-container").addClass("mt-5");
        $(".navbar").removeClass("fixed-bottom");
        $(".navbar").addClass("fixed-top");
    }
}
// On first load
$(function() {
    switchNavbar();
});

// When browser resized
$(window).on("resize", function() {
    switchNavbar();
});
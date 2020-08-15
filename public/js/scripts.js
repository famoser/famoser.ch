$(document).ready(function () {
    initializeSmoothScrolling();
    initializeExperienceHover();
});

function initializeExperienceHover() {
    $('div.job').hover(
        function () {
            let otherClass = $(this).prop("classList").item(1);
            $("svg g." + otherClass).addClass("active")
        },
        function () {
            let otherClass = $(this).prop("classList").item(1);
            $("svg g." + otherClass).removeClass("active")
        }
    )
}

function initializeSmoothScrolling() {
    $('[data-spy="scroll"]').each(function () {
        $(this).scrollspy('refresh');
    });

    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
    });
}

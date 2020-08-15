$(document).ready(function () {
    initializeSmoothScrolling();
});

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
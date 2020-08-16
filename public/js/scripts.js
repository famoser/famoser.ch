$(document).ready(function () {
    initializeExperienceHover();
    initializeSkills();
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

function initializeSkills()
{
     // Initialize Isotope
     const $container = $('.skills-grid');
     $container.isotope({
         itemSelector: '.skills-grid-item',
     });

     // Set up the click event for filtering
     $('.skill-filters').on('click', 'a', function (event) {
         event.preventDefault();

         const $filter = $(this).attr('data-filter');
         $container.isotope({filter: $filter});

         console.log("filter by " + $filter);
     });

     // sometimes rendering fails the first time (parts are overlapped)
     // hence repeat at later time
    setTimeout(function(){ $container.isotope() }, 1000);
    setTimeout(function(){ $container.isotope() }, 5000);
}

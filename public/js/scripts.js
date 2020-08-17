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

let current_filter = "";
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
         if (current_filter === $filter) {
             current_filter = null;
         } else {
             current_filter = $filter;
         }

         $container.isotope({filter: current_filter});
     });

     // sometimes rendering fails the first time (parts are overlapped)
     // hence repeat at later time
    setTimeout(function(){ $container.isotope() }, 1000);
    setTimeout(function(){ $container.isotope() }, 5000);
}

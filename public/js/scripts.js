$(document).ready(function () {
    initializeExperienceHover();
    initializeSkills();
    initializeCollapse();

    console.log('🌈');
});

function initializeCollapse() {
    const collapseAnchors = $(".collapse-anchor");
    collapseAnchors.on("click", function (e) {
        if (e.target.nodeName === 'A') {
            return;
        }

        e.preventDefault();
        $(this).toggleClass('active');
        const targetId = $(this).attr('aria-controls');
        $('#' + targetId).toggleClass('d-none');
        $('#' + targetId).attr('aria-expanded', $(this).hasClass('active'));
        return false;
    })
}

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
    // initialize archive functionality
    const skillsGrid = $(".skills-grid");
    skillsGrid.addClass("hide-archived");
    skillsGrid.addClass("hide-not-featured");

    const showAllActiveButton = $("#show-all-active");
    showAllActiveButton.removeClass("d-none");

    const showArchivedButton = $("#show-archived");

    // Initialize Isotope
    const $container = skillsGrid;
    $container.isotope({
        layoutMode: 'masonry',
        itemSelector: '.skills-grid-item',
        stamp: '.stamp',
        masonry: {
            columnWidth: 1 // fix layout if first element is not shown
        }
    });

    // Set up the click event for filtering
    let $skillFilters = $('.skill-filters a');
    $skillFilters.on('click', function (event) {
        event.preventDefault();
        $skillFilters.removeClass("active")

        let $currentElement = $(this);
        const $filter = $currentElement.attr('data-filter');
        if (current_filter === $filter) {
            current_filter = null;
        } else {
            $currentElement.addClass("active")
            current_filter = $filter;
        }

        $container.isotope({filter: current_filter});
    });


    $(".skills-grid-item").hover(
        function () {
            let description = $(this).find(".description");
            if (description.length === 0) {
                return
            }

            description.addClass("stamp");
            description.removeClass("hidden");
            $container.isotope();
            setTimeout(function(){ $container.isotope() }, 200);
        },
        function () {
            let description = $(this).find(".description");
            if (description.length === 0) {
                return
            }

            description.removeClass("stamp");
            $container.isotope();
            setTimeout(function(){ $container.isotope() }, 200);
        }
    )

    const skillsGridWrapper = $(".skills-grid-wrapper");
    showAllActiveButton.on("click", function (e) {
        e.preventDefault();

        $(this).addClass("d-none");
        showArchivedButton.removeClass("d-none");
        skillsGrid.removeClass("hide-not-featured");

        skillsGridWrapper.addClass('container-wide');

        $container.isotope();
    })

    showArchivedButton.on("click", function (e) {
        e.preventDefault();

        $(this).addClass("d-none");
        skillsGrid.removeClass("hide-archived");

        skillsGridWrapper.addClass('container-xtra-wide');

        $container.isotope();
    })

     // sometimes rendering fails the first time (parts are overlapped)
     // hence repeat at later time
    setTimeout(function(){ $container.isotope() }, 1000);
    setTimeout(function(){ $container.isotope() }, 5000);
}

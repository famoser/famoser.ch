$(document).ready(function () {
    initializeExperienceHover();
    initializeSkills();

    console.log('🌈');
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


/* https://embed.im/snow */
var embedimSnow=document.getElementById("embedim--snow");if(!embedimSnow){function embRand(a,b){return Math.floor(Math.random()*(b-a+1))+a}var embCSS='.embedim-snow{position: absolute;width: 10px;height: 10px;background: white;border-radius: 50%;margin-top:-10px}';var embHTML='';for(i=1;i<200;i++){embHTML+='<i class="embedim-snow"></i>';var rndX=(embRand(0,1000000)*0.0001),rndO=embRand(-100000,100000)*0.0001,rndT=(embRand(3,8)*10).toFixed(2),rndS=(embRand(0,10000)*0.0001).toFixed(2);embCSS+='.embedim-snow:nth-child('+i+'){'+'opacity:'+(embRand(1,10000)*0.0001).toFixed(2)+';'+'transform:translate('+rndX.toFixed(2)+'vw,-10px) scale('+rndS+');'+'animation:fall-'+i+' '+embRand(10,30)+'s -'+embRand(0,30)+'s linear infinite'+'}'+'@keyframes fall-'+i+'{'+rndT+'%{'+'transform:translate('+(rndX+rndO).toFixed(2)+'vw,'+rndT+'vh) scale('+rndS+')'+'}'+'to{'+'transform:translate('+(rndX+(rndO/2)).toFixed(2)+'vw, 105vh) scale('+rndS+')'+'}'+'}'}embedimSnow=document.createElement('div');embedimSnow.id='embedim--snow';embedimSnow.innerHTML='<style>#embedim--snow{position:fixed;left:0;top:0;bottom:0;width:100vw;height:100vh;overflow:hidden;z-index:9999999;pointer-events:none}'+embCSS+'</style>'+embHTML;document.body.appendChild(embedimSnow)}
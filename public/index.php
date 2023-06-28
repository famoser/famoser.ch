<?php
include "../src/bootstrap.php";

$invalidUri = false;
if ($_SERVER["REQUEST_URI"] !== "/") {
    http_response_code(404);
    $invalidUri = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
include "../templates/head.html"
?>
<body>

<?php if ($invalidUri) { ?>
    <section>
        <div class="container">
            <div class="alert alert-danger">
                Sorry, but this page could not be found.
                Contact me, and we will find it together :)
            </div>
        </div>
    </section>
<?php } ?>

<section class="primary">
    <div class="container">
        <div class="main">
            <div class="teaser">
                <div class="row">
                    <div class="col-xl-8">
                        <p class="lead">Hi!</p>

                        <p class="lead mt-5">
                            I am Florian Moser.<br/>
                            <a href="#develop">Developer</a> of big and small applications.<br>
                            <a href="#research">Researcher</a> of internet voting schemes.<br>
                        </p>

                        <p class="mt-5">Do you have a new project for me? Contact me: <u class="link">me&nbsp;(&#x200b;a&#x200b;t&#x200b;)&nbsp;famoser.ch</u>
                        </p>
                    </div>
                    <div class="col-xl-4 d-none d-xl-block">
                        <img src="images/Florian Moser.jpg" alt="Portrait Florian Moser" class="img-fluid img-profile">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="develop">
    <div class="container">
        <h2>Projects</h2>
    </div>

    <div class="spacer-half"></div>

    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <h3>Baupen</h3>
                <p>
                    The issue management system supports site managers in the recording of defects, as well as the
                    acceptance and the documentation of the construction site.
                </p>
                <p>
                    The combination of webpage and app is in use on dozens of construction sites.
                    Since the release, the tool has been continuously adapted to the way site managers work.
                </p>

                <p>
                    Project webpage: <a href="https://baupen.ch" target="_blank">baupen.ch</a>
                </p>
            </div>
            <div class="col-xl-8">
                <div class="ps-xl-5 mt-4 mt-xl-0">
                    <img src="images/projects/baupen.png" alt="Screenshot Pendenzenverwaltung baupen.ch"
                         class="img-fluid img-screenshot">
                </div>
            </div>
        </div>
    </div>

    <div class="spacer"></div>

    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-xl-4">
                <h3>E-Voting for the University of Zürich</h3>
                <p>
                    Members of V-ATP (administrative and technical staff), VFFL (senior researchers and teaching staff)
                    and VAUZ (junior researchers) elect delegates into University committees.
                </p>
                <p>
                    A security analysis of the concept was created for and reviewed by the University.
                    The source code underwent a code review by <a href="https://www.cnlab.ch/" target="_blank">cnlab</a>.
                </p>
                <p>
                    The tool is being used for binding elections since 2018 and has seen multiple election cycles.
                    It is continously being extended to further reduce administrational effort and increase usability.
            </div>
            <div class="col-xl-8">
                <div class="pe-xl-5 mt-4 mt-xl-0">
                    <img src="images/projects/evoting.png" alt="Screenshot eVoting Stände"
                         class="img-fluid img-screenshot">
                </div>
            </div>
        </div>
    </div>

    <div class="spacer"></div>

    <div class="container">
        <div class="skills">
            <div class="row mb-4">
                <div class="col-md-4">
                    <p><b>Language</b></p>
                    <ul class="skill-filters primary clearfix">
                        <li><a href="#" data-filter=".php">PHP</a></li>
                        <li><a href="#" data-filter=".javascript">JavaScript</a></li>
                        <li><a href="#" data-filter=".csharp">C#</a></li>
                        <li><a href="#" data-filter=".java">Java</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p><b>Framework</b></p>
                    <ul class="skill-filters secondary clearfix">
                        <li><a href="#" data-filter=".symfony">Symfony</a></li>
                        <li><a href="#" data-filter=".vuejs">Vue.js</a></li>
                        <li><a href="#" data-filter=".react">React</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="skills-grid-wrapper container">
        <div class="skills-grid">
            <?php
            $projects = getProjects();
            foreach ($projects as $project) {
                $showDetails = isset($project["implementation"]) && $project["featured"];
                ?>
                <div class="skills-grid-item <?= $project["archived"] ? "archived " : " " ?><?= $showDetails ? "expandable " : "" ?><?= $project["class"] ?>">
                    <h3><?= $project["name"] ?></h3>
                    <p><?= $project["purpose"] ?></p>
                    <?php if ($showDetails) { ?>
                        <p class="description hidden">
                            <?= $project["implementation"] ?>
                        </p>
                    <?php } ?>
                    <p>
                        <?php foreach ($project["languages"] as $language) { ?>
                            <span class="skill primary"><?= $language ?></span>
                        <?php } ?>
                        <?php foreach ($project["frameworks"] as $framework) { ?>
                            <span class="skill secondary"><?= $framework ?></span>
                        <?php } ?>
                        <?php if (isset($project["employer"])) { ?>
                            <span class="skill bg-light"><?= $project["employer"] ?></span>
                        <?php } ?>
                        <?php if (isset($project["focus"])) { ?>
                            <span class="skill bg-light"><?= $project["focus"] ?></span>
                        <?php } ?>
                    </p>
                    <?php if (isset($project["source_url"]) || isset($project["publish_url"])) { ?>
                        <p>
                            <?php if (isset($project["source_url"])) { ?>
                                <a href="<?= $project["source_url"] ?>" target="_blank">
                                    <?php if (strpos($project["source_url"], "github") > 0) { ?>
                                        <img class="icon" alt="source of <?= $project["name"] ?>"
                                             src="icons/github.svg">
                                    <?php } else if (strpos($project["source_url"], "gitlab") > 0) { ?>
                                        <img class="icon" alt="source of <?= $project["name"] ?>"
                                             src="icons/gitlab.svg">
                                    <?php } else { ?>
                                        <img class="icon" alt="source of <?= $project["name"] ?>"
                                             src="icons/external-link.svg">
                                    <?php } ?>
                                </a>
                            <?php } ?>
                            <?php if (isset($project["publish_url"])) { ?>
                                <a href="<?= $project["publish_url"] ?>" target="_blank">
                                    <?php if (strpos($project["publish_url"], "microsoft") > 0) { ?>
                                        <img class="icon" alt="app <?= $project["name"] ?> in microsoft store"
                                             src="icons/microsoft.svg">
                                    <?php } else { ?>
                                        <img class="icon" alt="visit <?= $project["name"] ?>"
                                             src="icons/external-link.svg">
                                    <?php } ?>
                                </a>
                            <?php } ?>
                        </p>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

        <p class="text-center">
            <button id="show-all-active" class="m-5 btn btn-outline-secondary">
                Include smaller projects
            </button>
        </p>

        <p class="text-center">
            <button id="show-archived" class="m-5 btn btn-outline-secondary d-none">
                Show archived
            </button>
        </p>
    </div>
</section>

<section id="research" class="primary">
    <div class="container">
        <div class="research">
            <h2>Research</h2>

            <blockquote class="blockquote">
                <p>We explore internet voting in real-world settings (e.g. political elections, university
                    elections). In these settings, we design novel schemes giving strong guarantees under permissible
                    assumptions. We optimize usability and security trade-offs using acceptable user experiences (e.g.
                    code voting). We target low complexity of the resulting specification while choosing simple
                    cryptographic primitives (e.g. XOR). We formulate understandable security definitions by focusing on
                    clarity (e.g. clear structure). We prove these properties with computational proofs and with formal
                    verification tools such as ProVerif or Tamarin.</p>
                <footer class="blockquote-footer">Research statement of PhD at LORIA</footer>
            </blockquote>

            <h3 class="mt-5 collapse-anchor" role="button" aria-controls="research-proposal">
                Research proposal: Code Voting for Swiss Internet Voting
                <span class="text-secondary">2022, <a href="https://e-vote-id.org/">E-Vote ID 2022</a></span>
            </h3>
            <p id="research-proposal" aria-expanded="false" class="d-none">
                Complexity of the Swiss internet voting proposals is identified as a repeatedly voiced concern in
                reviews. Code voting is proposed as an additional mechanism, which reduces the complexity of the
                involved cryptography while increasing security. The protocol, security definitions motivated by Swiss
                law and corresponding proofs are sketched [<a href="papers/Code Voting for Swiss Internet Voting.pdf"
                                                              target="_blank">download</a>].
            </p>

            <h3 class="mt-5 collapse-anchor" role="button" aria-controls="master-thesis">
                Master thesis: Swiss Internet Voting
                <span class="text-secondary">2022</span>
            </h3>
            <p id="master-thesis" aria-expanded="false" class="d-none">
                The Master's thesis examines internet voting in Switzerland. First, an overview of the scientific
                literature is given, and then relevant events, laws and political influences in Switzerland are
                summarised. To improve the current situation, a code-voting system is proposed that drastically reduces
                the complexity of the cryptography involved, while achieving stronger security properties. It is proven
                that this design meets formal definitions of legal requirements [<a
                        href="papers/Swiss Internet Voting.pdf" target="_blank">download</a>].
            </p>

            <h3 class="mt-5 collapse-anchor" role="button" aria-controls="report-chvote-pairing-based-id">
                Report: A Pairing-Based Identification Protocol for CHVote
                <span class="text-secondary">2021</span>
            </h3>
            <p id="report-chvote-pairing-based-id" aria-expanded="false" class="d-none">
                <a href="https://eprint.iacr.org/2017/325">CHVote</a> is an internet voting protocol suitable for use in
                Switzerland. As part of the casting procedure, voters authenticate their vote by entering an
                authentication key. In an effort to increase usability, a novel pairing-based identification protocol
                was proposed which requires only half the key for the same security guarantee than the previous
                proposal. The report proves the protocol secure, but asserts that the key size cannot be halved [<a
                        href="papers/Evaluate a Pairing Based Identification Protocol.pdf" target="_blank">report</a>,
                <a href="papers/Evaluate a Pairing Based Identification Protocol - Paper.pdf" target="_blank">paper</a>,
                <a href="papers/Evaluate a Pairing Based Identification Protocol - One-way proof.pdf" target="_blank">one-way
                    proof</a>].
            </p>

            <h3 class="mt-5 collapse-anchor" role="button" aria-controls="curve25519">
                Advanced Systems Lab: Fast imlementation of Curve25519 on Intel Skylake
                <span class="text-secondary">2020</span>
            </h3>
            <p id="curve25519" aria-expanded="false" class="d-none">
                As a joint work with three other students, it was investigated whether existing implementations of the
                widely used Curve25519 could be further improved. Multiple approaches out of existing literature were
                combined and extended. The resulting implementation for the Intel Skylake architecture was 10% faster
                than all other implementations of the Bernstein comparison
                [<a href="papers/Fast Implementation of Curve25519 on Intel Skylake.pdf"
                    target="_blank">herunterladen</a>,
                <a href="papers/Fast Implementation of Curve25519 on Intel Skylake - code.zip" target="_blank">code</a>].
            </p>

            <h3 class="mt-5 collapse-anchor" role="button" aria-controls="bachelor-thesis">
                Bachelor thesis: Identifying encrypted online video streams using bitrate profiles
                <span class="text-secondary">2018</span>
            </h3>
            <p id="bachelor-thesis" aria-expanded="false" class="d-none">
                It was investigated whether passively observable network traffic of netflix could be used to identify
                the currently watched content. Existing approaches were replicated, and extended. The resulting
                implementation needed only to measure the in average used bandwidth to identify what content is being
                watched
                [<a href="papers/Identifying encrypted online video streams using bitrate profiles.pdf" target="_blank">herunterladen</a>,
                <a href="https://github.com/famoser/bachelor-thesis" target="_blank">code</a>].
            </p>

            <h3 class="mt-5 collapse-anchor" role="button" aria-controls="teaching">
                Teaching: TheAlternative
                <span class="text-secondary">2016-2023</span>
                and University of Zürich
                <span class="text-secondary">2020-2023</span>
            </h3>
            <p id="teaching" aria-expanded="false" class="d-none">
                As part of <a href="https://thealternative.ch" target="_blank">TheAlternative</a>, I used to organize
                and give lectures
                [<a href="https://gitlab.ethz.ch/thealternative/courses/-/tree/master/project%20management"
                    target="_blank">project management</a>,
                <a href="https://gitlab.ethz.ch/thealternative/courses/-/tree/master/web" target="_blank">web</a>,
                <a href="https://gitlab.ethz.ch/thealternative/courses/-/tree/master/pdf" target="_blank">pdf</a>].
                As a course instructor for <a href="https://www.uzh.ch" target="_blank">University of Zürich</a>, I
                regularely gave courses about git and GitLab
                [<a href="https://gitlab.uzh.ch/zi-it-training/git" target="_blank">git</a>].
            </p>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="experience">
            <h2>Experience</h2>
            <div class="row">
                <div class="col-xl-8">
                    <?php
                    $jobs = [
                        [
                            "class" => "phd",
                            "title" => "PhD student in group PESTO (Véronique Cortier)",
                            "firm" => "INRIA Nancy - French Institute for Research in Computer Science",
                            "link" => "https://www.inria.fr/en/inria-nancy-grand-est-centre",
                            "period" => "since Jul. 2023",
                            "image_name" => "inria.png"
                        ],
                        [
                            "class" => "freelancer",
                            "title" => "Developer & Scientist",
                            "firm" => "famoser GmbH",
                            "link" => "https://famoser.ch",
                            "period" => "since Jan. 2018, incorporated since Dec. 2022"
                        ],
                        [
                            "class" => "eth",
                            "title" => "Master of Science ETH in Computer Science",
                            "firm" => "ETH Zürich - Federal Institute of Technology",
                            "link" => "https://ethz.ch",
                            "period" => "Sep. 2015 - Sep. 2018, Sep. 2019 - Feb. 2022, grade average top 15%",
                            "image_name" => "eth.png"
                        ],
                        [
                            "class" => "vseth",
                            "title" => "Board Member, Ressort Internal Affairs",
                            "firm" => "VSETH - Umbrella organisation of all students ETH",
                            "link" => "https://vseth.ethz.ch",
                            "period" => "Sep. 2019 - Sep. 2020",
                            "image_name" => "vseth.png"
                        ],
                        [
                            "class" => "zuehlke",
                            "title" => "Professional Software Engineer",
                            "firm" => "Zühlke AG - Empowering Ideas",
                            "link" => "https://www.zuehlke.com",
                            "period" => "Oct. 2018 - Jun. 2019",
                            "image_name" => "zuehlke.svg"
                        ],
                        [
                            "class" => "jkweb",
                            "title" => "Projektleitung & Programmierung",
                            "firm" => "JKweb GmbH - Schöne und schlichte Webseiten",
                            "link" => "https://jkweb.ch",
                            "period" => "Feb. 2016 - Dez. 2017",
                            "image_name" => "jkweb.svg"
                        ]
                    ];

                    foreach ($jobs as $job) { ?>
                        <div class="job <?= $job["class"] ?>">
                            <p>
                                <b><?= $job["title"] ?></b><br/>
                                <a href="<?= $job["link"] ?>" target="_blank"><?= $job["firm"] ?></a><br/>
                                <small class="text-secondary"><?= $job["period"] ?></small>
                            </p>
                            <?php if (isset($job["image_name"])) { ?>
                                <img class="job-image d-none d-md-block" src="/images/jobs/<?= $job["image_name"] ?>"
                                     alt="logo of <?= $job["firm"] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-xl-4 col-12 d-none d-xl-block">
                    <div class="job-wrapper">
                        <!--
                        10 width = 100% pensum
                        1 height = 1 month
                        0 = jan 2015, 11 = dez 2015, 78 dez 2020, 92 feb 2022, 108 jun 2022

                        59 height = 59 months; from Sep 2015 - Juli 2020
                        -->
                        <svg class="jobs" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 10 108"
                             height="109%"
                             width="100%">
                            <filter id="dry">
                                <feComponentTransfer>
                                    <feFuncA type="table" tableValues="0 0.5"></feFuncA>
                                </feComponentTransfer>
                            </filter>
                            <g transform="scale(-1,-1)" transform-origin="center">
                                <g class="eth" filter="url(#dry)">
                                    <title>ETH Master</title>
                                    <!--
                                    10 sep 2015 (8) - jan 2016 (0+12)
                                    0.8 feb 2016 - aug 2018 (7+36)
                                    0 sep 2018 - aug 2019 (7+48)
                                    0.5 sep 2019 - sep 2020 (8+60)
                                    0.8 sep 2020 - dez 2020 (11+60)
                                    -->
                                    <polygon points="0,54 4,54 4,69 8,69 8,92 0,92" fill="#1f4070"></polygon>
                                </g>
                                <g class="eth" filter="url(#dry)">
                                    <title>ETH Bachelor</title>
                                    <!--
                                    10 sep 2015 (8) - jan 2016 (0+12)
                                    0.8 feb 2016 - aug 2018 (7+36)
                                    0 sep 2018 - aug 2019 (7+48)
                                    0.5 sep 2019 - sep 2020 (8+60)
                                    0.8 sep 2020 - dez 2020 (11+60)
                                    -->
                                    <polygon points="0,8 10,8 10,13 8,13 8,45 0,45" fill="#1f4070"></polygon>
                                </g>
                                <g class="jkweb" filter="url(#dry)">
                                    <title>JKWeb</title>
                                    <!--
                                    02 feb 2016 (1+12) - dez 2017 (11+24)
                                    -->
                                    <polygon points="8,13 10,13 10,36 8,36" fill="#3d3d3d"></polygon>
                                </g>
                                <g class="zuehlke" filter="url(#dry)">
                                    <title>Zühlke</title>
                                    <!--
                                    Oct 2018 (9+36) - Jun 2019 (5+48)
                                    -->
                                    <polygon points="0,45 9,45 9,54 0,54" fill="#985b9c"></polygon>
                                </g>
                                <g class="vseth" filter="url(#dry)">
                                    <title>VSETH</title>
                                    <!--
                                    Sep 2019 (8+48) - Sep 2020 (8+60)
                                    -->
                                    <polygon points="4,54 9,54 9,69 4,69" fill="#009FE3"></polygon>
                                </g>
                                <g class="freelancer" filter="url(#dry)">
                                    <title>Freelancer</title>
                                    <!--
                                    02 Jan 2018 (0+36) - Sep 2018 (8+36)
                                    10 Jul 2019 (6+48) - Sep 2019 (8+48)
                                    02 Oct 2020 (9+60) - Dez 2020 (11+60)
                                    -->
                                    <polygon points="8,36 10,36 10,108 0,108 0,92 8,92 8,69 9,69 9,45 8,45"
                                             fill="#8BBB9B"></polygon>
                                </g>
                            </g>
                        </svg>
                        <small class="axis-top text-end text-secondary">today</small>
                        <small class="axis-bottom text-end text-secondary">2015</small>
                    </div>
                    <small class="text-center text-secondary ms-5 mt-1 d-block">Workload</small>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="secondary">
    <div class="container">
        <div class="network">
            <div class="row">
                <div class="col-3">
                    <p>
                        <a href="https://github.com/famoser/" target="_blank">
                            <img class="icon" src="icons/github.svg" alt="github icon">
                        </a>
                    </p>
                </div>
                <div class="col-3">
                    <p>
                        <a href="https://stackoverflow.com/users/2259391/florian-moser" target="_blank">
                            <img class="icon" src="icons/stackoverflow.svg" alt="stackoverflow icon">
                        </a>
                    </p>
                </div>
                <div class="col-3">
                    <p>
                        <a href="https://linkedin.com/in/famoser" target="_blank">
                            <img class="icon" src="icons/linkedin.svg" alt="linkedin icon">
                        </a>
                    </p>
                </div>
                <div class="col-3">
                    <p>
                        <a href="https://gitlab.com/famoser" target="_blank">
                            <img class="icon" src="icons/gitlab.svg" alt="gitlab icon">
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <p class="text-center text-muted mt-5">famoser GmbH, CHE-498.133.112<br/>c/o Florian Moser, Moosburgstrasse 25,
            CH-8307 Effretikon</p>
    </div>
</section>

<?php
include "../templates/scripts.html"
?>

</body>
</html>

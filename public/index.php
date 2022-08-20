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
                Entschuldigung, diese Seite wurde leider nicht gefunden.
                Kontaktieren Sie mich und ich finde sie :)
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
                        <p class="lead">Hallo!</p>

                        <div class="spacer"></div>

                        <p class="lead">
                            Ich bin <b>Florian Moser</b>.<br/>
                            Entwickler <b>famoser</b> Applikationen<br/>
                            für komplexe Anwendungen.
                        </p>

                        <div class="spacer"></div>

                        <p>Haben Sie ein Projekt für mich? Kontakt aufnehmen: <u class="link">me&nbsp;(&#x200b;a&#x200b;t&#x200b;)&nbsp;famoser.ch</u></p>
                    </div>
                    <div class="col-xl-4 d-none d-xl-block">
                        <img src="images/Florian Moser.jpg" alt="Portrait Florian Moser" class="img-fluid img-screenshot">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="summary">
            <p class="lead">
                Ich bin Freelancer mit langjähriger Erfahrung in der Entwicklung, dem Betrieb und der Wartung von
                Web-Applikationen.
            </p>
        </div>
    </div>
</section>

<section>
    <div class="container container-left-expand">
        <div class="row flex-row-reverse">
            <div class="col-xl-6">
                <h2>eVoting der Stände UZH</h2>
                <p>
                    Für die Vertreterorganisationen V-ATP (administratives und technisches Personal), VFFL (externe
                    Dozierende) und VAUZ (Doktorierende und Postdocs) wurde ein Wahltool erstellt. Wahlberechtigte können
                    Delegierte in UZH Gremien wählen.
                </p>
                <p>
                    Das Konzept wurde in einer sicherheitstechnischen Analyse beschrieben und abgenommen. Am
                    Quellcode wurde ein Code Review durch <a href="https://www.cnlab.ch/" target="_blank">cnlab</a>
                    durchgeführt.
                </p>
                <p>
                    Das Wahltool wurde bereits für mehrere Wahlen und Nachwahlen eingesetzt. Es ist darauf ausgelegt,
                    langfristig die Organisationen weiter zu unterstützen.
            </div>
            <div class="col-xl-6">
                <img src="images/eVoting/screenshot2.png" alt="Screenshot eVoting Stände"
                    class="mt-4 mt-xl-0 img-right-correction img-fluid img-screenshot img-screenshot-expand">
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container container-right-expand">
        <div class="row">
            <div class="col-xl-6">
                <h2>Pendenzenverwaltung</h2>
                <p>
                    Für eine Baufirma wurde eine Pendenzenverwaltung für die Bauleiter umgesetzt.
                    Die Bauleiter werden bei der Erfassung von Mängeln, der Abnahme und bei der Dokumentation der Baustelle unterstützt.
                </p>
                <p>
                    Die Kombination aus Webseite und App ist auf mehreren Baustellen im Einsatz.
                    Kontinuierlich wird das Tool seit der Veröffentlichung weiter an die Arbeitsweise der Bauleiter angepasst.
                </p>

                <p>
                    Projektwebseite: <a href="https://baupen.ch" target="_blank">baupen.ch</a>
                </p>
            </div>
            <div class="col-xl-6">
                <img src="images/baupen.ch/screenshot_desktop_dashboard.jpg" alt="Screenshot Pendenzenverwaltung baupen.ch"
                 class="mt-4 mt-xl-0 ml-xl-4 img-fluid img-screenshot img-screenshot-expand">
            </div>
        </div>
    </div>
</section>

<section class="secondary">
    <div class="container">
        <div class="experience">
            <h2>Experience</h2>
            <div class="row">
                <div class="col-xl-8">
                    <?php
                    $jobs = [
                        [
                            "class" => "freelancer",
                            "title" => "Entwicklung & Projektleitung",
                            "firm" => "famoser GmbH",
                            "link" => "https://famoser.ch",
                            "period" => "Jan. 2018 - jetzt"
                        ],
                        [
                            "class" => "eth-master",
                            "title" => "Informatik Master",
                            "firm" => "ETH - Eidgenössische Technische Hochschule Zürich",
                            "link" => "https://ethz.ch",
                            "period" => "Sep. 2019 - Feb. 2022",
                            "image_name" => "eth.png"
                        ],
                        [
                            "class" => "vseth",
                            "title" => "Board Member, Ressort Internal Affairs",
                            "firm" => "VSETH - Dachverband der Studierenden ETH",
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
                            "image_name" => "jkweb.png"
                        ],
                        [
                            "class" => "eth-bachelor",
                            "title" => "Informatik Bachelor",
                            "firm" => "ETH - Eidgenössische Technische Hochschule Zürich",
                            "link" => "https://ethz.ch",
                            "period" => "Sep. 2015 - Sep. 2018",
                            "image_name" => "eth.png"
                        ],
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
                        0 = jan 2015, 11 = dez 2015, 78 dez 2020, 92 feb 2022, 102 dez 2022

                        59 height = 59 months; from Sep 2015 - Juli 2020
                        -->
                        <svg class="jobs" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 10 102"
                             height="109%"
                             width="100%">
                            <filter id="dry">
                                <feComponentTransfer>
                                    <feFuncA type="table" tableValues="0 0.5"></feFuncA>
                                </feComponentTransfer>
                            </filter>
                            <g transform="scale(-1,-1)" transform-origin="center">
                                <g class="eth-master" filter="url(#dry)">
                                    <title>ETH</title>
                                    <!--
                                    10 sep 2015 (8) - jan 2016 (0+12)
                                    0.8 feb 2016 - aug 2018 (7+36)
                                    0 sep 2018 - aug 2019 (7+48)
                                    0.5 sep 2019 - sep 2020 (8+60)
                                    0.8 sep 2020 - dez 2020 (11+60)
                                    -->
                                    <polygon points="0,54 4,54 4,69 8,69 8,92 0,92" fill="#1f4070"></polygon>
                                </g>
                                <g class="eth-bachelor" filter="url(#dry)">
                                    <title>ETH</title>
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
                                    <polygon points="8,36 10,36 10,102 0,102 0,92 8,92 8,69 9,69 9,45 8,45"
                                             fill="#8BBB9B"></polygon>
                                </g>
                            </g>
                        </svg>
                        <small class="axis-top text-end text-secondary">jetzt</small>
                        <small class="axis-bottom text-end text-secondary">2015</small>
                    </div>
                    <small class="text-center text-secondary ms-5 mt-1 d-block">Pensum</small>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="primary">
    <div class="container">
        <div class="research">
            <h2>Research & Teaching</h2>


            <h3>
                Master thesis: Swiss Internet Voting
                <span class="text-secondary">2022</span>
            </h3>
            <p>
                Die Master Arbeit untersucht Internetwahlen in der Schweiz. Zuerst wird ein Überblick über die Literatur gegeben, sowie relevante Ereignisse, Gesetze und politische Einflüsse in der Schweiz zusammengefasst.
                Zur Verbesserung der aktuellen Situation wird ein Code-Voting System vorgeschlagen, das die Komplexität der involvierten Kryptographie drastisch reduziert, und gleichzeitig stärkere Sicherheitseigenschaften erreicht.
                Es wird bewiesen, dass diese Konstruktion formelle Definitionen der rechtlichen Anforderungen erfüllt [<a href="papers/Swiss Internet Voting.pdf" target="_blank">herunterladen</a>].
            </p>

            <h3 class="mt-5">
                Report: Ein Pairing-Based Identification Protocol für CHVote
                <span class="text-secondary">2021</span>
            </h3>
            <p>
                <a href="https://eprint.iacr.org/2017/325">CHVote</a> ist ein E-Voting Protokoll für die direkte Demokratie in der Schweiz. Als Teil der Stimmabgabe authentifizieren die Wahlberechtigten ihre Stimme mit einem Code. Es wurde untersucht, ob durch eine neuartige Konstruktion die Länge dieser Codes halbiert werden darf unter gleichbleibender Sicherheit. Die Konstruktion konnte grundsätzlich als sicher bewiesen werden, jedoch darf die Schlüssellänge weiterhin nicht halbiert werden [<a href="papers/Evaluate a Pairing Based Identification Protocol.pdf" target="_blank">report</a>, <a href="papers/Evaluate a Pairing Based Identification Protocol - Paper.pdf" target="_blank">paper</a>, <a href="papers/Evaluate a Pairing Based Identification Protocol - One-way proof.pdf" target="_blank">one-way proof</a>].
            </p>

            <h3 class="mt-5">
                Advanced Systems Lab: Fast imlementation of Curve25519 on Intel Skylake
                <span class="text-secondary">2020</span>
            </h3>
            <p>
                Mit drei Kommilitonen wurde untersucht, inwiefern sich bestehende Implementierungen für eine für die Kryptographie sehr wichtige elliptische Kurve weiter optimieren lassen.
                Mehrere Ansätze aus bestehender Literatur wurden kombiniert und erweitert und auf die Intel Skylake Architektur angewandt.
                Die resultierende Implementierung war 10% schneller als alle anderen aus dem Bernstein Implementierungsvergleich
                [<a href="papers/Fast Implementation of Curve25519 on Intel Skylake.pdf" target="_blank">herunterladen</a>,
                <a href="papers/Fast Implementation of Curve25519 on Intel Skylake - code.zip" target="_blank">code</a>].
            </p>

            <h3 class="mt-5">
                Bachelor thesis: Identifying encrypted online video streams using bitrate profiles
                <span class="text-secondary">2018</span>
            </h3>
            <p>
                Es wurde untersucht, inwiefern sich Daten, die beim Schauen von Videos auf Netflix anfallen, zur Identifikation der angeschauten Videos dienen könnten.
                Bestehende Verfahren wurden reproduziert, und ein neues Verfahren, dass mit noch weniger Annahmen funktioniert, vorgestellt:
                Lediglich anhand der durchschnittlich verbrauchten Datenmenge in verschiedenen Netzwerkkonditionen kann das entsprechende Video identifiziert werden
                [<a href="papers/Identifying encrypted online video streams using bitrate profiles.pdf" target="_blank">herunterladen</a>,
                <a href="https://github.com/famoser/bachelor-thesis" target="_blank">code</a>].
            </p>

            <h3 class="mt-5">
                Teaching: TheAlternative und UZH Kursleiter
            </h3>
            <p>
                Als Teil von <a href="https://thealternative.ch" target="_blank">TheAlternative</a> organisiere und gebe ich Kurse für andere Angehörige der ETH
                [<a href="https://gitlab.ethz.ch/thealternative/courses/-/tree/master/project%20management" target="_blank">project management</a>,
                    <a href="https://gitlab.ethz.ch/thealternative/courses/-/tree/master/web" target="_blank">web</a>,
                    <a href="https://gitlab.ethz.ch/thealternative/courses/-/tree/master/pdf" target="_blank">pdf</a>].
                Als Kursleiter der UZH gebe ich regelmässig Kurse zu git und GitLab zur Versionsverwaltung
                [<a href="https://gitlab.uzh.ch/zi-it-training/git" target="_blank">git</a>].
            </p>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="skills">
            <h2>Projects</h2>
            <div class="row mb-4">
                <div class="col-md-4">
                    <p><b>Language</b></p>
                    <ul class="skill-filters primary clearfix">
                        <li><a href="#" data-filter=".php">PHP</a></li>
                        <li><a href="#" data-filter=".javascript">JavaScript</a></li>
                        <li><a href="#" data-filter=".c-sharp">C#</a></li>
                        <li><a href="#" data-filter=".java">Java</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p><b>Framework</b></p>
                    <ul class="skill-filters secondary clearfix">
                        <li><a href="#" data-filter=".symfony">Symfony</a></li>
                        <li><a href="#" data-filter=".vuejs">Vue.js</a></li>
                        <li><a href="#" data-filter=".angular">Angular</a></li>
                        <li><a href="#" data-filter=".play">Play</a></li>
                        <li><a href="#" data-filter=".asp-net">ASP.NET</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p><b>Platform</b></p>
                    <ul class="skill-filters clearfix">
                        <li><a href="#" data-filter=".web">Web</a></li>
                        <li><a href="#" data-filter=".windows">Windows</a></li>
                        <li><a href="#" data-filter=".android">Android</a></li>
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
                <div class="skills-grid-item <?= $project["archived"] ? "archived " : " " ?><?= $project["featured"] ? "featured " : "not-featured " ?><?= $showDetails ? "expandable " : "" ?><?= $project["class"] ?>">
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
                Show all active
            </button>
        </p>

        <p class="text-center">
            <button id="show-archived" class="m-5 btn btn-outline-secondary d-none">
                Show archived
            </button>
        </p>
    </div>
</section>

<section>
    <div class="container">
        <div class="network">
            <div class="row">
                <div class="col-md-3">
                    <p>
                        <a href="https://github.com/famoser/" target="_blank">
                            <img class="icon" src="icons/github.svg" alt="github icon">
                        </a>
                    </p>
                </div>
                <div class="col-md-3">
                    <p>
                        <a href="https://stackoverflow.com/users/2259391/florian-moser" target="_blank">
                            <img class="icon" src="icons/stackoverflow.svg" alt="stackoverflow icon">
                        </a>
                    </p>
                </div>
                <div class="col-md-3">
                    <p>
                        <a href="https://linkedin.com/in/famoser" target="_blank">
                            <img class="icon" src="icons/linkedin.svg" alt="linkedin icon">
                        </a>
                    </p>
                </div>
                <div class="col-md-3">
                    <p>
                        <a href="https://gitlab.com/famoser" target="_blank">
                            <img class="icon" src="icons/gitlab.svg" alt="gitlab icon">
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <p class="text-center text-muted mt-5">famoser GmbH, CHE-498.133.112<br/>Witikonerstrasse 245, 8053 Zürich</p>
    </div>
</section>

<?php
include "../templates/scripts.html"
?>

</body>
</html>

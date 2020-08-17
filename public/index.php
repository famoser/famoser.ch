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
                Kontaktieren Sie mich, und ich finde sie :)
            </div>
        </div>
    </section>
<?php } ?>

<section class="primary">
    <div class="container">
        <div class="main">
            <div class="teaser">
                <p class="lead">Hallo!</p>

                <div class="spacer"></div>

                <p class="lead">
                    Ich bin <b>Florian</b> Alexander <b>Moser</b>.<br/>
                    Programmierer von famosen Applikationen<br/>
                    für komplexe Anwendungen.
                </p>

                <div class="spacer"></div>

                <p>Kontakt aufnehmen: <u class="link">me&nbsp;(&#x200b;a&#x200b;t&#x200b;)&nbsp;famoser.ch</u></p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="summary">
            <h2>Background</h2>
            <p>
                Ich bin ein Freelancer mit langjähriger Erfahrung in der Entwicklung, dem Betrieb und der Wartung von
                Web Applikationen.
            </p>

            <p>
                Famose Applikationen sind kosteneffektiv in der Umsetzung und Wartung, werden fristgerecht fertig
                gestellt und machen Freude bei der Nutzung.
                Ein klares Verständnis der Nutzungsszenarien und ein frischer Blick auf die zu lösenden Probleme
                erlauben einfache Lösungsansätze auch für komplexe Anwendungen.
            </p>

            <p>
                Ich studiere an der ETH im Master Informatik mit einem Fokus auf Security und Application Engineering.
                Bin ich nicht vor dem Computer, singe ich vermutlich gerade als Bass II in einem Projektchor, bin am
                wandern oder
                mache Sport.
            </p>
        </div>
    </div>
</section>

<section class="secondary">
    <div class="container">
        <div class="featured">
            <h2>Besonders famoos: eVoting der Stände UZH</h2>
            <p>
                Für die Vertreterorganisationen V-ATP (administratives und technisches Personal), VFFL (externe
                Dozierende) und VAUZ (Doktorierende und Postdocs) wurde ein Wahltool erstellt.
                Die Wahlberechtigten können so auf einfachem Wege darüber abstimmen, wer sie in den jeweiligen UZH
                Gremien vertreten soll.
            </p>
            <p>
                Die Sicherheit des Tools wurde in einer umfassenden sicherheitstechnischen Analyse dargelegt,
                und am fertigen Projekt wurde ein Code Review durch <a href="https://www.cnlab.ch/" target="_blank">cnlab</a>
                durchgeführt.
            </p>

            <img src="images/eVoting/screenshot2.png" alt="Screenshot eVoting Stände"
                 class="mt-2 img-fluid img-screenshot">
        </div>
    </div>
</section>

<section class="primary">
    <div class="container">
        <div class="featured">
            <h2>Besonders famos: Pendenzenverwaltung mangel.io</h2>
            <p>
                Für eine Baufirma wurde eine Pendenzenverwaltung für die Bauleiter umgesetzt.
                Die Bauleiter werden bei der Erfassung der Pendenzen, der Kommunikation mit den Handwerkern und der
                Abnahme unterstützt.
            </p>
            <p>
                Die Kombination aus Webseite und iOS App ist auf mehreren Baustellen im Einsatz und erlaubt auch auf grossen Baustellen den Überblick
                nicht zu verlieren.
                Kontinuierlich wird das Tool seit der Veröffentlichung weiter an die Arbeitsweise der Bauleiter
                angepasst.
            </p>

            <img src="images/mangel.io/screenshot1.jpg" alt="Screenshot Pendenzenverwaltung mangel.io"
                 class="mt-2 img-fluid img-screenshot">

        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="experience">
            <h2>Experience</h2>
            <div class="row">
                <div class="col-md-8">
                    <?php
                    $jobs = [
                        [
                            "class" => "vseth",
                            "title" => "Internal Affairs",
                            "firm" => "VSETH - Dachverband der Studierenden ETH",
                            "link" => "https://vseth.ethz.ch",
                            "period" => "Sep. 2019 - Sep. 2020",
                            "image_name" => "vseth.png"
                        ],
                        [
                            "class" => "zuehlke",
                            "title" => "Professional Software Engineer",
                            "firm" => "Zühlke AG - Empowering Ideas",
                            "link" => "https://zuehlke.ch",
                            "period" => "Oct. 2018 - Jun. 2019",
                            "image_name" => "zuehlke.svg"
                        ],
                        [
                            "class" => "freelancer",
                            "title" => "Entwicklung & Projektleitung",
                            "firm" => "Freelancer",
                            "link" => "https://famoser.ch",
                            "period" => "Jan. 2018 - jetzt"
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
                            "class" => "eth",
                            "title" => "Informatik Studium",
                            "firm" => "ETH - Eidgenössische Technische Hochschule Zürich",
                            "link" => "https://ethz.ch",
                            "period" => "Sep. 2015 - jetzt",
                            "image_name" => "eth.png"
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
                                <img class="job-image" src="/images/jobs/<?= $job["image_name"] ?>"
                                     alt="logo of <?= $job["firm"] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-md-4">
                    <div class="job-wrapper">
                        <!--
                        10 width = 100% pensum
                        0 = jan 2015, 11 = dez 2015, 71 dez 2020

                        52 height = 52 months; from Sep 2015 - Dez 2020
                        -->
                        <svg class="jobs" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 10 72"
                             height="112%"
                             width="100%">
                            <filter id="dry">
                                <feComponentTransfer>
                                    <feFuncA type="table" tableValues="0 0.5">
                                </feComponentTransfer>
                            </filter>
                            <g transform="scale(-1,-1)" transform-origin="center">
                                <g class="eth" filter="url(#dry)">
                                    <title>ETH</title>
                                    <!--
                                    10 sep 2015 (8) - jan 2016 (0+12)
                                    0.8 feb 2016 - aug 2018 (7+36)
                                    0 sep 2018 - aug 2019 (7+48)
                                    0.5 sep 2019 - sep 2020 (8+60)
                                    0.8 sep 2020 - dez 2020 (11+60)
                                    -->
                                    <polygon points="0,8 10,8 10,13 8,13 8,45 0,45" fill="#1f4070"></polygon>
                                    <polygon points="0,54 4,54 4,69 8,69 8,72 0,72" fill="#1f4070"></polygon>
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
                                    <polygon points="8,36 10,36 10,72 8,72 8,69 9,69 9,45 8,45"
                                             fill="#8BBB9B"></polygon>
                                </g>
                            </g>
                        </svg>
                        <p class="axis-top text-right text-secondary">jetzt</p>
                        <p class="axis-bottom text-right text-secondary">2015</p>
                    </div>
                    <p class="text-right text-secondary mr-5">Pensum</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dark">
    <div class="container">
        <div class="skills">
            <h2>Skills</h2>

            <div class="row mb-4">
                <div class="col-md-4">
                    <p><b>Language</b></p>
                    <ul class="skill-filters">
                        <li><a href="#" data-filter=".php">PHP</a></li>
                        <li><a href="#" data-filter=".c-sharp">C#</a></li>
                        <li><a href="#" data-filter=".javascript">JavaScript</a></li>
                        <li><a href="#" data-filter=".python">Python</a></li>
                        <li><a href="#" data-filter=".css-html">CSS/HTML</a></li>
                        <li><a href="#" data-filter=".kotlin">Kotlin</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p><b>Framework</b></p>
                    <ul class="skill-filters">
                        <li><a href="#" data-filter=".symfony">Symfony</a></li>
                        <li><a href="#" data-filter=".vuejs">Vue.js</a></li>
                        <li><a href="#" data-filter=".slim">Slim</a></li>
                        <li><a href="#" data-filter=".angular">Angular</a></li>
                        <li><a href="#" data-filter=".asp-net">ASP.NET</a></li>
                        <li><a href="#" data-filter=".wordpress">Wordpress</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p><b>Platform</b></p>
                    <ul class="skill-filters">
                        <li><a href="#" data-filter=".web">Web</a></li>
                        <li><a href="#" data-filter=".windows">Windows</a></li>
                        <li><a href="#" data-filter=".android">Android</a></li>
                    </ul>
                </div>
            </div>

            <div class="skills-grid">
                <?php
                $projects = getProjects();
                foreach ($projects as $project) { ?>
                    <div class="skills-grid-item">
                        <h3><?= $project["name"]?></h3>
                        <p><?= $project["purpose"]?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php
include "../templates/scripts.html"
?>

</body>
</html>

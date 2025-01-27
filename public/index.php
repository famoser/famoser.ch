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
    <p class="not-found background-red">
        Sorry, but this page could not be found.
        Contact me, and we will find it together :)
    </p>
<?php } ?>

<section class="sidebar background-gray">
    <div class="profile">
        <img alt="Florian Moser" src="./images/Florian_Moser.jpg">
        <div class="presentation">
            <h2>Florian Moser</h2>
            <p>
                florian.moser (at) famoser.ch <br>
                contact me in en, de or fr
            </p>
        </div>
    </div>

    <div class="presentation">
        <div class="education">
            <table class="time-table">
                <tbody>
                <tr>
                    <!-- My method is primarily formal (symbolic) proofs. -->
                    <!-- I apply this to internet voting protocols. -->
                    <td>now</td>
                    <td>PhD Cand. <a href="https://inria.fr">INRIA</a> in Formal Methods</td>
                </tr>
                <tr>
                    <!-- I focused on information security, and finished with a grade average top 15%. -->
                    <!-- The Master's thesis is entitled "Swiss Internet Voting". -->
                    <td>2022</td>
                    <td>Msc <a href="https://ethz.ch">ETH</a> in Computer Science</td>
                </tr>
                <tr>
                    <!-- I focused on software engineering and security, and finished in the minimal time. -->
                    <!-- The Bachelor's thesis is entitled "Identifying encrypted online video streams using bitrate profiles". -->
                    <td>2018</td>
                    <td>Bsc <a href="https://ethz.ch">ETH</a> in Computer Science</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="experience">
            <table class="time-table">
                <tbody>
                <tr>
                    <!-- I develop on big and small products, or provide scientific consulting. -->
                    <!-- Customers include University of Zürich, Teqable (BlueCare, Basler & Hofmann), Hilti, Swiss Post, Federal Office for Information Security Germany, and others -->
                    <!-- Hire me! :) -->
                    <td>now</td>
                    <td>
                        Engineer & Scientist
                        <a href="https://famoser.ch" target="_self">famoser GmbH</a>
                    </td>
                </tr>
                <tr>
                    <!-- I was responsible to coordinate with the many organizations VSETH is in contact with, and is composed out of. -->
                    <td>2019</td>
                    <td>
                        Board Member Internal Affairs
                        <a href="https://vseth.ethz.ch">VSETH</a>
                    </td>
                </tr>
                <tr>
                    <!-- I worked in a Scrum team on a product in the insurance sector. -->
                    <td>2018</td>
                    <td>
                        Professional Software Engineer
                        <a href="https://www.zuehlke.com">Zühlke</a>
                    </td>
                </tr>
                <tr>
                    <!-- I conceptualized and implemented functionality-heavy websites, such as online shops. -->
                    <td>2016</td>
                    <td>
                        Developer and Project Manager
                        <a href="https://novu.ch">Novu</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<section class="full-page first">
    <div class="top">
        <div class="title">
            <h1>Development</h1>
            <p>of custom high-quality web-applications</p>
        </div>
    </div>

    <div class="bottom">
        <div class="description background-green">
            <p>
                <!-- I develop, operate and maintain multiple products over long-term. -->
                I develop, operate and maintain
                <a href="https://baupen.ch">baupen</a> and
                <a href="https://github.com/famoser/nodika">nodika</a>;
                <br>

                <!-- In big organizations, I find agreements and implement strategic improvements end-to-end. -->
                automate internal processes of the
                <a href="https://uzh.ch">University of Zürich</a>;
                <br>

                <!-- If current state-of-the-art is lacking, I also bring highly-technical projects into production. -->
                create
                <a href="https://github.com/famoser/pdf-generator">PDF writers</a>,
                <a href="https://github.com/ProVerif/vscode-proverif-language-service">language
                    servers</a> and
                <a href="https://github.com/famoser/agnes">deployment tools</a>;
                <br>

                <!-- I improve and refactor existing code, or introduce new technologies if necessary. -->
                and was part of the teams powering
                <a href="https://www.stratus.swiss">Stratus</a> and
                <a href="https://bluecare.ch/blueconnect/">BlueConnect</a>.
            </p>
        </div>

        <div class="footer">
            <p>
                famoser GmbH,
                c/o Florian Moser,
                Ochsengasse 66,
                CH-4123 Allschwil -
                <a href="https://www.zefix.ch/en/search/entity/list/firm/1515465">CHE-498.133.112</a> -
                <a href="https://www.irqao.com/PDF/C46969-85361.pdf">ISO 9001 certified</a> -
                <a href="https://www.irqao.com/PDF/C46969-85362.pdf">ISO 27001 certified</a>
            </p>
        </div>
    </div>
</section>

<section class="full-page research-font">
    <div class="top">
        <div class="title">
            <h1>Research</h1>
            <p>into usable provably-secure internet voting</p>
        </div>
    </div>

    <div class="bottom">
        <div class="description background-red">
            <p>
                <!-- I publish simple and convincingly-proven protocols which suit their respective context. -->
                I propose and proof
                <a href="https://arxiv.org/abs/2311.12710">internet voting protocols</a>,
                <br>

                <!-- To show that more secure systems can indeed be constructed, I document the state of the art... -->
                publish
                <a href="https://www.bsi.bund.de/DE/Service-Navi/Publikationen/Studien/Verifiable_Online-Voting/Verifiable_Online-Voting_node.html">studies</a>
                and
                <!-- and sometimes even implement parts by myself. -->
                <a href="https://github.com/famoser/polyas-verification">independent implementations</a>,
                <br>

                <!-- I communicate research results to the general public to contribute towards choosing better systems. -->
                explain verifiable internet voting to
                <a href="https://cfp.gulas.ch/gpn22/talk/TKRTLZ/">the general public</a>,
                <br>

                <!-- Since many years, I run and continuously adapt the internet voting system used by the personnel of UZH. -->
                and develop, operate and maintain internet voting at
                <a href="https://www.uzh.ch/cmsssl/vauz/de/politik/wahlen/e-voting.html">UZH</a>.
            </p>
        </div>

        <div class="footer">
            <p>
                Équipe PESTO,
                Centre Inria de l'Université de Lorraine,
                615 Rue du Jardin-Botanique,
                FR-54600 Villers-lès-Nancy -
                <a href="https://team.inria.fr/pesto/">research team</a> -
                <a href="https://members.loria.fr/FMoser/">research website</a>
            </p>
        </div>
    </div>
</section>

<?php
include "../templates/scripts.html"
?>

</body>
</html>

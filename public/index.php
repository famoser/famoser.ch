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

<section class="sidebar">
    <div class="profile">
        <img alt="Florian Moser" src="../images/Florian Moser.jpg">
        <h2>Florian Moser</h2>
        <p>
            florian.moser (at) famoser.ch <br>
            write me in en, de, de-ch or fr
        </p>
    </div>

    <div class="education">
        <table class="time-table">
            <tbody>
            <tr>
                <td>now</td>
                <td>PhD Cand. <a href="https://inria.fr">INRIA</a> in Computer Science</td>
            </tr>
            <tr>
                <td>2022</td>
                <td>Msc <a href="https://ethz.ch" target="_blank">ETH</a> in Computer Science</td>
            </tr>
            <tr>
                <td>2018</td>
                <td>Bsc <a href="https://ethz.ch" target="_blank">ETH</a> in Computer Science</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="experience">
        <table class="time-table">
            <tbody>
            <tr>
                <td>now</td>
                <td>
                    Developer & Scientist
                    <a href="https://famoser.ch">famoser GmbH</a>
                </td>
            </tr>
            <tr>
                <td>2019</td>
                <td>
                    Board Member Internal Affairs
                    <a href="https://vseth.ethz.ch" target="_blank">VSETH</a>
                </td>
            </tr>
            <tr>
                <td>2018</td>
                <td>
                    Professional Software Engineer
                    <a href="https://www.zuehlke.com" target="_blank">Zühlke</a>
                </td>
            </tr>
            <tr>
                <td>2016</td>
                <td>
                    Developer and Project Manager
                    <a href="https://novu.ch" target="_blank">Novu</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="full-page">
    <div class="top">
        <div class="title">
            <h1>Development</h1>
            <p>of custom high-quality web-applications</p>
        </div>
    </div>

    <div class="bottom">
        <div class="description background-green">
            <p>
                I develop, operate and maintain
                <a href="https://baupen.ch" target="_blank">baupen</a> and
                <a href="https://github.com/famoser/nodika" target="_blank">nodika</a>;

                <br>
                automate internal processes of the
                <a href="https://uzh.ch" target="_blank">University of Zürich</a>;

                <br>
                create
                <a href="https://github.com/famoser/pdf-generator" target="_blank">PDF writers</a>,
                <a href="https://github.com/ProVerif/vscode-proverif-language-service" target="_blank">language servers</a> and
                <a href="https://github.com/famoser/agnes" target="_blank">deployment tools</a>;

                <br>
                and was part of the teams powering
                <a href="https://www.stratus.swiss" target="_blank">Stratus</a> and
                <a href="https://bluecare.ch/blueconnect/" target="_blank">BlueConnect</a>.
            </p>
        </div>

        <div class="footer">
            <p class="text-center text-muted">
                famoser GmbH,
                c/o Florian Moser,
                Ochsengasse 66,
                CH-4123 Allschwil -
                <a href="https://www.zefix.ch/en/search/entity/list/firm/1515465" target="_blank">CHE-498.133.112</a> -
                <a href="https://www.irqao.com/PDF/C46969-85361.pdf" target="_blank">ISO 9001 certified</a> -
                <a href="https://www.irqao.com/PDF/C46969-85362.pdf" target="_blank">ISO 27001 certified</a>
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
                I propose and proof
                <a href="https://arxiv.org/abs/2311.12710" target="_blank">internet voting protocols</a>,

                <br>
                participate in
                <a href="https://github.com/famoser/polyas-verification" target="_blank">independent implementation</a>
                pilots,

                <br>
                explain verifiable internet voting to
                <a href="https://cfp.gulas.ch/gpn22/talk/TKRTLZ/" target="_blank">the general public</a>,

                <br>
                and develop, operate and maintain internet voting at
                <a href="https://www.uzh.ch/cmsssl/vauz/de/politik/wahlen/e-voting.html" target="_blank">UZH</a>.
            </p>
        </div>

        <div class="footer">
            <p class="text-center text-muted">
                Équipe PESTO,
                Centre Inria University De Lorraine,
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

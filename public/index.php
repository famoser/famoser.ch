<?php
include "../src/bootstrap.php";

$sendContactRequest = isset($_POST["email"]) && strlen($_POST["email"]) > 3 &&
    isset($_POST["message"]) && strlen($_POST["message"]) > 3 &&
    !isset($_POST["robot"]) && isset($_POST["human"]);

if ($sendContactRequest) {
    sendMail($_POST["email"], $_POST["message"]);
}

$invalidUri = false;
if ($_SERVER["REQUEST_URI"] !== "/") {
    $redirect = getRedirect($_SERVER["REQUEST_URI"]);
    if ($redirect !== false) {
        http_response_code(302);
        header("Location: " . $redirect);
        exit;
    }

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
                Sorry, we could not find what you were looking for!
                Contact us and we'll find it for you :)
            </div>
        </div>
    </section>
<?php } ?>

<section class="inverted">
    <div class="container">
        <p id="ads" class="d-none adblock-warning">
            You have turned off or did not install an Adblocker!
            Install it now for <a target="_blank" href="https://addons.mozilla.org/de/firefox/addon/ublock-origin/">Firefox</a> or
            <a target="_blank" href="https://chrome.google.com/webstore/detail/ublock-origin/cjpalhdlnbpafiamejdnhcphjbkeiagm?hl=de">Chrome</a>.<br/>
            Because <a class="smooth-scroll" href="#privacy">privacy</a> is a human right.
        </p>
        <div class="main">
            <div class="teaser">
                <img class="img-fluid logo" src="/images/logo.png" alt="the alternative logo">

                <div class="spacer"></div>
                <p>
                    We are students of ETH who help you with linux<br/>
                    at our <a class="smooth-scroll" href="#events">events</a>
                    and in our <a class="smooth-scroll" href="#contact">office</a>.
                    For free!
                </p>
                <p>
                    Because we love Open Source and Free Software<br/>
                    and want to help you to get started (<a class="smooth-scroll" href="#philosophy">here's why</a>).
                </p>

                <div class="resources">
                    <p>
                        <a href="https://gitlab.ethz.ch/thealternative/courses" target="_blank">course materials</a> |
                        guides: <a href="https://thealternative.ch/guides/bash" target="_blank">bash</a> <a href="https://thealternative.ch/guides/git.html" target="_blank">git</a>
                    </p>
                </div>

                <img class="tux" src="/images/tux.png" alt="tux, the linux mascot">
            </div>
        </div>
    </div>
</section>

<?php

$eventFiles = getFutureEventFiles();
printEventsSection($eventFiles, true);

?>

<section class="inverted" id="contact">
    <div class="container">
        <div class="contact">
            <div class="row team">
                <div class="col-6 col-sm-3">
                    <img class="img-fluid" src="images/nicolas.jpg" alt="nicolas">
                    <p class="text-center">
                        <span class="ressort lead">President</span><br/>
                        Nicolas König
                    </p>
                </div>

                <div class="col-6 col-sm-3">
                    <img class="img-fluid" src="images/alex.jpg" alt="alex">
                    <p class="text-center">
                        <span class="ressort">Vice-President</span><br/>
                        Alexander Schoch
                    </p>
                </div>

                <div class="col-6 col-sm-3">
                    <img class="img-fluid" src="images/nils.jpg" alt="nils">
                    <p class="text-center">
                        <span class="ressort lead">Events</span><br/>
                        Nils Leuzinger
                    </p>
                </div>

                <div class="col-6 col-sm-3">
                    <img class="img-fluid" src="images/florian.jpg" alt="florian">
                    <p class="text-center">
                        <span class="ressort lead">Sponsoring</span><br/>
                        Florian Moser
                    </p>
                </div>
            </div>

            <div class="row location">
                <div class="col-lg-4 col-sm-6 col-12 address">
                    <p>
                        <b>The Alternative</b> <br/>
                        CAB E14 <br/>
                        Universitätsstrasse 6 <br/>
                        8092 Zürich
                    </p>
                    <p>
                        <a href="https://github.com/TheAlternativeZurich" target="_blank">github</a> |
                        <a href="https://gitlab.ethz.ch/thealternative" target="_blank">gitlab</a>
                    </p>

                    <p class="mt-4">
                        a part of <a href="https://ssc.ethz.ch/" target="_blank">SSC</a>
                        <a href="https://vseth.ethz.ch" target="_blank">
                            <img class="img-fluid vseth-logo" alt="vseth logo" src="/images/vseth.png">
                        </a>
                    </p>
                </div>
                <div class="col-lg-4 maps" id="maps">

                </div>

                <div class="col-lg-4  col-sm-6 col-12 contact-form">
                    <form action="/" method="post">
                        <?php if ($sendContactRequest) { ?>
                            <div class="alert alert-success">
                                We have received your contact request, and will reply shortly.
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email" placeholder="john@doe.com">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="robot" id="robot">
                                <label class="custom-control-label" for="robot">I am a robot.</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="human" id="human">
                                <label class="custom-control-label" for="human">I am a human.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="text" rows="6" name="message"
                                      placeholder="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="footer">

            <div class="philosophy" id="philosophy">

                <h2>Open Source</h2>
                <blockquote class="blockquote">
                    <p class="mb-0">
                        The term "open source" refers to something people can modify and share because its
                        design is publicly accessible.
                    </p>
                    <footer class="blockquote-footer">
                        <cite title="opensource.com">opensource.com</cite>
                    </footer>
                </blockquote>

                <p class="interpretation">
                    Open Source software encourages others to understand how something works exactly because the
                    inner workings of the program are published. Depending on the exact license used, the user may also be allowed
                    to run, modify and distribute the work. <br/>

                    <br/>

                    Using Open Source, you can check that the program does not execute something on your device you
                    do not want; like surveilling your activities or stealing your computational power for its own
                    purposes. However, when software is advertised as Open Source, it does not necessarily guarantee the rights to modify and distribute the work. <br/>

                    <br/>

                    <small>
                        Examples include
                        <a href="https://www.mozilla.org/de/firefox/" target="_blank">Firefox</a> and
                        <a href="https://www.python.org/" target="_blank">Python</a>.
                    </small>
                </p>

                <h2>Free Software</h2>
                <blockquote class="blockquote">
                    <p class="mb-0">
                        Free software developers guarantee [...] [that] any user can study the
                        source code, modify it, and share the program.
                    </p>
                    <footer class="blockquote-footer"><cite title="Free Software Foundation">fsf.org</cite></footer>
                </blockquote>

                <p class="interpretation">
                    Free Software <b>guarantees</b> the rights to run, modify and distribute the work. Depending on the exact license used,
                    it may be enforced that all derivative software must also grant the same rights (this is called <em>Copyleft</em>).<br/>

                    <br/>

                    Using Free Software, you are allowed to adapt it to your needs; like adding functionality critical
                    to your workflows. If you decide to use a Copyleft license, you can additionally be sure your work will benefit all
                    future users of the
                    software in the same way. <br/>

                    <br/>

                    <small>
                        Examples include
                        <a href="https://www.videolan.org/vlc/index.de.html" target="_blank">VLC Media Player</a> and
                        <a href="https://www.linux.org/" target="_blank">Linux</a>.
                    </small>
                </p>

                <h2>Proprietary Software</h2>

                <blockquote class="blockquote">
                    <p class="mb-0">
                        Only the original authors of proprietary software can legally copy, inspect, and alter that
                        software. To use proprietary software, computer users must agree (...) that they will not do
                        anything with the software that the software's authors have not expressly permitted.
                    </p>
                    <footer class="blockquote-footer"><cite title="opensource.com">opensource.com</cite></footer>
                </blockquote>

                <p class="interpretation">
                    Proprietary Software severely restricts how users can interact with the software running on their
                    device and does not allow them to read, modify or distribute its source code.<br/>

                    <br/>

                    Using Proprietary Software, you are in danger to lose functionality critical to your workflow
                    (because the owner chose not to provide it anymore), to no longer being able to open your files
                    (because the filetype is no longer supported) or to pay excessive license fees (because there are no
                    comparable alternatives).<br/>

                    <br/>

                    <small>
                        Examples include
                        <a href="https://www.microsoft.com/de-ch/windows" target="_blank">Windows</a> and
                        <a href="https://get.adobe.com/de/reader" target="_blank">Adobe Reader</a>.
                    </small>
                </p>

                <h2 id="privacy">Privacy</h2>

                <blockquote class="blockquote">
                    <p class="mb-0">
                        No one shall be subjected to arbitrary interference with his privacy, family, home or correspondence, nor to attacks upon his honor and reputation.
                    </p>
                    <footer class="blockquote-footer"><cite title="https://www.un.org/en/universal-declaration-human-rights/">Article 12 of Universal Declaration of Human Rights (1948)</cite></footer>
                </blockquote>

                <p class="interpretation">
                    Privacy is fundamental to protect yourself and those around you from manipulation.<br/>

                    <br/>
                    Most webpages and programs track anything you do or click.
                    Use Open Source Software and <a target="_blank" href="https://addons.mozilla.org/de/firefox/addon/ublock-origin/">Adblockers</a> to be reasonably sure that you are not a victim of surveillance.
                    Make anonymity the default to avoid making those stand out, who must stay anonymous.
                    <br/>

                    <br/>
                    <small>
                        Facebook reveals more about your personality than your friends could [<a target="_blank" href="https://www.pnas.org/content/112/4/1036">Paper</a>]; imagine what your browser history tells about you. <br/>
                        A firm called Cambridge Analytica (and probably many others) use this technique to influence outcomes of elections [<a href="https://www.tagesanzeiger.ch/ausland/europa/diese-firma-weiss-was-sie-denken/story/17474918">Tagesanzeiger</a>]<br/>
                        Edward Snowden used an anonymity service that relies on many "normal" people using the system to avoid suspicion [<a target="_blank" href="https://twitter.com/Snowden/status/1165297667490103302">Twitter</a>].
                    </small>
                </p>
            </div>
        </div>
    </div>
</section>

<?php
include "../templates/scripts.html"
?>

</body>
</html>

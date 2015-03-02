<?php
    $title = "ERROR!";
    $description = "Site error page";
    $canonical = "error.php";

    require_once('includes/header.php');
?>
    <section class="generic">
        <div>
            <header>
                <h1>Whoops!</h1>
                <h2>That wasn't supposed to happen!</h2>
            </header>
        </div>
        <div>
            <img class="alex" src="static/images/alex-available.svg" alt="An illustration of me, Alex Ward.">
            <div class="text-wrap">
                <p>You shouldn't have come to this page! Perhaps you mis-typed a URL? Try using the links in the footer to navigate to another page or click below to return to the home page.</p>
                <a href="index.php">&lt; Home</a>
            </div>
        </div>
    </section>
<?php require_once('includes/footer.php'); ?>

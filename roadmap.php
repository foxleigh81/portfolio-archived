<?php
    $title = "Development Roadmap";
    $description = "This website is always under development in some way, shape or form. Future plans and more information about the website is available here.";
    $canonical = "roadmap.php";

    require_once('includes/header.php');
?>
    <section class="generic">
        <div>
            <header>
                <h1>For developers</h1>
                <h2>This site is currently in Phase One</h2>
            </header>
        </div>
        <div>
            <img class="alex" src="static/images/alex-available.svg" alt="An illustration of me, Alex Ward.">
            <div class="text-wrap">
                <p>Hi Guys,</p>
                <p>Thanks for taking a look at my website, I hope you like what you see. To make things a little easier for you to check through, the JavaScript and CSS is not minified, whereas it would obviously normally be compressed to high-hell!</p>
                <p>I've also uploaded the raw SCSS files so you can see those too. They are available here:</p>
                <ul>
                    <li><a href="static/styles/scss/custom.scss">custom.scss</a></li>
                    <li><a href="static/styles/scss/responsive.scss">responsive.scss</a></li>
                    <li><a href="static/styles/scss/classes.scss">classes.scss</a></li>
                    <li><a href="static/styles/scss/reset.scss">reset.scss</a></li>
                </ul>
                <p>The goal of this website is not only to showcase my abilities but also to help me develop more advanced skills.</p>
                <p>At the moment, the site is in phase one, for this step I started to refine my illustration abilities and made this the first site I've built which properly utilises SVG images (before I've just used them here and there).</p>
                <p><strong>Phase 2</strong> will consist of the following:</p>
                <ul>
                    <li>SVG animations</li>
                    <li>JavaScript animations</li>
                    <li>even more refined illustrations</li>
                    <li>Angular.JS</li>
                    <li>More content</li>
                    <li>A Portfolio section</li>
                    <li>a real-live Red Panda for every reader*</li>
                </ul>
                <span class="small">*Maybe</span>
                <a href="index.php">&lt; Go back</a>
            </div>
        </div>
    </section>
<?php require_once('includes/footer.php'); ?>

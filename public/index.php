<?php
    // Options are 'available', 'on-assignment' and 'on-holiday';
    $set_status = "on-assignment";

    switch ($set_status) {
        case 'available':
            $title = "Currently available for UX contracts";
            $description = "I am a highly skilled and experienced UI developer and usability consultant. I am available for contracts in the London area.";
            $cta_text = "<p>I'm <strong>currently available</strong> for projects in the <strong>London</strong> area</p>";
        break;
        case 'on-assignment':
            $freeDate = '29/06/2015'; //DD/MM/YYYY
            $title = "UX developer from London";
            $description = "I am a highly skilled and experienced UI developer and usability consultant. I am currently on assignment and expect to be available for contract on " . $freeDate;
            $cta_text = "<p>I'm currently <strong>on assignment</strong>. I expect to be free for contracts on $freeDate</p>";
        break;
        case 'on-holiday':
            $freeDate = ''; //DD/MM/YYYY
            $title = "UX developer from London";
            $description = "I am a highly skilled and experienced UI developer and usability consultant. I am available for contracts in the London area.";
            $cta_text = "<p>I am currently taking a break from contracting. Don't worry, I'll be available again soon.</p>";
        break;
    }

    $canonical = "index.php";
    require_once('includes/header.php');
?>
    <section class="status is-<?php echo $set_status; ?>">
        <div>
            <ul class="social jstarget-social">
                <li><a class="fa fa-behance-square" title="Check me out on Behance" href="https://www.behance.net/alexward1981/"><span>My Portfolio</span></a></li>
                <li><a class="fa fa-github" title="Check me out on Github" href="https://github.com/alexward1981"><span>My Github</span></a></li>
                <li><a class="fa fa-dribbble" title="Check me out on Dribble" href="https://dribbble.com/alexbward"><span>My Dribbble portfolio</span></a></li>
                <li><a class="fa fa-twitter" title="Follow me on Twitter" href="https://twitter.com/alexbward"><span>Follow me on Twitter</span></a></li>
                <li><a class="fa fa-facebook-official" title="Check me out on Facebook" href="https://www.facebook.com/alexward1981"><span>Follow me on Facebook</span></a></li>
            </ul>
            <header role="banner">
                <h1>I'm Alex</h1>
                <h2>I'm a Front-End Engineer</h2>
            </header>
        </div>
        <img class="alex" src="static/images/alex-<?php echo $set_status; ?>.svg" alt="An illustration of me, Alex Ward.">
        <div>
            <div class="cta">
                <?php echo $cta_text; ?>
                <a href="#contact" class="button">Get in touch</a>
                <a href="https://www.dropbox.com/s/arxwap21eqkw2h3/AlexWard-ContractorCV.docx?dl=0" class="button">Download CV</a>
            </div>
        </div>
    </section>
    <section class="skills">
        <h2>I know my stuff!</h2>
        <img src="static/images/alex-tables.svg" alt="An illustration of me, Alex Ward, wearing a tshirt saying 'we used to build websites with tables'">
        <div class="text-wrap">
            <p>I've been in the web industry for a long time (since 1998 to be exact) and over that time I've acquired a wide range of skills. </p>
        </div>
        <div class="skill-table">
            <div class="cell max-3">
                <h2>Expert</h2>
                <ul>
                    <li>Usability (UX)</li>
                    <li>Accessibility</li>
                    <li>Responsive Design</li>
                    <li>xHTML/HTML5</li>
                    <li>CSS (including CSS3)</li>
                    <li>SASS/LESS</li>
                    <li>JavaScript/jQuery</li>
                    <li>Procedural PHP</li>
                    <li>Git</li>
                </ul>
            </div>
            <div class="cell max-3">
                <h2>Middle-weight</h2>
                <ul>
                    <li>MySQL</li>
                    <li>Build Systems (e.g. Jenkins)</li>
                    <li>Server Management</li>
                    <li>CMS Templating (Perch &amp; Wordpress)</li>
                    <li>Illustration</li>
                </ul>
            </div>
            <div class="cell max-3">
                <h2>Competent</h2>
                <ul>
                    <li>OO PHP</li>
                    <li>PHP MVC Frameworks (eg Symfony 2, Laravel etc...)</li>
                    <li>CMS Templating (Drupal, EpiServer, Umbraco)</li>
                    <li>3D Modelling</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="brands">
        <h2>I love the brands I've worked with &hellip;</h2>
        <img src="static/images/alex-smile.svg" alt="An illustration of me, Alex Ward smiling.">
        <div class="text-wrap">
            <p>I've been fortunate enough to work with some amazing brands over the years.</p>
            <p>Here are a few of my favourites:</p>
        </div>
        <ul>
            <li class="sse"><img src="static/images/brands/sse.png" alt="SSE"></li>
            <li class="bandq"><img src="static/images/brands/bandq.png" alt="B&amp;Q"></li>
            <li class="honda"><img src="static/images/brands/honda.png" alt="Honda"></li>
            <li class="everest"><img src="static/images/brands/everest.png" alt="Everest"></li>
            <li class="bowmore"><img src="static/images/brands/bowmore.png" alt="Bowmore"></li>
            <li class="pandg"><img src="static/images/brands/pandg.png" alt="P&amp;G"></li>
            <li class="pampers"><img src="static/images/brands/pampers.png" alt="Pampers"></li>
            <li class="nhs"><img src="static/images/brands/nhs.png" alt="NHS"></li>
            <li class="plusnet"><img src="static/images/brands/plusnet.png" alt="Plusnet"></li>
        </ul>
    </section>
    <section class="references">
        <h2>&hellip; and I think they love me too!</h2>
        <img src="static/images/alex-blushing.svg" alt="An illustration of me, Alex Ward, Blushing" />
        <ul>
            <li>
                <blockquote itemprop="review">
                    <span class="hide" itemprop="itemreviewed">Alex Ward</span>
                    <strong itemprop="description">"Alex clearly has a great level of experience and technical knowledge and completed the task at ease. His enthusiasm and easy going attitude also made the task that much easier."</strong>
                    <br> - <span itemprop="reviewer">Spencer Leah, Head of Digital @ Plusnet</span>
                </blockquote>
            </li>
            <li>
                <blockquote itemprop="review">
                    <span class="hide" itemprop="itemreviewed">Alex Ward</span>
                    <strong itemprop="description">"Alex's deep experience in this area is evident both in the quality of his work, and his clear articulation of problems/challenges alongside workable solutions. I would happily recommend Alex, and would certainly use him again."</strong>
                    <br> - <span itemprop="reviewer">David Fowler, Business &amp; Systems Integration Manager @ Accenture</span>
                </blockquote>
            </li>
            <li>
                <blockquote itemprop="review">
                    <span class="hide" itemprop="itemreviewed">Alex Ward</span>
                    <strong itemprop="description">"Alex has been nothing short of exemplary in his work. He has taken every brief and task given, always going beyond what was asked to deliver top quality results in a timely and professional manner."</strong>
                    <br> -<span itemprop="reviewer"> Vincent Pickering, Lead UX developer @ Bolser</span>
                </blockquote>
            </li>
            <li>
                <blockquote itemprop="review">
                    <span class="hide" itemprop="itemreviewed">Alex Ward</span>
                    <strong itemprop="description">"Alex is a solid front end developer and a pleasure to work with. I was fortunate enough to work with him on a number of projects for high profile clients including P&amp;G. He has a great attitude to development challenges and always delivers. I would certainly work with him again."</strong>
                    <br> - <span itemprop="reviewer">Phillip Mundy, Disruptive technology entrepreneur</span>
                </blockquote>
            </li>
        </ul>
    </section>
    <section class="contact" id="contact">
        <h2>Get in touch!</h2>
        <img src="static/images/alex-phone.svg" alt="An illustration of me, Alex Ward holding a cup of tea and talking on the phone.">
        <div class="col max-2">
            <div class="text-wrap">
                <p>I’ve recently moved to the amazing city of London and I’m currently available for contract work. If you wish to hire me for a contract or  project, please contact me either using the form or the details below.</p>
                <div class="details">
                    <span><strong>Telephone:</strong> <a href="tel:07538943004" itemprop="telephone">07538 943004</a></span>
                    <span><strong>Email:</strong> <a href="mailto:alex@alexward.me.uk" itemprop="email">alex@alexward.me.uk</a></span>
                    <span><strong>Skype:</strong> alexward1981</span>
                    <span><strong>Carrier Pigeon:</strong> No longer available</span>
                </div>
                <p><strong>Notice to agents:</strong> Please don’t contact me for permanent roles, I love contracting and no power in the 'verse will take me away from it.</p>
                <p>
                    <br />
                    <a href="https://www.dropbox.com/s/arxwap21eqkw2h3/AlexWard-ContractorCV.docx?dl=0" class="button">Download CV</a>
                </p>
            </div>
        </div>
        <div class="col max-4">
            <div class="warning">This form requires javascript enabled.</div>
            <form action="process.php" method="POST">
                <fieldset>
                    <legend>Contact Alex Ward</legend>
                    <div class="input-container">
                        <label for="user-name">Hello, my name is*:</label>
                        <input type="text" name="user-name" id="user-name" class="v-text required" data-validation="You must enter a name" disabled />
                    </div>
                    <div class="input-container">
                        <label for="user-content">and I have the following to say*:</label>
                        <textarea rows="10" name="user-content" id="user-content" class="required" data-validation="Please tell me why you are emailing me" disabled></textarea>
                    </div>
                    <div class="input-container">
                        <label for="user-tel">You can call me on:</label>
                        <input type="text" name="user-tel" id="user-tel" class="v-phone" data-validation="Please enter a valid uk phone number" disabled />
                    </div>
                    <div class="input-container">
                        <label for="user-email">or email me at*:</label>
                        <input type="text" name="user-email" id="user-email" class="v-email required" data-validation="Please provide a valid email address" disabled />
                    </div>
                    <div class="input-container radio">
                        <input type="radio" name="contract-type" id="contract-type-contract" value="contract" checked disabled />
                        <label for="contract-type-contract">I am interested in hiring you for a contract</label>
                    </div>
                    <div class="input-container radio">
                        <input type="radio" name="contract-type" id="contract-type-freelance" value="freelance" disabled />
                        <label for="contract-type-freelance">I'd like you to build me a website</label>
                    </div>
                    <div class="input-container">
                        <button class="button" type="submit" disabled>Get in touch</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>
<?php require_once('includes/footer.php'); ?>

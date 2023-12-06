<?php
  include('db/db.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> - History </title>
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/ico">
    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <!--animate-->
    <link href="/assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="/assets/js/wow.js"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body>
    <!-- header -->
    <?php include('nav.php') ?>
    <!-- //header -->
	
	<!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">History</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i>History</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->

    <!-- home image with content block -->
    <section class="w3l-servicesblock" id="about">
        <div class="container py-md-5">
            <div class="pb-xl-5">
                <p class="animated wow fadeInUp" data-wow-delay=".3s"><b style="font-size: 20px;">I</b>n July 2017, Wonder World International School sprang to life as a vibrant summer camp destination where students could enjoy an enriching break full of interactive and educational activities. Quickly garnering a reputation as one of the best summer camps in the region, it attracted 20-25 students from various international and private schools across Accra. The demand grew, with families eager for branches across the country to experience the transformative, fun learning experiences we offered.</p>

                <p class="mt-4 animated wow fadeInUp" data-wow-delay=".4s">In response to the significant demand and the positive influence the camp had on students, we metamorphosed Wonder World into a daycare center in October 2017. We started humbly, with just three students for one term, nurturing the dreams of someday catering to over three hundred eager learners. Despite the humble beginnings, the foundation was firm, rooted in joy and a commitment to fostering a nurturing, safe, and enjoyable learning environment.
By 2020, we experienced a steady growth, reaching a milestone of 15 students. The journey was embraced with a resilient and learning spirit. Then, we were met with the unprecedented challenge of the Covid-19 pandemic. It spurred us to initiate an online school that broke geographical barriers, reaching students globally, including in Nigeria and the United Kingdom. Spearheaded by the incredible Ms. Bertha Whitscger-Cossoh , we transitioned swiftly and efficiently to a virtual format, supporting students who could not yet return to traditional classroom settings and retaining the faith and participation of 6 devoted students through the transition.
In 2021, as we reopened after a one-year hiatus due to the pandemic, we welcomed back our persistent group of six students and Ms. Bertha Cossoh, along with an encouraging addition of 14 new students, breathing fresh life and energy into our vibrant school community. We hailed this triumphant return as a testament to our resilience, adaptability, and the unyielding commitment to our educational mission.
</p>

                <p class="mt-4 animated wow fadeInUp" data-wow-delay=".5s">As we look back, our hearts swell with pride seeing the growth from a small yet cherished summer camp to a blossoming educational hub. We are steadfast in our commitment to nurturing our students at every stage, eager to meet the diverse needs and unlock the boundless potentials of our students globally.</p>
                <p class="mt-4 animated wow fadeInUp" data-wow-delay=".3s">We remain focused on the goal to be acknowledged not just in our locality but nationally and globally as a first-rate educational institution. It is with great fervor that we undertake the mission to facilitate comprehensive development in our students, shaping them into principled leaders who embody excellence and integrity.
At Wonder World International School, we blend joy with education, laying a robust foundation for our learners to champion a future that is not only bright for them but also elevates the world to a higher standard. Our vision is crystal clear; to be a beacon of excellence, integrity, and service to society, nurturing great minds and even greater hearts. The journey continues, but we steer forward with the same spirit of joy, nurturing, and boundless potential that has guided us since our inception.</p>
                <p class="mt-4"></p>
                <p class="mt-4"></p>
                <p class="mt-4"></p>
                
            </div>
        </div>
    </section>
    <!-- //home image with content block -->

    <!-- stats block -->
     <?php include('statistics.php') ?>
    <!-- //stats block -->

    <!-- testimonials block -->
    <?php include('testimonial.php') ?>
    <!-- //testimonials block -->

    <!-- team block -->
    <!-- <section class="w3l-team-13 py-5" id="team">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase">Our Team</p>
                <h3 class="title-style">Meet our Teachers</h3>
            </div>
            <div class="row text-center left-side">
                <div class="col-lg-3 col-6">
                    <div class="image-one">
                        <a href="#team">
                            <img src="assets/images/team1.png" class="arrow-png img-responsive" />
                            <h4>Emma Watson</h4>
                            <div class="buttons-teams2 mt-2">
                                <a href="#team"><i class="fab fa-facebook-square"></i></a>
                                <a href="#team"><i class="fab fa-twitter-square"></i></a>
                                <a href="#team"><i class="fab fa-google-plus-square"></i></a>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="image-one">
                        <a href="#team">
                            <img src="assets/images/team2.png" class="arrow-png img-responsive">
                            <h4>Enrique Lal</h4>
                            <div class="buttons-teams2 mt-2">
                                <a href="#team"><i class="fab fa-facebook-square"></i></a>
                                <a href="#team"><i class="fab fa-twitter-square"></i></a>
                                <a href="#team"><i class="fab fa-google-plus-square"></i></a>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-lg-0 mt-4">
                    <div class="image-one">
                        <a href="#team">
                            <img src="assets/images/team3.png" class="arrow-png img-responsive">
                            <h4>Smith Ker</h4>
                            <div class="buttons-teams2 mt-2">
                                <a href="#team"><i class="fab fa-facebook-square"></i></a>
                                <a href="#team"><i class="fab fa-twitter-square"></i></a>
                                <a href="#team"><i class="fab fa-google-plus-square"></i></a>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-lg-0 mt-4">
                    <div class="image-one">
                        <a href="#team">
                            <img src="assets/images/team4.png" class="arrow-png img-responsive">
                            <h4>Forkler Lee</h4>
                            <div class="buttons-teams2 mt-2">
                                <a href="#team"><i class="fab fa-facebook-square"></i></a>
                                <a href="#team"><i class="fab fa-twitter-square"></i></a>
                                <a href="#team"><i class="fab fa-google-plus-square"></i></a>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- //team block -->

    <!-- about-2 section -->
    <section class="w3l-about-2 pb-5 pt-4">
        <div class="container pb-md-5 pb-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 about-2-secs-right mb-lg-0 mb-4 text-center pe-lg-4">
                    <img src="assets/images/image.jpg" alt="" class="img-fluid radius-image m-auto" />
                </div>
                <div class="col-lg-6 about-2-secs-left ps-lg-5">
                    <p class="text-uppercase">Our Environment</p>
                    <h3 class="title-style mb-sm-3 mb-2">Active Learning, Expert Teachers & Safe Environment</h3>
                    <p>We provides our students and staff a safe, positive and stimulating learning and teaching environment providing a hybrid curriculum that is locally and internationally recognized to prepare them to become responsible</p>
                    <div class="d-flex align-items-center mt-5">
                        <a class="btn btn-style btn-style-3" href="contact.php">Contact Us</a>
                        <!-- <a class="btn btn-style-primary ms-4" href="contact.php">Learn More <i
                                class="fas fa-arrow-right"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //about-2 section -->

    <!-- footer block -->
    <?php include('footer.php') ?>
    <!-- //footer block -->

    <!-- Js scripts -->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fas fa-level-up-alt" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->

    <!-- common jquery plugin -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- //common jquery plugin -->

    <!-- counter-->
    <script src="assets/js/counter.js"></script>
    <!-- //counter-->

    <!-- theme switch js (light and dark)-->
    <script src="assets/js/theme-change.js"></script>
    <!-- //theme switch js (light and dark)-->

    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap -->
    <!-- //Js scripts -->
</body>

</html>
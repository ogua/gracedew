<!--
Author: ogusesitsolutions
Author URL: http://ogusesitsolutions.com
-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/ico">
    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <!-- header -->
     <?php include('nav.php') ?>

    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">Contact Us</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->

    <!-- contact block -->
    <section class="w3l-contact py-5" id="contact">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase">Get In Touch</p>
                <h3 class="title-style">Contact Us</h3>
            </div>
            <div class="row contact-block">
                <div class="col-md-7 contact-right">
                    <form action="https://sendmail.w3layouts.com/submitForm" method="post" class="signin-form">
                        <div class="input-grids">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="w3lName" id="w3lName" placeholder="Your Name"
                                        class="contact-input" required="" />
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" name="w3lSender" id="w3lSender" placeholder="Your Email"
                                        class="contact-input" required="" />
                                </div>
                            </div>
                            <input type="text" name="w3lSubect" id="w3lSubect" placeholder="Subject"
                                class="contact-input" required="" />
                            <input type="text" name="w3lWebsite" id="w3lWebsite" placeholder="Website URL"
                                class="contact-input" required="" />
                        </div>
                        <div class="form-input">
                            <textarea name="w3lMessage" id="w3lMessage" placeholder="Type your message here"
                                required=""></textarea>
                        </div>
                        <div class="text-start">
                            <button class="btn btn-style btn-style-3">Send Message</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 ps-lg-5 mt-md-0 mt-5">
                    <div class="contact-left">
                        <div class="cont-details">
                            <div class="d-flex contact-grid">
                                <div class="cont-left text-center me-3">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="cont-right">
                                    <h6>School Address</h6>
                                    <p>Abeibee Street 20, Kotobabi-Accra <br>(Father Odai Kwabina Street) GD-210-9384.</p>
                                </div>
                            </div>
                            <div class="d-flex contact-grid mt-4 pt-lg-2">
                                <div class="cont-left text-center me-3">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="cont-right">
                                    <h6>Call Us</h6>
                                    <p><a href="tel:+233 55 823 0501">+233 55 823 0501</a></p>

                                    <p><a href="tel:+233 24 094 1560">+233 24 094 1560</a></p>

                                    <p><a href="tel:+233 50 468 5546">+233 50 468 5546</a></p>
                                </div>
                            </div>
                            <div class="d-flex contact-grid mt-4 pt-lg-2">
                                <div class="cont-left text-center me-3">
                                    <i class="fas fa-envelope-open-text"></i>
                                </div>
                                <div class="cont-right">
                                    <h6>Email Us</h6>
                                    <p><a href="mailto:wonderworldintsch@gmail.com" class="mail">wonderworldintsch@gmail.com</a></p>
                                </div>
                            </div>
                            <div class="d-flex contact-grid mt-4 pt-lg-2">
                                <div class="cont-left text-center me-3">
                                    <i class="fas fa-headphones-alt"></i>
                                </div>
                                <div class="cont-right">
                                    <h6>Customer Support</h6>
                                    <p><a href="https://api.whatsapp.com/send?phone=+233558230501&text=Hello" target="_blank" class="mail">+233 55 823 0501</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- map -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15881.84280202441!2d-0.1439602!3d5.646285!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf83afaba40299%3A0x72d30eb2b405e0ba!2sWonder%20World%20International%20School!5e0!3m2!1sen!2sgh!4v1688053305401!5m2!1sen!2sgh" width="100%" height="400" style="border:0;" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border: 0px;"></iframe>
    </div>
    <!-- //contact block -->

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
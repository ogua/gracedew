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
    <!-- //header -->

    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">Covid Protocols</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i>Covid Protocols</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->

    <section class="services-w3l-block py-5" id="features">
        <div class="container py-md-5 py-4">
            <p>Due to the circulating and highly contagious Delta variant, WWis recommends universal indoor masking by all students (age 6 and older), staff, teachers, and visitors to the school, regardless of vaccination status.
In addition to universal indoor masking, WWis recommends students and staff to maintain at least 3 feet of physical distance between students within classrooms to reduce transmission risk. When it is not possible to maintain a physical distance of at least 3 feet, such as when schools cannot fully re-open while maintaining these distances.
</p>

            <p> It is especially important to layer multiple other prevention strategies, such as hand washing, masking, ventilation, respiratory etiquette, staying home when sick and getting tested, contact tracing in combination with quarantine and isolation, cleaning and disinfection are also important layers of prevention to keep schools safe.</p>
            
            <p>Students, teachers, and staff should stay home when they have signs of any infectious illness and be referred to their healthcare provider for testing and care.</p>
        </div>
    </section>

    <!-- courses section -->
    <!-- <div class="w3l-grids-block-5 py-5">
        <div class="container py-md-5 py-4">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="coursecard-single">
                        <div class="grids5-info position-relative">
                            <img src="assets/images/blog.jpg" alt="" class="img-fluid" />
                        </div>
                        <div class="content-main-top">
                            <h4><a href="#">Regular Admission</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                    <div class="coursecard-single">
                        <div class="grids5-info position-relative">
                            <img src="assets/images/blog.jpg" alt="" class="img-fluid" />
                        </div>
                        <div class="content-main-top">
                            <h4><a href="#">Summer School</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                    <div class="coursecard-single">
                        <div class="grids5-info position-relative">
                            <img src="assets/images/blog.jpg" alt="" class="img-fluid" />
                        </div>
                        <div class="content-main-top">
                            <h4><a href="#">Online School</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="coursecard-single">
                        <div class="grids5-info position-relative">
                            <img src="assets/images/blog.jpg" alt="" class="img-fluid" />
                        </div>
                        <div class="content-main-top">
                            <h4><a href="courses.html">After School Club</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="coursecard-single">
                        <div class="grids5-info position-relative">
                            <img src="assets/images/blog.jpg" alt="" class="img-fluid" />
                        </div>
                        <div class="content-main-top">
                            <h4><a href="courses.html">Saturday Care</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="coursecard-single">
                        <div class="grids5-info position-relative">
                            <img src="assets/images/blog.jpg" alt="" class="img-fluid" />
                        </div>
                        <div class="content-main-top">
                            <h4><a href="#">Extra- Curricular Activities</a></h4>
                            <p>(Super Readers Club, Swimming, Tennis, Ballet, UCmas)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- //courses section -->

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
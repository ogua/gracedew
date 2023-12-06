<?php
  include('db/db.php');
?>
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
                <h4 class="inner-text-title pt-5">Gallery</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i>Gallery</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->

    <!-- courses section -->
    <div class="w3l-grids-block-5 py-5">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase">Our Beautiful Moments</p>
                <h3 class="title-style">Gallery</h3>
            </div>
            <div class="row justify-content-center">
                <?php
                    $sql = "SELECT * FROM imageuploads WHERE uniqueid = '".$uniqueid."' ";
                    $query = mysqli_query($conn,$sql);
                    $countrows = mysqli_num_rows($query);
                ?>

                <?php
                    if($countrows > 0){
                    while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                <div class="proj_gallery_grid col-lg-4 col-md-6 mt-md-0 mt-4">
                    <a href="<?php echo $schoolurl;?>/storage/<?php echo $row['url'];?>">
                    <div class="coursecard-single">
                        <div class="grids5-info position-relative">
                            <img src="<?php echo $schoolurl;?>/storage/<?php echo $row['url'];?>" alt="" class="img-fluid" />
                        </div>
                        <div class="content-main-top">
                            <div class="content-top mb-4 mt-3">
                                <ul class="list-unstyled d-flex align-items-center justify-content-between">
                                    <li><?php echo $row['title'];?></li>
                                    <li></li>
                                </ul>
                            </div>
                            <p><?php echo $row['description'];?></p>
                        </div>
                    </div></a>
                </div>
                 <?php
                    }
                    }else{
                        ?>
                        <div class="alert alert-danger">No Records Found!</div>
                        <?php
                    }
                ?>
                
            </div>
            <!-- pagination -->
            <!-- <div class="pagination-style text-center mt-5">
                <ul>
                    <li> <a href="#none" class="not-allowed" disabled="">
                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li><a class="active" href="#page">1</a></li>
                    <li>
                        <a href="#page">2</a>
                    </li>
                    <li>
                        <a href="#page">3</a>
                    </li>
                    <li>
                        <a href="#page"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                        </a>
                    </li>
                </ul>
            </div> -->
            <!-- //pagination -->
        </div>
    </div>
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

    <!-- simpleLightbox -->
    <link href="/assets/css/simpleLightbox.css" rel='stylesheet' type='text/css' />
    <script src="/assets/js/simpleLightbox.js"></script>
    <script>
        $('.proj_gallery_grid a').simpleLightbox();
    </script>
    <!-- //simpleLightbox -->
</body>

</html>
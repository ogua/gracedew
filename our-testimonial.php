<?php
  include('db/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gracedew International School | Testimonial</title>
    
    <meta charset="utf-8">
    <meta name="description" content="Our latest gallery, images of Excursions,Carrier Day celebration,School Premises among others.">

  <meta name="keywords" content="Gracedew International School, Gracedew, About Gracedew, About Gracedew International, Schools at Teshie, Gracedew, about Gracedew, Gracedew gallary, Gracedew images, Gracedew videos, Gracedew events, Gracedew school system, oguse it solutions, oguses, OguSesITSolutions, oguaschoolz">

  <link rel="canonical" href="https://gracedewintsch.com/our-testimonial.php"/>

  <meta property="og:description" content="Our latest gallery, images of Excursions,Carrier Day celebration,School Premises among others." />

  <meta property="og:title" content="Gracedew International School | Testimonial" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://wonderworldinternationalschool.com/our-testimonial.php" />
  <meta property="og:image" content="https://wonderworldinternationalschool.com/assets/images/banner.jpg" />


  <meta name="twitter:title" content="Gracedew International School | Testimonial" />
  <meta name="twitter:site" content="@blogogua" />
  <meta name="twitter:image" content="https://wonderworldinternationalschool.com/assets/images/banner.jpg" />
  <meta name="twitter:description" content="Our latest gallery, images of Excursions,Carrier Day celebration,School Premises among others." />

  <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Gracedew International School | Testimonial","description":"Our latest gallery, images of Excursions,Carrier Day celebration,School Premises among others.","image":"https://wonderworldinternationalschool.com/assets/images/banner.jpg"}</script>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style type="text/css">
        .gotop{
            margin: -20px;
        }
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php include('navbar.php') ?>
        <!-- Navbar End -->


        <!-- Page Header End -->
        <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Testimonial</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Testimonial</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Testimonial</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->
        

        <!-- Testimonial Start -->
        <?php
          include('testimonial.php');
        ?>
        <!-- Testimonial End -->


        <!-- Footer Start -->
        <?php
          include('footer.php');
        ?>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
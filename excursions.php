<?php
  include('db/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wonder World International School | Our Gallery</title>
    
    <meta charset="utf-8">
    <meta name="description" content="Our latest gallery, images of Excursions,Carrier Day celebration,School Premises among others.">

  <meta name="keywords" content="Wonder World International School, Wonder World, About Wonder World, About Wonder World International, Schools at Teshie, Wonder World, about Wonder World, Wonder World gallary, Wonder World images, Wonder World videos, Wonder World events, Wonder World school system, oguse it solutions, oguses, OguSesITSolutions, oguaschoolz">

  <link rel="canonical" href="https://wonderworldinternationalschool.com/our-gallery.php"/>

  <meta property="og:description" content="Our latest gallery, images of Excursions,Carrier Day celebration,School Premises among others." />

  <meta property="og:title" content="Wonder World International School | Our Services" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://wonderworldinternationalschool.com/our-gallery.php" />
  <meta property="og:image" content="https://wonderworldinternationalschool.com/assets/images/banner.jpg" />


  <meta name="twitter:title" content="Wonder World International School | Our Services" />
  <meta name="twitter:site" content="@blogogua" />
  <meta name="twitter:image" content="https://wonderworldinternationalschool.com/assets/images/banner.jpg" />
  <meta name="twitter:description" content="Our latest gallery, images of Excursions,Carrier Day celebration,School Premises among others." />

  <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Wonder World International School | Our Services","description":"Our latest gallery, images of Excursions,Carrier Day celebration,School Premises among others.","image":"https://wonderworldinternationalschool.com/assets/images/banner.jpg"}</script>
    
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/ico">
    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicon -->

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nanogallery/5.10.3/css/nanogallery.min.css" integrity="sha512-HaGJl1RVe2w3indAm833x0NZ/IL9CJ8hEPMOHFhYkb9PcwHGxEzPKS/ZImATujRcbMWfyiBKy7+pycpzvGkwPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nanogallery/5.10.3/css/themes/clean/nanogallery_clean.min.css" integrity="sha512-+XSCO9D/4Q7Kuzx+XMMr7FtUY1rUVY3dmfpBG4yp0w+yi4vedvvM9v/mpJqwt9B1EPKwQpjC/U5UNP3Q11xnig==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nanogallery/5.10.3/css/nanogallery.woff.min.css" integrity="sha512-ApM3TWSvO5syrBiMkLJNFR7MMcKyCjDLkRgrHeCRsKw4waU0pFQcf6uFeGkcc40xeO1he7bh1sX8oxyZgOhcjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nanogallery/5.10.3/css/themes/clean/nanogallery_clean.min.css" integrity="sha512-+XSCO9D/4Q7Kuzx+XMMr7FtUY1rUVY3dmfpBG4yp0w+yi4vedvvM9v/mpJqwt9B1EPKwQpjC/U5UNP3Q11xnig==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nanogallery/5.10.3/css/themes/light/nanogallery_light.min.css" integrity="sha512-4tNORj+HIrfPpPXLm2ExvyyrNxK+PRCyu1XvmRdRzcjYYFn7Uv5Qvs3FLZz5QBvfvpoTj+Wz2WlQMb2+VFduzw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <h1 class="display-2 text-white animated slideInDown mb-4">Gallery</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="our-gallery.php">Gallery</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Excursions</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->

         <!-- Classes Start -->
        <div class="w3l-grids-block-5 py-5">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase">Our Beautiful Moments</p>
                <h3 class="title-style">Excursions</h3>
            </div>
            
                <div id="nanoGallery3">
                <?php
                    $sql = "SELECT * FROM imageuploads WHERE uniqueid = '".$uniqueid."' and cat = '0' ";
                    $query = mysqli_query($conn,$sql);
                    $countrows = mysqli_num_rows($query);
                ?>

                <?php
                    if($countrows > 0){
                    while ($row = mysqli_fetch_assoc($query)) {
                        ?>

            
                <a href="<?php echo $row['url'];?>" data-ngthumb="<?php echo $row['url'];?>"></a>
            

                <!-- <div class="proj_gallery_grid col-lg-4 col-md-6 mt-md-0 mt-4">
                    <a href="<?php echo $schoolurl;?>/storage/<?php echo $row['url'];?>">
                    <div class="coursecard-single">
                        <div class="grids5-info position-relative">
                            <img src="<?php echo $schoolurl;?>/storage/<?php echo $row['url'];?>" alt="" class="img-fluid" />
                        </div>
                        <div class="content-main-top">
                            <div class="content-top mb-4 mt-3">
                                <ul class="list-unstyled d-flex align-items-center justify-content-between">
                    <li></li>
                    <li></li>
                    </ul>
                            </div>
                            
                        </div>
                    </div></a>
                </div> -->
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
        <!-- Classes End -->

        
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

    <!-- simpleLightbox -->
    <link href="/assets/css/simpleLightbox.css" rel='stylesheet' type='text/css' />
    <script src="/assets/js/simpleLightbox.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/nanogallery/5.10.3/jquery.nanogallery.min.js" integrity="sha512-jSebf6hNUwUCwuXVxRXGl3SyGluTJx7NvgCA8Ewf7mgMMpDX8DLkyHkhRexhQCbFI8Ylykzvmsi/nBDuZBppKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.proj_gallery_grid a').simpleLightbox();
    </script>
    <!-- //simpleLightbox -->

    <script>
        $(document).ready(function () {

      // $("#nanoGallery3").nanoGallery({
      //     itemsBaseURL:'https://brisbois.fr/nanogallery/demonstration/'
      // });

      jQuery("#nanoGallery3").nanoGallery({
            thumbnailWidth: 'auto',
            thumbnailHeight: 160,
                locationHash: false,
            thumbnailHoverEffect:'borderLighter,imageScaleIn80',
            theme:'clean',
            colorScheme:'light',
            itemsBaseURL:'<?php echo $schoolurl;?>/storage/'
          });

        });
    </script>


</body>

</html>
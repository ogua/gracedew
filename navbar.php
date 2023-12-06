<!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="#" class="navbar-brand">
                <!-- <h1 class="m-0 text-custom"><i class="fa fa-book-reader me-3"></i>Wonder World International School</h1> -->
                <img src="/img/toplogo.png" alt="wonder world international school logo" class="img-fluid">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="/" class="nav-item nav-link <?php if($_SERVER['REQUEST_URI'] == "/index.php" || $_SERVER['REQUEST_URI'] == "/"){echo "active";} ?>">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About Us</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <!-- <a href="history.php" class="dropdown-item <?php if($_SERVER['REQUEST_URI'] == "/history.php"){echo "active";} ?>">History</a> -->
                            <a href="about-us.php" class="dropdown-item <?php if($_SERVER['REQUEST_URI'] == "/about-us.php"){echo "active";} ?>">About Us</a>
                            <a href="admission-requirements.php" class="dropdown-item <?php if($_SERVER['REQUEST_URI'] == "/admission-requirements.php"){echo "active";} ?>">Admission requirements</a>
                            <a href="code-of-ethics.php" class="dropdown-item <?php if($_SERVER['REQUEST_URI'] == "/code-of-ethics.php"){echo "active";} ?>">Code of Ethics</a>
                            <a href="school-pledge.php" class="dropdown-item <?php if($_SERVER['REQUEST_URI'] == "/school-pledge.php"){echo "active";} ?>">School Pledge</a>
                            <a href="school-anthem.php" class="dropdown-item <?php if($_SERVER['REQUEST_URI'] == "/school-anthem.php"){echo "active";} ?>">School Anthem</a>
                            <!-- <a href="princpal-message.php" class="dropdown-item <?php if($_SERVER['REQUEST_URI'] == "/princpal-message.php"){echo "active";} ?>">Principals message</a> -->
                            <!-- <a href="partnership-with-parents.php" class="dropdown-item <?php if($_SERVER['REQUEST_URI'] == "/partnership-with-parents.php"){echo "active";} ?>">Partnership With Parents</a>
                            <a href="health-safty-and-nutrition.php" class="dropdown-item <?php if($_SERVER['REQUEST_URI'] == "/our-testimonial.php"){echo "active";} ?>">Health Safety and Nutrition</a>
                            <a href="parent-information.php" class="dropdown-item <?php if($_SERVER['REQUEST_URI'] == "/our-testimonial.php"){echo "active";} ?>">Parent Information</a>
                            <a href="empty.php" class="dropdown-item <?php if($_SERVER['REQUEST_URI'] == "/our-testimonial.php"){echo "active";} ?>">Empty</a> -->
                            
                            
                            <!-- <a href="404.html" class="dropdown-item">404 Error</a> -->
                        </div>
                    </div>
                    <a href="our-testimonial.php" class="nav-item nav-link <?php if($_SERVER['REQUEST_URI'] == "/our-testimonial.php"){echo "active";} ?>">Testimonial</a>
                    <a href="our-service.php" class="nav-item nav-link <?php if($_SERVER['REQUEST_URI'] == "/our-service.php"){echo "active";} ?>">Our services</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="facility.html" class="dropdown-item">School Facilities</a>
                            <a href="team.html" class="dropdown-item">Popular Teachers</a>
                            <a href="call-to-action.html" class="dropdown-item">Become A Teachers</a>
                            <a href="appointment.html" class="dropdown-item">Make Appointment</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                        </div>
                    </div> -->
                    <a href="our-gallery.php" class="nav-item nav-link <?php if($_SERVER['REQUEST_URI'] == "/our-gallery.php"){echo "active";} ?>">Gallery</a>
                    <a href="contact-us.php" class="nav-item nav-link <?php if($_SERVER['REQUEST_URI'] == "/contact-us.php"){echo "active";} ?>">Contact Us</a>
                </div>
                <a target="_blank" href="https://oguaschoolz.com/admin" class="btn btn-custom rounded-pill px-3 d-none d-lg-block">Portal<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->
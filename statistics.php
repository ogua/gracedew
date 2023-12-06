<?php
        //total teachers
     $ttsql = "SELECT * FROM `staff` WHERE uniqueid = '".$uniqueid."' ";
     $ttsqlquery = mysqli_query($conn,$ttsql);
     $totalteacher = mysqli_num_rows($ttsqlquery);

     //total totalstudent
     $ttssql = "SELECT * FROM `studentinfos` WHERE uniqueid = '".$uniqueid."' ";
     $ttssqlquery = mysqli_query($conn,$ttssql);
     $totalstudent = mysqli_num_rows($ttssqlquery);

     //total totalsubjects
     $ttsubsql = "SELECT * FROM `subjects` WHERE uniqueid = '".$uniqueid."' ";
     $ttsubsqlquery = mysqli_query($conn,$ttsubsql);
     $totalsubject = mysqli_num_rows($ttsubsqlquery);

     //total certteacher
     $tctsql = "SELECT * FROM `staff` WHERE role LIKE '%Teacher%' AND uniqueid = '".$uniqueid."' ";
     $tctsqlquery = mysqli_query($conn,$tctsql);
     $certteacher = mysqli_num_rows($tctsqlquery);

     //total totalgstudent
     $ttgsql = "SELECT * FROM `studentinfos` WHERE completed = 'Yes' AND uniqueid = '".$uniqueid."' ";
     $ttgsqlquery = mysqli_query($conn,$ttgsql);
     $totalgstudent = mysqli_num_rows($ttgsqlquery);
    ?>
<!-- <section class="w3-stats pt-4 pb-5" id="stats">
        <div class="container pb-md-5 pb-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase">Our Statistics</p>
                <h3 class="title-style">We are Proud to Share with You</h3>
            </div>
            <div class="row text-center pt-4">
                <div class="col-md-3 col-6">
                    <div class="counter">
                        <img src="assets/images/icon-1.png" alt="" class="img-fluid">
                        <div class="timer count-title count-number mt-sm-1" data-to="<?php echo $totalstudent; ?>" data-speed="1500"></div>
                        <p class="count-text">Students Enrolled</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="counter">
                        <img src="assets/images/icon-2.png" alt="" class="img-fluid">
                        <div class="timer count-title count-number mt-3" data-to="<?php echo $totalteacher; ?>" data-speed="1500"></div>
                        <p class="count-text">Total Staff</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mt-md-0 mt-5">
                    <div class="counter">
                        <img src="assets/images/icon-3.png" alt="" class="img-fluid">
                        <div class="timer count-title count-number mt-3" data-to="<?php echo $totalsubject; ?>" data-speed="1500"></div>
                        <p class="count-text">Total Subjects</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mt-md-0 mt-5">
                    <div class="counter">
                        <img src="assets/images/icon-4.png" alt="" class="img-fluid">
                        <div class="timer count-title count-number mt-3" data-to="<?php echo $totalgstudent; ?>" data-speed="1500"></div>
                        <p class="count-text">Graduated Students</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
<?php
    $sql = "SELECT * FROM `testimonies` WHERE uniqueid = '".$uniqueid."' and status = '1' ";
    $query = mysqli_query($conn,$sql);
    $countrows = mysqli_num_rows($query);
?>

<?php 
 if ($countrows > 0) {
?>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Our Clients Say!</h1>
            <p></p>
        </div>

        <iframe width="100%" height="415" src="https://www.youtube.com/embed/sbOyH32tcMw?si=LOBdwDe66-YdiKEY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>


        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">

            <?php
                $count = 1;
                while ($row = mysqli_fetch_assoc($query)) {
            ?>

            <div class="testimonial-item bg-light rounded p-5">
                <p class="fs-5"><?php echo $row['testimonial'];?></p>
                <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">

                    <?php
                        if(empty($row['image'])){
                            ?>
                    <img src="assets/images/test.png" class="img-fluid flex-shrink-0 rounded-circle"
                        alt="client image" style="width: 90px; height: 90px;" />

                    <?php
                    }else{
                     ?>
                    <img src="<?php echo $schoolurl; ?>/storage/<?php echo $row['image']; ?>" class="img-fluid flex-shrink-0 rounded-circle"
                    alt="client image" style="width: 90px; height: 90px;"/>
                            <?php
                            }
                    ?>
                    <!-- <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 90px; height: 90px;"> -->

                    <div class="ps-3">
                        <h3 class="mb-1"><?php echo $row['fullname'];?></h3>
                        <span><?php echo $row['relation'];?> of <?php echo $row['childname'];?></span>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
    <?php
 }
?>
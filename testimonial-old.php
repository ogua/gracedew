<?php
    $sql = "SELECT * FROM `testimonies` WHERE uniqueid = '".$uniqueid."' and status = '1' ";
    $query = mysqli_query($conn,$sql);
    $countrows = mysqli_num_rows($query);
?>

<?php 
 if ($countrows > 0) {
?>
<section class="w3l-index4 py-5" id="testimonials">
        <div class="container py-md-5 py-4">
            <div class="content-slider text-center">
                <div class="clients-slider">
                    <div class="mask">
                        <ul>
                            <?php
                                $count = 1;
                                while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <li class="anim<?php echo $count; ?>">
                    <?php
                        if(empty($row['image'])){
                            ?>
                    <img src="assets/images/test.png" class="img-fluid rounded-circle"
                        alt="client image" />

                    <?php
                    }else{
                     ?>
                    <img src="<?php echo $schoolurl; ?>/storage/<?php echo $row['image']; ?>" class="img-fluid rounded-circle"
                    alt="client image" />
                            <?php
                            }
                    ?>
                                
                                    </q> </blockquote>
                                <blockquote class="quote"><q><?php echo $row['testimonial'];?>
                                    </q> </blockquote>
                                <div class="source" style="font-size: 15px;"> <?php echo $row['fullname'];?> - <?php echo $row['relation'];?> of <?php echo $row['childname'];?></div>
                            </li>
                                    <?php
                                    $count++;
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
 }
?>
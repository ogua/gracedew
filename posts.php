<?php
    $sql = "SELECT * FROM `news` WHERE uniqueid = '".$uniqueid."' and status = '1' ";
    $query = mysqli_query($conn,$sql);
    $countrows = mysqli_num_rows($query);
?>

<?php 
 if ($countrows > 0) {
?>
<div class="w3l-blog-block-5 py-5" id="blog">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase">Our News</p>
                <h3 class="title-style">Latest <span></span> Posts</h3>
            </div>
            <div class="row justify-content-center">
                <?php
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                <div class="col-lg-4 col-md-6 mt-4">
                
                    <div class="blog-card-single">
                        <div class="grids5-info">
                            <a href="#">
                                <?php
                                    if(empty($row['picart'])){
                                        ?>

                                        <img src="assets/images/blog.jpg" alt="" />

                                        <?php
                                    }else{
                                        ?>
                                        <img src="<?php echo $schoolurl; ?>/storage/<?php echo $row['picart']; ?>" alt="" />
                                        <?php
                                    }
                                ?>
                                
                            </a>
                            <div class="blog-info">
                                <h4><a href="#"><?php echo $row['title']; ?></a></h4>
                                <p><?php echo $row['desc']; ?></p>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <a class="d-flex align-items-center" href="#" title="Wonder world International School Post">
                                        
                                    </a>
                                    <p class="date-text"><i class="far fa-calendar-alt me-1"></i><?php echo date('M d, Y',strtotime($row['edate'])); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                 $count++;
                    }
                ?>

            </div>
        </div>
    </div>
<?php
 }
?>
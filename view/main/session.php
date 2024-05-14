<?php include ('header.php');
include ("../../config.php"); ?>
<style>
    /* Hide additional items initially */
    .properties.hidden {
        display: none;
    }
</style>

<main>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Our courses</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Services</a></li>
                                    </ol>
                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Courses area start -->
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Our featured courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                // Get today's date
                $today = date("Y-m-d");

                // SQL query to select sessions
                $sql = "SELECT session.title, session.description, session.start_date, session.end_date, session.niveau, 
            formation.title AS formation_title, promotion.title AS promotion_title, session.session_id 
            FROM session 
            JOIN formation ON session.formation_id = formation.formation_id 
            JOIN promotion ON session.promotion_id = promotion.promotion_id
            where session.end_date>=:today";

                $req = $conn->prepare($sql);
                $req->bindParam(':today', $today);
                $req->execute();

                while ($row = $req->fetch()) {

                    ?>
                    <div class="col-lg-4">
                        <div class="properties properties2 mb-30">
                            <div class="properties__card">
                                <div class="properties__img overlay1">
                                    <a href="#"><img src="../../assets/home/img/gallery/featured5.png" alt=""></a>
                                </div>
                                <div class="properties__caption">
                                    <p><?php echo $row["formation_title"] ?></p>
                                    <h3><a href="#"><?php echo $row["title"] ?></a></h3>
                                    <p><?php echo $row["description"] ?></p>
                                    <div class="properties__footer d-flex justify-content-between align-items-center">
                                        <div class="price">
                                            <span>$135</span>
                                        </div>
                                    </div>
                                    <?php if ($row["start_date"] > $today) { ?>

                                        <a href="../participant/participate.php"
                                            class="border-btn border-btn border-btn2 ">Enroll now</a>
                                    <?php } else { ?>

                                        <a class="border-btn border-btn border-btn2 disabled">Session started</a>
                                        <?php
                                    } ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </div>
    </div>
    <!-- Courses area End -->

</main>
<script>
    // JavaScript function to handle the "Load More" button click event
    function loadMore() {
        // Select all hidden items
        var hiddenItems = document.querySelectorAll('.properties.hidden');
        // Iterate over the first 3 hidden items and reveal them
        for (var i = 0; i < 3; i++) {
            if (hiddenItems[i]) {
                hiddenItems[i].classList.remove('hidden');
            }
        }
        // If no more hidden items, hide the "Load More" button
        if (document.querySelectorAll('.properties.hidden').length === 0) {
            document.getElementById('load-more-btn').style.display = 'none';
        }
    }
</script>

<?php include ('footer.php') ?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php
include 'connection.php';
$conn = connectMysql();
$AID = $_POST['AID'];
$CID = $_POST['CID'];
$appType = $_POST['appType'];
$appointment = getAppointmentByAID($AID,$conn);
$user = getUserByCID($CID,$conn);
$cars = getAllCarwithType($conn,$appType);
$Insurances = getAllInsurance($conn);
//echo $DID;
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

    <title>Cardoor - Car Rental HTML Template</title>

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="assets/css/responsive.css" rel="stylesheet">


    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

<!--== Preloader Area Start ==-->
<div class="preloader">
    <div class="preloader-spinner">
        <div class="loader-content">
            <img src="assets/img/preloader.gif" alt="JSOFT">
        </div>
    </div>
</div>
<!--== Preloader Area End ==-->
<?php include 'header.php' ?>
<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Account details</h2>
                    <span class="title-line"><i class="fa fa-car"></i></span>
                    <p>Welcome Back, we look forward to serving you once again</p>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->

<!--== Car List Area Start ==-->
<div id="blog-page-content" class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Single Articles Start -->
            <div class="col-lg-12">
                <article class="single-article middle">
                    <div class="row">

                        <!-- Articles Thumbnail Start -->
                        <div class="col-lg-5 d-xl-none">
                            <div class="article-thumb">
                                <img src="assets/img/article/arti-thumb-2.jpg" alt="JSOFT">
                            </div>
                        </div>
                        <!-- Articles Thumbnail End -->

                        <!-- Articles Content Start -->
                        <div class="col-lg-7">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <div class="article-body">
                                        <h3><a>Account Details: </a></h3>
                                        <ul>
                                            <li> User Name: <?= $user['FirstName'].' '.$user['LastName'] ?></li>                                                &nbsp;
                                            <li> CID: <?= $appointment['CID'] ?></li>                                                &nbsp;
                                            <li> Appointment: <?= $AID; ?></li>                                                &nbsp;
                                        </ul>
                                        <!-- <p>Wlam aiber vestibulum fringilla oremedad ipsum dolor sit amet consectetur adipisicing elit sed doned eiusmod tempored incididunt ut labore et dolore magna aliquaa enimd ad minim veniad.</p> -->
                                        <form class="appointment" action="BuyingBooked.php" method="post" >
                                            <div class="slider">
                                                <input type="hidden" name="AID" value="<?=$AID?>">
                                                <p>Choose Cars: </p>
                                                <select class="user-select" required name="CarId">
                                                    <?php foreach ($cars as $car): ?>
                                                        <option value="<?= $car['CarId'] ?>"><?= $car['Brand'] ?> <?= $car['carName'] ?> Price: $<?= $car['Price'] ?>/Per Day</option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <p>Choose Insurance: </p>
                                                <select class="user-select" required name="insuranceID">
                                                    <?php foreach ($Insurances as $insurance): ?>
                                                        <option value="<?= $insurance['IID'] ?>">$<?= $insurance['Price'] ?> Content <?= $insurance['content'] ?></option>
                                                    <?php endforeach; ?>
                                                        <option value="0">Not Attaching</option>
                                                </select>
                                                <div class="log-btn">
                                                    <button type="submit" class="readmore-btn" style="background-color: black">Finish Booking
                                                        <i class="fa fa-long-arrow-right"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5><p> Appointment Now: </p></h5>
                            <?php if ($appointment == null): ?>
                                <li>No Appointment</li>
                            <?php else: ?>
                                <li><?= $appointment['AID'] . ' ' . $appointment['Date'] . ' ' . $appointment['Time'] ?></li>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            </div>


            <!--== Footer Area Start ==-->
            <section id="footer-area">
                <!-- Footer Widget Start -->
                <div class="footer-widget-area">
                    <div class="container">
                        <div class="row">
                            <!-- Single Footer Widget Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-footer-widget">
                                    <h2>About Us</h2>
                                    <div class="widget-body">
                                        <img src="assets/img/logo.png" alt="JSOFT">
                                        <p>Lorem ipsum dolored is a sit ameted consectetur adipisicing elit. Nobis magni
                                            assumenda distinctio debitis, eum fuga fugiat error reiciendis.</p>


                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="single-footer-widget">
                                    <h2>get touch</h2>
                                    <div class="widget-body">
                                        <p>Lorem ipsum doloer sited amet, consectetur adipisicing elit. nibh auguea,
                                            scelerisque sed</p>

                                        <ul class="get-touch">
                                            <li><i class="fa fa-map-marker"></i> 800/8, Kazipara, Dhaka</li>
                                            <li><i class="fa fa-mobile"></i> +880 01 86 25 72 43</li>
                                            <li><i class="fa fa-envelope"></i> kazukamdu83@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Footer Widget End -->
                        </div>
                    </div>
                </div>
                <!-- Footer Widget End -->

                <!-- Footer Bottom Start -->
                <div class="footer-bottom-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                                    All rights reserved | This template is made with <i class="fa fa-heart-o"
                                                                                        aria-hidden="true"></i> by <a
                                        href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Bottom End -->
            </section>
            <!--== Footer Area End ==-->

            <!--== Scroll Top Area Start ==-->
            <div class="scroll-top">
                <img src="assets/img/scroll-top.png" alt="JSOFT">
            </div>
            <!--== Scroll Top Area End ==-->

            <!--=======================Javascript============================-->
            <!--=== Jquery Min Js ===-->
            <script src="assets/js/jquery-3.2.1.min.js"></script>
            <!--=== Jquery Migrate Min Js ===-->
            <script src="assets/js/jquery-migrate.min.js"></script>
            <!--=== Popper Min Js ===-->
            <script src="assets/js/popper.min.js"></script>
            <!--=== Bootstrap Min Js ===-->
            <script src="assets/js/bootstrap.min.js"></script>
            <!--=== Gijgo Min Js ===-->
            <script src="assets/js/plugins/gijgo.js"></script>
            <!--=== Vegas Min Js ===-->
            <script src="assets/js/plugins/vegas.min.js"></script>
            <!--=== Isotope Min Js ===-->
            <script src="assets/js/plugins/isotope.min.js"></script>
            <!--=== Owl Caousel Min Js ===-->
            <script src="assets/js/plugins/owl.carousel.min.js"></script>
            <!--=== Waypoint Min Js ===-->
            <script src="assets/js/plugins/waypoints.min.js"></script>
            <!--=== CounTotop Min Js ===-->
            <script src="assets/js/plugins/counterup.min.js"></script>
            <!--=== YtPlayer Min Js ===-->
            <script src="assets/js/plugins/mb.YTPlayer.js"></script>
            <!--=== Magnific Popup Min Js ===-->
            <script src="assets/js/plugins/magnific-popup.min.js"></script>
            <!--=== Slicknav Min Js ===-->
            <script src="assets/js/plugins/slicknav.min.js"></script>

            <!--=== Mian Js ===-->
            <script src="assets/js/main.js"></script>

</body>

</html>

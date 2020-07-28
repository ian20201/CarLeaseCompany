<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php
include 'connection.php';
$conn = connectMysql();
$userName = $_GET['userName'];
$staff = getStaffByUserName($userName, $conn);
if (!$staff) {
    echo "User not found";
    die();
}
$SID = $staff['SID'];
$appointments = getArrangeBySID($SID, $conn);
$app = null;
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

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

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="index.php" class="logo">
                            <img src="assets/img/logo.png" alt="JSOFT">
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li class="active"><a href="index.php">Log Out</a>
                                    <!-- <ul> -->
                                        <!-- <li><a href="login.html">Customer</a></li> -->
                                        <!-- <li><a href="login3.html">Supervisor</a></li> -->
                                    <!-- </ul> -->
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->

    <!--== Page Title Area Start ==-->
    <section id="slider-area">
		<div class="single-slide-item overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Appointment manage system</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p></p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
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
                            <!-- Articles Content Start -->
                            <div class="col-lg-7">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="article-body" style='text-transform: capitalize;'>
                                            <h3><a>Employee</a></h3>
                                            <ul>
                                                &nbsp;
                                                <li> Staff Name: <?= $staff['sfirstname'] . ' ' . $staff['slastname']; ?></li>
                                                &nbsp;
                                                <li> User Name: <?= $userName; ?></li>
                                            </ul>                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
						<div class="article-body" style=" margin-left:-40%;">
                            <h5><a> In charge Appointment List: </a></h5><br>
								<?php if ($appointments == null): ?>
									<li>No Appointment</li>
								<?php else: ?>
                                <?php foreach ($appointments as $appointment): ?>
<!--                                    --><?//= $app = getAppointmentByAID($appointment['AID'],$conn)?>
                                    <li><?= $appointment['AID']?> Date: <?= getAppointmentByAID($appointment['AID'],$conn)['Date']?> Time: <?= getAppointmentByAID($appointment['AID'],$conn)['Time']?> Type: <?= getAppointmentByAID($appointment['AID'],$conn)['AppType']?></li>
                                <?php endforeach; ?><?php endif; ?>
						        <form class="manage" action="staff_appt.php" method="post">
								<div style="margin-left:70%;">
                                    <input type="hidden" name="SID" value="<?=$SID?>">
									<p>Enter Appointment ID (AID): <input type='number' name='AID'>
									<p><a href="staff_appt.php" class="readmore-btn">Arrange Appointment Here<i class="fa fa-long-arrow-right"></i></a></p>
									</p>
								</div>
                                </form>
						</div>
					</div>
                        </div>
                    </article>
                </div>
                
				
					

    

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
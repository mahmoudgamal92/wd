<?php
include './utils/index.php';
$coupons = _Read('coupons');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="admin, dashboard" />
    <meta name="author" content="DexignZone" />
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aqartech :  Property Admin Dashboard  Bootstrap 5 Template" />
    <meta property="og:title" content="Aqartech :  Property Admin Dashboard  Bootstrap 5 Template" />
    <meta property="og:description" content="Aqartech :  Property Admin Dashboard  Bootstrap 5 Template" />
    <meta property="og:image" content="social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title>لوحة التحكم ود</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="../../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">

</head>

<body dir="rtl">

    <!--********* Preloader Start ********-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--********* Preloader End ***********-->

    <!--********* Main wrapper start ***********-->
    <div id="main-wrapper">

        <!--************* Nav header start ***************-->
        <div class="nav-header">
            <a href="index.php" class="brand-logo">
                <img class="logo-abbr" src="images/logo.png" alt="">
                <img class="logo-compact" src="images/logo-text.png" alt="">
                <img class="brand-title" src="images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--*************  Nav header end *************-->

        <!--************* Chat box start ***************-->
        <?php include 'components/chatbox.php'; ?>
        <!--************* Chat box End *************-->


        <!--*************** Header start ************-->
        <?php include 'components/header.php'; ?>
        <!--************ Header end ********-->

        <!--***************** Sidebar start *********-->
        <?php include 'components/sidebar.php'; ?>
        <!--********** Sidebar end *********-->


        <div class="modal fade" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            إضافة كوبون خصم جديد
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form">

                            <form method="POST" action="api/coupons/insert.php">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="number" class="form-control input-default" name="percentage" placeholder="أدخل نسبة الخصم %" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="number" class="form-control input-rounded" name="max_discount" placeholder=" أدخل الحد الأقصي للخصم" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="number" class="form-control input-rounded" name="max_users" placeholder="أدخل الحد الأقصي للمستخدمين" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">

                                            <input type="date" name="start_date" class="datepicker-default form-control" placeholder="إدخل تاريخ بداية الإستخدام" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="date" class="form-control input-rounded" name="end_date" placeholder="إدخل تاريخ الإنتهاء" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="text" class="form-control input-rounded" name="usage_message" placeholder="رسالة الإستخدام" required>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">إغلاق</button>
                        <button name="submit" type="submit" class="btn btn-primary">حفظ</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>



        <!--************** Content body start **********-->
        <div class="content-body">
            <div class="container-fluid">



                <div class="form-head page-titles d-flex  align-items-right">
                    <div class="me-auto  d-lg-block">
                        <h2 class="text-black font-w600 text-right">
                            كوبونات الخصم
                        </h2>
                    </div>


                    <a href="javascript:void(0);" class="btn btn-primary rounded light me-3" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                        إضافة جديد
                    </a>

                    <a href="javascript:void(0);" class="btn btn-primary rounded">
                        <i class="fas fa-cog me-0"></i>
                    </a>
                </div>

                <div class="row">
                    <?php
                    foreach ($coupons as $item) {
                    ?>

                        <div class="col-lg-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row m-b-30">

                                        <div class="col-md-7 col-xxl-12">
                                            <div class="new-arrival-content position-relative">

                                                <div class="comment-review star-rating">


                                                    <p class="price">
                                                        كوبون خصم
                                                        <?php echo $item['coupon_percent']; ?>
                                                        %
                                                    </p>
                                                </div>
                                                <p>
                                                    الحد الأقصي للخصم :
                                                    <span class="item">
                                                        <?php echo $item['coupon_max_discount']; ?>
                                                        ريال
                                                        <i class="fa fa-check-circle text-success"></i>
                                                    </span>
                                                </p>
                                                <p>العدد الأقي للمستخدمين :
                                                    <span class="item">
                                                        <?php echo $item['coupon_max_users']; ?>
                                                        مستخدم
                                                    </span>
                                                </p>


                                                <p>تاريخ البداية:
                                                    <span class="item">
                                                        <?php echo $item['coupon_start_date']; ?>
                                                    </span>
                                                </p>

                                                <p>تاريخ الإنتهاء:
                                                    <span class="item">
                                                        <?php echo $item['coupon_end_date']; ?>
                                                    </span>
                                                </p>


                                                <p> رسالة الإستخدام :
                                                    <span class="item">
                                                        <?php echo $item['coupon_usage_message']; ?>
                                                    </span>
                                                </p>


                                                <p> الحالة :
                                                    <span class="item">
                                                        <?php echo "نشط"; ?>
                                                    </span>
                                                </p>

                                                <div class="row" style="margin-top:30px">
                                                    <div class="col-lg-12">

                                                        <a onclick="return confirm('هل أنت متأكد من حذف الكوبون؟')" href="api/coupons/delete.php?id=<?= $item['coupon_id'] ?>" style="margin-left:20px">
                                                            <i class="fa fa-trash"></i>
                                                        </a>


                                                        <a href="api/coupons/delete.php">
                                                            <i class="fa fa-pen"></i>
                                                        </a>

                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php

                    }
                    ?>

                    <!-- review -->
                    <div class="modal fade" id="reviewModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Review</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="text-center mb-4">
                                            <img class="img-fluid rounded" width="78" src="images/avatar/1.jpg" alt="DexignZone">
                                        </div>
                                        <div class="form-group">
                                            <div class="rating-widget mb-4 text-center">
                                                <!-- Rating Stars Box -->
                                                <div class="rating-stars">
                                                    <ul id="stars">
                                                        <li class="star" title="Poor" data-value="1">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Fair" data-value="2">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Good" data-value="3">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Excellent" data-value="4">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="WOW!!!" data-value="5">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Comment" rows="5"></textarea>
                                        </div>
                                        <button class="btn btn-success btn-block">RATE</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************* Content body end ***********-->

        <!--************* Footer start *************-->
        <?php include 'components/footer.php'; ?>
        <!--************** Footer end *****************-->


    </div>
    <!--******** Main wrapper end ***********-->
    <!--************* Scripts ***************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>





</body>

</html>
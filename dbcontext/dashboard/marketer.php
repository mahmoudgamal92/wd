<?php
include './utils/index.php';
$id = $_GET['user_id'];
$marketer = _Read('marketers', array("user_id" => $id));
$user_token = $marketer[0]['user_token'];
$users  = _Read('users', array("marketer" => $user_token));
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
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
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

        <div class="content-body">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body p-20">

                                <img src="./images/man.png" style="width: 100px;height:100px;" />
                                <h1 style="text-align:center">
                                    <?php echo $marketer[0]['user_name']; ?>
                                </h1>
                                <p style="text-align:center">
                                    مسوق عقاري
                                </p>

                                <h3 style="text-align:center">
                                    المبلغ المستحق :
                                    <?php echo $marketer[0]['current_balance']; ?> ريال سعودي
                                </h3>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body p-20">
                                <h1 style="text-align:center">
                                    بيانات الحساب
                                </h1>


                                <p>
                                    <span>
                                        اسم المستخدم :
                                    </span>
                                    <?php echo $marketer[0]['user_name']; ?>
                                </p>


                                <p>
                                    <span>
                                        البريد الإلكتروني :
                                    </span>
                                    <?php echo $marketer[0]['user_email']; ?>
                                </p>

                                <p>
                                    <span>
                                        الكود التسويقي :
                                    </span>
                                    <?php echo $marketer[0]['referal_code']; ?>
                                </p>

                                <p>
                                    <span>
                                        الرابط التسويقي :
                                    </span>
                                    <?php echo $marketer[0]['referal_url']; ?>
                                </p>



                                <p>
                                    تاريخ الإضافة :
                                    <?php echo $marketer[0]['date_created']; ?>
                                </p>


                            </div>
                        </div>
                    </div>


                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <h1 style="text-align:center">
                                    ملخص الإشتراكات عن طرق المسوق
                                </h1>

                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>

                                                <th><strong>INPUT NO.</strong></th>
                                                <th><strong>TITLE</strong></th>
                                                <th><strong>PLACEHOLDER</strong></th>
                                                <th><strong>TYPE</strong></th>
                                                <th><strong>ROLE</strong></th>
                                                <th><strong>DESC</strong></th>
                                                <th><strong>LABEL</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($users as $item) {
                                            ?>
                                                <tr>

                                                    <td><strong>
                                                            <?php echo $item['user_id']; ?>
                                                        </strong></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <span class="w-space-no">
                                                                <?php echo $item['user_name']; ?>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php echo $item['user_email']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $item['user_phone']; ?>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center"><i class="fas fa-circle text-success me-1"></i> Active</div>
                                                    </td>



                                                </tr>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--**************Content body end ***********-->

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
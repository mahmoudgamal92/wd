<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="admin, dashboard" />
    <meta name="author" content="Wd App" />
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
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="#">
                                            <img src="images/logo.png" alt="" style="width:100px;height:100px">
                                        </a>
                                    </div>
                                    <h4 class="text-center mb-4">
                                        تسجيل الدخول - لوحة التحكم ود
                                    </h4>
                                    <form action="api/auth/signin.php" method="post">
                                        <div class="form-group">
                                            <label class="mb-1" style="text-align:right;width:100%">
                                                <strong style="text-align:right">
                                                    : البريد الإلكتروني
                                                </strong>
                                            </label>
                                            <input name="email" type="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1" style="text-align:right;width:100%">
                                                <strong style="text-align:right">
                                                    كلمة المرور :
                                                </strong></label>
                                            <input name="password" type="password" class="form-control">
                                        </div>


                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                    <label class="custom-control-label" for="basic_checkbox_1">
                                                        تذكر كلمة المرور
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">
                                                    نسيت كلمة المرور ؟
                                                </a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button>
                                        </div>
                                    </form>



                                    <div class="new-account mt-3">
                                        <p>هل تواجة مشكلة في تسجيل الدخول ؟
                                            <a class="text-primary" href="mailto:contact@wdapp.sa" onclick="window.location=another.html">
                                                تواصل مع الإدارة
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--*********** Scripts *************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>

</body>

</html>
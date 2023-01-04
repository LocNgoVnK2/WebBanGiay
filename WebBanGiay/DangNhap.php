<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <style type="text/css">
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, DarkOrange, orange);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, DarkOrange, orange)
        }

        .has-error {
            color: red;
        }
    </style>


</head>

<body>
    <section class="w-100 p-3 gradient-custom">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">

                        <div class="card-body p-5 text-center">
                            <form action="DangNhap_submit.php" method="get">
                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Đăng nhập</h2>

                                    <p class="text-white-50 mb-5">Nhập tài khoản và mật khẩu</p>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="userName" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">Tên đăng nhập</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="Password" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Mật khẩu</label>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Đăng Nhập</button>

                                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                        <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                        <a href="#!" class="text-white"><i
                                                class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                        <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                    </div>
                   


                                </div>
                            </form>
                            <div>
                                <a href="TrangChu.php" class="text-white-50 fw-bold">Trở về trang chủ</a>
                                <p class="mb-0">Bạn chưa có tài khoản? <a href="DangKy.php"
                                        class="text-white-50 fw-bold">Hãy đăng ký ngay!</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
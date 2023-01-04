<head>
    <meta charset="utf-8">
    <title>Đăng ký</title>
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

            background: -webkit-linear-gradient(to right,DarkOrange, orange);

/* W3C, IE 10+/ Edge, Fire4fox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, DarkOrange, orange);
    
        }
        .has-error{
                    color: red;
                }
    </style>
    <?php
   include 'CauHinh.php';
   $error = [];

   if (isset($_POST['userName'])) {
    $TenDN = addslashes($_POST['userName']);
    $MatKhau = addslashes($_POST['Password']);
    $rMatKhau = addslashes($_POST['rePassword']);

    $sqlCheckUserName = "SELECT * FROM taikhoan WHERE TenND='$TenDN'";
     $queryCheckUserName = mysqli_query($connect, $sqlCheckUserName);
       $checkTenDN = mysqli_num_rows($queryCheckUserName);
        if($checkTenDN==1){
            $error['samename'] = "Tên đăng nhập của bạn bị trùng";
        }
       if(empty($TenDN)){
           $error['name'] = "Bạn chưa nhập tên";
       }

       if(empty($MatKhau)){
           $error['matkhau'] = "Bạn chưa nhập mật khẩu";
       }
       if(strlen($MatKhau)<6){
        $error['Shortmatkhau'] = "Mật khẩu quá ngắn tối thiểu 6 kí tự !!";
        }
       if($MatKhau!=$rMatKhau){
           $error['rematkhau'] = "Mật khẩu và nhập lại mật khẩu không chính xác";
       }

       if(empty($error)){
       $sql = "insert into `taikhoan`( `TenND`, `MatKhau`, `QuanTriVien`) values ('" . $TenDN . "','" . $MatKhau . "',0)";
       $danhsach = $connect->query($sql);
       if (!$danhsach) {
            die("Không thể kết nối SQL :" . $connect->connect_error);
                exit();
            }
        header('Location: DangNhap.php');
       }
   }      
        
   $connect->close();
?>
</head>
<body>
<section class="w-100 p-3 gradient-custom">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form action="DangKy.php" method="post">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Đăng KÝ</h2>
                            <div class="form-outline form-white mb-4">
                                <div class="has-error">
                                    <span>
                                        <?php
                                        echo (isset($error['samename'])) ? $error['samename'] : "";
                                        ?>
                                    </span>
                                </div>
                                <input type="text" name="userName" class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX">Tên đăng nhập</label>
                                <div class="has-error">
                                    <span>
                                        <?php
                                        echo (isset($error['name'])) ? $error['name'] : "";
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <input type="text" name="Password" class="form-control form-control-lg" />
                                <label class="form-label" for="typePasswordX">Mật khẩu</label>
                                <div class="has-error">
                                    <span>
                                        <?php
                                        echo (isset($error['matkhau'])) ? $error['matkhau'] : "";
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <input type="text" name="rePassword" class="form-control form-control-lg" />
                                <label class="form-label" for="typePasswordX">Nhập lại mật khẩu</label>
                                <div class="has-error">
                                    <span>
                                        <?php
                                        echo (isset($error['rematkhau'])) ? $error['rematkhau'] : "";
                                        echo (isset($error['Shortmatkhau'])) ? $error['Shortmatkhau'] : "";
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Đăng Ký</button>
                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>

                        </div>
                        </form>
                        <div>
                            <a href="DangNhap.php" class="text-white-50 fw-bold">Trở lại đăng nhập</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    </body>